<?php
App::uses('AppModel', 'Model');
/**
 * Booking Model
 *
 * @property Place $Place
 * @property Hotel $Hotel
 * @property User $User
 * @property RoomDetail $RoomDetail
 */
class Booking extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'place_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select place',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select customer',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'childrens' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please provide number of childrens in proper format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'adults' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please provide number of adults in integer value',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'check_in' => array(
			'numeric' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please provide checkin date',
				//'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'checkout' => array(
			'numeric' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please provide checkout date',
				//'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_of_days' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please provide number of days',
				//'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_charges' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sevice_tax' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'other_taxes' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bank_charges' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'courier_charges' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'misc_charges' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'extra_charges' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'extra_bed_charges' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discount' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Please provide value in (0.00) format',
				'allowEmpty' => true,
				'required' => false,
				'last' => true, // Stop validation after this rule
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
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Hotel' => array(
			'className' => 'Hotel',
			'foreignKey' => 'hotel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'RoomDetail' => array(
			'className' => 'RoomDetail',
			'joinTable' => 'bookings_room_details',
			'foreignKey' => 'booking_id',
			'associationForeignKey' => 'room_detail_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
