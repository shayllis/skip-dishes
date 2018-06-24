<?php
use Migrations\AbstractSeed;

/**
 * BootStrapSeeds seed.
 */
class BootStrapSeedsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
      $this->table('restaurants')
				->insert([
					[
						'id' => 1,
						'name' => 'Mon Made',
						'slug' => 'mon-made',
						'photo' => '/restaurants/mon-made/logo.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis, neque ac rhoncus efficitur, lacus enim vestibulum augue, ac accumsan eros ligula vel ipsum. Duis pulvinar tortor nisi, vitae imperdiet quam pretium et. Integer aliquet est sed malesuada sagittis. Nullam dapibus erat vitae bibendum condimentum.',
						'created_at' => '2018-06-24 13:00:00',
						'updated_at' => '2018-06-24 13:00:05',
						'lat' => -23.6132402,
						'long' => -46.6947827,17
					]
				])
				->saveData();

			$this->table('categories')
				->insert([
					[
						'id' => 1,
						'restaurant_id' => 1,
						'name' => 'Appetizer',
						'slug' => 'appetizer',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08'
					],
					[
						'id' => 2,
						'restaurant_id' => 1,
						'name' => 'Main Dishes',
						'slug' => 'main-dishes',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08'
					],
					[
						'id' => 3,
						'restaurant_id' => 1,
						'name' => 'Beverages',
						'slug' => 'beverages',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08'
					]
				])
				->saveData();

			$this->table('dishes')
				->insert([
					[
						'id' => 1,
						'restaurant_id' => 1,
						'name' => 'Mon Cake',
						'slug' => 'mon-cake',
						'photo' => '/restaurants/mon-made/dishes/mon-cake.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis.',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08',
						'price' => 9.60
					],
					[
						'id' => 2,
						'restaurant_id' => 1,
						'name' => 'Mon Pasta',
						'slug' => 'mon-pasta',
						'photo' => '/restaurants/mon-made/dishes/mon-pasta.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis.',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08',
						'price' => 22.10
					],
					[
						'id' => 3,
						'restaurant_id' => 1,
						'name' => 'Mon Soup',
						'slug' => 'mon-soup',
						'photo' => '/restaurants/mon-made/dishes/mon-soup.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis.',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08',
						'price' => 18.20
					],
					[
						'id' => 4,
						'restaurant_id' => 1,
						'name' => 'Mon Orange Juice',
						'slug' => 'mon-orange-juice',
						'photo' => '/restaurants/mon-made/dishes/mon-orange-juice.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis.',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08',
						'price' => 10.29
					],
					[
						'id' => 5,
						'restaurant_id' => 1,
						'name' => 'Mon Chocolate Milk',
						'slug' => 'mon-chocolate-milk',
						'photo' => '/restaurants/mon-made/dishes/mon-chocolate-milk.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis.',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08',
						'price' => 5.60
					],
					[
						'id' => 6,
						'restaurant_id' => 1,
						'name' => 'Mon Appetizer',
						'slug' => 'mon-appetizer',
						'photo' => '/restaurants/mon-made/dishes/mon-appetizer.jpg',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis.',
						'created_at' => '2018-06-24 13:00:08',
						'updated_at' => '2018-06-24 13:00:08',
						'price' => 10.29
					]
				])
				->saveData();

			$this->table('categories_dishes')
				->insert([
					[
						'category_id' => 1,
						'dish_id' => 6
					],
					[
						'category_id' => 2,
						'dish_id' => 1
					],
					[
						'category_id' => 2,
						'dish_id' => 2
					],
					[
						'category_id' => 2,
						'dish_id' => 3
					],
					[
						'category_id' => 3,
						'dish_id' => 4
					],
					[
						'category_id' => 3,
						'dish_id' => 5
					]
				])
				->saveData();

    }
}
