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
$route['user_authentication'] = 'User_Authentication/index';
$route['default_controller'] = 'Dashboard/index';
$route['login'] = 'Auth/login';
$route['forget-password'] = 'Auth/forgetPassword';
$route['biller/(:num)'] = 'Biller/view/$1';
$route['biller/detail/(:num)'] = 'Biller/detail/$1';
$route['category/(:num)/(:any)'] = 'Category/view/$1/$2';
$route['partner/(:num)'] = 'Partner/detail/$1';
$route['partner/status/(:num)'] = 'Partner/status/$1';
$route['product/(:num)'] = 'Product/detail/$1';
$route['transform/(:num)'] = 'Transform/detail/$1';
$route['user/(:num)'] = 'User/detail/$1';
$route['role/(:num)'] = 'Role/detail/$1';
$route['upload'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
