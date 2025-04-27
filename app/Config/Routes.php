<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');

use App\Controllers\Books;
use App\Controllers\Pages;

$routes->get('library', [Books::class, 'index']); //list of books
$routes->get('library/new', [Books::class, 'new']); //shows create form
$routes->get('library/create',[Books::class, 'create']); //post request to save a new book
$routes->get('library/(:segment)', [Books::class, 'show']); //show single book
$routes->post('library/create', [Books::class, 'create']); //send create form to server
$routes->get('library/edit/(:num)', [Books::class, 'edit']); //show edit form (:num) stand for book id
$routes->post('library/update/(:num)', [Books::class, 'update']); //send update to server

$routes->get('library/delete/(:num)', [Books::class, 'delete']); //show deletion form
$routes->post('library/confirm/(:num)', [Books::class, 'confirm']); //send server deletion confirmation

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
$routes->get('home', 'Pages::view');