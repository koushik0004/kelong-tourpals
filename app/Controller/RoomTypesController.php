<?php
App::uses('AppController', 'Controller');
/**
 * RoomTypes Controller
 *
 * @property RoomType $RoomType
 * @property PaginatorComponent $Paginator
 */
class RoomTypesController extends AppController {
	public $layout = 'admin-bootstrap-layout';
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
		$this->RoomType->recursive = 0;
		$this->set('roomTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RoomType->exists($id)) {
			throw new NotFoundException(__('Invalid room type'));
		}
		$options = array('conditions' => array('RoomType.' . $this->RoomType->primaryKey => $id));
		$this->set('roomType', $this->RoomType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RoomType->create();
			if ($this->RoomType->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success">The room type has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger">The room type could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		}
		$hotels = $this->RoomType->Hotel->find('list');
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
		if (!$this->RoomType->exists($id)) {
			throw new NotFoundException(__('Invalid room type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RoomType->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The room type has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The room type could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		} else {
			$options = array('conditions' => array('RoomType.' . $this->RoomType->primaryKey => $id));
			$this->request->data = $this->RoomType->find('first', $options);
		}
		$hotels = $this->RoomType->Hotel->find('list');
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
		$this->RoomType->id = $id;
		if (!$this->RoomType->exists()) {
			throw new NotFoundException(__('Invalid room type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RoomType->delete()) {
			$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The room type has been deleted.</div>'), 'flash_custom');
		} else {
			$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The room type could not be deleted. Please, try again.</div>'), 'flash_custom');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	/*** coding for bulk action starts ***/
	
	public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		//if(!$this->_checkSession()){
		if(!$this->Auth->loggedIn()){
			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">Acess Denied!</div>'), 'flash_custom');
			$this->redirect(array('action'=>'login'));
		}
		
		if(!$this->request->is('post')){
			die('Access denied!');
		}
		$process_action = $this->request->data['process_action'];
		$process_model = $this->request->data['process_model'];
		
		switch($process_action){
			case 'delete':
						if(isset($this->request->data['item_id']) && !empty($this->request->data['item_id'])){
							foreach($this->request->data['item_id'] as $item_id){
								$this->$process_model->id = $item_id;
								$this->$process_model->delete();
							}
							$this->Session->setFlash(__('<div class="alert alert-success" role="alert">Records deleted successfully!</div>'), 'flash_custom');
						}
						break;
			default:
					
		}
			
		$this->redirect($this->referer());
	}	
		
	/*** coding for bulk action ends ***/
}
