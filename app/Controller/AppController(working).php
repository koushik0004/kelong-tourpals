<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $pageTitle;
	/*public $components = array(
	    'Session',
	    'Auth' => array(
	    	'authenticate' => array(
	            'Form' => array(
	                //'fields' => array('username' => 'email', 'password' => 'password'),
					'passwordHasher' => 'Blowfish'
	            )
	        ),
	        'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
	        'logoutRedirect' => array(
	            'controller' => 'users',
	            'action' => 'login',
	        ),
	        'authorize' => array(
	        	'Actions' => array('actionPath' => 'controllers')
	        )
	    )
	);*/
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authenticate' => array(
                'Form' => array(
                    //'passwordHasher' => 'Blowfish'
					'passwordHasher' =>	array(
							'className' => 'Simple',
							'hashType' => 'sha256'
						)
                )
            ),
			'authorize' => array('Controller')
        )
    );

	public function isAuthorized($user) {
	    // Admin can access every action
	    if (isset($user['role']) && $user['role'] === 'ADMIN') {
	        return true;
	    }

	    // Default deny
	    return false;
	}
	
	public function beforeRender() {
		parent::beforeRender();
		$this->response->disableCache();
		if($this->cakeError == true){
			echo 'error';
		}
	}
	
	public function beforeFilter(){
		$this->pageTitle = 'Tourpals';
		$this->set('title_for_layout', 'Tourpals');
		//$this->Auth->allow('index', 'view');
	}
}
