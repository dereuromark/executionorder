<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\Log\Log;
use Cake\ORM\Behavior;
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
	public function initialize(array $config): void {
		Log::write('info', 'AlphaBehavior:initialize', 'exec');
	}

	/**
	 * Default configuration.
	 *
	 * @var array
	 */
	protected $_defaultConfig = [];

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \ArrayObject $data
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeMarshal(EventInterface $event, ArrayObject $data, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:beforeMarshal', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Datasource\EntityInterface $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function afterMarshal(EventInterface $event, EntityInterface $entity, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:afterMarshal', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\RulesChecker $rules
	 * @return void
	 */
	public function buildRules(EventInterface $event, RulesChecker $rules) {
		Log::write('info', 'AlphaBehavior:buildRules', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Validation\Validator $validator
	 * @param string $name
	 * @return void
	 */
	public function buildValidator(EventInterface $event, Validator $validator, $name) {
		Log::write('info', 'AlphaBehavior:buildValidator', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Datasource\EntityInterface $entity
	 * @param \ArrayObject $options
	 * @param string $operation
	 * @return void
	 */
	public function beforeRules(EventInterface $event, EntityInterface $entity, ArrayObject $options, $operation) {
		Log::write('info', 'AlphaBehavior:beforeRules', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Datasource\EntityInterface $entity
	 * @param array $result
	 * @param string $operation
	 * @return void
	 */
	public function afterRules(EventInterface $event, EntityInterface $entity, $result, $operation) {
		Log::write('info', 'AlphaBehavior:afterRules', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Datasource\EntityInterface $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:beforeSave', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Datasource\EntityInterface $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function afterSave(EventInterface $event, EntityInterface $entity, ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:afterSave', 'exec');
	}

}
