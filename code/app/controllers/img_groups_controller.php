<?php
class ImgGroupsController extends AppController {

	var $name = 'ImgGroups';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->ImgGroup->recursive = 0;
		$this->set('imgGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ImgGroup', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('imgGroup', $this->ImgGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ImgGroup->create();
			if ($this->ImgGroup->save($this->data)) {
				$this->Session->setFlash(__('The ImgGroup has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ImgGroup could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ImgGroup', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ImgGroup->save($this->data)) {
				$this->Session->setFlash(__('The ImgGroup has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ImgGroup could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ImgGroup->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ImgGroup', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->ImgGroup->del($id)) {
			$this->Session->setFlash(__('ImgGroup deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The ImgGroup could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}


	function admin_index() {
		$this->ImgGroup->recursive = 0;
		$this->set('imgGroups', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ImgGroup', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('imgGroup', $this->ImgGroup->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ImgGroup->create();
			if ($this->ImgGroup->save($this->data)) {
				$this->Session->setFlash(__('The ImgGroup has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ImgGroup could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ImgGroup', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ImgGroup->save($this->data)) {
				$this->Session->setFlash(__('The ImgGroup has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ImgGroup could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ImgGroup->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ImgGroup', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->ImgGroup->del($id)) {
			$this->Session->setFlash(__('ImgGroup deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The ImgGroup could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>