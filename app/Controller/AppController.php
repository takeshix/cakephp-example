<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
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

	public $viewClass = 'TwigView.Twig';

	public $components = array(
		// 'Auth' => array(
		// 	'flash' => array(
		// 		'key' => 'auth',
		// 		'element' => null,  
		// 		'params' => array(
		// 		),
		// 	),
		// 	'loginAction' => array(
		// 		"controller" => 'auth', 
		// 		"action" => 'login', 
		// 	), 
		// 	'loginRedirect' => array(
		// 		'controller' => 'posts',
		// 		'action' => 'index'
		// 	),
		// 	'logoutRedirect' => array(
		// 		'controller' => 'pages',
		// 		'action' => 'display',
		// 		'home'
		// 	),
		// 	'authError' => 'ログインが必要なページです', 
		// 	'authenticate' => array(
		// 		'Form' => array(
		// 			'passwordHasher' => 'Blowfish'
		// 		),
		// 	),
		// ), 
		"Session", 
	);

	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
}
