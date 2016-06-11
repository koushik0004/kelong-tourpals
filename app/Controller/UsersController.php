<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
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
        $this->Auth->allow('add', 'logout', 'clientlogin', 'clientregistration');
		//$this->Auth->allow('*');
    }

	public function login() {
		$this->layout= 'admin_before_login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">Invalid username or password, try again</div>'), 'flash_custom');
		}
	}

    public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout= 'admin-bootstrap-layout';
		$conditions = array();
		$column = '';
		$search = '';
		$userStatus = array('active', 'blocked', '');
		if(isset($this->request['data']['grid_column']) && isset($this->request['data']['search_text'])){
			
			$column = trim($this->request['data']['grid_column']);
			$search = trim($this->request['data']['search_text']);
			if(!empty($column) && !empty($search)){
				$conditions = array(
					'User.'.$column.' LIKE' => '%'.$search.'%', 
				);
			}
			if(empty($search) && in_array($column, $userStatus)){
				$conditions = array(
					'User.isactive' => ($column=='active'||$column=='')?1:0, 
				);
			}
		}
		if(!isset($this->request['data']['grid_column'])){
			$conditions['User.isdeleted']='0';
			$conditions['User.isactive']='1';
		}
		
		$conditions['User.role !=']='CLIENT';
		$this->set('column',($column=='active'||$column=='')?'active':$column);
		$this->set('search',$search);
		$this->paginate = array(
			'limit' => 10,
			'conditions' => $conditions,
			'order' => array(
				'User.updated' => 'desc'
			),
		);

		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		$this->User->validate['cpassword'] = array(
			'passwordChecker' => array(
				'rule' => array('passwordChecker'),
				'message' => 'Password didn\'t matched with Confirm Password',
			)
		);

		if ($this->request->is('post')) {
			$this->User->create();
			//$usernameArr = explode('@', $this->request->data['User']['username']);
			//$this->request->data['User']['username'] = $usernameArr[0];
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'default', array('class'=>'alert alert-success alert-dismissible', 'id'=>false, 'role'=>'alert'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The user could not be saved. Please, try again.</div>'), 'flash_custom');
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-danger', 'id'=>'save-error', 'role'=>'alert'));
			}
		}

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		/*
		$this->User->validate['npassword'] = array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter your password here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength',6),
				'message' => 'Password must have at least 6 characters',
			),
		);

		$this->User->validate['cpassword'] = array(
			'passwordUpdater' => array(
				'rule' => array('passwordUpdater'),
				'message' => 'New Password didn\'t matched with Old Password',
			)
		);
		*/

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The user has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The user could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->User->set('isactive',0);
		$this->User->set('isdeleted',1);
		if ($this->User->save()) {
			$this->Session->setFlash(__('The user has been deleted.'), 'default', array('class'=>'alert alert-success', 'id'=>false, 'role'=>'alert'));
		} else {
			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The user could not be deleted. Please, try again.</div>'), 'flash_custom');
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*** coding for bulk action starts ***/
	
	public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		//if(!$this->_checkSession()){
		if(!$this->Auth->loggedIn()){
			$this->Session->setFlash('<div class="alert alert-danger" role="alert">Acess Denied!</div>');
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
							$this->Session->setFlash(__('<div class="alert alert-success" role="alert">Records deleted successfully!</div>'));
						}
						break;
			default:
					
		}
			
		$this->redirect($this->referer());
	}	
		
	/*** coding for bulk action ends ***/
	
	/**
	* for loading client form.
	*/
	public function clientlogin(){
		$this->layout = FALSE;
	}
	
	public function clientregistration(){
		$this->layout = FALSE;
	}
}
