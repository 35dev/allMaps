<?php
namespace classes\apis;

class OpenWeatherMap {

    public static function call()
    {
        $postdata = http_build_query(
            array(
                'id'=>'524901',
                'lang'=>'fr',
                'units'=>'metric',
                'mode'=>'json',
                'APPID'=>OpenWeatherMap_apiKey
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'GET',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);

        return file_get_contents(OpenWeatherMap_apiUrl . "/forecast/city?" . $postdata);
    }

}