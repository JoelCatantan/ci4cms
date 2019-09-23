<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
	public function up()
	{
		$this->forge
			->addField('created_at DATETIME NOT NULL')
			->addField('deleted_at DATETIME')
			->addField('email_address VARCHAR(100) NOT NULL')
			->addField('first_name VARCHAR(50) NOT NULL')
			->addField('id')
			->addField('last_name VARCHAR(50) NOT NULL')
			->addField('middle_name VARCHAR(50)')
			->addField('password VARCHAR(255) NOT NULL')
			->addField('role_id int(11) NOT NULL')
			->addField('salt VARCHAR(10) NOT NULL')
			->addField('updated_at DATETIME NOT NULL')
			->addField('username VARCHAR(25) NOT NULL')
			// ->addForeignKey('role_id', 'roles', 'id')
			->addKey('email_address', false, true)
			->addKey('username', false, true)
			->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
