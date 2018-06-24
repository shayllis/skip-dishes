<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $restaurant_id
 * @property string $name
 * @property string $slug
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Restaurant $restaurant
 * @property \App\Model\Entity\CategoryDish[] $category_dishes
 */
class Category extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'restaurant_id' => true,
        'name' => true,
        'slug' => true,
        'created_at' => true,
        'updated_at' => true,
        'restaurant' => true,
        'category_dishes' => true
    ];
		protected $_hidden = ['_matchingData', '_joinData'];
}
