<?php

namespace App\Libraries;

use CodeIgniter\HTTP\ResponseInterface;

/**
 * Layout Class to create AdminLTE Layout
 * 
 * Automatically create AdminLTE v3 layout with navbar, sidebar, footer,
 * and control sidebar
 * 
 * @property string $title
 * 
 * @method $this load()
 */
class Layout
{
	/**
	 * Page Title
	 * 
	 * @var string
	 */
	public $title;

	public function load(string $view, array $data = [])
	{
		$session = \Config\Services::session();

		$loginData = $session->login;

		if (is_null($loginData)) {
			return redirect('loginForm')->with(ResponseInterface::HTTP_REQUEST_TIMEOUT, "Sesi anda telah habis.");
		}

		$data['title'] = $this->title;
		$data['menus'] = $this->menus();
		$data['userdata'] = [
			'name' => $loginData['name'],
			'photo' => 'user.png',
			'email' => $loginData['email'],
			'office' => $loginData['office'],
		];

		return view($view, $data);
	}

	private function menus(): array
	{
		$menus = [
			[
				'title' => 'Dashboard',
				'icon' => 'fa-tachometer-alt',
				'link' => '/',
				'child' => [],
			],
		];

		return $menus;
	}
}
