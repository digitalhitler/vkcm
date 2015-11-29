<?php
namespace VKCM\Modules;
class Application {

    public function __construct() {
        $this->Config["Application"] = $this->LoadConfiguration("application");
        define ('APP_STARTED', true);
        $this->DebugData = array();
    }

    public function LoadConfiguration($type) {
        require_once ( $_SERVER["DOCUMENT_ROOT"] . "/../app/engine/config/".$type.".php" );
    }

    public function GetCache ( $group, $id, $lifetime ) {
        $fileExpiredAt = time() - $lifetime;
        $fileName = APP_ROOT . "/app/engine/cache/".$group."/".$id.".cache";
        if ( file_exists( $fileName ) && $fileExpiredAt < filemtime( $fileName) ) {
            return file_get_contents($fileName);
        } else return false;
    }

    public function SetCache ( $group, $id, $data ) {
        $fileName = APP_ROOT . "/app/engine/cache/".$group."/".$id.".cache";
        if( !file_exists( dirname ( $fileName ) ) && !is_dir ( dirname ( $fileName ) )) {
            mkdir( dirname ($fileName), 0777 );
        }

        if ( file_exists ( $fileName ) )
            unlink ( $fileName );
        file_put_contents( $fileName, $data);
        return true;
    }

    public function GetObjectCache ( $group, $id, $lifetime) {
        $data = $this->GetCache( $group, $id, $lifetime);
        if($data !== false) {
            return json_decode($data, true);
        } else return false;
    }

    public function SetObjectCache ( $group, $id, $data ) {
        $data = json_encode($data);
        $this->SetCache ( $group, $id, $data );
    }

    public function Debug ($strLog, $strFrom = "Main") {
        $this->DebugArray[] = array(
            "time" => time(),
            "text" => $strLog,
            "from" => $strFrom
        );
    }

    public function GetDebug() {
        $html = '<pre style="width: 100%; height: 200px; background-color: rgba(0,0,0,0.8); position: fixed; bottom: 0; left: 0; right: 0; overflow-y: scroll; color: green; border: none; padding: 5px; font-size: 9pt; margin: 0; border-radius: 0px">';
            foreach($this->DebugArray as $item) {
                $html.= date("H:i:s", $item["time"]).' [ '.$item["from"].' ] '.$item["text"]."<br />";
            }
        $html.='</pre>';
        return $html;
    }
}
