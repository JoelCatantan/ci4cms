<?php declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity;

class Role extends Entity
{
	const DEVELOPER = 10000;
	const ADMIN     = 10001;
}
