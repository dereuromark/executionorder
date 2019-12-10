<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Alpha behavior
 */
class AlphaBehavior extends Behavior {

	/**
	 * @param array $config
	 * @return void
	 */
	public function initialize(array $config) {
		Log::write('info', 'AlphaBehavior:initialize', 'exec');
	}

	/**
	 * Default configuration.
	 *
	 * @var array
	 */
	protected $_defaultConfig = [];

	/**
	 * @param \Cake\Event\Event $event
	 * @param \ArrayObject $data
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:beforeMarshal', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param \Cake\ORM\RulesChecker $rules
	 * @return void
	 */
	public function buildRules(Event $event, RulesChecker $rules) {
		Log::write('info', 'AlphaBehavior:buildRules', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param \Cake\Validation\Validator $validator
	 * @param string $name
	 * @return void
	 */
	public function buildValidator(Event $event, Validator $validator, $name) {
		Log::write('info', 'AlphaBehavior:buildValidator', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @param string $operation
	 * @return void
	 */
	public function beforeRules(Event $event, Entity $entity, ArrayObject $options, $operation) {
		Log::write('info', 'AlphaBehavior:beforeRules', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param \Cake\ORM\Entity $entity
	 * @param array $result
	 * @param string $operation
	 * @return void
	 */
	public function afterRules(Event $event, Entity $entity, $result, $operation) {
		Log::write('info', 'AlphaBehavior:afterRules', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeSave(Event $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:beforeSave', 'exec');
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function afterSave(Event $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:afterSave', 'exec');
	}

}
