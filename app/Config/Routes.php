<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index', ['filter' => 'login']);
$routes->get('/home', 'Home::index2');
$routes->get('/SuperAdmin', 'SA_User::index');
$routes->get('/SuperAdmin/(:any)', 'SA_User::viewUser/$1');
// $routes->get('/qcdoc', 'qcdoc::index');
$routes->add('qcdoc/new', 'SA_User::create');
$routes->add('/(:segment)/edit', 'SA_User::edit/$1');
$routes->get('qcdoc/(:segment)/delete', 'SA_User::delete/$1');


$routes->group('', ['filter' => 'permission:users'], function ($routes) {

    $routes->get('users', 'Users::index');
    $routes->get('users/index', 'Users::index');
    $routes->get('users/add-user',  'Users::add', ['filter' => 'permission:users.create']);
    $routes->add('users/save', 'Users::save', ['filter' => 'permission:users.create']);
    $routes->get('users/edit/(:segment)', 'Users::show_edit/$1', ['filter' => 'permission:users.edit']);
    $routes->add('users/edit-user/(:segment)', 'Users::store_edit/$1', ['filter' => 'permission:users.edit']);
    $routes->add('users/update-profile/(:segment)', 'Users::store_edit_profile/$1', ['filter' => 'permission:users.edit']);
    $routes->add('users/change-group', 'Users::changeGroup', ['filter' => 'permission:users.edit']);
    $routes->add('users/change-active', 'Users::changeActive', ['filter' => 'permission:users.edit']);
    $routes->get('users/delete/(:segment)', 'Users::delete/$1', ['filter' => 'permission:users.delete']);

    $routes->get('users/change-password/(:segment)', 'Users::show_password/$1', ['filter' => 'permission:users.edit']);
    $routes->add('users/change-password/(:segment)', 'Users::change_password/$1', ['filter' => 'permission:users.edit']);
});

$routes->group('', ['filter' => 'permission:menu'], function ($routes) {
    $routes->get('menu', 'Menu::index');
    $routes->add('menu', 'Menu::create');
    $routes->add('menu/edit/(:segment)', 'Menu::edit/$1');
    $routes->get('menu/delete/(:segment)', 'Menu::delete/$1');
});


// sub menu management
$routes->group('', ['filter' => 'permission:submenu'], function ($routes) {
    $routes->get('submenu', 'SubMenu::index');
    $routes->add('submenu', 'SubMenu::create');
    $routes->add('submenu/getMenuId', 'SubMenu::getMenuId');
    $routes->add('submenu/edit/(:segment)', 'SubMenu::edit/$1');
    $routes->get('submenu/delete/(:segment)', 'SubMenu::delete/$1');
});


// Rolesmanagement

$routes->group('', ['filter' => 'role:superadmin'], function ($routes) {
    $routes->get('roles', 'Roles::index');
    $routes->add('roles', 'Roles::create');
    $routes->add('roles/update/(:segment)', 'Roles::update/$1');
    $routes->get('roles/edit/(:segment)', 'Roles::show_edit/$1');
    $routes->add('roles/edit/(:segment)', 'Roles::edit/$1');
    $routes->add('roles/store_edit/(:segment)', 'Roles::store_edit/$1');

    $routes->get('roles/delete/(:segment)', 'Roles::delete/$1');
});



// qcdoc management
$routes->group('', ['filter' => 'permission:qcdoc'], function ($routes) {

    $routes->get('qcdoc', 'Qcdoc::index');
    $routes->get('qcdoc/create', 'Qcdoc::create_view', ['filter' => 'permission:qcdoc.create']);
    $routes->add('qcdoc/create', 'Qcdoc::store', ['filter' => 'permission:qcdoc.create']);
    $routes->get('qcdoc/view/(:segment)', 'Qcdoc::view/$1', ['filter' => 'permission:qcdoc.view']);
    $routes->get('qcdoc/edit/(:segment)', 'Qcdoc::edit_view/$1', ['filter' => 'permission:qcdoc.edit']);
    $routes->add('qcdoc/edit/(:segment)', 'Qcdoc::edit/$1', ['filter' => 'permission:qcdoc.edit']);
    $routes->get('qcdoc/delete/(:segment)', 'Qcdoc::delete/$1', ['filter' => 'permission:qcdoc.delete']);
    $routes->get('qcdoc/view/(:segment)', 'Qcdoc::view/$1', ['filter' => 'permission:qcdoc.view']);
    $routes->get('qcdoc/approval/(:segment)', 'Qcdoc::approval/$1', ['filter' => 'permission:qcdoc.view']);
    $routes->get('qcdoc/export/(:segment)', 'Qcdoc::export/$1', ['filter' => 'permission:qcdoc.view']);
    $routes->add('qcdoc/approval/(:segment)', 'Qcdoc::approval_action/$1', ['filter' => 'permission:qcdoc.view']);
    $routes->add('qcdoc/send-qc/(:segment)', 'Qcdoc::send_qc/$1', ['filter' => 'permission:qcdoc.view']);
    $routes->get('qcdoc/qrcode/(:segment)', 'Qcdoc::qrcode/$1', ['filter' => 'permission:qcdoc.view']);
});


// $routes->get('/', 'Dashboard::index');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
