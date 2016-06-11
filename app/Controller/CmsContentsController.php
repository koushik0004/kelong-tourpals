<?php
App::uses('AppController', 'Controller');
/**
 * CmsContents Controller
 *
 * @property CmsContent $CmsContent
 * @property PaginatorComponent $Paginator
 */
class CmsContentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $layout = 'admin-bootstrap-layout';
	public function beforeFilter() {
		parent::beforeFilter();
		$this->pageTitle = 'Tourpals';
		$this->set('title_for_layout', 'Tourpals');
		//$this->Auth->allow('*');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CmsContent->recursive = 0;
		$this->set('CmsContents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CmsContent->exists($id)) {
			throw new NotFoundException(__('Invalid room detail'));
		}
		$options = array('conditions' => array('CmsContent.' . $this->CmsContent->primaryKey => $id));
		$this->set('CmsContent', $this->CmsContent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->CmsContent->create();
			if ($this->CmsContent->save($this->request->data)) {
				$this->Session->setFlash(__('The cms detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cms detail could not be saved. Please, try again.'));
			}
		}
		//$roomTypes = $this->CmsContent->RoomType->find('list');
		//$bookings = $this->CmsContent->Booking->find('list');
		//$this->set(compact('roomTypes', 'bookings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CmsContent->exists($id)) {
			throw new NotFoundException(__('Invalid cms detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CmsContent->save($this->request->data)) {
				$this->Session->setFlash(__('The cms detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cms detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CmsContent.' . $this->CmsContent->primaryKey => $id));
			$this->request->data = $this->CmsContent->find('first', $options);
		}
		$cmsContent = $this->CmsContent->find('list');
		
		$this->set(compact('cmsContent'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CmsContent->id = $id;
		if (!$this->CmsContent->exists()) {
			throw new NotFoundException(__('Invalid CMS detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CmsContent->delete()) {
			$this->Session->setFlash(__('The CMS detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The CMS detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
