<?php
class AdvertisementsController extends AppController 
{
	var $name = 'Advertisements';
	var $helpers = array('Html', 'Form','Adv');
    
    function beforeFilter()
    {        
        parent::beforeFilter();
        //$this->Advertisement->updateStatus();
        
        //$advData = $this->Advertisement->getAdv();
        //$this->set('advData',$advData);
    }

	function admin_index($type = null)
    {
        if(!empty($this->data))
        {
            if($this->data['Type'] != -1)
                $this->redirect(array('action'=>'index',$this->data['Type']));
            else
                $this->redirect(array('action'=>'index'));
        }
		
        if($type == null)
        {
            //$this->paginate = array('Advertisement' => array('limit' => 20,'order'=>array('Advertisement.pos_type','Advertisement.status','expired_date'=>'desc')));
            $advertisements = $this->paginate('Advertisement');
        }            
        else
        {
            $advertisements = $this->paginate('Advertisement',array('Advertisement.pos_type'=>$type));
        }
        
        $type = $this->Advertisement->getAdvType();
        $status = $this->Advertisement->getAdvStatus();
        $this->set(compact('type','advertisements','status'));
	}
    
    function admin_change_status($id,$status)
    {
        $this->Advertisement->change_status($id,$status);
        $this->redirect($this->referer());
    }

	function admin_view($id = null) 
    {
		if (!$id) 
        {
			$this->Session->setFlash(__('Invalid Advertisement', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('advertisement', $this->Advertisement->read(null, $id));
        $type = $this->Advertisement->getAdvType();
        $this->set(compact('type'));
	}

	function admin_add() 
    {
		if (!empty($this->data)) 
        {
            // Big and small
            $small = $this->data['Advertisement']['image'];
            $small = str_replace('//','/',$small);
            $big = str_replace('/small/','/big/',$small);
            $this->data['Advertisement']['image'] = $big;
            $this->data['Advertisement']['thumbnail'] = $small;
            // ------------------------------------------------
            
			$this->Advertisement->create();
			if ($this->Advertisement->save($this->data)) 
            {
				$this->flashSuccess(__('MsgAdvertisementSaved', true));
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->flashWarning(__('MsgAdvertisementNotSaved', true));
			}
		}
        
        $type = $this->Advertisement->getAdvType();
        $status = $this->Advertisement->getAdvStatus();
        $this->set(compact('type','status'));
	}

	function admin_edit($id = null) 
    {
		if (!$id && empty($this->data)) 
        {
			$this->flashWarning(__('MsgInvalidAdvertisement', true));
			$this->redirect(array('action' => 'index'));
		}
        
		if (!empty($this->data)) 
        {
            // Big and small
            $small = $this->data['Advertisement']['image'];
            $small = str_replace('//','/',$small);
            $big = str_replace('/small/','/big/',$small);
            $this->data['Advertisement']['image'] = $big;
            $this->data['Advertisement']['thumbnail'] = $small;
            // ------------------------------------------------
            
			if ($this->Advertisement->save($this->data)) 
            {
				$this->flashSuccess(__('MsgAdvertisementSaved', true));
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->flashWarning(__('MsgAdvertisementNotSaved', true));
			}
		}
        
		if (empty($this->data)) 
        {
			$this->data = $this->Advertisement->read(null, $id);
		}
        
        $type = $this->Advertisement->getAdvType();
        $this->set(compact('type'));
	}

	function admin_delete($id = null) 
    {
		if (!$id) 
        {
			$this->flashWarning(__('MsgInvalidAdvertisement', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Advertisement->del($id)) 
        {
			$this->flashSuccess(__('MsgAdvertisementDeleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->flashWarning(__('MsgAdvertisementNotDeleted', true));
        $this->redirect($this->referer());
	}
    
    function redirectUrl($id)
    {
        $url = $this->Advertisement->increaseCount($id);        
        $this->redirect($url);
    }
}
?>