<?php

namespace App\View\Helper;

use Cake\Event\EventInterface;
use Cake\Log\LogTrait;
use Cake\View\Helper;

/**
 * Application Helper
 */
class FooHelper extends Helper {

	use LogTrait;

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param string $viewFile
	 * @return void
	 */
	public function beforeRenderFile(EventInterface $event, $viewFile) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::beforeRenderFile (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param string $viewFile
	 * @param string $content
	 * @return void
	 */
	public function afterRenderFile(EventInterface $event, $viewFile, $content) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::afterRenderFile (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param string $viewFile
	 * @return void
	 */
	public function beforeRender(EventInterface $event, $viewFile) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::beforeRender (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param string $viewFile
	 * @return void
	 */
	public function afterRender(EventInterface $event, $viewFile) {
		$viewFile = str_replace(ROOT . DS, '', $viewFile);
		$this->log('FooHelper::afterRender (' . $viewFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param string $layoutFile
	 * @return void
	 */
	public function beforeLayout(EventInterface $event, $layoutFile) {
		$layoutFile = str_replace(ROOT . DS, '', $layoutFile);
		$this->log('FooHelper::beforeLayout (' . $layoutFile . ')', 'info', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param string $layoutFile
	 * @return void
	 */
	public function afterLayout(EventInterface $event, $layoutFile) {
		$layoutFile = str_replace(ROOT . DS, '', $layoutFile);
		$this->log('FooHelper::afterLayout (' . $layoutFile . ')', 'info', 'exec');
	}

}
