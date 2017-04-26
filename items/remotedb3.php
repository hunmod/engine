<?php
function setStr($src, &$dest)
{
    $dest = $src;
}
function db_Query($sql, &$error, $user, $password, $server, $dbase, $mode = "select")
{
    if (!isset($GLOBALS['mysqlLink'])) {
        global $mysqlLink;
    }
    if (!isset($GLOBALS['mysqlLink'][$user])) {
       $GLOBALS['mysqlLink'][$user] = mysql_connect($server, $user, $password, true) or die(mysql_error());
       // $GLOBALS['mysqlLink'][$user] = mysqli_connect($server, $user, $password, true) or die(mysql_error());



    }
    /*mysql_query("SET character_set_results = 'utf8'");
    mysql_query("SET character_set_server = 'utf8'");
    mysql_query("SET character_set_client = 'utf8'");*/
    mysql_query("SET NAMES UFT8");
    mysql_query('set character set utf8');
    mysql_select_db($dbase, $GLOBALS['mysqlLink'][$user]);
    $error = "";
    $db_res = mysql_query($sql, $GLOBALS['mysqlLink'][$user]) or setStr(mysql_error($GLOBALS['mysqlLink'][$user]), $error);
 //   $db_res = mysql_query($sql, $GLOBALS['mysqlLink'][$user]) or setStr(mysqli_connect_error($GLOBALS['mysqlLink'][$user]), $error);
    if ($error == "") {
        if ($mode == "select") {
            $out = array();
            while ($db_row = mysql_fetch_assoc($db_res)) {
                $out[] = $db_row;
            }
            return $out;
        }
        return true;
    } else {
        return false;
    }
}
?>