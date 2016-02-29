<?php

namespace geo;
use commun\CRUD;

class countries {

    public $geonameid;
    public $name;


    const nomTable = "villes";

    public static function selectAll()
    {
        return CRUD::selectMultiple(self::nomTable, "name", "ASC", null, null, 10);
    }

}