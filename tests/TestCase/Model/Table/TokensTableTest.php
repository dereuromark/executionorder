<?php

namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TokensTable Test Case
 */
class TokensTableTest extends TestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = [
		'Tokens' => 'app.tokens',
		'Users' => 'app.users',
	];

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp(): void {
		parent::setUp();
		$config = TableRegistry::exists('Tokens') ? [] : ['className' => 'App\Model\Table\TokensTable'];
		$this->Tokens = TableRegistry::get('Tokens', $config);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown(): void {
		unset($this->Tokens);

		parent::tearDown();
	}

}
