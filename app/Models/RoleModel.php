<?php
declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
	use TraitsDropdownoptions;

	protected $table         = 'roles';
	protected $primaryKey    = 'id';
	protected $returnType    = 'App\Entities\Role';
	protected $allowedFields = ['display_name', 'description'];

	protected $useTimestamps  = true;
	protected $useSoftDeletes = true;
}
