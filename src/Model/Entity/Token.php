<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Token extends Entity {

	/**
	 * Fields that can be mass assigned using newEmptyEntity() or patchEntity().
	 *
	 * @var array
	 */
	protected $_accessible = [
		'user_id' => true,
		'type' => true,
		'key' => true,
		'content' => true,
		'used' => true,
		'unlimited' => true,
		'user' => true,
	];

}
