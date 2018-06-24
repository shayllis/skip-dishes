<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dishes Model
 *
 * @property \App\Model\Table\RestaurantsTable|\Cake\ORM\Association\BelongsTo $Restaurants
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Dish get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dish newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dish|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dish|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dish[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dish findOrCreate($search, callable $callback = null, $options = [])
 */
class DishesTable extends Table
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

        $this->setTable('dishes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Restaurants', [
            'foreignKey' => 'restaurant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'dish_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'categories_dishes'
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 45)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 144)
            ->allowEmpty('photo');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

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
        $rules->add($rules->existsIn(['restaurant_id'], 'Restaurants'));

        return $rules;
    }
}
