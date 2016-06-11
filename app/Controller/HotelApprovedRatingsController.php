<?php
App::uses('AppController', 'Controller');
/**
 * HotelApprovedRatings Controller
 *
 * @property HotelApprovedRating $HotelApprovedRating
 * @property PaginatorComponent $Paginator
 */
class HotelApprovedRatingsController extends AppController {

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
		$this->HotelApprovedRating->recursive = 0;
		$this->set('hotelApprovedRatings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotelApprovedRating->exists($id)) {
			throw new NotFoundException(__('Invalid hotel approved rating'));
		}
		$options = array('conditions' => array('HotelApprovedRating.' . $this->HotelApprovedRating->primaryKey => $id));
		$this->set('hotelApprovedRating', $this->HotelApprovedRating->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HotelApprovedRating->create();
			if ($this->HotelApprovedRating->save($this->request->data)) {
				$this->Session->setFlash(__('The hotel approved rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotel approved rating could not be saved. Please, try again.'));
			}
		}
		$hotels = $this->HotelApprovedRating->Hotel->find('list');
		$this->set(compact('hotels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HotelApprovedRating->exists($id)) {
			throw new NotFoundException(__('Invalid hotel approved rating'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HotelApprovedRating->save($this->request->data)) {
				$this->Session->setFlash(__('The hotel approved rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotel approved rating could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HotelApprovedRating.' . $this->HotelApprovedRating->primaryKey => $id));
			$this->request->data = $this->HotelApprovedRating->find('first', $options);
		}
		$hotels = $this->HotelApprovedRating->Hotel->find('list');
		$this->set(compact('hotels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HotelApprovedRating->id = $id;
		if (!$this->HotelApprovedRating->exists()) {
			throw new NotFoundException(__('Invalid hotel approved rating'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelApprovedRating->delete()) {
			$this->Session->setFlash(__('The hotel approved rating has been deleted.'));
		} else {
			$this->Session->setFlash(__('The hotel approved rating could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
