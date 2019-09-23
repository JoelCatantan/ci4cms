<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleTableAndAdminRole extends Migration
{
	public function up()
	{
		$this->forge->addField('id INT(5) UNSIGNED')
					->addField('display_name VARCHAR(50) NOT NULL')
					->addField('description VARCHAR(255)')
					->addField('created_at DATETIME NOT NULL')
					->addField('updated_at DATETIME NOT NULL')
					->addField('deleted_at DATETIME')
					->addKey('id', false, true)
					->addKey('display_name', false, true)
					->createTable('roles');
	}

	public function down()
	{
		$this->forge->dropTable('roles');
	}
}
