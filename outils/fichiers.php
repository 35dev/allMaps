<?php
namespace outils;

class fichiers {

    public static function extensionFichier($nomFichier) {
        $nomFichierParts = explode('.', $nomFichier);
        return strtolower(end($nomFichierParts));
    }

    public static function recursiveRemoveDirectory($directory)
    {
        foreach(glob("{$directory}/*") as $file)
        {
            if(is_dir($file)) {
                self::recursiveRemoveDirectory($file);
            } else {
                unlink($file);
            }
        }
        rmdir($directory);
    }

    public static function checkRemoteFile($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(curl_exec($ch)!==FALSE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function contenuFichierTexte($path)
    {
        $fp = fopen ($path, "r");
        $contenu = fread($fp, filesize($path));
        fclose ($fp);
        return $contenu;
    }

}