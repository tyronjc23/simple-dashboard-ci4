<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use CodeIgniter\API\ResponseTrait;

class ApiController extends BaseController
{
    use ResponseTrait;

    public function getOrder()
    {
        $orderModel = new OrderModel();
        $loginData = $this->session->login;
        $orders = $orderModel->getSalesOrderByEmployeeId($loginData['id']);

        return $this->respond([
            'success' => true,
            'data' => $orders
        ]);
    }
}
