<?php

$dispatcher = FastRoute\cachedDispatcher(function(FastRoute\RouteCollector $r) {

    $r->addRoute('GET', '/', 'MainPage');
    $r->addRoute(
      ['GET', 'POST'],
      '/api/{request:.+}',
      'ApiResponse');
}, [
    'cacheFile' => APP_ROOT . '/app/engine/cache/route.cache', /* required */
    'cacheDisabled' => true,     /* optional, enabled by default */
]);

$routeInfo = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $RouteHandler = "Error404";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $RouteHandler = "Error405";
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $RouterHandler = $routeInfo[1];
        $RouterVariables = $routeInfo[2];
        break;
}


if(IS_DEBUG) {
    $App->Debug($_SERVER["REQUEST_METHOD"].": ".$_SERVER["REQUEST_URI"]." find a route via ".$RouterHandler, "Router");
}
if(isset($RouterHandler)) {
    require (APP_ROOT . "/app/engine/routes/".$RouterHandler.".php");
}
