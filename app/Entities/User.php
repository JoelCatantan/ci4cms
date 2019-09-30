<?php declare(strict_types=1);

namespace App\Entities;

use App\Libraries\Hash;
use App\Entities\BaseEntity;

class User extends BaseEntity
{
	protected $casts = ['id' => 'int'];
	protected $dates = [];
	protected $attributes = [
        'email_address' => null,
        'first_name' => null,
        'id' => null,
        'last_name' => null,
        'password_hash' => null,
        'salt' => null,
        'username' => null,
    ];

	const DEFAULT_PASSWORD = '123456';

	public function setPassword(string $password): self
	{
		$password_hashed = Hash::generate($password);

		$this->attributes['password'] = $password_hashed['password'];
		$this->attributes['salt'] = $password_hashed['salt'];

		return $this;
	}

	public function setDefaultPassword(): void
	{
		$this->setPassword(self::DEFAULT_PASSWORD);
	}
}
