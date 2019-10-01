<?php declare(strict_types=1);

namespace App\Entities;

use App\Libraries\Hash;
use App\Entities\BaseEntity;
use App\Models\RoleModel;

class User extends BaseEntity
{
	use TraitsTimetimes;
	use TraitsDeletedAt;

	protected $casts = ['id' => 'int'];
	protected $dates = [];

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

	public function getRole()
	{
		return (new RoleModel)->getOptionDetailByID($this->role_id);
	}
}
