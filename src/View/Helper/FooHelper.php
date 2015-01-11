<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Event\Event;
use Cake\Log\LogTrait;
/**
 * Application Helper
 */
class FooHelper extends Helper {

	use LogTrait;

 	/**
	 * @return void
	 */
	public function beforeRenderFile(Event $event, $viewFile) {
		$this->log('FooHelper::beforeRenderFile', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function afterRenderFile(Event $event, $viewFile, $content) {
		$this->log('FooHelper::afterRenderFile', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function beforeRender(Event $event, $viewFile) {
		$this->log('FooHelper::beforeRender', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function afterRender(Event $event, $viewFile) {
		$this->log('FooHelper::afterRender', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function beforeLayout(Event $event, $layoutFile) {
		$this->log('FooHelper::beforeLayout', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function afterLayout(Event $event, $layoutFile) {
		$this->log('FooHelper::afterLayout', 'info', 'exec');
	}

}
