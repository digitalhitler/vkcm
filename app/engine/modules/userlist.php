<?php


class UserList {

    public function __construct() {
        global $DB;
        $this->DB = $DB;

        $this->ListCache = array();
    }

    //public function Get

}