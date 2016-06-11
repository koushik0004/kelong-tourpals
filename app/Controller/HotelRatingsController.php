<?php
App::uses('AppController', 'Controller');
/**
 * HotelRatings Controller
 *
 * @property HotelRating $HotelRating
 * @property PaginatorComponent $Paginator
 */
class HotelRatingsController extends AppController {

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
		$conditions = array();
		$column = '';
		$search = '';
		$ratingStatus = array('active', 'blocked', '');
		if(isset($this->request['data']['grid_column']) && isset($this->request['data']['search_text'])){
			
			$column = trim($this->request['data']['grid_column']);
			$search = trim($this->request['data']['search_text']);
			
			if(!empty($column) && !empty($search)){
				//if(in_array($column, $bookingAsso))
					$conditions = array(
						$column.' LIKE' => '%'.$search.'%', 
					);
			}
			if(empty($search) && in_array($column, $ratingStatus)){
				$conditions = array(
					'HotelRating.isactive' => ($column=='active'||$column=='')?1:0, 
				);
			}
		}
		if(!isset($this->request['data']['grid_column'])){
			$conditions['HotelRating.isdeleted']='0';
			$conditions['HotelRating.isactive']='1';
		}
		$this->set('column',($column=='active'||$column=='')?'active':$column);
		$this->set('search',$search);
		$this->paginate = array(
			'limit' => 10,
			'conditions' => $conditions,
			'order' => array(
				'HotelRating.modified' => 'desc'
			),
		);
		$this->HotelRating->recursive = 0;
		$this->set('hotelRatings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotelRating->exists($id)) {
			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid hotel rating</div>'), 'flash_custom');
		}
		$options = array('conditions' => array('HotelRating.' . $this->HotelRating->primaryKey => $id));
		$this->set('hotelRating', $this->HotelRating->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HotelRating->create();
			if ($this->HotelRating->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The hotel rating has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel rating could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		}
		$hotels = $this->HotelRating->Hotel->find('list');
		$usersArr = $this->HotelRating->User->find('all', array(
									'condition'=>array(
										'User.isdeleted'=>'0',
									),
									'fields'=>array('User.id', 'User.username', 'User.first_name', 'User.last_name'),
								)
							);
		$users = array();
		foreach($usersArr as $cuser){
			$users[$cuser['User']['id']] = $cuser['User']['username'].ucwords(' ( '.$cuser['User']['last_name'].', '.$cuser['User']['first_name'].' )');
		}
		$this->set(compact('hotels', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HotelRating->exists($id)) {
			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid hotel rating</div>'), 'flash_custom');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HotelRating->save($this->request->data)) {
				$this->Session->setFlash(__('T<div class="alert alert-success" role="alert">The hotel rating has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel rating could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		} else {
			$options = array('conditions' => array('HotelRating.' . $this->HotelRating->primaryKey => $id));
			$this->request->data = $this->HotelRating->find('first', $options);
		}
		$hotels = $this->HotelRating->Hotel->find('list');
		$usersArr = $this->HotelRating->User->find('all', array(
									'condition'=>array(
										'User.isdeleted'=>'0',
									),
									'fields'=>array('User.id', 'User.username', 'User.first_name', 'User.last_name'),
								)
							);
		$users = array();
		foreach($usersArr as $cuser){
			$users[$cuser['User']['id']] = $cuser['User']['username'].ucwords(' ( '.$cuser['User']['last_name'].', '.$cuser['User']['first_name'].' )');
		}
		$this->set(compact('hotels', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HotelRating->id = $id;
		if (!$this->HotelRating->exists()) {
			throw new NotFoundException(__('Invalid hotel rating'));
		}
		
		$data = array(
			'isactive'=>'0',
			'isdeleted'=>'1',
		);
		$this->HotelRating->set($data);
		if ($this->HotelRating->save()) {
			$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The hotel rating has been deleted.</div>'), 'flash_custom');
		} else {
			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel rating could not be deleted. Please, try again.</div>'), 'flash_custom');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
	public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		if(!$this->request->is('post')){
			$this->Session->setFlash(__('<div class="alert alert-sucess" role="alert">The hotel rating has been deleted.</div>'), 'flash_custom');
			$this->redirect($this->referer());
		}
		$process_action = $this->request->data['process_action'];
		$process_model = $this->request->data['process_model'];
		
		switch($process_action){
			case 'delete':
						if(isset($this->request->data['item_id']) && !empty($this->request->data['item_id'])){
							foreach($this->request->data['item_id'] as $item_id){
								$this->$process_model->id = $item_id;
								$data = array(
									'isactive'=>'0',
									'isdeleted'=>'1',
								);
								$this->$process_model->set($data);
								$this->$process_model->save();
							}
							$this->Session->setFlash(__('<div class="alert alert-success" role="alert">Records deleted successfully!</div>'), 'flash_custom');
						}
						break;
			default:
					
		}
			
		$this->redirect($this->referer());
	}
	
}
