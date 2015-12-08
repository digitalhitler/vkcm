<?php
namespace VKCM\Modules\API;

class Wayfinder {

  protected $actions;

  protected $endpointsAccess = [
    "unauthorized" => true,
    "user"         => false,
    "manage"       => false
  ];

  protected $quickCallsRegistry = [
    "key" => "quickCalls/setSessionKey"
  ];

  public function __construct() {

    $this->actions = new SplQueue();

  }

  public function findQuickCalls($requestParams) {

    foreach($params as $paramName => $paramValue) {
      if(isset($this->quickCallsRegistry[$paramName]) {

      }
    }

  }

  public function addAction($actionEndpoint) {

  }

  public function setEndpoints($endpoints) {
    $this->endpointsAccess = $endpoints;
  }

  public function getEndpoints() {
    $return = [];

    foreach($this->endpointAccess as $name => $isAvail) {
      if($isAvail) $return[] = $name;
    }

    return $return;
  }

  public function isEndpointAvailable($name) {
    if($this->endpointAccess[$name] === true)
      return true;
    else return false;
  }

  public function unlockEndpoint($name) {
    if($this->endpointsAccess[$name]) {
      $this->endpointsAccess[$name] = true;
    }
  }

  public function lockEndpoint($name) {

  }


}
