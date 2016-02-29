<?php
namespace outils;

class textes {

    public static function cleanUrl($str) {
        setlocale(LC_ALL, 'en_US.UTF8');

        $str = str_replace('\'', '-', $str);
        $str = str_replace(' ?', '', $str);

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", "-", $clean);

        return $clean;
    }

    public static function cleanBreak($str) {
        setlocale(LC_ALL, 'en_US.UTF8');

        $str = str_replace('<br>', ' ', $str);
        $str = str_replace('<br />', ' ', $str);
        $str = str_replace('<br></br>', ' ', $str);

        return $str;
    }

    public static function replaceLineBreak($str) {

        $str = str_replace("\r\n", "<br />", $str);
        $str = str_replace("\n", "<br />", $str);
        $str = trim($str);

        return $str;
    }

    public static function strip_tags_content($text, $tags = '', $invert = FALSE) {

        preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
        $tags = array_unique($tags[1]);

        if(is_array($tags) AND count($tags) > 0) {
            if($invert == FALSE) {
                return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
            }
            else {
                return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
            }
        }
        elseif($invert == FALSE) {
            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
        }
        return $text;
    }

    public static function limitTextLength($text, $length) {

        if (strlen($text) > $length) {
                return substr($text, 0, $length) . "&nbsp;...";
            }
        else
        {
            return $text;
        }
    }

    public static function cleanQuotes($str) {
        setlocale(LC_ALL, 'en_US.UTF8');

        $str = str_replace('"', '&quot;', $str);
        //$str = str_replace('\'', '&#39;', $str);

        return $str;
    }

    public static function hide_email($email)

    {
        $email = trim($email);
        $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

        $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

        for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

        $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
        $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
        $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';
        $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")";
        $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

        return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;
    }

    public static function formatDate($date) {
        $date = date_parse($date);
        return self::premierJour($date['day']) . ' ' . self::nomMois($date['month']) . ' ' . $date['year'] ;
    }

    public static function formatDate2($date) {
        $date = date_parse($date);
        return self::premierJour2($date['day']) . ' ' . self::nomMois2($date['month']) . ' ' . $date['year'] ;
    }

    public static function formatMoisAnnee($mois, $annee) {
        return self::nomMois($mois) . ' ' . $annee ;
    }

    public static function formatMoisAnnee2($mois, $annee) {
        return self::nomMois2($mois) . ' ' . $annee ;
    }

    public static function formatDateDDMMYYYY($date) {
        $date = date_parse($date);
        return $date['day'] . '/' . $date['month'] . '/' . $date['year'] ;
    }

    public static function formatDateMMDDYYYY($date) {
        $date = date_parse($date);
        return $date['month'] . '/' . $date['day'] . '/' . $date['year'] ;
    }

    public static function formatDateYYYYMMDD($date) {
        $date = date_parse($date);
        return $date['year'] . '/' . $date['month'] . '/' . $date['day'] ;
    }

    public static function formatPrix($prix, $symbole) {
        return $prix . "&nbsp;" . $symbole;
    }

    public static function sqlBetweenMois($champDate, $date) {
        $date = date_parse($date);

        $annee1 = $date['year'];
        $mois1 = $date['month'];

        $annee2 = ($mois1<12 ? $annee1 : ($annee1 + 1));
        $mois2 = ($mois1<12 ? ($mois1 + 1) : '01');
        //return "BETWEEN '" . $annee1."-".$mois1."-01' AND '" . $annee2."-".$mois2."-01'";
        return $champDate . ">='" . $annee1 . "-" . $mois1 . "-01' AND " . $champDate . "<'" . $annee2 . "-" . $mois2 . "-01'";
    }

    public static function formatDateDB($date) {
        $newDate = explode('/',$date);
        return $newDate[2].$newDate[1].$newDate[0];
    }

    public static function formatDateCTV($date, $lng) {
        $newDate = explode('/',(string)$date);
        if ($lng == 'en') {
            return (string)$newDate[2]."-".(string)$newDate[0]."-".(string)$newDate[1];
        }
        else
        {
            return (string)$newDate[2]."-".(string)$newDate[1]."-".(string)$newDate[0];
        }
    }

    public static function premierJour($jour) {
        if ($jour==1) {
            return "1<sup>er</sup>";
        }
        else
        {
            return $jour;
        }
    }

    public static function premierJour2($jour) {
        if ($jour==1) {
            return "1er";
        }
        else
        {
            return $jour;
        }
    }

    public static function nomMois($mois) {
        $str="";
        if($mois == 1) $str = "janvier";
        if($mois == 2) $str = "f&eacute;vrier";
        if($mois == 3) $str = "mars";
        if($mois == 4) $str = "avril";
        if($mois == 5) $str = "mai";
        if($mois == 6) $str = "juin";
        if($mois == 7) $str = "juillet";
        if($mois == 8) $str = "ao&ucirc;t";
        if($mois == 9) $str = "septembre";
        if($mois == 10) $str = "octobre";
        if($mois == 11) $str = "novembre";
        if($mois == 12) $str = "d&eacute;cembre";
        return $str;
    }

    public static function nomMois2($mois) {
    $str="";
    if($mois == 1) $str = "janvier";
    if($mois == 2) $str = "février";
    if($mois == 3) $str = "mars";
    if($mois == 4) $str = "avril";
    if($mois == 5) $str = "mai";
    if($mois == 6) $str = "juin";
    if($mois == 7) $str = "juillet";
    if($mois == 8) $str = "août";
    if($mois == 9) $str = "septembre";
    if($mois == 10) $str = "octobre";
    if($mois == 11) $str = "novembre";
    if($mois == 12) $str = "décembre";
    return $str;
}

    public static function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}