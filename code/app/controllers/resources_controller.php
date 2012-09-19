<?php
class ResourcesController extends AppController {

	var $name = 'Resources';
	var $helpers = array('Html', 'Form');
    var $components = array('Common','Image');
    var $uses = array('Resource','ResourceCategory');

    function admin_browse($returnID,$dirID = null)
    {
        $this->layout = "browse";
        if(isset($returnID))
        {
            $this->set('returnID',$returnID);
        }
        else
        {
            debug("For developer: The textbox id cannot be numeric!");
        }
        
        $this->Resource->recursive = 0;
        $this->set('resources', $this->paginate());
                
        $parentID = $this->ResourceCategory->field('parent_id',array('ResourceCategory.id'=>$dirID));
                
        $listDir = $this->ResourceCategory->find('all',array('conditions'=>array('ResourceCategory.parent_id'=>$dirID),'order'=>array('ResourceCategory.name'),'recursive'=>0));
        $listFile = $this->Resource->find('all',array('conditions'=>array('Resource.resource_category_id'=>$dirID),'recursive'=>-1));
        
        $curDir = $this->ResourceCategory->getDirPath($dirID);
        $this->set(compact('listDir','listFile','parentID','curDir','returnID'));
    }
    
    function admin_adv_browse($returnID,$dirID = null)
    {
        $this->layout = "browse";
        if(isset($returnID))
        {
            $this->set('returnID',$returnID);
        }
        else
        {
            debug("For developer: The textbox id cannot be numeric!");
        }
        
        $this->Resource->recursive = 0;
        $this->set('resources', $this->paginate());
                
        $parentID = $this->ResourceCategory->field('parent_id',array('ResourceCategory.id'=>$dirID));
                
        $listDir = $this->ResourceCategory->find('all',array('conditions'=>array('ResourceCategory.parent_id'=>$dirID),'order'=>array('ResourceCategory.name'),'recursive'=>0));
        $listFile = $this->Resource->find('all',array('conditions'=>array('Resource.resource_category_id'=>$dirID),'recursive'=>-1));
        
        $curDir = $this->ResourceCategory->getDirPath($dirID);
        $this->set(compact('listDir','listFile','parentID','curDir','returnID'));
    }
    
	function admin_index($dirID = null)
    {                
		$this->Resource->recursive = 0;
		$this->set('resources', $this->paginate());
                
        $parentID = $this->ResourceCategory->field('parent_id',array('ResourceCategory.id'=>$dirID));
                
        $listDir = $this->ResourceCategory->find('all',array('conditions'=>array('ResourceCategory.parent_id'=>$dirID),'order'=>array('ResourceCategory.name'),'recursive'=>0));
        $listFile = $this->Resource->find('all',array('conditions'=>array('Resource.resource_category_id'=>$dirID),'recursive'=>-1));
        
        $curDir = $this->ResourceCategory->getDirPath($dirID);
        $this->set(compact('listDir','listFile','parentID','curDir'));
        //debug($listDir);
	}
    
