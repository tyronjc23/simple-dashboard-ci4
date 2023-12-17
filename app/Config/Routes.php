<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/dashSales', 'HomeController::getSales');

// Login
$routes->get('/loginForm', 'HomeController::loginForm');
$routes->post('/login', 'HomeController::login');
$routes->get('/logout', 'HomeController::logout');

// API
$routes->group('api', function ($routes) {
	$routes->get('orders', 'APIController::getOrder');
});
