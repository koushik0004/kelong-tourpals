<?php
App::uses('AppModel', 'Model');
//App::uses('AuthComponent', 'Controller/Component');
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


/**
 * User Model
 *
 * @property HotelRating $HotelRating
 */
class User extends AppModel {

	public $name = 'User';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter First Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'First Name must be alpha-numeric',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter Last Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Last Name must be alpha-numeric',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email address is not valid',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter email address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'email' => 'This email is taken already'
			),
		),
		'password' => array(
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
		),
		'role' => array(
			'allowedChoice' => array(
	             'rule' => array('inList', array('ADMIN', 'NORMAL')),
	             'message' => 'User type must be either ADMIN or NORMAL'
	         )
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
		'isdeleted' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'HotelRating' => array(
			'className' => 'HotelRating',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function passwordChecker(){
		//$passwordHasher = new BlowfishPasswordHasher();
		if($this->data[$this->alias]['password'] != $this->data[$this->alias]['cpassword']){
			return false;
		}else{
			return true;
		}
	}

	public function passwordUpdater(){
		$model = $this->findById($this->data[$this->alias]['id']);
		$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
		if(!empty($model)){
			if($model['User']['password'] == $passwordHasher->hash($this->data[$this->alias]['password'])){
				if($this->data[$this->alias]['npassword'] != $this->data[$this->alias]['cpassword']){
					return false;
				}else{
					return true;
				}		
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}

	public function beforeSave($options = array()) {
		parent::beforeSave($options);
		//$passwordHasher = new BlowfishPasswordHasher();
		$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        if (isset($this->data[$this->alias]['password'])) {
            
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    } 

}