    function admin_uploadImage()
    {
        if (!empty($this->data)) 
        {               
            if(empty($this->data['Resource']['file']['name']))
            {
                $this->flashError(__('MsgMustUploadFile', true));
                $this->redirect($this->referer());
            }
            else
            {
                $ext = substr($this->data['Resource']['file']['name'], strrpos($this->data['Resource']['file']['name'], '.') + 1);
                $ext = strtolower($ext);
                
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png')  // Upload Image
                {
                    //$defaultFolder = "img/resources";
                    $path = "resources".$this->ResourceCategory->getDirPath($this->data['DirID']);
                    
                    $filename = $this->Image->upload($this->data['Resource']['file'],240,80,$path,false,$this->curUser['id']);
                    if(!empty($filename))
                    {
                        $this->data['Resource']['name'] = $this->data['Resource']['file']['name'];
                        $this->data['Resource']['image'] = $path.'/big/'.$filename;
                        $this->data['Resource']['thumbnail'] = $path.'/small/'.$filename;
                        $this->data['Resource']['resource_category_id'] = $this->data['DirID'];
                        
                        $this->Resource->create();
                        if ($this->Resource->save($this->data)) 
                        {
                            $this->flashSuccess(__('MsgPhotoSaved', true));
                        } 
                        else 
                        {
                            $this->flashError(__('MsgPhotoNotSaved', true));
                        }
                    }
                    else
                    {
                        $this->flashError(__('MsgInvalidImageType', true));
                    }
                    $this->redirect($this->referer());
                }
                else // Upload file
                {
                    //$defaultFolder = "img/resources";
                    $path = "img/resources".$this->ResourceCategory->getDirPath($this->data['DirID']);
                    $check = $this->Common->uploadfile($path,$this->data['Resource']['file']);                    
                    if($check)
                    {
                        $this->data['Resource']['name'] = $this->data['Resource']['file']['name'];
                        $this->data['Resource']['image'] = $path.'/'.$this->data['Resource']['file']['name'];
                        $this->data['Resource']['thumbnail'] = $path.'/'.$this->data['Resource']['file']['name'];
                        $this->data['Resource']['resource_category_id'] = $this->data['DirID'];
                        
                        $this->Resource->create();
                        if ($this->Resource->save($this->data)) 
                        {
                            $this->flashSuccess(__('MsgFileSaved', true));
                        } 
                        else 
                        {
                            $this->flashError(__('MsgFileNotSaved', true));
                        }
                    }
                    else
                    {
                        $this->flashError(__('MsgInvalidFileType', true));                        
                    }
                    $this->redirect($this->referer());
                }
            }
        }
    }
    
    /*function admin_uploadfile()
    {
        if (!empty($this->data)) 
        {               
            // Verify         
            if(empty($this->data['Resource']['file']['name']))
                $this->redirect($this->referer());            
            // -------                        
            $defaultFolder = "img/resources";            
            $path = $this->ResourceCategory->getDirPath($this->data['DirID']);
                        
            $thumbnailName = $this->Image->upload_image_and_thumbnail($this->data['Resource']['file'],null,100,$path,false);
            
            if(!empty($thumbnailName) || $thumbnailName == true)
            {
                $data = array
                (
                    'name' => $this->data['Resource']['file']['name'],
                    'thumbnail_name' => $thumbnailName,
                    'type' => $this->data['Resource']['file']['type'],
                    'size' => $this->data['Resource']['file']['size'],
                    'path' => $path,
                    'resource_category_id' => $this->data['DirID']
                );
                
                $this->Resource->create();
                if ($this->Resource->save($data)) 
                {
                    $this->redirect(array('action'=>'index',$this->data['DirID']));
                }
            }
            else
            {
                $this->redirect(array('action'=>'index',$this->data['DirID']));
            }
        }
    }*/
    
    function admin_fileprocess()
    {
        if(!empty($this->data))
        {            
            $ids = array_keys($this->data['Resource']);
            if(isset($this->params['form']['delete'])) // Delete Images
            {
                foreach($ids as $id)
                {
                    $resource = $this->Resource->find('first',array('conditions'=>array('Resource.id'=>$id)));
                    if($this->Resource->del($id))
                    {
                        $ext = substr($resource['Resource']['name'], strrpos($resource['Resource']['name'], '.') + 1);
                        $ext = strtolower($ext);
                        
                        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png')  // Delete Image 
                        {
                            unlink('img/'.$resource['Resource']['image']);
                            // Del thumbnail
                            if(!empty($resource['Resource']['thumbnail']))
                            {
                                unlink('img/'.$resource['Resource']['thumbnail']);
                            }
                        }
                        else // Delete File
                        {
                            unlink($resource['Resource']['image']);
                        }
                    }                                        
                }
            }
        }
        $this->redirect($this->referer());
    }
    
    function admin_delete_folder($id = null)
    {                
        $dirPath = "img/resources" . $this->ResourceCategory->getDirPath($id);
        $this->Common->delDir($dirPath);
        $this->ResourceCategory->del($id);
        $this->Resource->deleteAll(array('Resource.resource_category_id'=>$id));
        $this->redirect($this->referer());
    }
}
?>