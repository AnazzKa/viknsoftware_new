<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['login'] = 'login/index';
$route['login_action']='login/login_action';
$route['Dashboard']='home/index';
$route['account_type']='account/account_type';
$route['create_account']='account/create_account';