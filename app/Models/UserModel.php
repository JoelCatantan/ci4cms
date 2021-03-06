<?php
declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table         = 'users';
	protected $primaryKey    = 'id';
	protected $returnType    = 'App\Entities\User';
	protected $allowedFields = [
		'email_address',
		'first_name',
		'last_name',
		'role_id',
		'username',
	];

	protected $useTimestamps  = true;
	protected $useSoftDeletes = true;
}
