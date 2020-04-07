<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Http\Response;

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
	public function initialize(): void {
		$this->loadComponent('Flash');

		$this->log('Controller::initialize', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function beforeFilter(EventInterface $event) {
		$this->log('Controller::beforeFilter', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function beforeRender(EventInterface $event) {
		$this->log('Controller::beforeRender', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function afterFilter(EventInterface $event) {
		$this->log('Controller::afterFilter', 'info', 'exec');
	}

	/**
	 * @param array|string $url
	 * @param int $status
	 * @return \Cake\Http\Response|null
	 */
	public function redirect($url, int $status = 302): ?Response {
		$this->log('Controller::redirect', 'info', 'exec');
		return parent::redirect($url, $status);
	}

}
