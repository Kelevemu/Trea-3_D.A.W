<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



$routes->get('api/categorias', 'Api::categorias');
$routes->get('api/categorias/(:num)', 'Api::categoria/$1');

$routes->get('api/productos', 'Api::productos');
$routes->get('api/productos/(:num)', 'Api::producto/$1');
$routes->get('api/productos/categoria/(:num)', 'Api::productos_por_categoria/$1');
