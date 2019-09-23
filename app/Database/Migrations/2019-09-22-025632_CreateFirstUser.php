<?php
declare(strict_types=1);

namespace App\Database\Migrations;

use App\Entities\Role;
use App\Models\UserModel;
use CodeIgniter\Database\Migration;

class CreateFirstUser extends Migration
{
	public function up()
	{
		$user_model = new UserModel;

		$user_model->save([
			'email_address' => 'admin@email.com',
			'first_name'    => 'admin',
			'last_name'     => 'admin',
			'username'      => 'admin',
			'role_id'       => Role::ADMIN,
		]);

		$user = $user_model
			->select('id')
			->first();

		$user->setDefaultPassword();

		$user_model->protect(false);
		$user_model->save($user);
		$user_model->protect(true);
	}

	public function down()
	{
		(new UserModel)
			->where('username', 'admin')
			->delete();
	}
}
