<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centers Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\HasMany $Departments
 * @property \CakeDC\Users\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Center get($primaryKey, $options = [])
 * @method \App\Model\Entity\Center newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Center[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Center|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Center patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Center[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Center findOrCreate($search, callable $callback = null, $options = [])
 */
class CentersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('centers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Departments', [
            'foreignKey' => 'center_id'
        ]);
        $this->belongsToMany('AppUsers', [
            'foreignKey' => 'center_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'centers_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    public function findByCenterIdAndUserId(Query $query, array $options)
    {
        return $query->innerJoinWith('AppUsers');//->where(['Users.id' => $options['userId']])->where(['Centers.id' => $options['centerId']])->all();

    }
}
