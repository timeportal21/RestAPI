<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'signup';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['register'] 		= 'signup';
$route['login']			= 'signup/login';
// API Users
// 

$route['api_register'] 		= 'api/user/apiRegister';
$route['api_login']			= 'api/user/apiLogin';
