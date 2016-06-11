<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class StatesController extends AppController {

	public $layout = 'admin-bootstrap-layout';
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter(){
		parent::beforeFilter();
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
		if(isset($this->request['data']['grid_column']) && isset($this->request['data']['search_text'])){
			$column = trim($this->request['data']['grid_column']);
			$search = trim($this->request['data']['search_text']);
			if(!empty($column) && !empty($search)){
				$conditions = array(
					'State.'.$column.' LIKE' => '%'.$search.'%', 
				);
			}
		}
		$this->set('column',$column);
		$this->set('search',$search);
		$this->paginate = array(
			'limit' => 10,
			'conditions' => $conditions,
		);

		$this->State->recursive = 0;
		$this->set('states', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
		$this->set('state', $this->State->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->State->create();
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
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
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
			$this->request->data = $this->State->find('first', $options);
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
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid state'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->State->delete()) {
			$this->Session->setFlash(__('The state has been deleted.'));
		} else {
			$this->Session->setFlash(__('The state could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	/*** coding for bulk action starts ***/

	public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		if(!$this->_checkSession()){
			$this->Session->setFlash("Acess Denied!");
			$this->redirect(array('action'=>'login'));
		}
		
		if(!$this->request->is('post')){
			die("Access denied!");
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
							$this->Session->setFlash(__('Records deleted successfully!'));
						}
						break;
			default:
					
		}
			
		$this->redirect($this->referer());
	}	
		
	/*** coding for bulk action ends ***/
}
