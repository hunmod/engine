<?php

class gpsacars extends gpsa
{

    public function table_usercar($data = array())
    {
        global $adatbazis, $tbl;
        $table = $tbl["usercar"];
        $mezo["id"] = 'uid';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "uid";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'cid';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "cid";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'jog';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "jog";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'tilt';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "tilt";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'leker';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "leker";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'menet';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "menet";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'geo';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "geo";
        $mezo["display"] = 0;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;
    }

    public function table_usercar_fields()
    {
        global $adatbazis, $tbl;

        //$table=$tbl['service_cat'];
        //$mezok[]=$table.'.'.'`status`';

        $mdata = $this->table_usercar();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }

    public function table_gpscars($data = array())
    {
        global $adatbazis, $tbl;
        $table = $tbl["gpscars"];

        $mezo["id"] = 'vrendszam';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "Rendszám";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["length"] = '10';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'rendszam';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "IMEI";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'ugyfelazon';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "user";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'password';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "jelszó";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'cegnev';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "cegnev";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'szlanev';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szlanev";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'szlacim';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szlacim";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'szlahelyseg';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szlahelyseg";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'szlairszam';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szlairszam";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'boritek';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "boritek";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'postacim';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "postacim";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'adoszam';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "adoszam";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'fizhat';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "fizhat";
        $mezo["display"] = 1;
        $mezo["type"] = 'date';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'fizidoszak';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "fizidoszak";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'szlaidoszak';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szlaidoszak";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'szerzszam';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szerzszam";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'csoport';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "csoport";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'szint';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "szint";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'gyartdatum';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "gyartdatum";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'menlevelofizkezd';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "menlevelofizkezd";
        $mezo["display"] = 1;
        $mezo["type"] = 'date';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'menlevelofiz';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "menlevelofiz";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'eszkozberlet';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "eszkozberlet";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'webelofizkezd';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "webelofizkezd";
        $mezo["display"] = 1;
        $mezo["type"] = 'date';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'kiszereles';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "kiszereles";
        $mezo["display"] = 1;
        $mezo["type"] = 'date';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'modositas';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "modositas";
        $mezo["display"] = 1;
        $mezo["type"] = 'date';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'email';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "email";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();
        /*
        webelofiz
        roaming
        dsp
        alapdij
        webdij
        menlevdij
        dspdij
        roamingdij
        poziciokeres
        smsdij
        havidijkedvez
        havidijemeles
        berletdij
        berletkedvez
        berletemeles
        euro
        vv
        jutalek
        email
        erosit
        */
        $mezo["id"] = 'tel';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "tel";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'sim';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "sim";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        /*
        megjegyzes
        megjegyzes_datum
        egyenleg
        szerviz
        ertesites
        sms
        pinpoint
        motortiltas
        eszktip
        mod
        jarmutip
        elhelyezes
        alvazszam
        server
        tankmeret
        fogyasztasi_alapnorma
        telepito
        */

        $mezo["id"] = 'statusz';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "statusz";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 0;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;

    }

    public function get_regisztracio($filters = array())
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();

        $fmezonev = 'username';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $fmezonev = 'imei';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $query = "SELECT * FROM  `regisztracio` " . $where;

        $result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        $result['query'] = $query;
        $result['error'] = $error;
        return $result;


    }

    public function get_cars($filters, $order = '', $page = 'all')
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();

        if ($filters['maxegyoldalon'] > 0) {
            $maxegyoldalon = $filters['maxegyoldalon'];
        } else {
            $maxegyoldalon = 20;
        }

        $SD = $this->table_gpscars();

        if ($order != '') {
            $order = ' ORDER BY ' . $order;
        } else {
            //$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
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


//számos feltételek
        $fmezonev = 'id';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $fmezonev = 'notid';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`szerzszam` not in (" . $filters[$fmezonev] . ") ) ";
        }


//szöveges feltételek

        $fmezonev = 's';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`vrendszam` LIKE '%" . $filters[$fmezonev] . "%' OR ";
            $where .= $SD["table"] . ".`rendszam` LIKE '%" . $filters[$fmezonev] . "%'";
        }

        $fmezonev = 'vrendszam';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
        }
        $fmezonev = 'rendszam';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
        }


        $fmezonev = 'rendszam';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
        }


        $fmezonev = 'csoport';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
        }


        $fmezonev = 'ugyfelazon';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
        }
        $fmezonev = 'szerzszam';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
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

    public function save_user_car($datas)
    {
        global $adatbazis, $Sys_Class;
        if ($datas["uid"] != "" && $datas["cid"] != "") {

            $SD = $this->table_usercar_fields();
            //insert
            foreach ($SD["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe;
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . $datas[$mezoe] . "'";
            }
            $query = "REPLACE INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
            // echo $query.'<br>';
            // echo $error;
            $res = mysql_insert_id();
            // echo "bejut";
        } else echo "error";
    }

    public function del_user_car($datas)
    {
        global $adatbazis, $Sys_Class;
        if ($datas["uid"] != "" && $datas["cid"] != "") {

            $SD = $this->table_usercar_fields();
            //DELETE
            //$query = "REPLACE INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
            $query = "DELETE FROM " . $SD["table"] . " WHERE uid=".$datas["uid"].' AND cid='.$datas["cid"];
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "DELETE");
            // echo $query.'<br>';
            // echo $error;
            $res = mysql_insert_id();
            // echo "bejut";
        } else echo "error";
    }

    public function get_usercar($filters, $order = '', $page = 'all')
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();
        if ($filters['maxegyoldalon'] > 0) {
            $maxegyoldalon = $filters['maxegyoldalon'];
        } else {
            $maxegyoldalon = 8;
        }
        $SD = $this->table_usercar();

        if ($order != '') {
            $order = ' ORDER BY ' . $order;
        } else {
            //$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
        }

        //a tábla saját mezői
        foreach ($SD["mezok"] as $mezoe) {
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $mezoe['table'];
        }
        //Táblázatok
        $tables = $SD["table"];

        //Táblázatok
        $tables=$SD["table"].",".$tbl["gpscars"];

        //másik tábla mezői hozzáadása
        $mezok.=','.$tbl["gpscars"].'.rendszam,'.$tbl["gpscars"].'.vrendszam';
        //tábla kapcsolat
        $where.=$SD["table"].".cid=".$tbl["gpscars"].".szerzszam";

        //ez kell az összes találat megszámolásához

        $mezokc.='count('.$SD["table"].'.id) as count';

        $fmezonev = 'uid';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
        }

        $fmezonev = 'cid';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "') ";
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

    public function cars_table_update1()
    {
        global $adatbazis, $tbl, $prefix;
        $q = "ALTER TABLE " . $tbl["gpscars"] . " ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD INDEX (`id`);";
        $resultc = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "insert");

        // echo $error;
    }

    public function create_tbl_usercar()
    {
        global $adatbazis, $tbl;

        $q = "DROP TABLE  " . $tbl["usercar"];

      //  $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
        echo $error;

        $q = "CREATE TABLE IF NOT EXISTS " . $tbl["usercar"] . " (
 `uid` bigint(11) NOT NULL,
  `cid` bigint(11) NOT NULL,
  `jog` int(11) NOT NULL DEFAULT '1',
  `tilt` int(11) NOT NULL DEFAULT '0',
  `leker` int(11) NOT NULL DEFAULT '0',
  `menet` int(11) NOT NULL DEFAULT '0',
  `geo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";


//        $q="TRUNCATE TABLE " . $tbl["usercar"] ;

        $result = db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "CREATE");
        echo $error;
    }
}

$gpsacars_class = new gpsacars();
