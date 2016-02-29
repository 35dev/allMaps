<?php
namespace outils;

class form {

    public static function frmSelectQte($class, $id, $name, $min, $max) {
        $tag = '<select class="' . $class . '" id="' . $id . '" name="' . $name . '">';
        for ($i = $min; $i <= $max; $i++) {
            $tag .= '<option value="' . $i . '">' . $i . '</option>';
        }
        $tag .= '</select>';
        return $tag;
    }
}