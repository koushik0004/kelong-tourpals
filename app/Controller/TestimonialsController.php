<?php
App::uses('AppController', 'Controller');
/**
 * Testimonials Controller
 *
 * @property Testimonial $Testimonial
 * @property PaginatorComponent $Paginator
 */
class TestimonialsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
*initializing $layout
*/

	public $layout = 'admin-bootstrap-layout';
/**
 * beforFilter method
 *
 * @return void
 */    
	public function beforeFilter() {
		parent::beforeFilter();
		$this->pageTitle = 'Tourpals';
		$this->set('title_for_layout', 'Tourpals::Testimonials');
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
		if(isset($this->request['data']['grid_column']) && isset($this->request['data']['search_text'])){
			
			$column = trim($this->request['data']['grid_column']);
			$search = trim($this->request['data']['search_text']);
			
			
			if(empty($search) && in_array($column, $bookingStatus)){
				$conditions = array(
					'Testimonial.isactive' => ($column=='active'||$column=='')?1:0, 
				);
			}
		}
		if(!isset($this->request['data']['grid_column'])){
			$conditions['Testimonial.isdeleted']='0';
			$conditions['Testimonial.isactive']='1';
		}
		$this->set('column',($column=='active'||$column=='')?'active':$column);
		$this->set('search',$search);
		$this->paginate = array(
			'limit' => 10,
			'conditions' => $conditions,
			'order' => array(
				'Testimonial.modified' => 'desc'
			),
		);
        
		$this->Testimonial->recursive = 0;
		$this->set('testimonials', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
		$this->set('testimonial', $this->Testimonial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Testimonial->create();
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
			}
		}
		$usersArr = $this->Testimonial->User->find('all', array(
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
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
			$this->request->data = $this->Testimonial->find('first', $options);
		}
		$usersArr = $this->Testimonial->User->find('all', array(
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
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Testimonial->id = $id;
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
        
		if ($this->Testimonial->delete()) {
			$this->Session->setFlash(__('The testimonial has been deleted.'));
		} else {
			$this->Session->setFlash(__('The testimonial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    
/**
 * bulk_action method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */ 
 
    
   public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		if(!$this->request->is('post')){
			$this->Session->setFlash(__('<div class="alert alert-sucess" role="alert">The testimonial has been deleted.</div>'), 'flash_custom');
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
	}}
