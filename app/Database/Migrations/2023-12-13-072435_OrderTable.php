<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'employee_id'	=> ['type' => 'varchar', 'constraint' => 4, 'null' => false],
			'client_id'		=> ['type' => 'varchar', 'constraint' => 6, 'null' => false],
			'order_date'	=> ['type' => 'date', 'null' => false],
			'order_item'	=> ['type' => 'varchar', 'constraint' => 10, 'null' => false],
			'order_amount'	=> ['type' => 'int', 'constraint' => 11, 'null' => false]
		]);
		$this->forge->addPrimaryKey('id')
			->addKey(['id', 'employee_id', 'client_id', 'order_date', 'order_item']);
		$this->forge->createTable('order', true);
	}

	public function down()
	{
		$this->forge->dropTable('order', true);
	}
}
