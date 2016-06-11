<?php
App::uses('AppController', 'Controller');
/**
 * RoomDetails Controller
 *
 * @property RoomDetail $RoomDetail
 * @property PaginatorComponent $Paginator
 */
class RoomDetailsController extends AppController {

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
		$this->RoomDetail->recursive = 0;
		$this->set('roomDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RoomDetail->exists($id)) {
			throw new NotFoundException(__('Invalid room detail'));
		}
		$options = array('conditions' => array('RoomDetail.' . $this->RoomDetail->primaryKey => $id));
		$this->set('roomDetail', $this->RoomDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RoomDetail->create();
			if ($this->RoomDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The room detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room detail could not be saved. Please, try again.'));
			}
		}
		$roomTypes = $this->RoomDetail->RoomType->find('list');
		$bookings = $this->RoomDetail->Booking->find('list');
		$this->set(compact('roomTypes', 'bookings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RoomDetail->exists($id)) {
			throw new NotFoundException(__('Invalid room detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RoomDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The room detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RoomDetail.' . $this->RoomDetail->primaryKey => $id));
			$this->request->data = $this->RoomDetail->find('first', $options);
		}
		$roomTypes = $this->RoomDetail->RoomType->find('list');
		$bookings = $this->RoomDetail->Booking->find('list');
		$this->set(compact('roomTypes', 'bookings'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RoomDetail->id = $id;
		if (!$this->RoomDetail->exists()) {
			throw new NotFoundException(__('Invalid room detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RoomDetail->delete()) {
			$this->Session->setFlash(__('The room detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The room detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
