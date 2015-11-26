<?php

class ApiResponse {

  protected $headers = [];
  protected $response;

  function __construct($httpCode, $response) {

    $headers[] = "HTTP/1.1 " . $httpCode . " " . self::_responseStatus($httpCode);
    $headers[] = "Access-Control-Allow-Orgin: *";
    $headers[] = "Access-Control-Allow-Methods: *";
    $headers[] = "Content-Type: application/json";
    $this->response = $response;

  }

  private function _appendResponse($key, $data) {
    $this->response[$key] = $data;
  }

  private function _checkForQueued

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
