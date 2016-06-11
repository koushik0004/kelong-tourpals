<?php
App::uses('AppController', 'Controller');
/**
 * BookingsRoomDetails Controller
 *
 * @property BookingsRoomDetail $BookingsRoomDetail
 * @property PaginatorComponent $Paginator
 */
class BookingsRoomDetailsController extends AppController {

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
		$this->BookingsRoomDetail->recursive = 0;
		$this->set('bookingsRoomDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BookingsRoomDetail->exists($id)) {
			throw new NotFoundException(__('Invalid bookings room detail'));
		}
		$options = array('conditions' => array('BookingsRoomDetail.' . $this->BookingsRoomDetail->primaryKey => $id));
		$this->set('bookingsRoomDetail', $this->BookingsRoomDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BookingsRoomDetail->create();
			if ($this->BookingsRoomDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The bookings room detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookings room detail could not be saved. Please, try again.'));
			}
		}
		$bookings = $this->BookingsRoomDetail->Booking->find('list');
		$roomDetails = $this->BookingsRoomDetail->RoomDetail->find('list');
		$this->set(compact('bookings', 'roomDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BookingsRoomDetail->exists($id)) {
			throw new NotFoundException(__('Invalid bookings room detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BookingsRoomDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The bookings room detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookings room detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BookingsRoomDetail.' . $this->BookingsRoomDetail->primaryKey => $id));
			$this->request->data = $this->BookingsRoomDetail->find('first', $options);
		}
		$bookings = $this->BookingsRoomDetail->Booking->find('list');
		$roomDetails = $this->BookingsRoomDetail->RoomDetail->find('list');
		$this->set(compact('bookings', 'roomDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BookingsRoomDetail->id = $id;
		if (!$this->BookingsRoomDetail->exists()) {
			throw new NotFoundException(__('Invalid bookings room detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BookingsRoomDetail->delete()) {
			$this->Session->setFlash(__('The bookings room detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bookings room detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
