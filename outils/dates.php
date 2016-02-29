<?php
namespace outils;
use outils\textes;

class dates {

    public static function urlMois($annee, $mois, $urlTitre) {
        return $annee . "/" . $mois . "/" . $urlTitre . "-" . self::nomMoisUrl($mois) . "-" . $annee;
    }

    public static function nomMoisUrl($mois) {
        $str="";
        if($mois == 1) $str = "janvier";
        if($mois == 2) $str = "fevrier";
        if($mois == 3) $str = "mars";
        if($mois == 4) $str = "avril";
        if($mois == 5) $str = "mai";
        if($mois == 6) $str = "juin";
        if($mois == 7) $str = "juillet";
        if($mois == 8) $str = "aout";
        if($mois == 9) $str = "septembre";
        if($mois == 10) $str = "octobre";
        if($mois == 11) $str = "novembre";
        if($mois == 12) $str = "decembre";
        return $str;
    }

    public static function affichageDates($typeAffichage, $dateDebut, $dateFin) {

        if (isset($dateDebut) && isset($dateFin)) {

            $dateDebut = date_parse($dateDebut);
            $dateFin = date_parse($dateFin);

            if ($typeAffichage == "date") {

            if ($dateDebut == $dateFin) {
                $sortie = textes::premierJour($dateDebut['day']) . ' ' . textes::nomMois($dateDebut['month']) . ' ' . $dateDebut['year'];
            } else {
                if (($dateDebut['month'] == $dateFin['month']) && ($dateDebut['year'] == $dateFin['year'])) {
                    $sortie = textes::premierJour($dateDebut['day']) . " - " . textes::premierJour($dateFin['day']) . ' ' . textes::nomMois($dateFin['month']) . ' ' . $dateFin['year'];
                } elseif ($dateDebut['year'] == $dateFin['year']) {
                    $sortie = textes::premierJour($dateDebut['day']) . ' ' . textes::nomMois($dateDebut['month']) . " - " . textes::premierJour($dateFin['day']) . ' ' . textes::nomMois($dateFin['month']) . ' ' . $dateFin['year'];
                } else {
                    $sortie = textes::premierJour($dateDebut['day']) . ' ' . textes::nomMois($dateDebut['month']) . ' ' . $dateDebut['year'] . " - " . textes::premierJour($dateFin['day']) . ' ' . textes::nomMois($dateFin['month']) . ' ' . $dateFin['year'];
                }
            }
        }
            else // $typeAffichage == "mois"
            {
                if (($dateDebut['month'] == $dateFin['month']) && ($dateDebut['year'] == $dateFin['year'])) {
                        $sortie = textes::nomMois($dateFin['month']) . ' ' . $dateFin['year'];
                    } else {
                    if ($dateDebut['year'] == $dateFin['year']) {
                        $sortie = textes::nomMois($dateDebut['month']) . " - " . textes::nomMois($dateFin['month']) . ' ' . $dateFin['year'];
                    }
                    else
                    {
                        $sortie = textes::nomMois($dateDebut['month']) . ' ' . $dateDebut['year'] . " - " . textes::nomMois($dateFin['month']) . ' ' . $dateFin['year'];
                    }
                    }
            }

        }
        elseif (isset($dateDebut)) {
            $dateDebut = date_parse($dateDebut);
            $sortie = textes::premierJour($dateDebut['day']) . ' ' . textes::nomMois($dateDebut['month']) . ' ' . $dateDebut['year'];
        }
        else
        {
            $sortie = "";
        }

        return $sortie;

    }

    public static function affichageDates2($typeAffichage, $dateDebut, $dateFin) {

        if (isset($dateDebut) && isset($dateFin)) {

            $dateDebut = date_parse($dateDebut);
            $dateFin = date_parse($dateFin);

            if ($typeAffichage == "date") {

                if ($dateDebut == $dateFin) {
                    $sortie = textes::premierJour2($dateDebut['day']) . ' ' . textes::nomMois2($dateDebut['month']) . ' ' . $dateDebut['year'];
                } else {
                    if (($dateDebut['month'] == $dateFin['month']) && ($dateDebut['year'] == $dateFin['year'])) {
                        $sortie = textes::premierJour2($dateDebut['day']) . " - " . textes::premierJour2($dateFin['day']) . ' ' . textes::nomMois2($dateFin['month']) . ' ' . $dateFin['year'];
                    } elseif ($dateDebut['year'] == $dateFin['year']) {
                        $sortie = textes::premierJour2($dateDebut['day']) . ' ' . textes::nomMois2($dateDebut['month']) . " - " . textes::premierJour2($dateFin['day']) . ' ' . textes::nomMois2($dateFin['month']) . ' ' . $dateFin['year'];
                    } else {
                        $sortie = textes::premierJour2($dateDebut['day']) . ' ' . textes::nomMois2($dateDebut['month']) . ' ' . $dateDebut['year'] . " - " . textes::premierJour2($dateFin['day']) . ' ' . textes::nomMois2($dateFin['month']) . ' ' . $dateFin['year'];
                    }
                }
            }
            else // $typeAffichage == "mois"
            {
                if (($dateDebut['month'] == $dateFin['month']) && ($dateDebut['year'] == $dateFin['year'])) {
                    $sortie = textes::nomMois2($dateFin['month']) . ' ' . $dateFin['year'];
                } else {
                    if ($dateDebut['year'] == $dateFin['year']) {
                        $sortie = textes::nomMois2($dateDebut['month']) . " - " . textes::nomMois2($dateFin['month']) . ' ' . $dateFin['year'];
                    }
                    else
                    {
                        $sortie = textes::nomMois2($dateDebut['month']) . ' ' . $dateDebut['year'] . " - " . textes::nomMois2($dateFin['month']) . ' ' . $dateFin['year'];
                    }
                }
            }

        }
        elseif (isset($dateDebut)) {
            $dateDebut = date_parse($dateDebut);
            $sortie = textes::premierJour2($dateDebut['day']) . ' ' . textes::nomMois2($dateDebut['month']) . ' ' . $dateDebut['year'];
        }
        else
        {
            $sortie = "";
        }

        return $sortie;

    }

}