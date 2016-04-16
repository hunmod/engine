<?php
class gmrec
{
    public function status()
    {
        global $lan;
        $status[1] = $lan['status1'];
        $status[2] = $lan['status2'];
        $status[3] = $lan['status3'];
        $status[4] = $lan['status4'];
        return $status;
    }
    public function sorrend()
    {
        for ($i = 1; $i <= 10; $i++) {
            $status[$i] = $i;
        }

        return $status;
    }
    /*
    gmrec


    */
    public function table($data = array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = $tbl['gmrec'];

        $mezo = array();
        $mezo["id"] = 'id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo = array();
        $mezo["id"] = 'mid';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "mid";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'cim';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "Név";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'osszetevok';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "osszetevok";
        $mezo["display"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["type"] = 'text';
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'leiras';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "leiras";
        $mezo["display"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["type"] = 'text';
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'subject';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "megjegyzés";
        $mezo["display"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["type"] = 'text';
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'source';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "forrás";
        $mezo["display"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["type"] = 'text';
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();
        $mezo["id"] = 'uid';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "Felhasználó azonosító";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'status';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "Állapot";
        $mezo["display"] = 1;
        $mezo["type"] = 'array';
        $mezo["displaylist"] = 1;
        $mezo["values"] = $this->status();
        $mezo["values_type"] = '0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
        $mezo["value"] = $mezo["values"][$data[$mezo["id"]]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'sorrend';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "sorrend";
        $mezo["display"] = 1;
        $mezo["type"] = 'array';
        $mezo["displaylist"] = 1;
        $mezo["values"] = $this->sorrend();
        $mezo["values_type"] = '0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
        $mezo["value"] = $mezo["values"][$data[$mezo["id"]]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'ido';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ido";
        $mezo["display"] = 0;
        $mezo["displaylist"] = 0;
        $mezo["type"] = 'text';
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'like_count';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "like_count";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'favorite_count';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "favorite_count azonosító";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();
//		


        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;
    }
    public function table_addon($data = array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = $tbl['gmrec_addon'];
       // $table = 'gmrec_addon';

        $mezo = array();
        $mezo["id"] = 'recid';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "recid";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'addonid';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "addonid";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;
    }
    public function table_fields()
    {
        global $adatbazis, $tbl;
        $mdata = $this->table();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }
        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;
        return $datas;
    }
    public function table_fields_addon()
    {
        global $adatbazis, $tbl;
        $mdata = $this->table_addon();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }
        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;
        return $datas;
    }
    public function get_addon($filters, $order = '', $page = 'all')
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();

        if ($filters['maxegyoldalon'] > 0) {
            $maxegyoldalon = $filters['maxegyoldalon'];
        } else {
            $maxegyoldalon = 8;
        }
        $SD = $this->table_addon();
        if ($order != '') {
            $order = ' ORDER BY ' . $order;
        } else {
          //  $order = ' ORDER BY ' . $SD["table"] . '.`id` DESC ';
            $order = '';
        }

        //a tábla saját mezői
        foreach ($SD["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['table'];
        }
        //Táblázatok
        $tables = $SD["table"];

        //másik tábla mezői hozzáadása
        $mezok.=','.$tbl["gmrec"].'.cim as cim ';
        $mezok.=',allergen.name as name ';

        $tables.=','.$tbl["gmrec"].','.allergen;
        //tábla kapcsolat
        $where .= $Sys_Class->andsupport($where);
        $where.=$SD["table"].".recid=".$tbl["gmrec"].".id";
        $where .= $Sys_Class->andsupport($where);
        $where.=$SD["table"].".addonid=allergen.id";
//ez kell az összes találat megszámolásához
        $mezokc .= 'count(' . $SD["table"] . '.id) as count';

        /*
//menu kapcsolat
        $mezok .= $Sys_Class->comasupport($mezok);
        $mezok .= $prefix . "menu.nev as menu_name";
        $tables .= ',' . $prefix . 'menu';
        $where .= $Sys_Class->andsupport($where);
        $where .= $SD["table"] . ".mid=" . $prefix . "menu.id";
*/
//számos feltételek
        $fmezonev = 'recid';
        if ($filters[$fmezonev] != '' && $filters[$fmezonev] != 'all') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $fmezonev = 'addonid';
        if ($filters[$fmezonev] != '' && $filters[$fmezonev] != 'all') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '' . $SD["table"] . ".`" . $fmezonev . "` in(" . $filters[$fmezonev] . ") ";
        }

        $fmezonev = 's';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= "(`nev`LIKE'%" . $filters[$fmezonev] . "%'";
            //$where .= " OR " . $SD["table"] . ".`hir`LIKE'%" . $filters[$fmezonev] . "%'";
            //$where .= " OR " . $SD["table"] . ".`hir2`LIKE'%" . $filters[$fmezonev] . "%')";
        }

//ha van feltétel elé csapjuk hogy WHERE
        if ($where != '') {
            $where = " WHERE " . $where;
        }

//összes elem lekérdezése
        $queryc = "SELECT " . $mezokc . " FROM " . $tables . $where . ' ' . $order;
        $resultc = db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        //echo $queryc;
        //arraylist ($resultc);
        $result['count'] = $resultc[0]['count'];

//oldalazó
        if ($page != 'all') {
//$maxegyoldalon=page_settings("max_service_perpage");
            $oldalakszama = ceil($result['count'] / $maxegyoldalon);
            if ($maxegyoldalon > 0) {
                if (($page == "") || ($page <= 0)) {
                    $oldal = 0;
                } else {
                    $oldal = $page;
                }
                if ($page >= $oldalakszama) {
                    $page = $oldalakszama - 1;
                }
                //oldalak kiszámolása
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
    public function save_addon($datas)
    {
        global $adatbazis;
        $Sys_Class = new sys();
        //tábla adatai
        $SD = $this->table_fields_addon();
        $mtbl = $this->table_addon();

//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["recid"] > 0 && $datas["addonid"] > 0) {
            //insert
            foreach ($mtbl["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe['table'];
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . ($datas[$mezoe['id']]) . "'";
            }
            $query = "REPLACE INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
        //    echo $query . '<br>';
         //   echo $error;
            $res = null;
        }
        return ($res);//csak id-t ad vissza
    }
    public function del_addon($datas){
        global $adatbazis;
        $Sys_Class = new sys();
        //tábla adatai
        $SD = $this->table_fields_addon();
      //  $mtbl = $this->table_addon();

    //Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
    //	if (!isset($datas['active']))$datas['active']='1';
    //arraylist($datas);
        if ($datas["recid"] > 0 || $datas["addonid"] > 0) {
            if ( $datas["addonid"] > 0) {
                $where .= $Sys_Class->andsupport($where);
                $where .= '' . $SD["table"] . ".`addonid` = " . $datas['addonid'] . "";
            }
            if ($datas["recid"] > 0 ) {
                $where .= $Sys_Class->andsupport($where);
                $where .= '' . $SD["table"] . ".`recid` = " . $datas['recid'] . "";
            }
            $query = "
DELETE FROM  " . $SD["table"] . " WHERE " .$where ;
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
           // echo $query . '<br>';
           // echo $error. '<hr>';
            $res = NULL;

        }

    }
    public function create_table_addon()
    {
        global $adatbazis;
        $SD = $this->table_fields_addon();
        $q = "
	CREATE TABLE IF NOT EXISTS " . $SD["table"] . " (
  `recid` bigint(20) NOT NULL DEFAULT '0',
  `addonid` bigint(20) NOT NULL DEFAULT '0',


  PRIMARY KEY (`recid`,`addonid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
	";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
      /*  echo $q.'<br>';
        echo $error.'<hr>';*/
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
            $order = ' ORDER BY ' . $SD["table"] . '.`id` DESC ';
        }

        //a tábla saját mezői
        foreach ($SD["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['table'];
        }
        //Táblázatok
        $tables = $SD["table"];

        //másik tábla mezői hozzáadása
        //$mezok.='tabla.mezo'
        //tábla kapcsolat
        //$where.=$SD["table"].".mezo=tabla.mezo";

//ez kell az összes találat megszámolásához	
        $mezokc .= 'count(' . $SD["table"] . '.id) as count';


//menu kapcsolat
        $mezok .= $Sys_Class->comasupport($mezok);
        $mezok .= $prefix . "menu.nev as menu_name";
        $tables .= ',' . $prefix . 'menu';
        $where .= $Sys_Class->andsupport($where);
        $where .= $SD["table"] . ".mid=" . $prefix . "menu.id";

//számos feltételek	
        $fmezonev = 'id';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $fmezonev = 'mid';
        if ($filters[$fmezonev] != '' && $filters[$fmezonev] != 'all') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '' . $SD["table"] . ".`" . $fmezonev . "` in(" . $filters[$fmezonev] . ") ";
        }
        $fmezonev = 'status';
        if ($filters[$fmezonev] != '' && $filters[$fmezonev] != 'all') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '' . $SD["table"] . ".`" . $fmezonev . "` in(" . $filters[$fmezonev] . ") ";
        }

        $fmezonev = 'notid';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '' . $SD["table"] . ".`id` not in(" . $filters['notid'] . ") ";
        }

        $fmezonev = 'uid';
        if ($filters[$fmezonev] > 0) {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "'";
        }


        $fmezonev = 'ido';
        if ($filters[$fmezonev] > 0) {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`<='" . $filters[$fmezonev] . "'";
        }

        $fmezonev = 'status';
        if ($filters[$fmezonev] > 0) {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "'";
        } else
            if ($filters[$fmezonev] != 'all') {
                $where .= $Sys_Class->andsupport($where);
                $where .= $SD["table"] . ".`" . $fmezonev . "`='2'";
            }


        $fmezonev = 'tag';
        if ($filters[$fmezonev] != '') {
            $tables .= ',gmrec_tags,tags';
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".id=gmrec_tags.rec_id";
            $where .= $Sys_Class->andsupport($where);
            $where .= "tags.id=gmrec_tags.tag_id";


            $where .= $Sys_Class->andsupport($where);
            $where .= "tags.name LIKE '" . $filters[$fmezonev] . "'";
        }


//szöveges feltételek	
        $fmezonev = 'cim';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
        }

        $fmezonev = 's';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= "(" . $SD["table"] . ".`cim`LIKE'%" . $filters[$fmezonev] . "%'";
            $where .= " OR " . $SD["table"] . ".`hir`LIKE'%" . $filters[$fmezonev] . "%'";
            $where .= " OR " . $SD["table"] . ".`hir2`LIKE'%" . $filters[$fmezonev] . "%')";
        }

        $fmezonev = 'fav';
        if ($filters[$fmezonev] != '') {
            $tables .= ',user_favorite_gmrec';
            $mezokc .= ',user_favorite_gmrec.status as lstat';
            $mezok .= ',user_favorite_gmrec.status as lstat';

            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".id=user_favorite_gmrec.ad_id";


            $where .= $Sys_Class->andsupport($where);
            $where .= "user_favorite_gmrec.user_id IN (" . $filters[$fmezonev] . ") AND user_favorite_gmrec.status!=4 ";
        }


//ha van feltétel elé csapjuk hogy WHERE
        if ($where != '') {
            $where = " WHERE " . $where;
        }

//összes elem lekérdezése
        $queryc = "SELECT " . $mezokc . " FROM " . $tables . $where . ' ' . $order;
        $resultc = db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        //echo $queryc;
        //arraylist ($resultc);
        $result['count'] = $resultc[0]['count'];

//oldalazó	
        if ($page != 'all') {
//$maxegyoldalon=page_settings("max_service_perpage");

            $oldalakszama = ceil($result['count'] / $maxegyoldalon);
            if ($maxegyoldalon > 0) {
                if (($page == "") || ($page <= 0)) {
                    $oldal = 0;
                } else {
                    $oldal = $page;
                }


                if ($page >= $oldalakszama) {
                    $page = $oldalakszama - 1;
                }
                //oldalak kiszámolása

                if ($oldalakszama != "") {
                    $limit = " LIMIT " . ($page * $maxegyoldalon) . "," . $maxegyoldalon;
                }

            }
        }
        $query = "SELECT " . $mezok . " FROM " . $tables . $where . ' ' . $order . $limit;
//echo $query ;


        $result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");

       foreach ( $result['datas'] as &$datarow){
           $md=array();
           $md=$this->get_addon(array("recid"=>$datarow["id"]));
          foreach($md["datas"] as $addon) {
              $datarow['addonid'][$addon["addonid"]] = $addon["addonid"];
          }
       }


        $result['query'] = $query;
        $result['error'] = $error;
        return $result;
    }
    public function save($datas)
    {
        global $adatbazis,$Text_Class;
        $Sys_Class = new sys();
        //tábla adatai
        $SD = $this->table_fields();
        $mtbl = $this->table();

//arraylist($datas);
        if ($datas["id"] < 1) {
            //insert
            foreach ($mtbl["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe['table'];
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . ($datas[$mezoe['id']]) . "'";
            }
            $query = "INSERT INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
            echo $query . '<br>';
            echo $error;
            $res = mysql_insert_id();
        } else {
            $res = $datas["id"];
            //update
            foreach ($mtbl["mezok"] as $mezoe) {
                if (isset($datas[$mezoe['id']])) {
                    $datasb .= $Sys_Class->comasupport($datasb);
                    $datasb .= "" . $mezoe['table'] . " =  '" . ($Text_Class->htmltochars($datas[$mezoe['id']])) . "'";
                }
            }
            $query = "UPDATE  " . $SD["table"] . " SET  " . $datasb . "   WHERE  `id` =" . $datas["id"] . " LIMIT 1 ;";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "UPDATE");
            //$res= mysql_insert_id();
            /*echo $query;
            echo $error;*/

        }
        //recepthez tartozó allergének mentése
        if(count($datas["addonid"]) and $res>0){

            //$this->create_table_addon();
            $this->del_addon(array("recid"=>$res));
            $addons=array();
            foreach($datas["addonid"] as $addaddon){
                $addon["addonid"]=$addaddon;
                $addon["recid"]=$res;
                $this->save_addon($addon);

                $addons[]=$addon;
            }
           // arraylist($addons);
        }

        return ($res);//csak id-t ad vissza
    }
    public function create_table()
    {
        global $adatbazis;
        $SD = $this->table_fields();
        $q = "
	CREATE TABLE IF NOT EXISTS " . $SD["table"] . " (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mid` bigint(20) NOT NULL DEFAULT '0',
  `cim` varchar(200) NOT NULL,
  `osszetevok` text NOT NULL,
  `leiras` text NOT NULL,
  `subject` text NOT NULL,
  `source` varchar(200) NOT NULL,
  
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `ido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) DEFAULT '1',
  `sorrend` int(11) NOT NULL DEFAULT '10',
  `like_count` INT NOT NULL,
  `favorite_count` INT NOT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
	";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
        //echo $q.'<br>';
        //echo $error;
    }
    public function getimg($id, $x = 369, $y = 247)
    {
        global $adatbazis, $folders, $defaultimg, $hirimg_loc, $homeurl;

        $img = $hirimg_loc . '' . $id . '/' . $id . '.jpg';
        //$img=randomimgtofldr($mappa);
        //echo $img;
        if (is_file($img)) {
            $img = $img;
        } else {
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
        return $homeurl . $separator . "recept/" . $Text_Class->to_link($hir["cim"]) . "/" . ($hir["id"]);
    }
//tags
    public function create_tags_table()
    {


        $q = "
CREATE TABLE IF NOT EXISTS '" . $tbl['gmrec'] . "_tags` (
  `rec_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
    }
//like
    public function create_like_table()
    {


        $q =
            "
CREATE TABLE IF NOT EXISTS `user_like_gmrec` (
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`ad_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
    }
//fav
    public function create_fav_table()
    {
        $q =
            "
CREATE TABLE IF NOT EXISTS `user_favorite_gmrec` (
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`ad_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
    }
//tags recipe
    public function del_ad_tags($rec_id)
    {
        //a bloghoz tartozó tagek törlése
        $gettags_blog = $this->get_tags_blog($rec_id);
        if (count($gettags_blog)) {
            foreach ($gettags_blog as $one)
                $save_tags = array();
            $save_tags["tag_id"] = $one["tag_id"];
            $save_tags["rec_id"] = $one["rec_id"];
            $this->update_tags_blog($save_tags);
        }
    }
    public function save_ad_tags_field($data)
    {
        {
            $this->del_ad_tag(array('rec_id' => $data["id"]));
            //vesszővel elválasztva a tag id-k.
            //arraylist($data);
            if ($data["blog_tags"] && $data["id"]) {
                $tags = explode(',', $data["blog_tags"]);

                //a bloghoz tartozó tagek mentése
                if (count($tags)) {
                    foreach ($tags as $onetag) {
                        if ($onetag > 0) {
                            $save_tags = array();
                            $save_tags["tag_id"] = $onetag;
                            $save_tags["rec_id"] = $data["id"];

                            $this->save_ad_tag($save_tags);
                        }
                    }
                }
            }
        }

    }
    public function del_ad_tag($data)
    {
        global $adatbazis;

        if ($data['rec_id'] > 0 || $data['tag_id'] > 0) {

            if ($data['rec_id'] > 0) {
                $WHERE = "`rec_id`='" . $data['rec_id'] . "'";
            }


            if ($data['tag_id'] > 0) {
                if ($WHERE != "") {
                    $WHERE .= " AND ";
                }

                $WHERE .= "`tag_id`='" . $data['tag_id'] . "'";
            }

            $query = "DELETE FROM '" . $tbl['gmrec'] . "_tags` WHERE " . $WHERE;
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "delete");
            //echo $query;

        }


    }
    public function save_ad_tag($data)
    {
        global $adatbazis, $tbl;

        $query = "INSERT INTO  '" . $tbl['gmrec'] . "_tags` (`rec_id` ,`tag_id` ,`created` )
		VALUES ('" . $data["rec_id"] . "',  '" . $data['tag_id'] . "', now());";
        $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "insert");
        //echo $query;
    }
    public function get_ad_tag($filters)
    {
        global $adatbazis, $tbl;

        $where = " WHERE ";
        $where .= "" . $tbl['gmrec'] . "_tags.tag_id=tags.id";
        $where .= " AND tags.status=2";


        $mezok = 'gmrec_tags.rec_id';
        $mezok .= ',gmrec_tags.tag_id';
        $mezok .= ',tags.name';

        $tables = 'gmrec_tags,tags';


        if ($filters["rec_id"] > 0) {
            $where .= " AND gmrec_tags.rec_id='" . $filters["rec_id"] . "'";
        }
        if ($filters["tag_id"] > 0) {
            $where .= " AND gmrec_tags.tag_id='" . $filters["tag_id"] . "'";
        }

        if ($filters["ad"] > 0) {
            $where .= " AND gmrec_tags.rec_id in(" . $filters["ad"] . ")";
        }
        if ($filters["tag"] > 0) {
            $where .= " AND gmrec_tags.tag_id='" . $filters["tag"] . "'";
        }

        $query = "SELECT " . $mezok . " FROM " . $tables . $where . ' ' . $order . ' GROUP BY gmrec_tags.tag_id';
        //echo $query ;
        if (count($filters) > 0)
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        return $result;
    }
//like, favorietes
    public function user_like_ads($uid, $adid, $status = 1)
    {
        global $adatbazis;
        $q = "REPLACE INTO  `user_like_gmrec` (`user_id` ,`ad_id` ,`status`)VALUES ('" . $uid . "',  '" . $adid . "',  '" . $status . "'
);";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "insert");

    }
    public function get_user_action_ads($table, $filters, $order = '')
    {
        global $adatbazis;
        //table= user_like_ads
        if ($order != '') {
            $order = ' ORDER BY ' . $order;
        }
        $where = " WHERE ";
        $where .= "" . $table . ".status='1'";
        $mezok = $table . '.user_id';
        $mezok .= ',' . $table . '.ad_id';
        $mezok .= ',' . $table . '.status';
        $mezok .= ',' . $table . '.created';

        $tables = '' . $table . '';


        $mezok .= ',user.nev';
        $mezok .= ',user.unev';
        $tables .= ',user';
        $where .= " AND " . $table . ".user_id=user.id";

        /*	$mezok.=',recipe.name';
            $tables.=',recipe';
            $where.=" AND ".$table.".ad_id=recipe.id";	*/


        if ($filters["count_ad"] != '') {
            $mezok .= ',count(' . $table . '.ad_id) as count';
            $group = ' GROUP BY ad_id';
        }

        if ($filters["count_user"] != '') {
            $mezok .= ',count(' . $table . '.user_id) as count';
            $group = ' GROUP BY user_id';
        }

        /*
        if ($filters["job"]!=''){
                $where.=" AND recipe.name LIKE'%".$filters["job"]."%'";
        }
        */
        if ($filters["user"] != '') {
            $mezok .= ',count(' . $table . '.ad_id) as count';
            $where .= " AND user.nev LIKE'%" . $filters["user"] . "%'";
            $where .= " AND user.unev LIKE'%" . $filters["user"] . "%'";
        }
        if ($filters["tol"] > 0) {
            $where .= " AND " . $table . ".created>'" . date("Y-m-d H:i:s", strtotime($filters["tol"])) . "'";
        }
        if ($filters["ig"] > 0) {
            $where .= " AND " . $table . ".created<'" . date("Y-m-d H:i:s", strtotime($filters["ig"])) . "'";
        }
        if ($filters["user_id"] > 0) {
            $where .= " AND " . $table . ".user_id='" . $filters["user_id"] . "'";
        }
        if ($filters["ad_id"] > 0) {
            $where .= " AND " . $table . ".ad_id='" . $filters["ad_id"] . "'";
        }
        $query = "SELECT " . $mezok . " FROM " . $tables . $where . ' ' . $group . $order;
        //echo $query ;
        if (count($filters) > 0)
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        return $result;
    }
    public function get_user_like_ads($filters, $order = '')
    {
        $result = $this->get_user_action_ads('user_like_gmrec', $filters, $order);
        return $result;
    }
    public function user_favorite_ads($uid, $adid, $status = 1)
    {
        global $adatbazis;

        $q = "REPLACE INTO  `user_favorite_gmrec` (`user_id` ,`ad_id` ,`status`)VALUES ('" . $uid . "',  '" . $adid . "',  '" . $status . "'
);";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], '', "insert");

    }
    public function get_user_favorite_ads($filters)
    {
        $result = $this->get_user_action_ads('user_favorite_gmrec', $filters, $order);
        return $result;
    }
    public function get_user_action_ads_array_fromad($array)
    {
        if (count($array) && $array != false) foreach ($array as $elem) {
            $ret[$elem['ad_id']] = $elem['user_id'];
        }
        return $ret;
    }
    public function get_user_action_ads_coma_fromad($array)
    {
        $ret = '';
        if (count($array) && $array != false) foreach ($array as $elem) {
            if ($ret != '') $ret .= ',';
            $ret .= $elem['ad_id'];
        }
        return $ret;
    }
///
//a kedvelések, reportok számát írja felül
    public function update_job_count($data)
    {
        global $adatbazis;
        if ($data["id"]) {
            $query = "UPDATE  `gmrec` SET ";
//if (isset($data["report_count"]))$query.="`report_count` =  '".$data["report_count"]."'";
            if (isset($data["like_count"])) $query .= "`like_count` =  '" . $data["like_count"] . "'";
//if (isset($data["myjob_count"]))$query.="`myjob_count` =  '".$data["myjob_count"]."'";
            if (isset($data["favorite_count"])) $query .= "`favorite_count` =  '" . $data["favorite_count"] . "'";

            $query .= " WHERE  `gmrec`.`id` =" . $data["id"] . " LIMIT 1 ;";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "update");
            //echo $query ;
        }
    }
//
//Listák
//
    public function create_list($tablename)
    {
        global $adatbazis;

        $q = "CREATE TABLE  `" . $tablename . "` (
 `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `name` VARCHAR( 400 ) NOT NULL ,
 `status` TINYINT NOT NULL
) ENGINE = MYISAM ;";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
    }
    public function update_list($table, $data)
    {
        global $adatbazis,$Text_Class;
        $query = "UPDATE  `" . $table . "` SET  `name` =  '" . $Text_Class->htmltochars($data['name'] ). "',`status` =  '" . $data["status"] . "' WHERE  `id` =" . $data["id"] . " LIMIT 1 ;";
        $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "update");
        //echo $query ;
    }
    public function save_list($table, $data)
    {
        global $adatbazis,$Text_Class;
        //$Sys_Class = new sys();

        if (intval($data["id"]) < 1) {
            //echo $data["id"];
            $query = "INSERT INTO  `" . $table . "` (`id` ,`name` ,`status`)VALUES ('" . $data['id'] . "',  '" . $Text_Class->htmltochars($data['name'] ). "','" . $data['status'] . "');";
            //var_dump ($data) ;
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "insert");
        } else {
            $this->update_list($table, $data);
        }

    }
    public function get_list($table, $filter)
    {
        global $adatbazis;

        if ($filter["id"] > 0) {
            $where .= $this->sqlwhereand($where);
            $where .= "id='" . $filter["id"] . "'";
        }

        if ($filter["ids"] > 0) {
            $where .= $this->sqlwhereand($where);
            $where .= "id in (" . $filter["ids"] . ")";
        }

        if ($filter["name"] != '') {
            $where .= $this->sqlwhereand($where);
            $where .= "name LIKE '%" . $filter["name"] . "%'";
        }
        if ($filter["name2"] != '') {
            $where .= $this->sqlwhereand($where);
            $where .= "name = '" . $filter["name2"] . "'";
        }

        if ($table == "cuisine" && $filter["code"] != '') {
            $where .= $this->sqlwhereand($where);
            $where .= "code = '" . $filter["code"] . "'";
        }

        if ($filter["status"] != '' && $filter["status"] != 'all') {
            $where .= $this->sqlwhereand($where);
            $where .= "status = '" . $filter["status"] . "'";
        } else if ($filter["status"] == 'all') {

        } else if ($filter["status"] == 'null') {
            $where .= $this->sqlwhereand($where);
            $where .= "status != '4'";

        } else {
            $where .= $this->sqlwhereand($where);
            $where .= "status = '2'";
        }
        $q = "SELECT * FROM  `" . $table . "`" . $where . " ORDER BY  `name` ASC ";
        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        //var_dump($filter);
        //echo $q;
        return $result;

    }
    public function sqlwhereand($where)
    {
        //echo $where;
        if ($where == "") {
            $whereb = ' WHERE ';
        } else {
            $whereb .= ' AND ';
        }
        return $whereb;

    }

}
?>