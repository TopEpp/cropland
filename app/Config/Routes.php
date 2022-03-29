<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Modules\Login\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/login/auth', 'Login::auth');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


$routes->group("house", ["namespace" => "Modules\House\Controllers"], function ($routes) {
	$routes->get("/", "House::index");
    $routes->get("manage", "House::manage");
    $routes->get("manage/members", "House::members");
    $routes->get("manage/jobs", "House::jobs");
    $routes->get("manage/benefits", "House::benefits");
    $routes->get("manage/accounts", "House::accounts");
    
});

$routes->group("land", ["namespace" => "Modules\Land\Controllers"], function ($routes) {
	$routes->get("/", "Land::index");
});

$routes->group("survay", ["namespace" => "Modules\Survay\Controllers"], function ($routes) {
	$routes->get("/", "Survay::index");
    $routes->get("manage", "Survay::manage");
    $routes->get("manage/land", "Survay::land");
    $routes->get("manage/promote", "Survay::promote");
    $routes->get("manage/promote-other", "Survay::promoteOther");
    $routes->get("manage/problem", "Survay::problem");
    $routes->get("manage/need", "Survay::need");
});


$routes->group("member", ["namespace" => "Modules\User\Controllers"], function ($routes) {
	$routes->get("/", "User::index");
});


$routes->group("dashboard", ["namespace" => "Modules\Dashboard\Controllers"], function ($routes) {
	$routes->get("/", "Dashboard::index");
    $routes->get("index1", "Dashboard::index1");
    $routes->get("index2", "Dashboard::index2");
    $routes->get("index3", "Dashboard::index3");
    $routes->get("index4", "Dashboard::index4");
    $routes->get("index5", "Dashboard::index5");
    $routes->get("index6", "Dashboard::index6");
    $routes->get("index7", "Dashboard::index7");

});