<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->loadComponent('Flash');

		$this->log('Controller::initialize', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function beforeFilter(Event $event) {
		$this->log('Controller::beforeFilter', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function beforeRender(Event $event) {
		$this->log('Controller::beforeRender', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function afterFilter(Event $event) {
		$this->log('Controller::afterFilter', 'info', 'exec');
	}

}
