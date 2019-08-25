<?php
declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'password',
        'salt',
        'username',
    ];
    protected $returnType = 'App\Entities\UserEntity';
}
