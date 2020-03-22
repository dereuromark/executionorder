<?php

namespace App\Model\Table;

use ArrayObject;
use Cake\Event\EventInterface;
use Cake\Log\Log;
use Cake\ORM\Entity;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TokensTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config): void {
		Log::write('info', 'TokensTable:initialize', 'exec');

		$this->setTable('tokens');
		$this->setDisplayField('key');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->addBehavior('Alpha');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \ArrayObject $data
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeMarshal(EventInterface $event, ArrayObject $data, ArrayObject $options) {
		Log::write('info', 'TokensTable:beforeMarshal', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function afterMarshal(EventInterface $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'TokensTable:afterMarshal', 'exec');
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator instance
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator): Validator {
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
	public function buildRules(RulesChecker $rules): RulesChecker {
		Log::write('info', 'TokensTable:buildRules', 'exec');

		//$rules->add($rules->existsIn(['user_id'], 'Users'));

		return $rules;
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\Validation\Validator $validator
	 * @param string $name
	 * @return void
	 */
	public function buildValidator(EventInterface $event, Validator $validator, $name) {
		Log::write('info', 'TokensTable:buildValidator', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @param string $operation
	 * @return void
	 */
	public function beforeRules(EventInterface $event, Entity $entity, ArrayObject $options, $operation) {
		Log::write('info', 'TokensTable:beforeRules', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param array $result
	 * @param string $operation
	 * @return void
	 */
	public function afterRules(EventInterface $event, Entity $entity, $result, $operation) {
		Log::write('info', 'TokensTable:afterRules', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeSave(EventInterface $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'TokensTable:beforeSave', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function afterSave(EventInterface $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'TokensTable:afterSave', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function beforeDelete(EventInterface $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'TokensTable:beforeDelete', 'exec');
	}

	/**
	 * @param \Cake\Event\EventInterface $event
	 * @param \Cake\ORM\Entity $entity
	 * @param \ArrayObject $options
	 * @return void
	 */
	public function afterDelete(EventInterface $event, Entity $entity, ArrayObject $options) {
		Log::write('info', 'TokensTable:afterDelete', 'exec');
	}

}
