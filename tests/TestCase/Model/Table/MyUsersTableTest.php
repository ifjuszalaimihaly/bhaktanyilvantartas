<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppUsersTable Test Case
 */
class MyUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppUsersTable
     */
    public $MyUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MyUsers') ? [] : ['className' => AppUsersTable::class];
        $this->MyUsers = TableRegistry::get('MyUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MyUsers);

        parent::tearDown();
    }

    /**
     * Test findSuperUsers method
     *
     * @return void
     */
    public function testFindSuperUsers()
    {
        $actual = $this->MyUsers->find('superUsers');
        $expected = ['User 1'];
        $this->assertEquals($expected, $actual->extract('username')->toArray());
    }
}
