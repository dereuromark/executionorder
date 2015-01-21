<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\Entity;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tokens Model
 */
class TokensTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		Log::write('info', 'TokensTable:initialize', 'exec');

		$this->table('tokens');
		$this->displayField('key');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->addBehavior('Alpha');
	}

	public function beforeMarshal(Event $event, \ArrayObject $data, $options) {
		Log::write('info', 'TokensTable:beforeMarshal', 'exec');
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator instance
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		Log::write('info', 'TokensTable:validationDefault', 'exec');

		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->add('user_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('user_id')
			->requirePresence('type', 'create')
			->notEmpty('type')
			->requirePresence('key', 'create')
			->notEmpty('key')
			->requirePresence('content', 'create')
			->notEmpty('content')
			->add('used', 'valid', ['rule' => 'boolean'])
			->requirePresence('used', 'create')
			->notEmpty('used')
			->add('unlimited', 'valid', ['rule' => 'boolean'])
			->requirePresence('unlimited', 'create')
			->notEmpty('unlimited');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules) {
		Log::write('info', 'TokensTable:buildRules', 'exec');
		$rules->add($rules->existsIn(['user_id'], 'Users'));
		return $rules;
	}

	public function buildValidator(Event $event, Validator $validator, $name) {
		Log::write('info', 'TokensTable:buildValidator', 'exec');
	}

	public function beforeRules(Event $event, Entity $entity, \ArrayObject $options, $operation) {
		Log::write('info', 'TokensTable:beforeRules', 'exec');
	}

	public function afterRules(Event $event, Entity $entity, $result, $operation) {
		Log::write('info', 'TokensTable:afterRules', 'exec');
	}

	public function beforeSave(Event $event, Entity $entity, \ArrayObject $options) {
		Log::write('info', 'TokensTable:beforeSave', 'exec');
	}

	public function afterSave(Event $event, Entity $entity, \ArrayObject $options) {
		Log::write('info', 'TokensTable:afterSave', 'exec');
	}

	public function beforeDelete(Event $event, Entity $entity, \ArrayObject $options) {
		Log::write('info', 'TokensTable:beforeDelete', 'exec');
	}

	public function afterDelete(Event $event, Entity $entity, \ArrayObject $options) {
		Log::write('info', 'TokensTable:afterDelete', 'exec');
	}

}
