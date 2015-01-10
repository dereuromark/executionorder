<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\AlphaBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\AlphaBehavior Test Case
 */
class AlphaBehaviorTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Alpha = new AlphaBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Alpha);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
