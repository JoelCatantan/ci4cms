<?php declare(strict_types=1);

namespace App\Database\Seeds;

use App\Entities\Role;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$user_model = new UserModel;
		$user_model->protect(false);
		$total_users = 73;

		do
		{
			$email_address = 'admin' . ($total_users - 73) . '@email.com';

			$user_model->save([
				'email_address' => $email_address,
				'first_name'    => 'admin' . ($total_users - 73) . '',
				'last_name'     => 'admin' . ($total_users - 73) . '',
				'username'      => 'admin' . ($total_users - 73) . '',
				'role_id'       => Role::ADMIN,
			]);

			$user = $user_model
				->where('email_address', $email_address)
				->first();

			$user->setDefaultPassword();
			$user_model->save($user);

			$total_users--;
		}
		while ($total_users > 0);

		$user_model->protect(true);
	}
}
