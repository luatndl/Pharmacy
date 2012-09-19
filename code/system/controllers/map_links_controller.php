<?php
class MapLinksController extends AppController {

	var $name = 'MapLinks';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->MapLink->recursive = 0;
		$this->set('mapLinks', $this->paginate());
	}

	function view($id = null) 
    {
		if (!$id) {
			$this->Session->setFlash(__('Invalid MapLink', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mapLink', $this->MapLink->read(null, $id));
	}

	function add() 
    {
		if (!empty($this->data)) 
        {
			$this->MapLink->create();
			if ($this->MapLink->save($this->data)) 
            {
				$this->Session->setFlash(__('The MapLink has been saved', true));
			} 
            else 
            {
				$this->Session->setFlash(__('The MapLink could not be saved. Please, try again.', true));
			}
            $this->redirect($this->referer());
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) 
        {
			$this->Session->setFlash(__('Invalid MapLink', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) 
        {
			if ($this->MapLink->save($this->data)) 
            {
				$this->Session->setFlash(__('The MapLink has been saved', true));
				$this->redirect(array('controller'=>'maps','action' => 'edit',$this->data['RedirectUrl']));
			} else {
				$this->Session->setFlash(__('The MapLink could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MapLink->read(null, $id);
		}
	}

	function delete($id = null) 
    {
		if (!$id) 
        {
			$this->Session->setFlash(__('Invalid id for MapLink', true));
		}
		if ($this->MapLink->del($id)) 
        {
			$this->Session->setFlash(__('MapLink deleted', true));			
		}
		$this->Session->setFlash(__('The MapLink could not be deleted. Please, try again.', true));
		$this->redirect($this->referer());
	}

}
?>