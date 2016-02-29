<?php
namespace commun;
use pdo;

class db {

    public static function ExecuteDataSet($sql, $params)
    {
        global $dbh;
        $sth = $dbh->prepare($sql);

        if (!empty($params)) {
        foreach ($params as $param) {
            $sth->bindParam($param['key'], $param['val']);
        }
    }

        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public static function ExecuteUpdate($sql, $params)
    {
        global $dbh;
        $sth = $dbh->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $param) {
                $sth->bindParam($param['key'], $param['val']);
            }
        }

        return $sth->execute();
    }

    public static function ExecuteInsertSimple($sql, $params)
    {
        global $dbh;
        $sth = $dbh->prepare($sql);

            if (!empty($params)) {
                foreach ($params as $param) {
                    $sth->bindParam($param['key'], $param['val']);
                }
            }

            $sth->execute();
    }

    public static function ExecuteInsert($sql, $params)
    {
        $returnId = -1;
        global $dbh;
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbh->beginTransaction();

        try {


        $sth = $dbh->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $param) {
                $sth->bindParam($param['key'], $param['val']);
            }
        }

        $sth->execute();
        $returnId = $dbh->lastInsertId();
            $dbh->commit();

        }

        catch(PDOException $e)

        {
            $dbh->rollBack();
        }

        return $returnId;

    }


    public static function ExecuteDelete($sql, $params)
    {
        global $dbh;
        $sth = $dbh->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $param) {
                $sth->bindParam($param['key'], $param['val']);
            }
        }

        return $sth->execute();
    }

}