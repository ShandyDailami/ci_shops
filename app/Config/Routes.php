<?php

use App\Controllers\Admin;
use App\Controllers\Auth;
use App\Controllers\Cashier;
use App\Controllers\Category;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', function ($routes) {
  $routes->get('/', [Auth::class, 'index']);
  $routes->get('/login', [Auth::class, 'loginPage']);
  $routes->post('/login', [Auth::class, 'login']);
  $routes->get('/logout', [Auth::class, 'logout']);
});
$routes->group('category', function ($routes) {
  $routes->get('list', [Category::class, 'index']);
});

$routes->group('admin', ['filters' => 'role:admin'], function ($routes) {
  $routes->get('dashboard', [Admin::class, 'dashboard']);
});

$routes->group('cashier', ['filters' => 'role:cashier'], function ($routes) {
  $routes->get('dashboard', [Cashier::class, 'dashboard']);
});