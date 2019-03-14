<?php

namespace App\View\Helper;

use Cake\Event\Event;
use Cake\Log\LogTrait;
use Cake\View\Helper;

/**
 * Application Helper
 */
class FooHelper extends Helper {

	use LogTrait;

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @return void
	 */
	public function beforeRenderFile(Event $event, $viewFile) {
		$this->log('FooHelper::beforeRenderFile', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @param string $content
	 * @return void
	 */
	public function afterRenderFile(Event $event, $viewFile, $content) {
		$this->log('FooHelper::afterRenderFile', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @return void
	 */
	public function beforeRender(Event $event, $viewFile) {
		$this->log('FooHelper::beforeRender', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @return void
	 */
	public function afterRender(Event $event, $viewFile) {
		$this->log('FooHelper::afterRender', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $layoutFile
	 * @return void
	 */
	public function beforeLayout(Event $event, $layoutFile) {
		$this->log('FooHelper::beforeLayout', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $layoutFile
	 * @return void
	 */
	public function afterLayout(Event $event, $layoutFile) {
		$this->log('FooHelper::afterLayout', 'info', 'exec');
	}

}
