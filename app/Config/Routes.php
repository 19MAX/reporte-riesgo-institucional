<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Auth
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

//Token Csrf
$routes->get('getNewCsrfToken', 'CsrfController::getNewCsrfToken');


// ADMIN
$routes->group('admin', static function ($routes) {

    $routes->get('/', 'AdminController::index');

    $routes->group('fichas', static function ($fichas) {

        $fichas->get('/', 'FichasController::index');
        $fichas->get('(:num)', 'Admin\FichasController::index/$1');
        $fichas->get('getFichasAll', 'FichasController::getFichasAll');
        $fichas->get('getFichaDetalle/(:num)', 'FichasController::getFichaDetalle/$1');
        $fichas->get('obtenerPromediosPorIdFicha/(:num)', 'Admin\FichasController::obtenerPromediosPorIdFicha/$1');
        $fichas->get('getCampus', 'FichasController::getCampus');
        $fichas->get('seleccionar', 'FichasController::select');

    });


    $routes->group('formulario', static function ($forms) {
        $forms->get('(:num)', 'FormsController::index/$1');
        $forms->get('getSede/(:num)', 'FormsController::getSede/$1');
        $forms->post('insertFichas', 'FormsController::insertFichas');
        $forms->post('update', 'FormsController::update');
        $forms->post('delete', 'FormsController::delete');
    });

    $routes->group('users', static function ($users) {
        $users->get('/', 'Admin\UsersController::index');
        $users->get('getAllUsersWithoutPassword', 'Admin\UsersController::getAllUsersWithoutPassword');
        $users->get('add', 'Admin\UsersController::add');
        $users->post('registro', 'Admin\UsersController::registrar');
        $users->post('updateUser', 'Admin\UsersController::updateUser');
        $users->post('updatePassword', 'Admin\UsersController::updatePassword');
        $users->post('deleteUser', 'Admin\UsersController::deleteUsers');
        $users->post('update', 'Admin\UsersController::update');
        $users->post('delete', 'Admin\UsersController::delete');
        $users->post('recover_password', 'Admin\UsersController::recoverPassword');

    });

    $routes->group('campus', static function ($campus) {
        $campus->get('(:num)', 'CampusController::index/$1');
        $campus->get('getAllCampus', 'CampusController::getAllCampus');
        $campus->get('getCampusSelect', 'CampusController::getCampusSelect');
        $campus->post('add', 'CampusController::add');
        $campus->post('update', 'CampusController::update');
        $campus->post('delete', 'CampusController::delete');
    });

    $routes->group('institutos', static function ($institutos) {
        $institutos->get('/', 'InstitutosController::index');
        $institutos->get('getInstitutos', 'InstitutosController::getInstitutos');
        $institutos->get('getInstitutosSelect', 'InstitutosController::getInstitutosSelect');
        $institutos->get('add', 'InstitutosController::addView');
        $institutos->post('insertIes', 'InstitutosController::insertIes');
        $institutos->post('updateIes', 'InstitutosController::updateIes');
        $institutos->post('deleteIes', 'InstitutosController::deleteIes');
    });

    $routes->group('sede', static function ($sede) {
        $sede->get('(:num)', 'SedeController::index/$1');
        $sede->get('getSede/(:num)', 'SedeController::getSede/$1');
        $sede->post('add', 'SedeController::add');
        $sede->post('update', 'SedeController::update');
        $sede->post('delete', 'SedeController::delete');
    });

});