<?php
namespace outils;

class url {

    public static function getUrl() {
        //$url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
        $url  = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"];
        //$url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
        $url .= $_SERVER["REQUEST_URI"];
        return $url;
    }

}