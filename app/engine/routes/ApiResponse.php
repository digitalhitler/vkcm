<?php

require_once APP_ROOT . "/app/engine/modules/api.php";
require_once APP_ROOT . "/app/engine/modules/uuid.php";
require_once APP_ROOT . "/app/engine/modules/idiorm.php";
require_once APP_ROOT . "/app/engine/modules/paris.php";
require_once APP_ROOT . "/app/engine/modules/db_models.php";

ORM::configure('mysql:host=localhost;dbname=vkcm');
ORM::configure('username', 'root');
ORM::configure('password', 'Sp$%45fge');
ORM::configure('logging', true);

$user = Model::factory('User')->find_one(1);
var_dump($user->sessions()->find_one());

// http://vkcm.digitalhitler.ru/api/auth/asdsad/asdas/?key=323232&keykeykeykeyk=323121dw&var1[]=222&var1[]=223

var_dump(ORM::get_query_log());
var_dump($RouterVariables);
$handle = new ApiRequest($RouterVariables['request']);


// $response = [
//   "a" => 3
// ];
// header('Content-type: text/json');
// echo json_encode($response);
?>
