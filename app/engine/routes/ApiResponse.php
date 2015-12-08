<?php
namespace VKCM\Modules\API;
use VKCM\Modules\UUID as UUID;
use VKCM\Modules\API\Request as Request;
use VKCM\Modules\API\Response as Response;
use VKCM\Models\User as User;

//use VKCM\Models\User;
//require_once APP_ROOT . "/app/engine/modules/api/_bootstrap.php";
//..require_once APP_ROOT . "/app/engine/modules/uuid.php";
//require_once APP_ROOT . "/app/engine/modules/idiorm.php";
// var_dump(ORM::get_query_log());
// http://vkcm.digitalhitler.ru/api/auth/asdsad/asdas/?key=323232&keykeykeykeyk=323121dw&var1[]=222&var1[]=223
// var_dump($RouterVariables);

$req = new Request($RouterVariables['request']);
echo 'h';
var_dump($req);

//if($req->handleRequest())



// $response = [
//   "a" => 3
// ];
// header('Content-type: text/json');
// echo json_encode($response);
?>
