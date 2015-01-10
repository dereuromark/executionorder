<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\Log;

/**
 * Tokens Model
 */
class TokensTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
    	Log::write(LOG_DEBUG, 'TokensTable:initialize');

        $this->table('tokens');
        $this->displayField('key');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

    		$this->addBehavior('Alpha');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator instance
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
		Log::write(LOG_DEBUG, 'TokensTable:validationDefault');

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
    public function buildRules(RulesChecker $rules)
    {
		Log::write(LOG_DEBUG, 'TokensTable:buildRules');
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
