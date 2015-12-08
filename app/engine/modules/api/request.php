<?php
namespace VKCM\Modules\API;

use VKCM\Modules\API\Response as Response;
use VKCM\Modules\API\ErrorResponse as ErrorResponse;
use VKCM\Modules\API\GoodResponse as GoodResponse;
use VKCM\Modules\API\Wayfinder as Wayfinder;

/*
@todo: session-avail endpoints
validate root to method
*/
class Request
{

  protected $method;
  protected $uri;
  protected $endpoint;
  protected $controller;
  protected $action;
  protected $params;
  protected $request;
  protected $queryString;

  protected $authorizationKey;
  protected $isAuthPassed = false;
  protected $isBroken = false;

  public $responseObj = false;

  public function __construct ($request) {

    // be default we are thinking that request isn't broken
    $this->request = $request;
    $this->uri = $_SERVER["REQUEST_URI"];
    $this->method = $_SERVER['REQUEST_METHOD'];

    if (!in_array($this->method, ['GET', 'POST'])) {

      $this->isBroken = true;
      $this->reject("We are using GET and POST-requests only.", 405);

    } else {

      // Processing request route, very easy and strict rules
      try {

        $this->route = explode('/', rtrim($request, '/'), 4);
        $this->endpoint = array_shift($this->route);
        $this->controller = array_shift($this->route);
        $this->action = array_shift($this->route);
        $this->queryString = ltrim(array_shift($this->route), '?');

        mb_parse_str($this->queryString, $this->params);
        if(is_array($this->params)) {
          $this->params = $this->_cleanInputs($this->params);
        }

      // Someone's requested in a wrong way:
      } catch (Exception $e) {

        $this->isBroken = true;
        $this->reject("Request path cannot be parsed");

      }

    }


    var_dump($this);

  }

  public function accept () {
    $this->responseObject = new GoodResponse([
      "method"      => $this->method,
      "uri"         => $this->uri,
      "endpoint"    => $this->endpoint,
      "controller"  => $this->controller,
      "action"      => $this->action,
      "params"      => $this->params
    ]);
  }

  public function reject ($message = '', $httpCode = 500, $errNo = -1) {
    $this->responseObject = new ErrorResponse([
      "message" => $message,
      "code"    => $httpCode,
      "errno"   => $errNo;
    ]);
    $this->sendAndTerminate();
  }

  public function processAPI () {
    if (method_exists($this, $this->endpoint)) {
      return $this->_response($this->{$this->endpoint}($this->args));
    }
    return $this->_response("No Endpoint: $this->endpoint", 404);
  }

  public function sendAndTerminate() {
    if(is_object($this->responseObject) && is_subclass_of($this->responseObject, 'Response')) {
      $this->responseObject->send();
    }
    die();
  }

  public function sendResponse () {
    if(is_object($this->responseObject) && is_subclass_of($this->responseObject, 'Response')) {
      $this->responseObject->send();
    }
  }

  public function findAuthorizationKey() {
    if($_COOKIE["authKey"])
  }

  public function getAuthorizationKey() {

    if(!$this->authorizationKey) {
      $this->findAuthorizationKey();
    }

    return $this->authorizationKey;

  }

  public function isAuthorized() {

    if($_SESSION["authKey"]) {

      $authKeyGiven = $this->getAuthorizationKey();

      if($authKeyGiven == $_SESSION["authKey"]) {
        return true;
      }

      return false;

  }

  /* ===== privates ===== */

  private function _response($data, $status = 200) {
    header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
    return json_encode($data);
  }

  private function _cleanInputs($data) {
    $clean_input = Array();
    if (is_array($data)) {
      foreach ($data as $k => $v) {
        $clean_input[$k] = $this->_cleanInputs($v);
      }
    } else {
      $clean_input = trim(strip_tags($data));
    }
    return $clean_input;
  }

}
