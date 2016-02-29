<?php

namespace outils;

class general {

    public static function passwdGen($length = 8, $flag = 'ALPHANUMERIC')
    {
        switch ($flag)
        {
            case 'NUMERIC':
                $str = '0123456789';
                break;
            case 'NO_NUMERIC':
                $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            default:
                $str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
        }

        for ($i = 0, $passwd = ''; $i < $length; $i++)
            $passwd .= Tools::substr($str, mt_rand(0, Tools::strlen($str) - 1), 1);
        return $passwd;
    }

    /**
     * Get a value from $_POST / $_GET
     * if unavailable, take a default value
     *
     * @param string $key Value key
     * @param mixed $default_value (optional)
     * @return mixed Value
     */
    public static function getValue($key, $default_value = false)
    {
        if (!isset($key) || empty($key) || !is_string($key))
            return false;
        $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

        if (is_string($ret) === true)
            $ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
        return !is_string($ret)? $ret : stripslashes($ret);
    }

    public static function getIsset($key)
    {
        if (!isset($key) || empty($key) || !is_string($key))
            return false;
        return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
    }

    public static function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public static function tableRowActiveInactive($actif)
    {
        //return ($actif == true ? '' : 'tbRowInactive');
        return ($actif == true ? '' : 'danger');
    }

}