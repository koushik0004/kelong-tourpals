<?php
App::uses('AppModel', 'Model');
/**
 * Facility Model
 *
 */
class CmsContent extends AppModel {

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
		'content_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please select content type...',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	
	
		
	);

	
	public function beforeSave($options = array()){

		
	}
}
