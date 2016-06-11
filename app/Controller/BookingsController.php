<?php
App::uses('AppController', 'Controller');
/**
 * Bookings Controller
 *
 * @property Booking $Booking
 * @property PaginatorComponent $Paginator
 */
class BookingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helpers = array('Number');
	
	public $layout = 'admin-bootstrap-layout';
	public function beforeFilter() {
		parent::beforeFilter();
		$this->pageTitle = 'Tourpals';
		$this->set('title_for_layout', 'Tourpals::Booking Section');
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
		$bookingStatus = array('active', 'blocked', '');
		$bookingCalc = array('service_charges', 'sevice_tax');
		$bookingAsso = array('place_id', 'hotel_id');
		if(isset($this->request['data']['grid_column']) && isset($this->request['data']['search_text'])){
			
			$column = trim($this->request['data']['grid_column']);
			$search = trim($this->request['data']['search_text']);
			
			if(!empty($column) && !empty($search)){
				if(in_array($column, $bookingAsso))
					$conditions = array(
						$column.' LIKE' => '%'.$search.'%', 
					);
			}
			if(empty($search) && in_array($column, $bookingStatus)){
				$conditions = array(
					'Booking.isactive' => ($column=='active'||$column=='')?1:0, 
				);
			}
		}
		if(!isset($this->request['data']['grid_column'])){
			$conditions['Booking.isdeleted']='0';
			$conditions['Booking.isactive']='1';
		}
		$this->set('column',($column=='active'||$column=='')?'active':$column);
		$this->set('search',$search);
		$this->paginate = array(
			'limit' => 10,
			'conditions' => $conditions,
			'order' => array(
				'Booking.modified' => 'desc'
			),
		);
		$this->Booking->recursive = 0;
		$this->set('bookings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Booking->exists($id)) {
			throw new NotFoundException(__('<div class="alert alert-success" role="alert">Invalid booking</div>'), 'flash_custom');
		}
		$options = array('conditions' => array('Booking.' . $this->Booking->primaryKey => $id));
		$this->set('booking', $this->Booking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Booking->create();
			//changing date format
			$this->request->data['Booking']['check_in'] = parent::__changeDateFormat($this->request->data['Booking']['check_in']);
			$this->request->data['Booking']['checkout'] = parent::__changeDateFormat($this->request->data['Booking']['checkout']);
			if ($this->Booking->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The booking has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The booking could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		}
		$places = $this->Booking->Place->find('list');
		$hotels = $this->Booking->Hotel->find('list');
		$users = $this->Booking->User->find('list');
		$roomDetails = $this->Booking->RoomDetail->find('list');
		$usersArr = $this->Booking->User->find('all', array(
									'condition'=>array(
										'User.isdeleted'=>'0',
										'User.role'=>array('NORMAL', 'SUBADMIN', 'CLIENT'),
									),
									'fields'=>array('User.id', 'User.username', 'User.first_name', 'User.last_name'),
								)
							);
		$users = array();
		foreach($usersArr as $cuser){
			$users[$cuser['User']['id']] = $cuser['User']['username'].ucwords(' ( '.$cuser['User']['last_name'].', '.$cuser['User']['first_name'].' )');
		}
		$this->set(compact('places', 'hotels', 'users', 'roomDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Booking->exists($id)) {
			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid booking</div>'), 'flash_custom');
		}
		if ($this->request->is(array('post', 'put'))) {
			//changing date format
			$this->request->data['Booking']['check_in'] = parent::__changeDateFormat($this->request->data['Booking']['check_in']);
			$this->request->data['Booking']['checkout'] = parent::__changeDateFormat($this->request->data['Booking']['checkout']);
			if ($this->Booking->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The booking has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The booking could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		} else {
			$options = array('conditions' => array('Booking.' . $this->Booking->primaryKey => $id));
			$this->request->data = $this->Booking->find('first', $options);
		}
		$places = $this->Booking->Place->find('list');
		$hotels = $this->Booking->Hotel->find('list');
		$roomDetails = $this->Booking->RoomDetail->find('list');
		$usersArr = $this->Booking->User->find('all', array(
									'condition'=>array(
										'User.isdeleted'=>'0',
										'User.role'=>array('NORMAL', 'SUBADMIN', 'CLIENT'),
									),
									'fields'=>array('User.id', 'User.username', 'User.first_name', 'User.last_name'),
								)
							);
		$users = array();
		foreach($usersArr as $cuser){
			$users[$cuser['User']['id']] = $cuser['User']['username'].ucwords(' ( '.$cuser['User']['last_name'].', '.$cuser['User']['first_name'].' )');
		}
		$this->set(compact('places', 'hotels', 'users', 'roomDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Booking->id = $id;
		if (!$this->Booking->exists()) {
			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid booking</div>'), 'flash_custom');
		}
		//$this->request->onlyAllow('post', 'delete');
		$data = array(
			'isactive'=>'0',
			'isdeleted'=>'1',
		);
		$this->Booking->set($data);
		if ($this->Booking->save()) {
			$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The booking has been deleted.</div>'), 'flash_custom');
		} else {
			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The booking could not be deleted. Please, try again.</div>'), 'flash_custom');
		}
		$this->redirect(array('action' => 'index'));
	}
	
	public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		if(!$this->request->is('post')){
			$this->Session->setFlash(__('<div class="alert alert-sucess" role="alert">The booking has been deleted.</div>'), 'flash_custom');
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
