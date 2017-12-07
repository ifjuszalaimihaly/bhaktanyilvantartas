<?php
/**
 * Created by PhpStorm.
 * User: mihaly
 * Date: 2017.11.17.
 * Time: 13:24
 */

namespace App\Model\Table;

use Cake\ORM\Query;
use CakeDC\Users\Model\Table\UsersTable;

class AppUsersTable extends UsersTable
{
    /*
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');
    }*/

    public function findSuperUsers(Query $query, array $options)
    {
        return $query->select(['AppUsers.username', 'AppUsers.email'])
            ->where(['AppUsers.is_superuser', 1]);
    }
}
