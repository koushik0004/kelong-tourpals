<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'index', 'home'));
	Router::connect('/administrator', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/facilities', array('controller' => 'facilities', 'action' => 'index', 'home'));
	Router::connect('/hotels', array('controller' => 'hotels', 'action' => 'index', 'home'));
	Router::connect('/places', array('controller' => 'places', 'action' => 'index', 'home'));
	
	Router::connect('/states', array('controller' => 'states', 'action' => 'index', 'home'));
	Router::connect('/states/add', array('controller' => 'states', 'action' => 'add'));
	Router::connect('/states/edit/*', array('controller' => 'states', 'action' => 'edit'));
	
	Router::connect('/room-types', array('controller' => 'room_types', 'action' => 'index'));
	Router::connect('/room-types/add', array('controller' => 'room_types', 'action' => 'add'));
	Router::connect('/room-types/edit/*', array('controller' => 'room_types', 'action' => 'edit'));
	
	Router::connect('/room-details', array('controller' => 'room_details', 'action' => 'index'));
	Router::connect('/room-details/add', array('controller' => 'room_details', 'action' => 'add'));
	Router::connect('/room-details/edit/*', array('controller' => 'room_details', 'action' => 'edit'));
	
	Router::connect('/hotle-approved-rating', array('controller' => 'hotel_approved_ratings', 'action' => 'index'));
	Router::connect('/hotle-approved-rating/add', array('controller' => 'hotel_approved_ratings', 'action' => 'add'));
	Router::connect('/hotle-approved-rating/edit/*', array('controller' => 'hotel_approved_ratings', 'action' => 'edit'));
	
	Router::connect('/hotel-ratings', array('controller' => 'hotel_ratings', 'action' => 'index'));
	Router::connect('/hotel-ratings/add', array('controller' => 'hotel_ratings', 'action' => 'add'));
	Router::connect('/hotel-ratings/edit/*', array('controller' => 'hotel_ratings', 'action' => 'edit'));
	
	Router::connect('/cms-contents', array('controller' => 'cms_contents', 'action' => 'index'));
	Router::connect('/cms-contents/add', array('controller' => 'cms_contents', 'action' => 'add'));
	Router::connect('/cms-contents/edit/*', array('controller' => 'cms_contents', 'action' => 'edit'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
