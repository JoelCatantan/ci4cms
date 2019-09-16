<?php
declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $allowedFields = ['display_name'];
    protected $returnType = 'App\Entities\RoleEntity';
    protected $useTimestamps = true;

    const ADMIN = 10000;
    const DEVELOPER = 10001;
}
