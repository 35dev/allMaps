<?php
namespace outils;

class images {

    public static function redimensionner($fichier, $nouvNom, $upload_dir, $largeurMax, $hauteurMax) {

        $typeFichier = fichiers::extensionFichier($fichier);
        $dest = $upload_dir. DIRECTORY_SEPARATOR. $fichier;

        //Récupération de la photo
        if ($typeFichier=='gif') {
            $img = imagecreatefromgif($dest);
        }
        elseif ($typeFichier=='png') {
            $img = imagecreatefrompng($dest);
        }
        else
        {
            $img = imagecreatefromjpeg($dest);
        }

        $size = getimagesize($dest);//Taille de la photo
        $largeur = $size[0];//largeur
        $hauteur = $size[1];//hauteur

        //nouvelles dimensions de la photo
        $ratio = $largeur / $hauteur;
        if ($ratio > 1) {
            $largeur = $largeurMax;
            $hauteur = $hauteurMax / $ratio;
        }
        elseif ($ratio < 1)
        {
            $largeur = $largeurMax * $ratio;
            $hauteur = $hauteurMax;
        }
        else //ratio = 1
        {
            $largeur = $largeurMax;
            $hauteur = $hauteurMax;
        }

        $img_nouv = imagecreatetruecolor($largeur,$hauteur); //Création de la nouvelle image (vide)
        $bgBlanc = imagecolorallocate ( $img_nouv, 255, 255, 255 );//Définition du fond blanc
        imagefill ( $img_nouv, 0, 0, $bgBlanc );//Remplissage du fond blanc
        $copy = imagecopyresampled($img_nouv,$img,0,0,0,0,$largeur,$hauteur,$size[0],$size[1]);//copie, redimensionnement et rééchantillonage de l'image d'origine vers l'image finale

        $nom_fichier_nouv = $nouvNom .".jpg";//nom du fichier

        $dest_nouv = $upload_dir. DIRECTORY_SEPARATOR. $nom_fichier_nouv;
        imagejpeg($img_nouv, $dest_nouv);//enregistrement du fichier image

        imagedestroy($img);
        imagedestroy($img_nouv);

    }

    public static function isImage($nomFichier) {
        $nomFichierParts = explode('.', $nomFichier);
        $extension =  strtolower(end($nomFichierParts));
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}