<?php
namespace App\Model\Behavior;

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

	public function initialize(array $config) {
		Log::write('info', 'AlphaBehavior:initialize', 'exec');
	}

	/**
	 * Default configuration.
	 *
	 * @var array
	 */
	protected $_defaultConfig = [];

	public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:beforeMarshal', 'exec');
	}

	public function buildRules(Event $event, RulesChecker $rules) {
		Log::write('info', 'AlphaBehavior:buildRules', 'exec');
	}

	public function buildValidator(Event $event, Validator $validator, $name) {
		Log::write('info', 'AlphaBehavior:buildValidator', 'exec');
	}

	public function beforeRules(Event $event, Entity $entity, \ArrayObject $options, $operation) {
		Log::write('info', 'AlphaBehavior:beforeRules', 'exec');
	}

	public function afterRules(Event $event, Entity $entity, $result, $operation) {
		Log::write('info', 'AlphaBehavior:afterRules', 'exec');
	}

	public function beforeSave(Event $event, Entity $entity, \ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:beforeSave', 'exec');
	}

	public function afterSave(Event $event, Entity $entity, \ArrayObject $options) {
		Log::write('info', 'AlphaBehavior:afterSave', 'exec');
	}

}
