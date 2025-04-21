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


// Rutas para el UserController
$routes->get('getUserData', 'UserController::getUserData');
$routes->get('getAllUsers', 'UserController::getAllUsers');
$routes->post('login', 'UserController::login');
$routes->post('resetpassci', 'UserController::resetPassClient');
$routes->post('cambiarPass', 'UserController::cambiarPass');
$routes->post('assignCampus', 'UserController::asignarUsuarioACampus');

// Rutas para el InstitutosController
$routes->get('getInstitutos', 'InstitutosController::getInstitutos');

// Rutas para el FichasController
$routes->get('getIdCampus', 'FichasController::getIdCampus');
$routes->get('getAnalistas', 'FichasController::getAnalistas');
$routes->post('insertFichas', 'FichasController::insertFichas');

// Rutas para el SedeController
$routes->get('getSede', 'SedeController::getSede');
$routes->post('insertSede', 'SedeController::insertSede');
$routes->post('updateSede', 'SedeController::updateSede');
$routes->post('deleteSede', 'SedeController::deleteSede');

// Rutas para el CampusController
$routes->get('getCampus', 'CampusController::getCampus');
$routes->post('insertCampus', 'CampusController::insertCampus');
$routes->post('updateCampus', 'CampusController::updateCampus');
$routes->post('deleteCampus', 'CampusController::deleteCampus');

// Rutas para el FormulariosController
$routes->get('getFichaDetalle', 'FormulariosController::getFichaDetalle');
$routes->get('getFichaUser', 'FormulariosController::getFichaUser');

// Rutas para el PromediosController
$routes->get('getPromedios', 'PromediosController::getPromedios');

// ADMIN
$routes->group('admin', static function ($routes) {

    $routes->get('/', 'AdminController::index');

    $routes->group('fichas', static function ($fichas) {

        $fichas->get('/', 'FichasController::index');
        $fichas->get('(:num)', 'Admin\FichasController::index/$1');
        $fichas->get('getFichasAll', 'FichasController::getFichasAll');
        $fichas->get('getDatosPgDeposito/(:num)', 'Admin\DepositosController::getDatosPagoDeposito/$1');
        $fichas->post('actualizarEstado/', 'Admin\DepositosController::actualizarEstado');
        $fichas->get('obtener_depositos/(:num)', 'Admin\DepositosController::obtenerDeposito/$1');
        $fichas->post('aprobar/', 'Admin\DepositosController::aprobar_deposito');
        $fichas->post('incompleto/', 'Admin\DepositosController::pago_incompleto');
        $fichas->post('rechazar/', 'Admin\DepositosController::rechazar');
        $fichas->get('verificarDepositoRechazado/(:num)', 'Admin\DepositosController::verificarDepositoRechazado/$1');
        $fichas->get('verificarDepositoIncompleto/(:num)', 'Admin\DepositosController::verificarDepositoIncompleto/$1');

        $fichas->get('completados', 'Admin\PagosController::completados');
        $fichas->get('rechazados', 'Admin\PagosController::rechazados');
        $fichas->get('incompletos', 'Admin\PagosController::incompletos');
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
        $campus->post('add', 'CampusController::add');
        $campus->post('update', 'CampusController::update');
        $campus->post('delete', 'CampusController::delete');
    });

    $routes->group('institutos', static function ($institutos) {
        $institutos->get('/', 'InstitutosController::index');
        $institutos->get('getInstitutos', 'InstitutosController::getInstitutos');
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