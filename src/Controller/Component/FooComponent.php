<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
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
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function startup(Event $event) {
		$this->log('FooComponent::startup', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function beforeFilter(Event $event) {
		$this->log('FooComponent::beforeFilter', 'info', 'exec');
	}

	/**
	 * Called after the Controller::beforeRender(), after the view class is loaded, and before the
	 * Controller::render()
	 *
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function beforeRender(Event $event) {
		$this->log('FooComponent::beforeRender', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function shutdown(Event $event) {
		$this->log('FooComponent::shutdown', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param array|string $url
	 * @param \Cake\Http\Response $response
	 * @return void
	 */
	public function beforeRedirect(Event $event, $url, Response $response) {
		$this->log('FooComponent::beforeRedirect', 'info', 'exec');
	}

}
