<?php
session_start();

class Session {
    public function __construct() {
        global $DB;
        $this->DB = $DB;
    }

    public function Check() {
        if(isset($_SESSION["isStarted"]) && $_SESSION["isStarted"] === true) return true;
        else return false;
    }
}
