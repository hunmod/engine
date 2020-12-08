<?php

function db_Query($sql, &$error, $user, $password, $server , $dbase, $mode = "select")
{
    $link1 = new mysqli($server, $user, $password, $dbase);
    if ($link1->connect_errno)
    {
        $error= $retval['debug'][]="Connect failed: ".$link1->connect_error.'<br>';

    }
      $link1->character_set_name("utf8");
    /*if (!$link1->set_charset("utf8"))
      {
          $error=  $retval['debug'][]="Error loading utf8 caracterset: ".$link1->error.'<br>';

      }*/

    if (!$error) {
        if (strtolower ($mode) == "select") {
            $res2_2 = $link1->query($sql);
            $num2_2 = 0;
            $num2_2 = $res2_2->num_rows;
            if ($num2_2 > 0) {
                while ($row2_2 = $res2_2->fetch_assoc()) {
                    $egytomb2_2[] = $row2_2;
                }

            }
        } else if (strtolower ($mode) == "insert") {
            $res2_1 = $link1->query($sql);
            $egytomb2_2 = $link1->affected_rows;
            $egytomb2_2 = $link1->insert_id;
        }else{
            $res2_1 = $link1->query($sql);
            $egytomb2_2 = $link1->affected_rows;
        }
    }


    return $egytomb2_2;
}

?>