<?php
namespace commun;

class CRUD {

    public static function selectMultiple($table, $orderBy=null, $orderDir=null, $conditions=null, $sqlConditionsWhere=null, $limit=0) {

        $sql = "SELECT * FROM $table";

        $sqlWhere = "";
        $params = "";
        if (isset($conditions)) {
            $sqlWhere = " WHERE";
            $params = array();
            foreach ($conditions as $condition) {
                if ($sqlWhere != " WHERE") {$sqlWhere .= " AND";}
                $sqlWhere .= " (".$condition[0]." ".$condition[1]." :".$condition[0].")"; //ex. key = :key
                array_push($params, array("key" => ":$condition[0]", "val" => $condition[2])); //ex. array("key" => ":id", "val" => $id)
            }
        }
        $sql .= $sqlWhere;

        $sqlWhere2="";
        if (isset($sqlConditionsWhere)) {
            foreach ($sqlConditionsWhere as $sqlConditionWhere) {
                if ($sqlWhere != "") {$sqlWhere2 .= " AND";} else {$sqlWhere2 .= " WHERE";}
                $sqlWhere2 .= " (".$sqlConditionWhere.")";
            }
        }

        $sql .= $sqlWhere2;

        if (isset($orderBy) && isset($orderDir)) {
            $sql .= " ORDER BY $orderBy $orderDir";
        }

        if ($limit > 0) {$sql .= " LIMIT $limit";}
//echo $sql;
        $result=db::ExecuteDataSet($sql,$params);

        return $result;
    }

    public static function selectOne($table, $objet) {

        $sql = "SELECT * FROM $table WHERE id = :id LIMIT 1";

        $params = array(
            array("key" => ":id", "val" => $objet->id)
        );
        $result=db::ExecuteDataSet($sql,$params);

        //return $result;


        if (count($result) == 1) {

            $object_vars = get_object_vars($objet);
            $nomsChamps = array_keys($object_vars);
            foreach ($nomsChamps as $nomChamp) {
                $objet->{$nomChamp} = $result[0][$nomChamp];
            }
        } else {
            $objet->id = 0;
        }
    }

    public static function createUpdate($table, $objet)
    {
        $sql="";
        $params = array();
        $object_vars = get_object_vars($objet);


        if ($objet->id == 0) {
            //Liste des paramètres de la requête
            foreach ($object_vars as $nom => $valeur) {
                if ($nom != 'id' && $nom != 'TS') {
                    array_push($params, array("key" => ":$nom", "val" => $valeur)); //ex. array("key" => ":id", "val" => $id)
                }
            }

            $sql .= "INSERT INTO $table";

            $nomsChamps = array();
            $nomsParams = array();
            foreach ($object_vars as $nom => $valeur) {
                if ($nom != 'id' && $nom != 'TS') {
                    array_push($nomsChamps, $nom);
                    array_push($nomsParams, ':'.$nom);
                }
            }

            $champs = ' (' . implode(', ', $nomsChamps) . ')';
            $parametresValeurs = '(' . implode(', ', $nomsParams) . ')';
            $sql .= $champs.' VALUES '.$parametresValeurs;
            return db::ExecuteInsert($sql, $params);

        } else {
        //Liste des paramètres de la requête
            foreach ($object_vars as $nom => $valeur) {
                array_push($params, array("key" => ":$nom", "val" => $valeur)); //ex. array("key" => ":id", "val" => $id)
            }

            $sql .= "UPDATE $table SET ";

            $nomsParams = array();
            foreach ($object_vars as $nom => $valeur) {
                if ($nom != 'id' && $nom != 'TS') {
                    array_push($nomsParams, $nom . ' = :' . $nom);
                }
            }
            $champs = implode(", ", $nomsParams);

            $sql .= $champs;
            $sql .= " WHERE id = :id";
            return db::ExecuteUpdate($sql, $params);
        }

        //echo $sql;
    }

    public static function delete($table, $objet) {

        if ($objet->id != 0) {

            $sql = "DELETE FROM $table WHERE id = :id";

            $params = array(
                array("key" => ":id", "val" => $objet->id)
            );
            return db::ExecuteDataSet($sql, $params);
        }
    }

}