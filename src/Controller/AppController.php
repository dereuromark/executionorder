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
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function beforeFilter(Event $event) {
		$this->log('Controller::beforeFilter', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function beforeRender(Event $event) {
		$this->log('Controller::beforeRender', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function afterFilter(Event $event) {
		$this->log('Controller::afterFilter', 'info', 'exec');
	}

	/**
	 * @param array|string $url
	 * @param int|null $status
	 * @return \Cake\Http\Response|null
	 */
	public function redirect($url, $status = null) {
		$this->log('Controller::redirect', 'info', 'exec');
		return parent::redirect($url, $status);
	}

}
