<?php
App::uses('AppController', 'Controller');
/**
 * Facilities Controller
 *
 * @property Facility $Facility
 * @property PaginatorComponent $Paginator
 */
class FacilitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $layout = 'admin-bootstrap-layout';
	
	
	public function beforeFilter(){
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
		$facilityStatus = array('isactive', 'isdeletd', '');
		if(isset($this->request['data']['grid_column']) && isset($this->request['data']['search_text'])){
			$column = trim($this->request['data']['grid_column']);
			$search = trim($this->request['data']['search_text']);
			if(!empty($column) && !empty($search)){
				$conditions = array(
					'Facility.'.$column.' LIKE' => '%'.$search.'%', 
				);
			}
			if(empty($search) && in_array($column, $facilityStatus)){
				$conditions = array(
					'Facility.isactive' => ($column=='isactive'||$column=='')?1:0,
					'Facility.isdeletd' => ($column=='isdeletd')?1:0,
				);
			}
		}
		if(!isset($this->request['data']['grid_column'])){
			$conditions['Facility.isdeletd']='0';
			$conditions['Facility.isactive']='1';
		}
		$this->set('column',($column=='isactive'||$column=='')?'':$column);
		$this->set('search',$search);
		
		$this->paginate = array(
			'limit' => 10,
			'order' => array(
				'Facility.updated' => 'desc'
			),
			'conditions' => $conditions,
		);

		$this->Facility->recursive = 0;
		$this->set('facilities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Facility->exists($id)) {
			throw new NotFoundException(__('Invalid facility'));
		}
		$options = array('conditions' => array('Facility.' . $this->Facility->primaryKey => $id));
		$this->set('facility', $this->Facility->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if ($this->Facility->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The facility has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The facility could not be saved. Please, try again.</div>'), 'flash_custom');
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
		if (!$this->Facility->exists($id)) {
			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid facility</div>'), 'flash_custom');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Facility->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The facility has been saved.</div>'), 'flash_custom');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The facility could not be saved. Please, try again.</div>'), 'flash_custom');
			}
		} else {
			$options = array('conditions' => array('Facility.' . $this->Facility->primaryKey => $id));
			$this->request->data = $this->Facility->find('first', $options);
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
		$this->Facility->id = $id;
		if (!$this->Facility->exists()) {
			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid facility</div>'), 'flash_custom');
		}
		$this->Facility->set('isactive',0);
		$this->Facility->set('isdeletd',1);
		if ($this->Facility->save()) {
			$this->Session->setFlash(__('<div class="alert alert-success" role="alert">The facility has been deleted.</div>'), 'flash_custom');
		} else {
			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The facility could not be deleted. Please, try again.</div>'), 'flash_custom');
		}
		return $this->redirect(array('action' => 'index'));
	}


/*** coding for bulk action starts ***/
	
	public function bulk_actions(){
		$this->autoRender = false;
		$this->layout = false;
		
		if(!$this->_checkSession()){
			$this->Session->setFlash(__("<div class=\"alert alert-danger\" role=\"alert\">Acess Denied!</div>"), 'flash_custom');
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
							$this->Session->setFlash(__('<div class="alert alert-success" role="alert">Records deleted successfully!</div>'), 'flash_custom');
						}
						break;
			default:
					
		}
			
		$this->redirect($this->referer());
	}	
		
	/*** coding for bulk action ends ***/

}
