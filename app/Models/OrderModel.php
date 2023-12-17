<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
	protected $table            = 'order';
	protected $primaryKey       = 'id';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['employee_id', 'client_id', 'order_date', 'order_item', 'order_amount'];

	// Dates
	protected $useTimestamps = false;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert   = [];
	protected $afterInsert    = [];
	protected $beforeUpdate   = [];
	protected $afterUpdate    = [];
	protected $beforeFind     = [];
	protected $afterFind      = [];
	protected $beforeDelete   = [];
	protected $afterDelete    = [];

	public function getSalesOrderByPeriod(string $period): array
	{
		$data = [];
		$date = explode(' s.d ', $period);

		$this->select("order.*, tab2.name sales_name, tab2.phone sales_phone, tab2.email sales_email, tab2.office, tab3.name client_name, tab3.email client_email, tab3.phone client_phone")
			->join("employee tab2", "order.employee_id=tab2.id")
			->join("client tab3", "order.client_id=tab3.id")
			->where("order.order_date BETWEEN '$date[0]' AND '$date[1]'");

		$data = $this->get()->getResultArray();

		return $data;
	}

	public function getSummarySalesByPeriod(string $period): array
	{
		$data = [];
		$date = explode(' s.d ', $period);

		$this->select("order.*, tab2.name sales_name, tab2.phone sales_phone, tab2.email sales_email, tab2.office, tab3.name client_name, tab3.email client_email, tab3.phone client_phone, SUM(order.order_amount) total_sales")
			->join("employee tab2", "order.employee_id=tab2.id")
			->join("client tab3", "order.client_id=tab3.id")
			->where("order.order_date BETWEEN '$date[0]' AND '$date[1]'")
			->groupBy("order.employee_id");

		$data = $this->get()->getResultArray();

		return $data;
	}

	public function getSalesOrderByEmployeeId(string $employeeId): array
	{
		$data = [];

		$this->select("order.*, tab2.name sales_name, tab2.phone sales_phone, tab2.email sales_email, tab2.office, tab3.name client_name, tab3.email client_email, tab3.phone client_phone")
			->join("employee tab2", "order.employee_id=tab2.id")
			->join("client tab3", "order.client_id=tab3.id")
			->where("order.employee_id", $employeeId);

		$data = $this->get()->getResultArray();

		return $data;
	}
}
