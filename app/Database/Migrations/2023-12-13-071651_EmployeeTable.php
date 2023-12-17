<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'			=> ['type' => 'varchar', 'constraint' => 4, 'null' => false],
			'name'			=> ['type' => 'varchar', 'constraint' => 50, 'null' => false],
			'email'			=> ['type' => 'varchar', 'constraint' => 50, 'null' => false],
			'password'		=> ['type' => 'varchar', 'constraint' => 50, 'null' => false],
			'phone'			=> ['type' => 'varchar', 'constraint' => 20, 'null' => false],
			'office'		=> ['type' => 'varchar', 'constraint' => 20, 'null' => false]
		]);
		$this->forge->addPrimaryKey('id')
			->addKey(['id', 'name', 'email', 'office']);
		$this->forge->createTable('employee', true);
	}

	public function down()
	{
		$this->forge->dropTable('employee', true);
	}
}
