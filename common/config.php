<?php
/**
 * Created by PhpStorm.
 * User: leminhtoan
 * Date: 7/8/17
 * Time: 09:50
 */

// Debug mode
ini_set('display_errors', 1);
require_once dirname(__DIR__) . '/vendor/autoload.php';


define('LOG_PATH', 'logs');
define('TRANSFERWISE_URL', 'https://test-api.transferwise.com');


$dbConfig = [
    'user' => 'root',
    'password' => 'root',
    'database' => 'transferwise'
];


//DB::$connect_options;
DB::$user = $dbConfig['user'];
DB::$password = $dbConfig['password'];
DB::$dbName = $dbConfig['database'];

//$buyerList = DB::query("SELECT * FROM buyer_account");
//
//print_r($buyerList);
//
