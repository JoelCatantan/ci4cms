<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
	public function up()
	{
		$this->forge->addField('id')
					->addField('username VARCHAR(25) NOT NULL')
					->addField('password VARCHAR(255) NOT NULL')
					->addField('salt VARCHAR(10) NOT NULL')
					->addField('first_name VARCHAR(50) NOT NULL')
					->addField('last_name VARCHAR(50) NOT NULL')
					->addField('middle_name VARCHAR(50)')
					->addField('email_address VARCHAR(100) NOT NULL')
					->addField('created_at DATETIME NOT NULL')
					->addField('updated_at DATETIME NOT NULL')
					->addField('deleted_at DATETIME')
					->addKey('username', FALSE, TRUE)
					->addKey('email_address', FALSE, TRUE)
					->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
