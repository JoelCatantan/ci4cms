<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\User';
    protected $allowedFields = [
        'email_address',
        'first_name',
        'last_name',
        'username',
    ];

    protected $useTimestamps = TRUE;
    protected $useSoftDeletes = TRUE;
}
