<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication Routing ---- Removed 

$routes->group('admin', function ($routes) {
	// $routes->add('login', 'Admin\Security\Guest::login');
	$routes->get('login', 'Admin\Security\Guest::show_auth_login');
	$routes->post('login', 'Admin\Security\Guest::show_auth_login');
	$routes->get('dashboard', 'Admin\Dashboard::dashboard');

	// users
	$routes->get('users', 'Admin\Users::index');
	$routes->get('create-user', 'Admin\Users::createuser');
	$routes->post('create-user', 'Admin\Users::createuser');
	$routes->get('edit-user/(:any)', 'Admin\Users::edituser/$1');
	$routes->post('edit-user/(:any)', 'Admin\Users::edituser/$1');
	$routes->get('delete-user/(:any)', 'Admin\Users::deleteuser/$1');
	$routes->post('delete-user/(:any)', 'Admin\Users::deleteuser/$1');

	// user-types
	$routes->get('user-types', 'Admin\UserTypes::index');
	$routes->get('create-user-type', 'Admin\UserTypes::createusertype');
	$routes->post('create-user-type', 'Admin\UserTypes::createusertype');
	$routes->get('edit-user-type/(:any)', 'Admin\UserTypes::editusertype/$1');
	$routes->post('edit-user-type/(:any)', 'Admin\UserTypes::editusertype/$1');
	$routes->get('delete-user-type/(:any)', 'Admin\UserTypes::deleteusertype/$1');
	$routes->post('delete-user-type/(:any)', 'Admin\UserTypes::deleteusertype/$1');

	// product-types
	$routes->get('product-types', 'Admin\ProductTypes::index');
	$routes->get('create-product-type', 'Admin\ProductTypes::createproducttype');
	$routes->post('create-product-type', 'Admin\ProductTypes::createproducttype');
	$routes->get('edit-product-type/(:any)', 'Admin\ProductTypes::editproducttype/$1');
	$routes->post('edit-product-type/(:any)', 'Admin\ProductTypes::editproducttype/$1');
	$routes->get('delete-product-type/(:any)', 'Admin\ProductTypes::deleteproducttype/$1');
	$routes->post('delete-product-type/(:any)', 'Admin\ProductTypes::deleteproducttype/$1');

	// product
	$routes->get('products', 'Admin\Products::index');
	$routes->get('create-product', 'Admin\Products::createproduct');
	$routes->post('create-product', 'Admin\Products::createproduct');
	$routes->get('edit-product/(:any)', 'Admin\Products::editproduct/$1');
	$routes->post('edit-product/(:any)', 'Admin\Products::editproduct/$1');
	// $routes->get('delete-product/(:any)', 'Admin\Products::deleteproduct/$1');
	// $routes->post('delete-product/(:any)', 'Admin\Products::deleteproduct/$1');
	$routes->get('manage-product-types/(:any)', 'Admin\Products::manageproducttypes/$1');
	$routes->post('manage-product-types/(:any)', 'Admin\Products::manageproducttypes/$1');

	// product-materials
	$routes->get('product-materials', 'Admin\ProductMaterials::index');
	$routes->get('create-product-material', 'Admin\ProductMaterials::createproductmaterial');
	$routes->post('create-product-material', 'Admin\ProductMaterials::createproductmaterial');
	$routes->get('edit-product-material/(:any)', 'Admin\ProductMaterials::editproductmaterial/$1');
	$routes->post('edit-product-material/(:any)', 'Admin\ProductMaterials::editproductmaterial/$1');
	$routes->get('delete-product-material/(:any)', 'Admin\ProductMaterials::deleteproductmaterial/$1');
	$routes->post('delete-product-material/(:any)', 'Admin\ProductMaterials::deleteproductmaterial/$1');


	// work-categories
	$routes->get('work-categories', 'Admin\WorkCategories::index');
	$routes->get('create-work-category', 'Admin\WorkCategories::createworkcategory');
	$routes->post('create-work-category', 'Admin\WorkCategories::createworkcategory');
	$routes->get('edit-work-category/(:any)', 'Admin\WorkCategories::editworkcategory/$1');
	$routes->post('edit-work-category/(:any)', 'Admin\WorkCategories::editworkcategory/$1');
	$routes->get('delete-work-category/(:any)', 'Admin\WorkCategories::deleteworkcategory/$1');
	$routes->post('delete-work-category/(:any)', 'Admin\WorkCategories::deleteworkcategory/$1');

	// works
	$routes->get('works-lists', 'Admin\Works::index');
	$routes->get('create-work', 'Admin\Works::creatework');
	$routes->post('create-work', 'Admin\Works::creatework');
	$routes->get('edit-work/(:any)', 'Admin\Works::editwork/$1');
	$routes->post('edit-work/(:any)', 'Admin\Works::editwork/$1');
	$routes->get('delete-work/(:any)', 'Admin\Works::deletework/$1');
	$routes->post('delete-work/(:any)', 'Admin\Works::deletework/$1');

	// service
	$routes->get('service-lists', 'Admin\Services::index');
	$routes->get('create-service', 'Admin\Services::createservice');
	$routes->post('create-service', 'Admin\Services::createservice');
	$routes->get('edit-service/(:any)', 'Admin\Services::editservice/$1');
	$routes->post('edit-service/(:any)', 'Admin\Services::editservice/$1');
	$routes->get('delete-service/(:any)', 'Admin\Services::deleteservice/$1');
	$routes->post('delete-service/(:any)', 'Admin\Services::deleteservice/$1');

	// service
	$routes->get('service-feature-lists', 'Admin\ServiceFeatures::index');
	$routes->get('create-service-feature', 'Admin\ServiceFeatures::createservicefeature');
	$routes->post('create-service-feature', 'Admin\ServiceFeatures::createservicefeature');
	$routes->get('edit-service-feature/(:any)', 'Admin\ServiceFeatures::editservicefeature/$1');
	$routes->post('edit-service-feature/(:any)', 'Admin\ServiceFeatures::editservicefeature/$1');
	$routes->get('delete-service-feature/(:any)', 'Admin\ServiceFeatures::deleteservicefeature/$1');
	$routes->post('delete-service-feature/(:any)', 'Admin\ServiceFeatures::deleteservicefeature/$1');

	// abouts
	$routes->get('abouts', 'Admin\Abouts::index');
	$routes->get('edit-about/(:any)', 'Admin\Abouts::editabout/$1');
	$routes->post('edit-about/(:any)', 'Admin\Abouts::editabout/$1');

	// contact
	$routes->get('contacts', 'Admin\Contacts::index');
	$routes->get('edit-contact/(:any)', 'Admin\Contacts::editcontact/$1');
	$routes->post('edit-contact/(:any)', 'Admin\Contacts::editcontact/$1');

	// contacts-lists
	$routes->get('contacts-lists', 'Admin\Contacts::contactslists');

	// banners
	$routes->get('banners-lists', 'Admin\Banners::index');
	$routes->get('create-banner', 'Admin\Banners::createbanner');
	$routes->post('create-banner', 'Admin\Banners::createbanner');
	$routes->get('edit-banner/(:any)', 'Admin\Banners::editbanner/$1');
	$routes->post('edit-banner/(:any)', 'Admin\Banners::editbanner/$1');
	$routes->get('delete-banner/(:any)', 'Admin\Banners::deletebanner/$1');
	$routes->post('delete-banner/(:any)', 'Admin\Banners::deletebanner/$1');

	// features
	$routes->get('features-lists', 'Admin\Features::index');
	$routes->get('create-feature', 'Admin\Features::createfeature');
	$routes->post('create-feature', 'Admin\Features::createfeature');
	$routes->get('edit-feature/(:any)', 'Admin\Features::editfeature/$1');
	$routes->post('edit-feature/(:any)', 'Admin\Features::editfeature/$1');
	$routes->get('delete-feature/(:any)', 'Admin\Features::deletefeature/$1');
	$routes->post('delete-feature/(:any)', 'Admin\Features::deletefeature/$1');

	// contents-lists
	$routes->get('contents-lists', 'Admin\Contents::index');
	$routes->get('edit-contents/(:any)', 'Admin\Contents::editcontents/$1');
	$routes->post('edit-contents/(:any)', 'Admin\Contents::editcontents/$1');
});


$routes->get('', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('projects', 'Home::projects');
$routes->get('services/(:any)', 'Home::services/$1');
$routes->get('works', 'Home::works');
$routes->get('projects-details/(:any)', 'Home::projectsdetails/$1');
$routes->get('products', 'Home::products');
$routes->get('products/(:any)', 'Home::products/$1');
$routes->get('contact', 'Home::contact');
$routes->post('contact', 'Home::contact');
// $routes->get('login', 'Admin\Security\Guest::show_auth_login');





/**
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
