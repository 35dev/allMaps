<?php
$mapping = array(
    'commun\db' => __DIR__ . '/../classes/db.php',
    'commun\CRUD' => __DIR__ . '/../classes/CRUD.class.php',
    'geo\countries' => __DIR__ . '/../classes/geo/countries.class.php',
    'outils\sendmail' => __DIR__ . '/../outils/mail.php',
    'classes\apis\Active' => __DIR__ . '/../classes/Active.class.php'
);

spl_autoload_register(function ($class) use ($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);