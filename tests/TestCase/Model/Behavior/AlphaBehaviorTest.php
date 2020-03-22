<?php

namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\AlphaBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\AlphaBehavior Test Case
 */
class AlphaBehaviorTest extends TestCase {

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp(): void {
		parent::setUp();
		$this->Alpha = new AlphaBehavior();
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown(): void {
		unset($this->Alpha);

		parent::tearDown();
	}

}
