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
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'regio_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "regio_id";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'country_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "country_id";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'city_name';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "city_name";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 100 ) NOT NULL,";
        $mezok[] = $mezo;


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
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 10 ) NOT NULL KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;


        $mezo = array();
        $mezo["id"] = 'longi';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "longi";
        $mezo["display"] = 1;
        $mezo["type"] = 'double';
        $mezo["requied"] = 1;
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` double NOT NULL KEY,";
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
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 1 ) NOT NULL KEY";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;
        $mezo = array();

        $datas['mysql_end'] = ")ENGINE = MYISAM ;";
        $datas['table'] = $table;
        $datas['mezok'] = $mezok;

        return $datas;

        return $datas;
    }
    public function region_table($data = array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = 'location_regions_data';

        $mezo = array();
        $mezo["id"] = 'regio_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'country_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "country_id";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'regio_name';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "regio_name";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 100 ) NOT NULL,";
        $mezok[] = $mezo;

        $datas['mysql_end'] = ")ENGINE = MYISAM ;";
        $datas['table'] = $table;
        $datas['mezok'] = $mezok;
        return $datas;
    }
    public function country_table($data = array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = 'location_country_data';

        $mezo = array();
        $mezo["id"] = 'country_id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "country_id";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
        $mezo["value"] = $data[$mezo["id"]];
        $mezok[] = $mezo;

        $mezo = array();
        $mezo["id"] = 'country_name';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "regio_name";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["mysql_field"] = "`" . $mezo["id"] . "` VARCHAR( 100 ) NOT NULL,";
        $mezok[] = $mezo;

        $datas['mysql_end'] = ")ENGINE = MYISAM ;";
        $datas['table'] = $table;
        $datas['mezok'] = $mezok;
        return $datas;
    }

    public function get_city($filters = array(), $limit = '')
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
            $where .= "zip LIKE '" . $filters['zip'] . "%'";
        }
        if ($filters['nozip']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "zip LIKE ''";
        }
        if ($filters['nolat']) {
            $where .= $Sys_Class->andsupport($where);
            $where .= "lati = 10 ";
        }
        if($filters['regio_name']) {
              $SD2 = $this->region_table();
              $tables .= ',' . $SD2["table"];

              $mezok .= $Sys_Class->comasupport($mezok);
              $mezok .= $SD2["table"] . ".regio_name as 'regio_name'";

              $where .= $Sys_Class->andsupport($where);
              $where .= $SD2["table"] . ".regio_id" . ' = ' . $SD["table"] . ".regio_id ";
          }

         if($filters['country_name']) {
              $SD2 = $this->country_table();
              $tables .= ',' . $SD2["table"];
              $mezok .= $Sys_Class->comasupport($mezok);
              $mezok .= $SD2["table"] . ".country_name as 'country_name'";
              $where .= $Sys_Class->andsupport($where);
              $where .= $SD2["table"] . ".country_id" . ' = ' . $SD["table"] . ".country_id ";
          }

//ez kell az összes találat megszámolásához
        $mezokc.='count('.$SD["table"].'.id) as count';


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
    public function get_region($filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else if ($filters['maxegyoldalon']!='all'){
            $maxegyoldalon=8;
        }

        $SD=$this->region_table();

        if ($order!='')	{
            $order=' ORDER BY '.$order;
        }
        else
        {
            $order=' ORDER BY '.$SD["table"].'.`regio_id` DESC ';
        }

        //a t�bla saj�t mez�i
        foreach ($SD["mezok"] as $mezoe)
        {
            $mezok.=$Sys_Class->comasupport($mezok);
            $mezok.=$mezoe['table'];
        }
        //T�bl�zatok
        $tables=$SD["table"];

      /*
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
*/
//ez kell az összes találat megszámolásához
        $mezokc.='count('.$SD["table"].'.regio_id) as count';



        //számos feltételek
        $fmezonev='regio_id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }
        $fmezonev='country_id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }

        $fmezonev='regio_name';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."` LIKE '%".$filters[$fmezonev]."%') ";
        }
        $fmezonev='regio_namep';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`regio_name` LIKE '".$filters[$fmezonev]."') ";
        }


//ha van feltétel elé csapjuk hogy WHERE
        if ($where!=''){
            $where=" WHERE ".$where;
        }

//összes elem lekérdezése
        $queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
        $resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
        //echo $queryc;
        //arraylist ($resultc);
        $result['count']=$resultc[0]['count'];

//oldalazó
        if ($page!='all'){
//$maxegyoldalon=page_settings("max_service_perpage");
            $oldalakszama=ceil ($result['count']/$maxegyoldalon);
            if ($maxegyoldalon>0)
            {
                if (($page=="") || ($page<=0)){
                    $oldal=0;
                }
                else {
                    $oldal=$page;
                }


                if ($page>=$oldalakszama){
                    $page=$oldalakszama-1;
                }
                //oldalak kisz�mol�sa

                if ($oldalakszama!=""){
                    $limit= " LIMIT ".($page*$maxegyoldalon).",".$maxegyoldalon;
                }

            }
        }
        $query = "SELECT ".$mezok." FROM ".$tables.$where.' '.$order.$limit;
//echo $query ;


        $result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
        $result['query']=$query ;
        $result['error']=$error ;
        return $result;
    }
    public function get_country($filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else if ($filters['maxegyoldalon']!='all'){
            $maxegyoldalon=8;
        }

        $SD=$this->country_table();

        if ($order!='')	{
            $order=' ORDER BY '.$order;
        }
        else
        {
            $order=' ORDER BY '.$SD["table"].'.`country_id` DESC ';
        }

        //a t�bla saj�t mez�i
        foreach ($SD["mezok"] as $mezoe)
        {
            $mezok.=$Sys_Class->comasupport($mezok);
            $mezok.=$mezoe['table'];
        }
        //T�bl�zatok
        $tables=$SD["table"];

    //ez kell az összes találat megszámolásához
        $mezokc.='count('.$SD["table"].'.country) as count';



        //számos feltételek

        $fmezonev='country_id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }

        $fmezonev='country_name';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."` LIKE '%".$filters[$fmezonev]."%') ";
        }


