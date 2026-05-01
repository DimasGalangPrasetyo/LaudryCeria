<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ─── Redirect root ke login ───────────────────────────────
$routes->get('/', function() {
    return redirect()->to('/login');
});

// ─── Auth ─────────────────────────────────────────────────
$routes->get('/login', 'Auth\AuthController::login');
$routes->post('/login', 'Auth\AuthController::processLogin');
$routes->get('/logout', 'Auth\AuthController::logout', ['filter' => 'auth']);

// ─── Owner ────────────────────────────────────────────────
$routes->group('owner', ['filter' => 'auth:owner', 'namespace' => 'App\Controllers\Owner'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// ─── Kepala Cabang ────────────────────────────────────────
$routes->group('kepala', ['filter' => 'auth:kepala_cabang'], function($routes) {
    $routes->get('dashboard', 'KepalaController::index');
});

// ─── Kasir ────────────────────────────────────────────────
$routes->group('kasir', ['filter' => 'auth:kasir'], function($routes) {
    $routes->get('dashboard', 'KasirController::index');
});

// ─── Operator ─────────────────────────────────────────────
$routes->group('operator', ['filter' => 'auth:operator'], function($routes) {
    $routes->get('dashboard', 'OperatorController::index');
});