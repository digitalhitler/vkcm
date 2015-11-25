<?php
const IS_DEBUG = true;

if(IS_DEBUG) {
  error_reporting(E_ALL && ~E_NOTICE);
  ini_set("display_errors", true);
}

// Some shit with PDO
// $DB = new PDO(
//     "mysql:host=localhost;dbname=spetrenko;charset=UTF8",
//     "root", "");

// Minimal configuration:
define('APP_ROOT', "/server/webapps/VKCM/");
define('APP_URL', "http://vkcm.spetrenko.ru/");

// Injecting modules:
require_once ( __DIR__ ."/modules/application.php");
require_once ( APP_ROOT."/app/engine/modules/session.php");
require_once ( APP_ROOT."/app/engine/modules/page.php");

// Initializing application modules:
$App      = new Application();
$Session  = new Session();
$Page     = new Page();

// Process routes:
require_once (APP_ROOT."/app/engine/packages/fastroute/bootstrap.php");
require_once (APP_ROOT."/app/engine/routes.php");
