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
        $mezok[] = $mezo;
        $mezo = array();


        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;

    }


    public function get_city($filters = array())
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

        if ($where != '') {
            $where = " WHERE " . $where;
        }
        $query = "SELECT * FROM  `location_citys_data`" . $where . "
ORDER BY  `location_citys_data`.`center` DESC,city_name ASC ";


        $result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
        $result['query'] = $query;
        $result['error'] = $error;
        return $result;

    }


}