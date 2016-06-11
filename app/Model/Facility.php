<?php
App::uses('AppModel', 'Model');
/**
 * Facility Model
 *
 */
class Facility extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Title cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength',3),
				'message' => 'Title must have 3 characters at least',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	/*	'title_alias' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Title alias cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	*/
		'icon_path' => array(
			'rule' => array(
				'extension',
				array('gif', 'jpeg', 'png', 'jpg'),
			),
			'message' => 'Please supply a valid image.',
		),
	
		'isactive' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select an option',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'isdeletd' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select an option',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function beforeValidate($options = array()){
		if(isset($_POST['_method']) && $_POST['_method'] == 'PUT') {
			if(isset($_FILES) && !empty($_FILES)){
		
				$name = $this->data['Facility']['icon_path']['name'];
				$tmp_name = $this->data['Facility']['icon_path']['tmp_name'];
				$error = $this->data['Facility']['icon_path']['error'];

				if(empty($name) && empty($tmp_name) && !empty($error)){
					unset($this->validate['icon_path']);
					unset($this->data['Facility']['icon_path']);
				}
			}	
		}
	}
	
	public function beforeSave($options = array()){

		if(isset($_POST['_method']) && $_POST['_method'] == 'POST'){
			
			$slug = Inflector::slug(Inflector::underscore($this->data[$this->alias]['title']),'-');
			$slug_count = $this->find('count',array(
				'conditions' => array(
					'title_alias LIKE' => $slug.'%',
				)
			));
			if($slug_count > 0){
				$this->data[$this->alias]['title_alias'] = $slug."-".$slug_count;
			}else{
				$this->data[$this->alias]['title_alias'] = $slug;
			}
		}
		
		if(isset($_POST['_method']) && in_array($_POST['_method'], array('POST', 'PUT')) && isset($this->data['Facility']['icon_path']) && !empty($this->data['Facility']['icon_path'])){
			
			$file = $this->data['Facility']['icon_path']['name'];
			$arr = explode(".",$file);
			$ext = $arr[count($arr) - 1];
			unset($arr[count($arr) - 1]);
			$file = implode(".",$arr);
			$file = $file.time().rand(1111,9999).".".$ext;
			if(is_uploaded_file($this->data['Facility']['icon_path']['tmp_name'])){
				move_uploaded_file($this->data['Facility']['icon_path']['tmp_name'], WWW_ROOT. DS . 'img'.DS.'uploads'.DS.$file);

				$dimensions = array("50", "100");
				foreach($dimensions as $dim){
					$dest_dir[] =	WWW_ROOT.'img'.DS.'uploads'.DS.$dim.DS;
				}
				$full_path = WWW_ROOT.'img'.DS.'uploads'.DS.$file;
				$image_type_int = exif_imagetype($full_path);
				$im = null;
				switch($image_type_int){
					case 1:		// create gif image
						$im = imagecreatefromgif($full_path);
						break;
					case 2:		// create jpeg image
						$im = imagecreatefromjpeg($full_path);
						break;
					case 3:		// create png image
						$im = imagecreatefrompng($full_path);
						break;

				}

				list($width, $height) = getimagesize($full_path);

				foreach($dimensions as $key => $dim){
					$ratio = $width / $dim;
					$nHeight = $height / $ratio;
					if($dim > $nHeight){
						$image_p = imagecreatetruecolor($dim, $dim);
					}else{
						$image_p = imagecreatetruecolor($nHeight, $nHeight);
					}
					imagecopyresampled($image_p, $im, 0, 0, 0, 0, $dim, $dim, $width, $height);
					
					switch($image_type_int){
						case 1:		// save gif image
							imagegif($image_p,$dest_dir[$key].$file);
							break;
						case 2:		// save jpeg image
							imagejpeg($image_p,$dest_dir[$key].$file);
							break;
						case 3:		// save png image
							imagepng($image_p,$dest_dir[$key].$file);
							break;
					}
				}
			}
			unset($this->data['Facility']['icon_path']);
			$this->data['Facility']['icon_path'] = $file;

			$instance = (isset($this->data['Facility']['id']))?$this->findById($this->data['Facility']['id']):1;
			if(!empty($instance)){
				$prev_icon = $instance['Facility']['icon_path'];
				$paths[] = WWW_ROOT. 'img' . DS .'uploads' . DS .$prev_icon;
				$paths[] = WWW_ROOT. 'img' . DS .'uploads' . DS . '50' . DS . $prev_icon;
				$paths[] = WWW_ROOT. 'img' . DS .'uploads' . DS . '100' . DS . $prev_icon;

				foreach ($paths as $path) {
					if(file_exists($path))
						unlink($path);
				}
			}
		}
		return $this->data;
	}
}
