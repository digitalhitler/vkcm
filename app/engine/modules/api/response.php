<?php
namespace VKCM\Modules\API;

use VKCM\Modules\API\ErrorResponse;
use VKCM\Modules\API\GoodResponse;

class Response {

  protected $headers = [];
  protected $response = [];
  protected $requestData = [];
  protected $httpCode;
  protected $wayfinder;

  function __construct($requestData = []) {

    $this->requestData      = $requestData;


  }

  public function clear() {
    $this->response = array();
  }

  public function push($key, $data) {
    $this->response[$key] = $data;
  }

  private function send() {
    if (!$this->headers) {

      $this->headers[] = "HTTP/1.1 " . $httpCode . " " . self::_responseStatus($httpCode);
      $this->$headers[] = "Access-Control-Allow-Orgin: *";
      $this->$headers[] = "Access-Control-Allow-Methods: *";
      $this->$headers[] = "Content-Type: application/json";
      $this->response = $response;

      foreach ($this->headers as $header) {
        header($header);
      }
    } else die("Response already sent");
  }

  private static function _responseStatus($code) {
      $status = array(
          200 => 'OK',
          404 => 'Not Found',
          405 => 'Method Not Allowed',
          500 => 'Internal Server Error',
      );
      return ($status[$code]) ? $status[$code] : $status[500];
  }
}
