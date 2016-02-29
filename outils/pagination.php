<?php
namespace outils;

class pagination {

    public static function liensPagination($nbResultats, $nbResultatsParPage, $url, $numPage) {

        $lng='fr';
        $paginationDeb = "Début";
        $paginationFin = "Fin";
        if (isset($_GET['lng']) && $_GET['lng']!='') {$lng = $_GET['lng'];}

        if ($lng != 'fr') {
            $paginationDeb = "First";
            $paginationFin = "Last";
        }

        if ($nbResultats > 0) {

            $nbPages = ceil($nbResultats / $nbResultatsParPage);

            if ($nbPages > 1) {

                $nav = "<div class='text-center'><ul class='pagination pagination-sm'>";
                $marge = 5;

                $numPageDeb = $numPage <= $marge ? 1 : $numPage - $marge;
                $numPageFin = ($nbPages - $numPage) <= $marge ? $nbPages : $numPage + $marge;

                //for($i=1; $i<=$nbPages; $i++) {
                if ($numPage > ($marge + 1)) {
                    $nav .= "<li><a href='" . str_replace("[PAGE]", 1, $url) . "'>" . $paginationDeb . "</a></li>";
                }

                for ($i = $numPageDeb; $i <= $numPageFin; $i++) {
                    $nav .= "<li" . ($i == $numPage ? " class='active'" : "") . "><a href='" . str_replace("[PAGE]", $i, $url) . "'>" . $i . "</a></li>";
                }

                if ($numPage < ($nbPages - $marge)) {
                    $nav .= "<li><a href='" . str_replace("[PAGE]", $nbPages, $url) . "'>" . $paginationFin . "</a></li>";
                }

                $nav .= "</ul></div>";

                return $nav;
            }
            else
            {
                return "";
            }
        }
        else
        {
            return "";
        }
    }
}