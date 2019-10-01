<?php declare(strict_types=1);

namespace App\Entities;

class Role extends BaseEntity
{
	use TraitsTimetimes;
	use TraitsDeletedAt;

	protected $casts = ['id' => 'int'];
	protected $dates = [];

	const DEVELOPER = 10000;
	const ADMIN     = 10001;
}
