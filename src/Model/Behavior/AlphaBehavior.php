<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Entity;
/**
 * Alpha behavior
 */
class AlphaBehavior extends Behavior
{

	public function initialize(array $config) {
		Log::write(LOG_DEBUG, 'AlphaBehavior:initialize');
	}

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function buildRules(Event $event, RulesChecker $rules) {
    	Log::write(LOG_DEBUG, 'AlphaBehavior:buildRules');
    }

    public function buildValidator(Event $event, Validator $validator, $name) {
    	Log::write(LOG_DEBUG, 'AlphaBehavior:buildValidator');
    }

    public function beforeRules(Event $event, Entity $entity, ArrayObject $options, $operation) {
    	Log::write(LOG_DEBUG, 'AlphaBehavior:beforeRules');
    }

    public function afterRules(Event $event, Entity $entity, bool $result, $operation) {
    	Log::write(LOG_DEBUG, 'AlphaBehavior:afterRules');
    }

    public function beforeSave(Event $event, Entity $entity, ArrayObject $options) {
    	Log::write(LOG_DEBUG, 'AlphaBehavior:beforeSave');
    }

    public function afterSave(Event $event, Entity $entity, ArrayObject $options) {
    	Log::write(LOG_DEBUG, 'AlphaBehavior:afterSave');
    }
}
