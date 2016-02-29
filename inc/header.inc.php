<?php
if (!isset($TITLE)) {$TITLE = META_TITLE_DEFAULT;}
if (!isset($META_DESCRIPTION)) {$META_DESCRIPTION = META_DESCRIPTION_DEFAULT;}
if (!isset($typeTitre)) {$typeTitre = META_TITLE_DEFAULT;}
if (!isset($titre)) {$titre = META_TITLE_DEFAULT;}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 9]><html class="lt-ie10" lang="fr" > <![endif]-->
<!--[if lt IE 8]> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" dir="ltr" lang="fr" class="lt-ie8" > <![endif]-->
<!--[if gte IE 8]> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" dir="ltr" lang="fr"> <![endif]-->
<html class="no-js" lang="fr" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="google" content="notranslate" />
    <title><?php echo htmlentities($TITLE); echo htmlentities(META_TITLE_SUFFIXE); ?></title>
    <meta name="description" content="<?php echo htmlentities($META_DESCRIPTION); ?>">
    <base href="<?php echo SITE . ROOT ?>/"><!--[if lte IE 6]></base><![endif]-->

    <link href="<?php echo ROOT ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="javascript" src="<?php echo ROOT ?>/assets/jquery/jquery.min.js"></script>
    <script type="javascript" src="<?php echo ROOT ?>/assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="UTF-8" src="<?php echo BingMaps_apiUrl ?>"></script>

    <link href="<?php echo ROOT ?>/css/styles.css" rel="stylesheet">

        </head>
<body>

<div class="container-fluid">
