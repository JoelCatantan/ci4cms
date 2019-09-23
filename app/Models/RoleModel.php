<?php
declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
	protected $table         = 'roles';
	protected $primaryKey    = 'id';
	protected $returnType    = 'App\Entities\Role';
	protected $allowedFields = ['display_name'];

	protected $useTimestamps  = true;
	protected $useSoftDeletes = true;
}
