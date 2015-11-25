<?php

class Users {
    public function __construct() {
        global $DB;
        $this->DB = $DB;
    }

    public function GetProfilePicture($intUser, $intSize = 64) {
        if( file_exists(APP_USERCONTENT_PATH . "/" . intval($intUser) . "/pp_". intval ($intSize) . ".jpg") ) {
            return APP_USERCONTENT_URL . "/" . intval($intUser) . "/pp_". intval ($intSize) . ".jpg";
        } else return APP_URL."/assets/img/profile/nopicture_". intval ($intSize) .".jpg";
    }
}