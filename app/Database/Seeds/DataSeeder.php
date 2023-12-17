<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
	public function run()
	{
		$this->employeeData();
		$this->clientAndOrderData();
	}

	protected function employeeData()
	{
		$employeeTable = $this->db->table('employee');
		$employeeTable->truncate();

		$employees = [
			[
				'name' => 'Martin Lloyd',
				'phone' => '+62862503153370',
				'office' => 'Jakarta'
			],
			[
				'name' => 'John Hobson',
				'phone' => '+62813105750',
				'office' => 'Jakarta'
			],
			[
				'name' => 'Boris Baker',
				'phone' => '+62866541918',
				'office' => 'Jakarta'
			],
			[
				'name' => 'Margot Sinclair',
				'phone' => '+628981644343',
				'office' => 'Bogor'
			],
			[
				'name' => 'Alessandra Fall',
				'phone' => '+62828806332',
				'office' => 'Bogor'
			],
			[
				'name' => 'Doug Callan',
				'phone' => '+62881180462',
				'office' => 'Bogor'
			],
			[
				'name' => 'Elisabeth Nanton',
				'phone' => '+62853343115623',
				'office' => 'Bandung'
			],
			[
				'name' => 'Bob Carter',
				'phone' => '+62853255099',
				'office' => 'Bandung'
			],
			[
				'name' => 'Livia Roberts',
				'phone' => '+62889648234',
				'office' => 'Bandung'
			],
			[
				'name' => 'Jane Bell',
				'phone' => '+62898999762059',
				'office' => 'Jakarta'
			]
		];

		foreach ($employees as $key => $employee) {
			$id = 'S' . str_pad(++$key, 3, '0', STR_PAD_LEFT);
			$employeeTable->insert([
				'id' => $id,
				'name' => $employee['name'],
				'email' => str_replace(' ', '.', strtolower($employee['name'])) . '@office.com',
				'password' => md5($id),
				'phone' => $employee['phone'],
				'office' => $employee['office']
			]);
		}

		$employeeTable->insert([
			'id' => 'S011',
			'name' => 'admin',
			'email' => 'admin@office.com',
			'password' => md5('admin'),
			'phone' => 0,
			'office' => 'Bandung'
		]);
	}

	protected function clientAndOrderData()
	{
		$clientTable = $this->db->table('client');
		$orderTable = $this->db->table('order');
		$clientTable->truncate();
		$orderTable->truncate();

		// PARSING CSV DATA
		$file = fopen(ROOTPATH . "data-test.csv", "r");

		$row = 0;
		while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
			if ($row === 0) {
				$row++;
				continue;
			} else {
				if ($data[0] === '') continue;

				$clientTable->insert([
					'id' => $data[9],
					'name' => $data[10],
					'email' => $data[11],
					'phone' => preg_replace('/[\s-]+/', '', $data[12]),
				]);

				$orderTable->insert([
					'employee_id' => $data[1],
					'client_id' => $data[9],
					'order_date' => date('Y-m-d', strtotime($data[6])),
					'order_item' => $data[7],
					'order_amount' => str_replace('Rp', '', preg_replace('/,/', '.', preg_replace('/\./', '', $data[8]))),
				]);
			}
		};

		fclose($file);
	}
}
