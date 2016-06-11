<?php
App::uses('AppModel', 'Model');
/**
 * RoomType Model
 *
 * @property Hotel $Hotel
 * @property RoomDetail $RoomDetail
 */
class RoomType extends AppModel {
	
	public $displayField = 'type_title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'hotel_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select hotel',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'PLease enter room type title',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_nuber_of_rooms' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'enter number of rooms',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'unit_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'enter unit price',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'room_occupied' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This should be numeric value',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_charges' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This should be numeric value',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_taxes' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This should be numeric value',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Hotel' => array(
			'className' => 'Hotel',
			'foreignKey' => 'hotel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'RoomDetail' => array(
			'className' => 'RoomDetail',
			'foreignKey' => 'room_type_id',
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

}
