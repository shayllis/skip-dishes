<?php
	namespace App\Model\Entity\Traits;

	use Cake\Routing\Router;

	trait ThumbTrait
	{
		protected function _getThumb()
		{
			$photo = $this->get('photo');

			return $photo ? Router::url($photo, true) : null;
		}
	}
