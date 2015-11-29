<?php

class ApiResponse {

  protected $headers = [];
  protected $response;

  function __construct($httpCode, $response) {

    $this->headers[] = "HTTP/1.1 " . $httpCode . " " . self::_responseStatus($httpCode);
    $this->$headers[] = "Access-Control-Allow-Orgin: *";
    $this->$headers[] = "Access-Control-Allow-Methods: *";
    $this->$headers[] = "Content-Type: application/json";
    $this->response = $response;

  }

  private function _appendResponse($key, $data) {
    $this->response[$key] = $data;
  }

  private function send() {
    if ($this->headers) {
      foreach ($this->headers as $header) {
        header($header);
      }
    }
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
