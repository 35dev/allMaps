<?php
namespace outils;

class feeds {

    public static function sitemap($liste) {

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';

        if (isset($liste) && count($liste) > 0)
        {
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            foreach ($liste as $url) {
                $xml .= '<url><loc>' . $url . '</loc></url>';
            }

            $xml .= '</urlset>';
        }

        return $xml;
    }

    public static function rss($liste, $title, $link, $description, $language, $atomLink) {

        $xml = '<?xml version="1.0"?>';

        if (isset($liste) && count($liste) > 0)
        {
            $xml .= "<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">";
            $xml .= "<channel>";
            $xml .= "<title>$title</title>";
            $xml .= "<link>$link</link>";
            $xml .= "<description>$description</description>";
            $xml .= "<language>$language</language>";
            $xml .= "<atom:link href=\"$atomLink\" rel=\"self\" type=\"application/rss+xml\" />";

            foreach ($liste as $elem) {
                $xml .= "<item>";
                $xml .= "<title><![CDATA[" . $elem['title'] . "]]></title>";
                $xml .= "<link>" . $elem['link'] . "</link>";
                $xml .= "<description><![CDATA[" . $elem['description'] . "]]></description>";
                $xml .= "<pubDate>" . date('r', strtotime($elem['pubDate'])) . "</pubDate>";
                $xml .= "<guid isPermaLink=\"false\">" . $elem['guid'] . "</guid>";
                $xml .= "</item>";
            }

            $xml .= '</channel>';
            $xml .= '</rss>';
        }

        return $xml;
    }

}