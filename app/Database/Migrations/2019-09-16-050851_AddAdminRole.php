<?php namespace App\Database\Migrations;

use App\Entities\Role;
use App\Models\RoleModel;
use CodeIgniter\Database\Migration;

class AddAdminRole extends Migration
{
	private $role_model;

	public function __construct()
	{
		$this->role_model = new RoleModel;
	}

	public function up()
	{
		$this->role_model->protect(false);

		$this->role_model->insert([
			'id'           => Role::ADMIN,
			'display_name' => 'Admin',
		]);

		$this->role_model->protect(true);
	}

	public function down()
	{
		$this->role_model
			->where('id', Role::ADMIN)
			->purgeDeleted();
	}
}
