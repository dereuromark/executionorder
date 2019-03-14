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
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::beforeRenderFile (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @param string $content
	 * @return void
	 */
	public function afterRenderFile(Event $event, $viewFile, $content) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::afterRenderFile (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @return void
	 */
	public function beforeRender(Event $event, $viewFile) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::beforeRender (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $viewFile
	 * @return void
	 */
	public function afterRender(Event $event, $viewFile) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::afterRender (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $layoutFile
	 * @return void
	 */
	public function beforeLayout(Event $event, $layoutFile) {
		$layoutFile = str_replace(ROOT . DS, '', $layoutFile);
		$this->log('FooHelper::beforeLayout (' . $layoutFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param string $layoutFile
	 * @return void
	 */
	public function afterLayout(Event $event, $layoutFile) {
		$layoutFile = str_replace(ROOT . DS, '', $layoutFile);
		$this->log('FooHelper::afterLayout (' . $layoutFile . ')', 'info', 'exec');
	}

}
