<?php
use Migrations\AbstractMigration;

class Boostart extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
			$this->table('restaurants')
				->addColumn('name', 'string', ['limit' => 60])
				->addColumn('slug', 'string', ['limit' => 60])
				->addColumn('photo', 'string', ['limit' => 144, 'null' => true])
				->addColumn('description', 'text', ['limit' => 144, 'null' => true])
				->addColumn('lat', 'decimal', ['precision' => 9,'scale' => 4, 'null' => true])
				->addColumn('long', 'decimal', ['precision' => 9,'scale' => 4, 'null' => true])
				->addColumn('created_at', 'datetime', ['null' => true])
				->addColumn('updated_at', 'datetime', ['null' => true])
				->addIndex('slug', ['unique' => true])
				->create();

			$this->table('categories')
				->addColumn('restaurant_id', 'integer')
				->addColumn('name', 'string', ['limit' => 45])
				->addColumn('slug', 'string', ['limit' => 45])
				->addColumn('created_at', 'datetime', ['null' => true])
				->addColumn('updated_at', 'datetime', ['null' => true])
				->addForeignKey('restaurant_id', 'restaurants', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
				->addIndex(['restaurant_id', 'slug'], ['unique' => true])
				->create();

			$this->table('dishes')
				->addColumn('restaurant_id', 'integer')
				->addColumn('name', 'string', ['limit' => 45])
				->addColumn('slug', 'string', ['limit' => 45])
				->addColumn('photo', 'string', ['limit' => 144, 'null' => true])
				->addColumn('price', 'decimal', ['precision' => 5, 'scale' => 2])
				->addColumn('description', 'text', ['null' => true])
				->addColumn('created_at', 'datetime', ['null' => true])
				->addColumn('updated_at', 'datetime', ['null' => true])
				->addForeignKey('restaurant_id', 'restaurants', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
				->addIndex(['restaurant_id', 'slug'], ['unique' => true])
				->create();

			$this->table('categories_dishes', ['id' => false, 'primary_key' => ['dish_id', 'category_id']])
				->addColumn('dish_id', 'integer')
				->addColumn('category_id', 'integer')
				->addForeignKey('dish_id', 'dishes', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
				->addForeignKey('category_id', 'categories', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
				->create();
    }
}
