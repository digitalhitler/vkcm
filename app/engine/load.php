<?php
namespace VKCM;

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
require_once ( __DIR__ ."/autoload.php");

autoloader([

 			[
 				'debug' => false,
        'verbose' => false,
        'namespace' => "VKCM",
 				'basepath' => APP_ROOT."/app"
 			],
 			// set class paths to autoload
 			'engine',
      'engine/packages/'
 		]);

use VKCM\Modules\Application  as Application;
use VKCM\Modules\Session      as Session;
use VKCM\Modules\Page         as Page;

// Initializing application modules:
$App      = new Application();
$Session  = new Session();
$Page     = new Page();

// Process routes:
require_once (APP_ROOT."/app/engine/packages/fastroute/bootstrap.php");
require_once (APP_ROOT."/app/engine/routes.php");
