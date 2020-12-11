<?php

function db_Query($sql, &$error, $user, $password, $server , $dbase, $mode = "select")
{
        $dbLink = new PDO("mysql" . ':host=' . $server . ';dbname=' . $dbase, $user, $password);
        $dbLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $dbLink->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }



    try {
        //var_dump($sql);
        $dbLink->prepare($sql);
        $stmt = $dbLink->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (strtolower ($mode)== strtolower ( 'INSERT')){
            $result = $dbLink->lastInsertId();
        }

    } catch (PDOException $e) {
        $result['error'] = $e -> errorInfo;
    }




    return $result;







}

?>