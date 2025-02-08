<?php

use App\Controllers\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', function ($routes) {
  $routes->get('/login', [Auth::class, 'loginPage']);
  $routes->post('/login', [Auth::class, 'login']);
  $routes->get('/logout', [Auth::class, 'logout']);
});