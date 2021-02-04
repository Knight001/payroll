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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'Admin/index';
$route['admins'] = 'Admin/admins';
$route['roles'] = 'Admin/roles';
$route['employees'] = 'Employees/index';
$route['overtime'] = 'Employees/overtime';
$route['advance'] = 'Employees/advance';
$route['schedules'] = 'Employees/schedules';
$route['deductions'] = 'Deductions/index';
$route['positions'] = 'Employees/positions';
$route['payroll'] = 'Payrolls/payroll';
$route['attendance'] = 'Employees/workschedules';
$route['addemployee'] = 'Employees/addemployee';
$route['editemployee/(:any)'] = 'Employees/editemployee/$1';
$route['newdeduct'] = 'Deductions/add';
$route['addrole'] = 'Admin/addrole';
$route['adduser'] = 'Admin/adduser';
$route['login'] = 'Home/login';
$route['logout'] = 'Home/logout';
$route['settings'] = 'Employees/settings';
$route['generatepayroll'] = 'Payrolls/generate';
$route['payee'] = 'Payrolls/payee';
$route['addpayee'] = 'Payrolls/addpayee';
$route['payslip/(:any)'] = 'Payrolls/payslip/$1';
$route['payslips'] = 'Payrolls/payslips';
$route['earnings'] = 'Payrolls/earnings';
$route['createpayeesettings'] = 'Payrolls/payesettings';
$route['addearning'] = 'Payrolls/addearning';
$route['editearning/(:any)'] = 'Payrolls/editearning/$1';
$route['earnsettings'] = 'Payrolls/earningsettings';
$route['earn/(:any)'] = 'Employees/earnings/$1';
$route['deduct'] = 'Employees/deduct';
$route['attend'] = 'Employees/attend';
$route['rmdeduct/(:any)'] = 'Deductions/rmdeduct/$1';
$route['addDeductions/(:any)'] = 'Employees/addDeductions/$1';
