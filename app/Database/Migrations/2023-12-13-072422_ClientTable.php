<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'		=> ['type' => 'varchar', 'constraint' => 6, 'null' => false],
			'name'		=> ['type' => 'varchar', 'constraint' => 50, 'null' => false],
			'email'		=> ['type' => 'varchar', 'constraint' => 50, 'null' => false],
			'phone'		=> ['type' => 'varchar', 'constraint' => 20, 'null' => false]
		]);
		$this->forge->addPrimaryKey('id')
			->addKey(['id', 'name', 'email']);
		$this->forge->createTable('client', true);
	}

	public function down()
	{
		$this->forge->dropTable('client', true);
	}
}
