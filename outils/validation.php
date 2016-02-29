<?php
namespace outils;

class validation
{

    public static function isDate($date)
    {
        if (!empty($date)) {

            $newDate = explode('/', $date);
            if (count($newDate) == 3) {
                $jours = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
                $mois = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

                if (in_array($newDate[0], $jours, true) && in_array($newDate[1], $mois, true) && is_numeric($newDate[2])) {
                    return checkdate((int) $newDate[1], (int) $newDate[0], (int) $newDate[2]);
                }else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}