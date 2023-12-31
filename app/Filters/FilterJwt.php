<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Exception;

class FilterJwt implements FilterInterface
{
	use ResponseTrait;

	public function before(RequestInterface $request, $arguments = null)
	{
		$header = $request->getServer('HTTP_AUTHORIZATION');

		try {
			helper('jwt');
			$encodedToken = getJWT($header);
			validateJWT($encodedToken);
			return $request;
		} catch (Exception $e) {
			return Services::response()->setJSON([
				'success' => false,
				'message' => $e->getMessage(),
			])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
