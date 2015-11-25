<?php

/*
 *
 *  Class for working with WikiRoutes API
 *
 *  May, 27th 2015
 *
 *  Made by Sergey Petrenko (spetrenko@me.com)
 *
 *  More info:      https://bitbucket.org/digital_hitler/wikiroutes-php-class
 *  API reference:  http://wikiroutes.info/manual/#/api
 *
 *  (!) Don't forget to set your API key.
 *
 */


// Remove this if session already started:
session_start();

class WikiRoutes {


    // Check out this before work:
    private $ApiKey = '1bf346e61279'; // your API key
    private $UserAgent = "WikiRoutesPHP/1.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.36 (KHTML, like Gecko)";
    private $Timeout = 10; // in seconds

    // Dont touch it:
    private $UrlPrefix = "http://wikiroutes.info/api/";
    private $SessionKey = null;
    private $RecoveredSession = false;
    private $DebugData = array();

    public function __construct() {

        $this->cUrl = curl_init();
        curl_setopt_array ($this->cUrl,
            array (
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_TIMEOUT => $this->Timeout,
                CURLOPT_USERAGENT => $this->UserAgent
            )
        );

        $this->ConsolePush("Object created, cUrl ready.");
        $this->_CheckSession();
    }

    public function _CheckSession($hardReset = false) {
        if($hardReset == true) {
            unset($_SESSION["Routes"]);
            $this->SessionKey = null;
            $this->ConsolePush("<font color=orange>Session hard reset started</font>");
        }

        $threeHoursAgo = time() - 10800;
        if( isset ( $_SESSION["Routes"]) && $_SESSION["Routes"]["Started"] > $threeHoursAgo ) {
            $this->SessionKey = $_SESSION["Routes"]["Key"];
            $this->ConsolePush("Session data OK.");
            return true;
        } else {
            $this->ConsolePush("No session data. Trying to create...");
            $result = $this->_SendRequest( "createSessionKey",
                array (
                    "app_key" => $this->ApiKey,
                    "device_id" => "b1e515c4-982b-4819-9367-779032643069",
                    "lat" => 43.34234,
                    "lon" => 60.2344
                )
            );
            if( $result !== false ) {
                $_SESSION["Routes"] = array (
                    "Key" => $result->sessionKey,
                    "Started" => time()
                );
                $this->ConsolePush("Session created.");
                return true;
            } else {
                $this->ConsolePush("<font color=red>Session create failed.</font>");
                return false;
            }
        }
    }

    private function _SendRequest ( $method, $data = array() ) {
        $formattedRequest = $method . "?" . http_build_query($data);
        $url = $this->UrlPrefix . $formattedRequest;

        $this->ConsolePush("Sending query to: ".$formattedRequest);
        curl_setopt ( $this->cUrl, CURLOPT_URL, $url );
        $result = curl_exec( $this->cUrl );
        if ( $result !== false ) {
            $length = strlen($result);
            $decoded = json_decode ( $result );
            var_dump($result);
            if($decoded == null) {
                return null;
            } elseif( $decoded->success == true ) {
                $this->ConsolePush("Got good answer: " . $length." bytes (" . sizeof($decoded->data) . " items in object)");
                return $decoded->data;
            } else {
                $this->ConsolePush ( "<font color=red>Got bad answer: " . $decoded->error . "</font>" );
                if( $decoded->error == "session.key.not.exist" && $this->RecoveredSession != true ) {
                    $this->ConsolePush ( "Trying to recover session..." );
                    $this->RecoveredSession = true;
                    $this->_CheckSession ( true );
                    return $this->_SendRequest ( $method, $data );
                } else {
                    return false;
                }
            }
        } else {
            if( $errNo = curl_errno($this->cUrl) ) {
                $this->ConsolePush("<font color=red>cUrl failed: " . curl_strerror($errNo) . "</font>");
            } else {
                $this->ConsolePush("<font color=red>cUrl failed by unknown reason.");
            }
            return false;
        }
    }

    private function ConsolePush ( $text, $data = array() ) {
        $this->DebugData[] = array (
            "time" => time(),
            "text" => $text,
            "data" => $data
        );
        return true;
    }

    public function GetData ( $method, $data = array() ) {
        curl_setopt($this->cUrl, CURLOPT_HTTPHEADER, array(
            'sessionKey: '.$this->SessionKey
        ));
        return $this->_SendRequest( $method, $data );
    }

    public function ShowConsole () {
        echo '<div style = "width: 95%; background: black; color: white; font-family: monospace; font-size: 13px; height: 300px; overflow-y: scroll; padding: 5px;">';
            foreach ($this->DebugData as $item) {
                echo '<strong>' . date( "H:i:s" , $item["time"] ) . '</strong>: ' . $item["text"] . '<br />';
            }
        echo '</div>';
    }
}