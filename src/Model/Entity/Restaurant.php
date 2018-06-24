<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Routing\Router;

use App\Model\Entity\Traits\ThumbTrait;

/**
* Restaurant Entity
*
* @property int $id
* @property string $name
* @property string $slug
* @property string $photo
* @property string $description
* @property float $lat
* @property float $long
* @property \Cake\I18n\FrozenTime $created_at
* @property \Cake\I18n\FrozenTime $updated_at
*
* @property \App\Model\Entity\Category[] $categories
* @property \App\Model\Entity\Dish[] $dishes
*/
class Restaurant extends Entity
{
	use ThumbTrait;
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
		'name' => true,
		'slug' => true,
		'photo' => true,
		'description' => true,
		'lat' => true,
		'long' => true,
		'created_at' => true,
		'updated_at' => true,
		'categories' => true,
		'dishes' => true
	];

	protected $_virtual = ['thumb'];
	protected $_hidden = ['_matchingData', '_joinData'];
}
