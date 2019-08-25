<?php declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity;
use App\Libraries\Hash;

class UserEntity extends Entity
{
    protected $id;
    protected $username;
    protected $password;
    protected $salt;
    protected $first_name;
    protected $last_name;

    public function setPassword(string $password): UserEntity
    {
        $password_hashed = Hash::generate($password);

        $this->password = $password_hashed['password'];
        $this->salt = $password_hashed['salt'];

        return $this;
    }
}
