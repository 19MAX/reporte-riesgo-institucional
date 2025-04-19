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
$routes->post('registro', 'UserController::registrar');
$routes->post('resetpassci', 'UserController::resetPassClient');
$routes->post('cambiarPass', 'UserController::cambiarPass');
$routes->post('assignCampus', 'UserController::asignarUsuarioACampus');

// Rutas para el InstitutosController
$routes->get('getInstitutos', 'InstitutosController::getInstitutos');
$routes->post('insertIes', 'InstitutosController::insertIes');
$routes->post('updateIes', 'InstitutosController::updateIes');
$routes->post('deleteIes', 'InstitutosController::deleteIes');

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
$routes->get('getAllCampus', 'CampusController::getAllCampus');
$routes->get('getCampus', 'CampusController::getCampus');
$routes->post('insertCampus', 'CampusController::insertCampus');
$routes->post('updateCampus', 'CampusController::updateCampus');
$routes->post('deleteCampus', 'CampusController::deleteCampus');

// Rutas para el FormulariosController
$routes->get('getFichasAll', 'FormulariosController::getFichasAll');
$routes->get('getFichaDetalle', 'FormulariosController::getFichaDetalle');
$routes->get('getFichaUser', 'FormulariosController::getFichaUser');

// Rutas para el PromediosController
$routes->get('getPromedios', 'PromediosController::getPromedios');

// ADMIN
$routes->group('admin', static function ($routes) {

    $routes->get('/', 'AdminController::index');

    $routes->group('fichas', static function ($fichas) {

        $fichas->get('/', 'Admin\PagosController::index');
        $fichas->get('(:num)', 'Admin\DepositosController::index/$1');
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


    $routes->group('users', static function ($users) {
        $users->get('/', 'Admin\UsersController::index');
        $users->get('getAllUsersWithoutPassword', 'Admin\UsersController::getAllUsersWithoutPassword');
        $users->get('add', 'Admin\UsersController::add');
        $users->post('updateUser', 'Admin\UsersController::updateUser');
        $users->post('deleteUser', 'Admin\UsersController::deleteUsers');
        $users->post('update', 'Admin\UsersController::update');
        $users->post('delete', 'Admin\UsersController::delete');
        $users->post('recover_password', 'Admin\UsersController::recoverPassword');

    });

    $routes->group('inscritos', static function ($inscritos) {
        $inscritos->get('/', 'Admin\RegistrationsController::allInscritos');
        $inscritos->post('update', 'Admin\InscripcionesController::update');
        $inscritos->post('delete', 'Admin\InscripcionesController::delete');
        $inscritos->get('trash', 'Admin\RegistrationsController::trash');
        $inscritos->post('restore', 'Admin\RegistrationsController::restore');
        $inscritos->post('deleteAll', 'Admin\RegistrationsController::deleteAll');
    });
    $routes->group('recaudaciones', static function ($recaudaciones){
        $recaudaciones->get('/', 'Admin\UsersController::recaudaciones');
        $recaudaciones->get('online', 'Admin\UsersController::online');
        $recaudaciones->get('usuarios', 'Admin\UsersController::all_recaudaciones');
        $recaudaciones->post('filtrar_recaudaciones', 'Admin\UsersController::all_recaudaciones');
    });

    $routes->group('category', static function ($categories) {
        $categories->get('/', 'Admin\CategoriesController::index');
        $categories->post('add', 'Admin\CategoriesController::add');
        $categories->post('update', 'Admin\CategoriesController::update');
        $categories->post('delete', 'Admin\CategoriesController::delete');
    });
});