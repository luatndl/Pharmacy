<?php
class SysFunctionsController extends AppController 
{
	var $name = 'SysFunctions';
	var $helpers = array('Html', 'Form');
    var $uses = array('SysFunction','SysController','SysAction');
    
    function readTextFile($filename)
    {
        $arrContent = array();
        $file_handle = fopen($filename, "r");
        while (!feof($file_handle)) 
        {
           $line = fgets($file_handle);           
           array_push($arrContent,$line);
        }
        fclose($file_handle);
        return $arrContent;
    }
    
    function import()
    {
        if(!empty($this->data))
        {
            if(!empty($this->data['SysFunction']['upload_file']['name']))
            {
                if($this->importAction($this->data['FunctionID'],$this->data['SysFunction']['upload_file']['tmp_name']))
                {
                    $this->redirect($this->referer());
                }
                else
                {
                    debug('Not in the well form');
                }
            }
            else
            {
                $this->redirect($this->referer());
            }
        }
    }
    
    function exportAction($functionID)
    {
        $controllers = $this->SysController->find('all',array('conditions'=>array('SysController.sys_function_id'=>$functionID)));
        if(count($controllers) > 0)
        {
            $filename = $this->SysFunction->field('name',array('SysFunction.id'=>$functionID));
            //$filename = 'temp.txt';
            $filename = $filename .'.txt';
            $filePath = 'files/download/'.$filename;
            $fh = fopen($filePath, 'w') or die("can't open file");
            foreach($controllers as $item)
            {
                $conName = $item['SysController']['name'];
                $conID = $item['SysController']['id'];
                
                $actions = $this->SysAction->find('all',array('conditions'=>array('SysAction.sys_controller_id'=>$conID)));
                $strAction = "";
                if(count($actions) > 0)
                {                    
                    foreach($actions as $act)
                    {
                        $actName = $act['SysAction']['name'];
                        $strAction .= $actName . ',';                        
                    }
                    $strAction = substr($strAction,0,-1);
                }                
                $line = $conName.':'.$strAction;
                fwrite($fh, $line."\r\n");
            }
            fclose($fh);
            return $filename;
        }
        return false;        
    }
    
    function export_file()
    {
        if(!empty($this->data))
        {
            $this->layout = null;
            $fname = $this->exportAction($this->data['FunctionID']);
            $filePath = 'files/download/'. $fname;
            if(!empty($fname))
            {
                header("Content-type: image/jpeg");   
                header('Content-Disposition: attachment; filename="'.$fname.'"');
                readfile($filePath);
            }
            else
            {
                debug('Cannot download');
            }
        }
    }
    
    function importAction($functionID,$filename)
    {
        $arrTemp = $this->readTextFile($filename);
        if(count($arrTemp) > 0)
        {
            foreach($arrTemp as $item)
            {                    
                $item = str_replace(' ','',$item);
                $item = str_replace("\r\n",'',$item);
                $arr = explode(':',$item);
                if(count($arr) == 2)
                {
                    $controller = $arr[0];
                    $actions = $arr[1];
                    
                    $this->SysController->create();
                    if($this->SysController->save(array('name'=>$controller,'sys_function_id'=>$functionID)))
                    {                        
                        $conID = $this->SysController->field('id',array("id = (Select max(id) From sys_controllers)"));
                        $arrAction = explode(',',$actions);
                        if(count($arrAction) > 0)
                        {
                            foreach($arrAction as $action)
                            {
                                $this->SysAction->create();
                                $this->SysAction->save(array('name'=>$action,'sys_controller_id'=>$conID));
                            }
                        }
                    }
                }
            }
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
	function index($isSystem = false) 
    {
		$this->SysFunction->recursive = 0;
        $parent = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.parent_id'=>null,'SysFunction.is_system'=>$isSystem),'order'=>array('SysFunction.displayorder')));
        
        $sysFunctions = array();
        foreach($parent as $item)
        {            
            array_push($sysFunctions,$item);
            $pid = $item['SysFunction']['id'];
            $child = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.parent_id'=>$pid),'order'=>array('SysFunction.displayorder')));
            if(count($child) > 0)
            {
                foreach($child as $sub)
                {
                    array_push($sysFunctions,$sub);
                }                
            }            
        }
        
        $parentName = $this->SysFunction->find('list',array('conditions'=>array('SysFunction.parent_id'=>null)));        
        $this->set(compact('sysFunctions','parentName'));
	}

	function manage($id = null,$controllerID = null) 
    {
		if (!$id) 
        {
			$this->Session->setFlash(__('Invalid SysFunction.', true));
			$this->redirect(array('action'=>'index'));
		}
        
        if($controllerID != null)
        {
            $sysAction = $this->SysAction->find('all',array('conditions'=>array('SysAction.sys_controller_id'=>$controllerID),'order'=>array('SysAction.name')));
            $controllerName = $this->SysController->field('name',array('SysController.id'=>$controllerID));
            $this->set('controllerName',$controllerName);            
                
            $this->set('sysAction',$sysAction);            
        }                
        $sysFunction = $this->SysFunction->find('first',array('conditions'=>array('SysFunction.id'=>$id),'recursive'=>2));        
		$this->set('sysFunction', $sysFunction);
	}

	function add() 
    {
		if (!empty($this->data)) 
        {
			$this->SysFunction->create();
			if ($this->SysFunction->save($this->data)) 
            {
				$this->Session->setFlash(__('The SysFunction has been saved', true));
                if($this->data['SysFunction']['is_system'])
                    $this->redirect(array('action'=>'index',$this->data['SysFunction']['is_system']));
                else
                    $this->redirect(array('action'=>'index'));
			} 
            else 
            {
				$this->Session->setFlash(__('The SysFunction could not be saved. Please, try again.', true));
			}
		}
        
        $parent = $this->SysFunction->find('list',array('conditions'=>array('SysFunction.parent_id'=>null),'order'=>array('SysFunction.displayorder')));        
        $this->set('parent',$parent);
	}

	function edit($id = null) 
    {
		if (!$id && empty($this->data)) 
        {
			$this->Session->setFlash(__('Invalid SysFunction', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) 
        {
			if ($this->SysFunction->save($this->data)) {
				$this->Session->setFlash(__('The SysFunction has been saved', true));
                
                if($this->data['SysFunction']['is_system'])
				    $this->redirect(array('action'=>'index',$this->data['SysFunction']['is_system']));
                else
                    $this->redirect(array('action'=>'index'));
			} 
            else 
            {
				$this->Session->setFlash(__('The SysFunction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) 
        {
			$this->data = $this->SysFunction->read(null, $id);
		}
        
        $parent = $this->SysFunction->find('list',array('conditions'=>array('SysFunction.parent_id'=>null),'order'=>array('SysFunction.displayorder')));        
        $this->set('parent',$parent);
	}

	function delete($id = null) 
    {
		if (!$id) 
        {
			$this->Session->setFlash(__('Invalid id for SysFunction', true));
			$this->redirect(array('action'=>'index'));
		}
        
		if ($this->SysFunction->del($id))
        {
            $this->SysFunction->delChild($id);
            // Delete also controller and action in Function
            $controllerIDs = $this->SysController->getIDsByFunction($id);
            $this->SysAction->deleteAll(array('SysAction.sys_controller_id'=>$controllerIDs)); // Delete actions
            $this->SysController->deleteAll(array('SysController.id'=>$controllerIDs)); // Delete controllers            
                        
			$this->Session->setFlash(__('SysFunction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>