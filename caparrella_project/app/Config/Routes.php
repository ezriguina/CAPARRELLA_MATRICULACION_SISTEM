<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
//matrciula 
/*
$routes->get('matricula','MatriculaController::index');// bug acces 
$routes->post('matricula','MatriculaController::index_post');
*/
$routes->get('matricula','MatriculaController::matricula_view');// bug acces 
$routes->post('matricula','MatriculaController::matricula_post');

$routes->get('matricula/datos_alumne','MatriculaController::m_alumne_view');
$routes->post('matricula/datos_alumne','MatriculaController::m_alumne_post');
$routes->get('matricula/datos_curs','MatriculaController::m_curs_view');
$routes->post('matricula/datos_curs','MatriculaController::m_curs_post');
//login public 
$routes->get('public/login','LoginController::log');
$routes->post('public/login','LoginController::log_post');
$routes->get('public/login_code','LoginController::login_code');
$routes->post('public/login_code','LoginController::login_code_post');

//filter 
$routes->get('userdemo/login', 'UserDemo::login');
$routes->post('userdemo/auth', 'UserDemo::auth');
$routes->get('userdemo/logout', 'UserDemo::logout');

// Ruta protegida simple
$routes->get('userdemo/dashboard', 'UserDemo::dashboard', ['filter' => 'autentica']);

// Ruta protegida amb arguments (Exemple del teu codi)
// Només deixa passar si el session('name') és "Admin" o "SuperUser"
$routes->get('userdemo/vip', 'UserDemo::vip', ['filter' => 'autentica:Admin,SuperUser']);