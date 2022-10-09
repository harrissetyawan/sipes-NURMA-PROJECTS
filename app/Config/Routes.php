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
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LandingController');
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

// ------------ FETCH REQUEST

$routes->get('/getProvinsi', 'AuthenticationController::getDataWilayah');
$routes->post('/getKabupaten/(:num)', 'AuthenticationController::getKabupaten/$1');
$routes->post('/getKecamatan/(:num)', 'AuthenticationController::getKecamatan/$1');
$routes->post('/getDesa/(:num)', 'AuthenticationController::getDesa/$1');

$routes->get('/settings', 'PengaturanController::index', ['filter' => 'auth']);
$routes->post('/saveSettings/(:num)', 'PengaturanController::save/$1', ['filter' => 'auth']);

$routes->group('auth', function ($routes) {
    $routes->get('register', 'AuthenticationController::register');
    $routes->post('register/process', 'AuthenticationController::store');
    $routes->get('login', 'AuthenticationController::index');
    $routes->post('login/verify', 'AuthenticationController::verify');
    $routes->get('logout', 'AuthenticationController::logout');
});

$routes->group('landing', function ($routes) {
    $routes->get('/', 'LandingController::index');
    $routes->get('report', 'LandingController::report');
});

$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('register', 'SiswaController::register', ['filter' => 'auth']);
    $routes->post('register/store', 'SiswaController::register_store', ['filter' => 'auth']);
    $routes->get('profile', 'SiswaController::profile', ['filter' => 'auth']);
    $routes->get('seleksi', 'SiswaController::seleksi', ['filter' => 'auth']);
});

$routes->group('pengumuman', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'PengumumanController::index', ['filter' => 'auth']);
});

$routes->group('manage', ['filter' => 'auth'], function ($routes) {
    $routes->get('user', 'UserController::index', ['filter' => 'auth']);
    $routes->get('add/user', 'UserController::create', ['filter' => 'auth']);
    $routes->post('store/user', 'UserController::store', ['filter' => 'auth']);
    $routes->get('siswa', 'SiswaController::index', ['filter' => 'auth']);
    $routes->get('all-siswa', 'SiswaController::all_siswa', ['filter' => 'auth']);
});

$routes->group('profile-matching', ['filter' => 'auth'], function ($routes) {
    $routes->get('aspek', 'AspekController::index');
    $routes->get('aspek/create', 'AspekController::create');
    $routes->post('aspek/store', 'AspekController::store');
    $routes->get('aspek/edit/(:num)', 'AspekController::edit/$1');
    $routes->post('aspek/update/(:num)', 'AspekController::update/$1');
    $routes->delete('aspek/destroy/(:num)', 'AspekController::destroy/$1');

    $routes->get('faktor', 'FaktorController::index');
    $routes->get('faktor/create', 'FaktorController::create');
    $routes->post('faktor/store', 'FaktorController::store');
    $routes->get('faktor/edit/(:num)', 'FaktorController::edit/$1');
    $routes->post('faktor/update/(:num)', 'FaktorController::update/$1');
    $routes->delete('faktor/destroy/(:num)', 'FaktorController::destroy/$1');

    $routes->get('bobot', 'BobotController::index');
    $routes->get('bobot/create', 'BobotController::create');
    $routes->post('bobot/store', 'BobotController::store');
    $routes->get('bobot/edit/(:num)', 'BobotController::edit/$1');
    $routes->post('bobot/update/(:num)', 'BobotController::update/$1');
    $routes->delete('bobot/destroy/(:num)', 'BobotController::destroy/$1');

    $routes->get('seleksi', 'SeleksiController::index');
});

$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'HomeController::index');
    $routes->get('dashboard', 'HomeController::index');
});

$routes->group('cetak', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'CetakController::index');
    $routes->get('pendaftaran', 'CetakController::pendaftaran');
    $routes->get('kelulusan', 'CetakController::kelulusan');
});

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
