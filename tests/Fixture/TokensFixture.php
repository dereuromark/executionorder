<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TokensFixture
 */
class TokensFixture extends TestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = [
		'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
		'user_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'type' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => '', 'comment' => 'e.g.:activate,reactivate', 'precision' => null, 'fixed' => null],
		'key' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
		'content' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => 'can transport some information', 'precision' => null, 'fixed' => null],
		'used' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
		'unlimited' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'used will never be set to 1', 'precision' => null],
		'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'_indexes' => [
			'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
		],
		'_options' => [
			'engine' => 'MyISAM', 'collation' => 'utf8_unicode_ci',
		],
	];

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = [
		[
			'user_id' => 1,
			'type' => 'Lorem ip',
			'key' => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet',
			'used' => 1,
			'unlimited' => 1,
			'created' => '2015-01-05 22:33:30',
			'modified' => '2015-01-05 22:33:30',
		],
	];

}
