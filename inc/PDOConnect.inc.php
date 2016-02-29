<?php
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    die("Erreur PDO : " . $e->getMessage());
}