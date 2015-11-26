<?php

class ApiRequest
{

  protected $method;
  protected $uri;
  protected $endpoint;
  protected $controller;
  protected $action;
  protected $params;
  protected $request;
  protected $queryString;

  public function __construct($request) {

    $this->uri = $_SERVER["REQUEST_URI"];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->request = $request;
    $this->route = explode('/', rtrim($request, '/'), 4);
    $this->endpoint = array_shift($this->route);
    $this->controller = array_shift($this->route);
    $this->action = array_shift($this->route);
    $this->queryString = ltrim(array_shift($this->route), '?');
    mb_parse_str($this->queryString, $this->params);

    if(!in_array($this->method, ['GET', 'POST'])) {
      $this->sendResponse(new APIErrorResponse());
    }
    var_dump($this);
  }

  public function sendResponse($responseObject) {
    if(is_subclass_of($responseObject, 'ApiResponse')) {
      
    }
  }

  public function processAPI() {
        if (method_exists($this, $this->endpoint)) {
            return $this->_response($this->{$this->endpoint}($this->args));
        }
        return $this->_response("No Endpoint: $this->endpoint", 404);
    }

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
