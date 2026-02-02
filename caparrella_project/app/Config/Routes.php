<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('matricula/','MatriculaController::index');
$routes->get('public/login','LoginController::log');
$routes->post('public/login','LoginController::log_post');

