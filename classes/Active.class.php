<?php
namespace classes\apis;

class Active {

    public static function call()
    {
        $postdata = http_build_query(
            array(
                'pstate'=>'CO',
                'siteType'=>'2001',
                'expwith'=>'1',
                'amenity'=>'4005',
                'pets'=>'3010',
                'api_key'=>Active_apiKey
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

        return file_get_contents(Active_apiUrl . $postdata);
    }

}