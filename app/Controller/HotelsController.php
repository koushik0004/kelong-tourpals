<?php

App::uses('AppController', 'Controller');

/**

 * Hotels Controller

 *

 * @property Hotel $Hotel

 * @property PaginatorComponent $Paginator

 */

class HotelsController extends AppController {


	public $layout = 'admin-bootstrap-layout';
	//public $layout = 'admin';

/**

 * Components

 *

 * @var array

 */

	public $components = array('Paginator');

	

	public function beforeFilter(){

		parent::beforeFilter();
		$this->pageTitle = 'Tourpals';
		$this->set('title_for_layout', 'Tourpals:Hotels Section');
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

					'Hotel.'.$column.' LIKE' => '%'.$search.'%', 

				);

			}

		}

		$this->set('column',$column);

		$this->set('search',$search);

		$this->paginate = array(

			'limit' => 10,

			'conditions' => $conditions,

			'order' => array(

				'Hotel.updated' => 'desc'

			),

		);



		$this->Hotel->recursive = 0;

		$this->set('hotels', $this->Paginator->paginate());

	}



/**

 * view method

 *

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function view($id = null) {

		if (!$this->Hotel->exists($id)) {

			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">Invalid hotel</div>'), 'flash_custom');

		}

		$options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));

		$this->set('hotel', $this->Hotel->find('first', $options));

	}



/**

 * add method

 *

 * @return void

 */

	public function add() {

		if ($this->request->is('post')) {

			$this->Hotel->create();

			if ($this->Hotel->save($this->request->data)) {

				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel has been saved.</div>'), 'flash_custom');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel could not be saved. Please, try again.</div>'), 'flash_custom');

			}

		}

		$places = $this->Hotel->Place->find('list');

		$this->set(compact('places'));

	}



/**

 * edit method

 *

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function edit($id = null) {

		if (!$this->Hotel->exists($id)) {

			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">flash_customInvalid hotel</div>'), 'flash_custom');

		}

		if ($this->request->is(array('post', 'put'))) {

			if ($this->Hotel->save($this->request->data)) {

				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel has been saved.</div>'), 'flash_custom');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel could not be saved. Please, try again.</div>'), 'flash_custom');

			}

		} else {

			$options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));

			$this->request->data = $this->Hotel->find('first', $options);

		}

		$places = $this->Hotel->Place->find('list');

		$this->set(compact('places'));

	}



/**

 * delete method

 *

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function delete($id = null) {

		$this->Hotel->id = $id;

		if (!$this->Hotel->exists()) {

			throw new NotFoundException(__('<div class="alert alert-danger" role="alert">flash_customInvalid hotel</div>'), 'flash_custom');

		}

		$this->Hotel->set('isactive',0);

		$this->Hotel->set('isdeleted',1);

		if ($this->Hotel->save()) {

			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel has been deleted.</div>'), 'flash_custom');

		} else {

			$this->Session->setFlash(__('<div class="alert alert-danger" role="alert">The hotel could not be deleted. Please, try again.</div>'), 'flash_custom');

		}

		return $this->redirect(array('action' => 'index'));

	}
        public function gallery()
        {
            $this->layout='ajax';
        }
        public function upload()
        {
            $hotelId=1;
            $output_dir = "uploads/";
            $output_dir_thumb=$output_dir."thumbs/";

            if(isset($_FILES["myfile"]))
            {
                    $ret = array();

                    $error =$_FILES["myfile"]["error"];
                    {

                    if(!is_array($_FILES["myfile"]['name'])) //single file
                    {
                        $RandomNum   = time();

                        $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
                        $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.

                        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                        $ImageExt       = str_replace('.','',$ImageExt);
                        $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                        $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

                            move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
                            move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir_thumb. $NewImageName);
                             //echo "<br> Error: ".$_FILES["myfile"]["error"];

                                     $ret[$fileName]= $output_dir.$NewImageName;
                    }
                    else
                        {
                            $fileCount = count($_FILES["myfile"]['name']);
                            for($i=0; $i < $fileCount; $i++)
                            {
                                $RandomNum   = time();

                                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                                $ImageType      = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.

                                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                                $ImageExt       = str_replace('.','',$ImageExt);
                                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

                                $ret[$NewImageName]= $output_dir.$NewImageName;
                                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
                                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir_thumb. $NewImageName);
                                $this->request->data['ImageGallery']['hotel_id']=$hotelId;
                                $this->request->data['ImageGallery']['main_image']=$NewImageName;
                                $this->ImageGallery->create();
                                $this->ImageGallery->save($this->data);
                                
                            }
                        }
                    }
                    
                
                echo json_encode($ret);
                
               
                
                
                
                
                

            }
        }

}

