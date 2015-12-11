<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/../app/engine/views/header.html");
if(isset($_GET["page"])) {
  require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/".$_GET["page"].".html");
}
require_once($_SERVER["DOCUMENT_ROOT"] . "/../app/engine/views/footer.html");

//require_once ( $_SERVER["DOCUMENT_ROOT"] . "/../app/engine/load.php");
