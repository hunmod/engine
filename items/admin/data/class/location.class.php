<?php

class location extends sys
{

    public function city_table($data = array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = 'location_citys_data';

        $mezo = array();
        $mezo["id"] = 'city_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'country_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "Ország";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'regio_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "Régió";
        $mezo["display"] = 1;
        $mezo["type"] = 'num';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'city_name';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "név";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo = array();


        $mezo["id"] = 'zip';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "zip";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();
        $mezo["id"] = 'lati';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "lati";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;


        $mezo = array();
        $mezo["id"] = 'longi';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "longi";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

       $mezo = array();
        $mezo["id"] = 'center';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "center";
        $mezo["display"] = 1;
        $mezo["type"] = 'varchar';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();


        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;

    }


    public function get_city($filters = array(),$limit='')
    {
        global $adatbazis, $tbl, $prefix;
        $Sys_Class = new sys();

        if ($filters['id']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= 'city_id=' . $filters['id'];
        }
        if ($filters['city_name']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "city_name LIKE '" . $filters['city_name'] . "'";
        }
        if ($filters['city_name_like']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "city_name LIKE '%" . $filters['city_name_like'] . "%'";
        }
        if ($filters['zip']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "city_name LIKE '" . $filters['zip'] . "%'";
        }
        if ($filters['nozip']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "city_name LIKE ''";
        }
        if ($filters['nolat']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "lati = 0 ";
        }

        if ($where != '') {
            $where = " WHERE " . $where;
        }
        $query = "SELECT * FROM  `location_citys_data`" . $where . "
ORDER BY  `location_citys_data`.`center` DESC,city_name ASC " . $limit . "";



       // $result['datas'] = db_Query($query, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "select");
        $result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        $result['query'] = $query;
        $result['error'] = $error;
        return $result;

    }

    public function table_fields(){
        global $adatbazis,$tbl;
        $mdata=$this->city_table();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo)
            {
                $mezok[]=$mezo['id'];
            }

        $datas['table']=$mdata['table'];
        $datas['mezok']=$mezok;

        return $datas;
    }

    public function save_city($datas)
    {
        global $adatbazis;


        $Sys_Class = new sys();
        //t�bla adatai
        $SD = $this->table_fields();
        $mtbl = $this->city_table();

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["city_id"] < 1) {
            //insert
            foreach ($mtbl["mezok"] as $mezoe) {
                $mezok .= $Sys_Class->comasupport($mezok);
                $mezok .= $mezoe['table'];
                $datasb .= $Sys_Class->comasupport($datasb);
                $datasb .= "'" . ($datas[$mezoe['id']]) . "'";
            }
            $query = "INSERT INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";



           // $result = db_Query($query, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "INSERT");
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
            $query = "UPDATE  " . $SD["table"] . " SET  " . $datasb . "   WHERE  `city_id` =" . $datas["city_id"] . " LIMIT 1 ;";
            $result =  db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "UPDATE");
            //$result =  db_Query($query, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "UPDATE");
           // echo $query;
           // echo $error;

        }
        return ($res);//csak id-t ad vissza
    }

}
$adatbazis["db2_user"]="hunmodeu_user";
$adatbazis["db2_pass"]="m0dd3r";
$adatbazis["db2_srv"]="144.76.185.245";
$adatbazis["db2_db"]="hunmodeu_db";

$Location_Class=$location_class=new location();
?>