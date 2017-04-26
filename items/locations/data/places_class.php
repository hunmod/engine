<?php
class places
{
public function status()
{
$status[1] = lan('status1');
$status[2] = lan('status2');
$status[3] = lan('status3');
$status[4] = lan('status4');
return $status;
}

    public function sorrend(){
        for ($i = 1; $i <= 10; $i++)
        {
            $status[$i]=$i;	}

        return $status;
    }


    public function table_text($lang,$data=array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = 'events_text_' . $lang;

        $mezo = array();
        $mezo["id"] = 'id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL PRIMARY KEY,";
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'title';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "title";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 100 ) NOT NULL,";
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'leadtext';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "leadtext";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` TEXT,";
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'longtext';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "longtext";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` TEXT,";
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'included';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "included";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` TEXT";
        $mezok[] = $mezo;

        $datas['mysql_end'] = ")ENGINE = MYISAM ;";
        $datas['table'] = $table;
        $datas['mezok'] = $mezok;
        return $datas;

    }
    public function table($data=array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = 'events';

        $mezo = array();
        $mezo["id"] = 'id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'priece';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "priece";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 100 ) NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'tip';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "tip";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL DEFAULT  '0',";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;


        $mezo = array();
        $mezo["id"] = 'zip';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "zip";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL DEFAULT  '0',";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;


        $mezo = array();
        $mezo["id"] = 'city';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "city";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL DEFAULT  '0',";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;


        $mezo = array();
        $mezo["id"] = 'cimnev';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "cimnev";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 300 ) ,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'cim';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "cim";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 300 ) ,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'email';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "email";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 300 ) ,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'tel';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "tel";
        $mezo["display"] = 0;
        $mezo["type"] = 'tel';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 300 ) ,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'tel1';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "tel1";
        $mezo["display"] = 0;
        $mezo["type"] = 'tel';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 300 ) ,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'longi';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "longi";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` double NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'lati';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "lati";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` double NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;


        $mezo = array();
        $mezo["id"] = 'fromdate';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "fromdate";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` DATE NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'todate';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "todate";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` DATE NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'fromshow';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "fromshow";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` DATE NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'toshow';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "toshow";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` DATE NOT NULL,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'categories';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "categories";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` TEXT,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'otherdatas';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "otherdatas";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` TEXT,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'sorrend';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "sorrend";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL DEFAULT  '5',";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'status';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "status";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL DEFAULT  '1'";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $datas['mysql_end'] = ")ENGINE = MYISAM ;";
        $datas['table'] = $table;
        $datas['mezok'] = $mezok;
        return $datas;


    }
   /* public function table_fields()
    {
        global $adatbazis, $tbl;

        //$table=$tbl['service_cat'];
        //$mezok[]=$table.'.'.'`status`';

        $mdata = $this->table();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }
    public function table_fields_text($lan)
    {
        global $adatbazis, $tbl;

        //$table=$tbl['service_cat'];
        //$mezok[]=$table.'.'.'`status`';

        $mdata = $this->table_text($lan);
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }*/
    public function get_text($lang, $filters, $order = '', $page = 'all')
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();

        if ($lang == '') {
            $lang = 'hu';
        }

        if ($filters['maxegyoldalon'] > 0) {
            $maxegyoldalon = $filters['maxegyoldalon'];
        } else {
            $maxegyoldalon = 8;
        }

        $SD = $this->table_text($lang);

        if ($order != '') {
            $order = ' ORDER BY ' . $order;
        } else {
            $order = ' ORDER BY ' . $SD["table"] . '.`id` DESC ';
        }

        //a t�bla saj�t mez�i
        foreach ($SD["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['table'];
        }
        //T�bl�zatok
        $tables = $SD["table"];

//ez kell az �sszes tal�lat megsz�mol�s�hoz
        $mezokc .= 'count(' . $SD["table"] . '.id) as count';


//sz�mos felt�telek
        $fmezonev = 'id';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }
        $fmezonev = 'ids';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`id` in (" . $filters[$fmezonev] . ") ";
        }

//ha van felt�tel el� csapjuk hogy WHERE
        if ($where != '') {
            $where = " WHERE " . $where;
        }

//�sszes elem lek�rdez�se
        $queryc = "SELECT " . $mezokc . " FROM " . $tables . $where . ' ' . $order;
        $resultc = db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        //echo $queryc;
        //arraylist ($resultc);
        $result['count'] = $resultc[0]['count'];

//oldalaz�
        if ($page != 'all') {
//$maxegyoldalon=page_settings("max_service_perpage");
            $oldalakszama = ceil($result['count'] / $maxegyoldalon);
            if ($maxegyoldalon > 0) {
                if (($page == "") || ($page <= 0)) {
                    $oldal = 0;
                } else {
                    $oldal = $page;
                    $oldal--;
                }


                if ($oldal >= $oldalakszama) {
                    $oldal = $oldalakszama - 1;
                }
                //oldalak kisz�mol�sa

                if ($oldalakszama != "") {
                    $limit = " LIMIT " . ($oldal * $maxegyoldalon)-$maxegyoldalon . "," . $maxegyoldalon;
                }

            }
        }
        $query = "SELECT " . $mezok . " FROM " . $tables . $where . ' ' . $order . $limit;
//echo $query ;


        $result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        $result['query'] = $query;
        $result['error'] = $error;
        //arraylist($result);
        return $result;
    }
    public function get($filters, $order = '', $page = 'all')
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();

        if ($filters['maxegyoldalon'] > 0) {
            $maxegyoldalon = $filters['maxegyoldalon'];
        } else {
            $maxegyoldalon = 8;
        }

        $SD = $this->table();



        if ($order != '') {
            $order = ' ORDER BY ' . $order;
        } else {
            $order = ' ORDER BY ' . $SD["table"] . '.`sorrend` ASC, ' . $SD["table"] . '.`fromdate` ASC  ';
        }

        //a t�bla saj�t mez�i
        foreach ($SD["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['table'];
        }
        //T�bl�zatok
        $tables = $SD["table"];

        if($filters['lang']) {
            $SD2 = $this->table_text( $language = $filters['lang'],$data = array());
            $tables .= ',' . $SD2["table"];

            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $SD2["table"] . ".title as 'title'";
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $SD2["table"] . ".leadtext as 'leadtext'";
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $SD2["table"] . ".longtext as 'longtext'";
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD2["table"] . ".id" . ' = ' . $SD["table"] . ".id ";
        }




//ez kell az �sszes tal�lat megsz�mol�s�hoz
        $mezokc .= 'count(' . $SD["table"] . '.id) as count';


//sz�mos felt�telek
        $fmezonev = 'id';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }
        $fmezonev = 'ids';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`id` in (" . $filters[$fmezonev] . ") ";
        }

        $fmezonev = 'today';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`fromshow` <= '" . $filters[$fmezonev] . "' AND " . $SD["table"] . ".`toshow` >= '" . $filters[$fmezonev] . "'  ) OR " . $SD["table"] . ".`toshow` = ''";
        }

//ha van felt�tel el� csapjuk hogy WHERE
        if ($where != '') {
            $where = " WHERE " . $where;
        }

//�sszes elem lek�rdez�se
        $queryc = "SELECT " . $mezokc . " FROM " . $tables . $where . ' ' . $order;
        $resultc = db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        // echo $queryc;
        //arraylist ($resultc);
        $result['count'] = $resultc[0]['count'];

//oldalaz�
        if ($page != 'all') {
//$maxegyoldalon=page_settings("max_service_perpage");
            $oldalakszama = ceil($result['count'] / $maxegyoldalon);
            if ($maxegyoldalon > 0) {
                if (($page == "") || ($page <= 1)) {
                    $oldal = 0;
                } else {
                    $oldal = $page;
                }


                if ($page >= $oldalakszama) {
                    $page = $oldalakszama - 1;
                }
                //oldalak kisz�mol�sa

                if ($oldalakszama != "") {
                    $limit = " LIMIT " . ($page * $maxegyoldalon) . "," . $maxegyoldalon;
                }

            }
        }
        $query = "SELECT " . $mezok . " FROM " . $tables . $where . ' ' . $order . $limit;
//echo $query ;


        $result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        $result['query'] = $query;
        $result['error'] = $error;
        return $result;
    }
    public function save_text($lan, $datas)
    {
        global $adatbazis;
        $Sys_Class = new sys();
        //t�bla adatai
        $mtbl = $this->table_text($lan);

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        //insert
        foreach ($mtbl["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['table'];
            $datasb .= $Sys_Class->comasupport($datasb);
            $datasb .= "'" . ($datas[$mezoe['id']]) . "'";
        }
        $query = "replace INTO  " . $mtbl["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
        $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
        //echo $query.'<br>';
        //echo $error.'<br>';
        $res = mysql_insert_id();

        return ($res);//csak id-t ad vissza
    }

    public function save($datas)
    {
        global $adatbazis;
        $Sys_Class = new sys();
        //t�bla adatai
        $mtbl = $this->table();

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["id"] < 1) {
            //insert
            foreach ($mtbl["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe['table'];
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . ($datas[$mezoe['id']]) . "'";
            }
            $query = "INSERT INTO  " . $mtbl["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
            //echo $query.'<br>';
            //echo $error.'<br>';
            $res = mysql_insert_id();
        } else {
            $res = $datas["id"];
            //update
            foreach ($mtbl["mezok"] as $mezoe) {
                if (isset($datas[$mezoe['id']])) {
                    $datasb .= $Sys_Class->comasupport($datasb);
                    $datasb .= "" . $mezoe['table'] . " =  '" . ($datas[$mezoe['id']]) . "'";
                }
            }
            $query = "UPDATE  " . $mtbl["table"] . " SET  " . $datasb . "   WHERE  `id` =" . $datas["id"] . " LIMIT 1 ;";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "UPDATE");
            /*echo $query;
            echo $error;*/

        }
        return ($res);//csak id-t ad vissza
    }

    public function getimg($id, $x = 369, $y = 247)
    {
        global $adatbazis, $folders, $defaultimg, $places_loc, $homeurl;

        $img = $places_loc . '/' . $id . '/' . $id . '.jpg';
        //$img=randomimgtofldr($mappa);
        //echo $img;
        if (is_file($img)) {
            $img = $img;
        } else {
            $defaultimg='noimage.jpg';

            $img = "uploads/" . $defaultimg;
        }
        $img = $homeurl . "/picture2.php?picture=" . encode($img) . "&x=" . $x . "&y=" . $y . "&ext=.jpg";

        /*
            if ($img!="none"){
                            //echo $mappa."/".$img;

                $img="picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";
                    //echo $mappa;

            }
            else{
                $img="uploads/".$defaultimg;
            }*/
        return ($img);
    }


    public function createurl($hir)
    {
        global $Text_Class, $homeurl, $separator;
        return $homeurl . $separator . "locations/event/" . $hir["id"] . "/" . $Text_Class->to_link($hir["title"]);
    }

    public function create_table()
    {
        global $adatbazis;
        $SD = $this->table();
        $q = "CREATE TABLE IF NOT EXISTS " . $SD["table"] . " (";
        foreach ($SD["mezok"] as $mezo) {
            $q .= " " . $mezo["mysql_field"];

        }
        $q .= " " . $SD["mysql_end"];

        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
        //	echo $q.'<br>';
        //	echo $error;
    }

    public function create_table_text($lang)
    {
        global $adatbazis;
        $SD = $this->table_text($lang);
        $q = "CREATE TABLE IF NOT EXISTS " . $SD["table"] . " (";
        foreach ($SD["mezok"] as $mezo) {
            $q .= " " . $mezo["mysql_field"];

        }
        $q .= " " . $SD["mysql_end"];

        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
        //echo $q.'<br>';
        //echo $error;
    }


   public function datasencode($datas){
       json_encode($datas);
   }
   public function datasdecode($datas){
       json_decode($datas);
   }

}

$PlacesClass = new places();

$PlacesClass->create_table();
$PlacesClass->create_table_text('hu');
$PlacesClass->create_table_text('en');
$PlacesClass->create_table_text('de');
$eventtatus = $PlacesClass->status();
$eventsorrend = $PlacesClass->sorrend();
?>