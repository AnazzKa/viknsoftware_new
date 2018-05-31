<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['login'] = 'login/index';
$route['logout'] = 'login/logout';
$route['login_action']='login/login_action';
$route['Dashboard']='home/index';
$route['Dashboard2']='home/home';
$route['cash_in_hand']='home/cash_in_hand';
$route['customer']='home/customer';

$route['create_agent']='agent/create_agent';
$route['list_agent']='agent/list_agent';
$route['agent_view']='agent/agent_view';
$route['agent_transactions']='agent/agent_transactions';

$route['account_type']='account/account_type';
$route['create_account']='account/create_account';

$route['create_cards_type']='cards/create_cards_type';
$route['create_gps_direction']='cards/create_gps_direction';
$route['create_cards']='cards/create_cards';
$route['list_cards']='cards/list_cards';
$route['list_cards_all']='cards/list_cards_all';
$route['purchase_card']='cards/purchase_card';
$route['purchase_cards_list']='cards/purchase_cards_list';
$route['add_cards_stock']='cards/add_cards_stock';

$route['receipts_add']='receipts/receipts_add';
$route['receipts_list']='receipts/receipts_list';

$route['payments_add']='payments/payments_add';
$route['payments_list']='payments/payments_list';

$route['income_add']='income/income_add';
$route['income_list']='income/income_list';

$route['expenses_add']='expenses/expenses_add';
$route['expenses_list']='expenses/expenses_list';

$route['advertisement_add']='advertisement/advertisement_add';
$route['advertisement_list']='advertisement/advertisement_list';
$route['wallet']='wallet/wallet';
$route['supplier_cards']='wallet/supplier_cards';
$route['supplier_wallet_cards']='wallet/supplier_wallet_cards';
$route['wallet_card_details']='wallet/wallet_card_details';
$route['wallet_cards_buy']='wallet/wallet_cards_buy';
$route['suppliers']='wallet/suppliers';

$route['ledger_view']='ledger/ledger_view';
$route['other_accounts']='home/other_accounts';



