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
*/$routes->get('/', 'Home::index');



$routes->group('public', function($routes){

    $routes->get('login','LoginController::log');
    $routes->post('login','LoginController::log_post');

    $routes->get('login_code','LoginController::login_code');
    $routes->post('login_code','LoginController::login_code_post');

});

$routes->group('matricula', function($routes){

    $routes->get('/', 'MatriculaController::matricula_view');
    $routes->post('/', 'MatriculaController::matricula_post');

    $routes->get('datos_alumne','MatriculaController::m_alumne_view');
    $routes->post('datos_alumne','MatriculaController::m_alumne_post');

    $routes->get('datos_curs','MatriculaController::m_curs_view');
    $routes->post('datos_curs','MatriculaController::m_curs_post');

    $routes->get('pago','MatriculaController::pago_view');
    $routes->post('pago','MatriculaController::pago_post');

    $routes->get('pago/pdf','MatriculaController::generar_pdf');

});