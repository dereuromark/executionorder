<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
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
class FooComponent extends Component {

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function startup(EventInterface $event) {
		$this->log('FooComponent::startup', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function beforeFilter(EventInterface $event) {
		$this->log('FooComponent::beforeFilter', 'info', 'exec');
	}

	/**
	 * Called after the Controller::beforeRender(), after the view class is loaded, and before the
	 * Controller::render()
	 *
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function beforeRender(EventInterface $event) {
		$this->log('FooComponent::beforeRender', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @return void
	 */
	public function shutdown(EventInterface $event) {
		$this->log('FooComponent::shutdown', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param array|string $url
	 * @param \Cake\Http\Response $response
	 * @return void
	 */
	public function beforeRedirect(EventInterface $event, $url, Response $response) {
		$this->log('FooComponent::beforeRedirect', 'info', 'exec');
	}

}
