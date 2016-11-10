<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cobacoba'] = 'home/landing/';
$route['master/login'] = 'master/login';
$route['master'] = 'master/index';
$route['master_user'] = 'master/user';
$route['master_restaurant'] = 'master/restaurant';
$route['master_promo'] = 'master/promo';
$route['master_menu'] = 'master/menu';
$route['master_kartu_kredit'] = 'master/kartu_kredit';

$route['master_review/restaurant'] = 'master/master_review_restaurant';
$route['master_review/menu'] = 'master/master_review_menu';
$route['master/delete_review/(:any)'] = 'master/delete_review/$1';
$route['master/delete_review_restoran/(:any)'] = 'master/delete_review_restoran/$1';

$route['master_user/detail/user/(:any)'] = 'master/master_detail_user/$1';
$route['master_user/detail/restaurant/(:any)'] = 'master/master_detail_restaurant/$1';
$route['master_user/detail/promo/(:any)'] = 'master/master_detail_promo/$1';
$route['master_user/detail/menu/(:any)'] = 'master/master_detail_menu/$1';
$route['master_user/detail/kartu_kredit/(:any)'] = 'master/master_detail_kartu_kredit/$1';
