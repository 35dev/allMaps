<?php
namespace outils;

class evaluations {

    public static function afficherEtoiles($nbEtoiles) {

        $etoile = "<span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>";

        if ($nbEtoiles==1)
        {
            return $etoile;
        }

        elseif ($nbEtoiles==2)
        {
            return $etoile . $etoile;
        }

        elseif ($nbEtoiles==3)
        {
            return $etoile . $etoile . $etoile;
        }

        elseif ($nbEtoiles==4)
        {
            return $etoile . $etoile . $etoile . $etoile;
        }

        elseif ($nbEtoiles==5)
        {
            return $etoile . $etoile . $etoile . $etoile . $etoile;
        }

        else
        {
            return "";
        }
    }

    public static function afficherEtoiles2($nbEtoiles) {

        $etoile = "*";

        if ($nbEtoiles==1)
        {
            return $etoile;
        }

        elseif ($nbEtoiles==2)
        {
            return $etoile . $etoile;
        }

        elseif ($nbEtoiles==3)
        {
            return $etoile . $etoile . $etoile;
        }

        elseif ($nbEtoiles==4)
        {
            return $etoile . $etoile . $etoile . $etoile;
        }

        elseif ($nbEtoiles==5)
        {
            return $etoile . $etoile . $etoile . $etoile . $etoile;
        }

        else
        {
            return "";
        }
    }

}