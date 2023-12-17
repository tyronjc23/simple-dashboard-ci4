<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\OrderModel;
use CodeIgniter\API\ResponseTrait;

class HomeController extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		$this->layout->title = 'Dashboard';
		return $this->layout->load('dashboard');
	}

	public function loginForm()
	{
		if (!empty($this->session->login)) {
			return redirect('/');
		}

		return view("login/login");
	}

	public function login()
	{
		$input = $this->getRequestInput($this->request);
		$employeeModel = new EmployeeModel();

		$loginData = $employeeModel->login($input['username'], $input['password']);
		if (empty($loginData)) {
			return $this->fail('Akun tidak ditemukan.', 404);
		}

		// CREATE TOKEN
		helper('jwt');
		$loginData['token'] = createJWT($input['username']);

		$this->session->start();
		$this->session->set('login', $loginData);

		return $this->respond(['success' => true, 'message' => 'login success', 'data' => $loginData]);
	}

	public function logout()
	{
		$this->session->remove('login');
		response()->redirect('loginForm');
	}

	public function getSales()
	{
		$input = $_GET;
		$orderModel = new OrderModel();
		$orderData = $orderModel->getSalesOrderByPeriod($input['period']);
		$sumOrderData = $orderModel->getSummarySalesByPeriod($input['period']);

		return $this->respond(['orderData' => $orderData, 'sumData' => $sumOrderData]);
	}
}