//ha van feltétel elé csapjuk hogy WHERE
        if ($where!=''){
            $where=" WHERE ".$where;
        }

//összes elem lekérdezése
        $queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
        $resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
        //echo $queryc;
        //arraylist ($resultc);
        $result['count']=$resultc[0]['count'];

//oldalazó
        if ($page!='all'){
//$maxegyoldalon=page_settings("max_service_perpage");
            $oldalakszama=ceil ($result['count']/$maxegyoldalon);
            if ($maxegyoldalon>0)
            {
                if (($page=="") || ($page<=0)){
                    $oldal=0;
                }
                else {
                    $oldal=$page;
                }


                if ($page>=$oldalakszama){
                    $page=$oldalakszama-1;
                }
                //oldalak kisz�mol�sa

                if ($oldalakszama!=""){
                    $limit= " LIMIT ".($page*$maxegyoldalon).",".$maxegyoldalon;
                }

            }
        }
        $query = "SELECT ".$mezok." FROM ".$tables.$where.' '.$order.$limit;
//echo $query ;


        $result['datas'] =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
        $result['query']=$query ;
        $result['error']=$error ;
        return $result;
    }


        public function save_city($datas)
    {
        global $adatbazis;


        $Sys_Class = new sys();
        //t�bla adatai
        $SD = $this->city_fields();
        $mtbl = $this->city_table();
//arraylist($mtbl);
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
            $res = $datas["city_id"];
            //update
            foreach ($mtbl["mezok"] as $mezoe) {
                if (isset($datas[$mezoe['id']])) {
                    $datasb .= $Sys_Class->comasupport($datasb);
                    $datasb .= "" . $mezoe['table'] . " =  '" . ($datas[$mezoe['id']]) . "'";
                }
            }
            $query = "UPDATE  " . $SD["table"] . " SET  " . $datasb . "   WHERE  `city_id` =" . $datas["city_id"] . " LIMIT 1 ;";
            $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "UPDATE");
            //$result =  db_Query($query, $error, $adatbazis["db2_user"], $adatbazis["db2_pass"], $adatbazis["db2_srv"], $adatbazis["db2_db"], "UPDATE");
            //echo $query.'<br>';
            //echo $error.'<br>';

        }
        return ($res);//csak id-t ad vissza
    }
    public function save_region($datas)
    {
        global $adatbazis;
        $Sys_Class=new sys();
        //t�bla adatai
        $SD=$this->region_fields();
        $mtbl=$this->region_table();

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["id"]<1)
        {
            //insert
            foreach ($mtbl["mezok"] as $mezoe)
            {
                $mezok.=$Sys_Class->comasupport($mezok);
                $mezok.=$mezoe['table'];
                $datasb.=$Sys_Class->comasupport($datasb);
                $datasb.="'".($datas[$mezoe['id']])."'";
            }
            $query="INSERT INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
            //echo $query.'<br>';
            //echo $error.'<br>';
            $res=mysql_insert_id();
        }
        else
        {
            $res=$datas["regio_id"];
            //update
            foreach ($mtbl["mezok"] as $mezoe)
            {
                if (isset($datas[$mezoe['id']])){
                    $datasb.=$Sys_Class->comasupport($datasb);
                    $datasb.="".$mezoe['table']." =  '".($datas[$mezoe['id']])."'";
                }
            }
            $query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
            /*echo $query;
            echo $error;*/

        }
        return($res);//csak id-t ad vissza
    }
    public function save_country($datas)
    {
        global $adatbazis;
        $Sys_Class=new sys();
        //t�bla adatai
        $SD=$this->country_fields();
        $mtbl=$this->country_table();

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["regio_id"]<1)
        {
            //insert
            foreach ($mtbl["mezok"] as $mezoe)
            {
                $mezok.=$Sys_Class->comasupport($mezok);
                $mezok.=$mezoe['table'];
                $datasb.=$Sys_Class->comasupport($datasb);
                $datasb.="'".($datas[$mezoe['id']])."'";
            }
            $query="INSERT INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
            //echo $query.'<br>';
            //echo $error.'<br>';
            $res=mysql_insert_id();
        }
        else
        {
            $res=$datas["regio_id"];
            //update
            foreach ($mtbl["mezok"] as $mezoe)
            {
                if (isset($datas[$mezoe['id']])){
                    $datasb.=$Sys_Class->comasupport($datasb);
                    $datasb.="".$mezoe['table']." =  '".($datas[$mezoe['id']])."'";
                }
            }
            $query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
            /*echo $query;
            echo $error;*/

        }
        return($res);//csak id-t ad vissza
    }

    public function city_fields()
    {
        global $adatbazis, $tbl;
        $mdata = $this->city_table();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }
    public function region_fields()
    {
        global $adatbazis, $tbl;
        $mdata = $this->region_table();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }
    public function country_fields()
    {
        global $adatbazis, $tbl;
        $mdata = $this->country_table();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo) {
                $mezok[] = $mezo['id'];
            }

        $datas['table'] = $mdata['table'];
        $datas['mezok'] = $mezok;

        return $datas;
    }


}

$adatbazis["db2_user"] = "hunmodeu_user";
$adatbazis["db2_pass"] = "m0dd3r";
$adatbazis["db2_srv"] = "144.76.185.245";
$adatbazis["db2_db"] = "hunmodeu_db";

$Location_Class = $location_class = new location();
?>