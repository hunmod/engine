<?php
$tbl['category']=$adatbazis["db1_db"].".".$prefix."categories";
$tbl['categorymenu']=$adatbazis["db1_db"].".".$prefix."categoriesmenu";
$tbl['category_text']=$adatbazis["db1_db"].".".$prefix."category_text";
class category extends sys
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
    public function sorrend(){
        for ($i = 1; $i <= 10; $i++)
        {
            $status[$i]=$i;	}

        return $status;
    }


    public function table($data=array())
    {
        global $adatbazis, $tbl;
        //arraylist($tbl);
        $table = $tbl['category'];

        $mezo = array();
        $mezo["id"] = 'id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` varchar(20) NOT NULL,";
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'kat';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "kat";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` varchar(20) NOT NULL DEFAULT '',";
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'ar';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ar";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` FLOAT NULL DEFAULT 0,";
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'class';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "class";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` varchar(20) NOT NULL,";
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'status';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "status";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        $mezo["value"] = $data[$mezo["id"]];
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` int(5) NOT NULL , PRIMARY KEY (`id`)";
        $mezok[] = $mezo;
        $mezo = array();

        $datas['table']=$table;
        $datas['mezok']=$mezok;
        return $datas;
    }
    public function table_text($data=array(),$lang='hu')
    {
        global $adatbazis, $tbl;
        $table=$tbl['category_text_'.$lang]=$adatbazis["db1_db"].".".$prefix."category_text_".$lang;

        $mezo = array();
        $mezo["id"] = 'id';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "ID";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        if (isset($data[$mezo["id"]])){$mezo["value"] = $data[$mezo["id"]];}
        else $mezo["value"] ='';
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` varchar(20) NOT NULL,";
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'nev';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "nev";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        if (isset($data[$mezo["id"]])){$mezo["value"] = $data[$mezo["id"]];}
        else $mezo["value"] ='';
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` varchar(200) DEFAULT '',";
        $mezok[] = $mezo;
        $mezo = array();


        $mezo["id"] = 'leiras';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "nev";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        if (isset($data[$mezo["id"]])){$mezo["value"] = $data[$mezo["id"]];}
        else $mezo["value"] ='';
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` text,";
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'leirash';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "nev";
        $mezo["display"] = 0;
        $mezo["type"] = 'text';
        $mezo["displaylist"] = 1;
        if (isset($data[$mezo["id"]])){$mezo["value"] = $data[$mezo["id"]];}
        else $mezo["value"] ='';
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` text,";
        $mezok[] = $mezo;
        $mezo = array();

        $mezo["id"] = 'status';
        $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
        $mezo["name"] = "status";
        $mezo["display"] = 0;
        $mezo["type"] = 'int';
        $mezo["displaylist"] = 1;
        if (isset($data[$mezo["id"]])){$mezo["value"] = $data[$mezo["id"]];}
        else $mezo["value"] ='';
        $mezo["sqlcreate"] = "  `".$mezo["id"]."` int(5) NOT NULL, PRIMARY KEY (`id`)";
        $mezok[] = $mezo;
        $mezo = array();

        $datas['table']=$table;
        $datas['mezok']=$mezok;
        return $datas;
    }

    public function get_text($lang,$filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if($lang==''){
            $lang='hu';
        }

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else{
            $maxegyoldalon=8;
        }

        $SD=$this->table_text(array(),$lang);

        if ($order!='')	{
            $order=' ORDER BY '.$order;
        }
        else
        {
            $order=' ORDER BY '.$SD["table"].'.`id` DESC ';
        }

        //a tábla saját mezői
        foreach ($SD["mezok"] as $mezoe)
        {
            $mezok.=$Sys_Class->comasupport($mezok);
            $mezok.=$mezoe['table'];
        }
        //T�bl�zatok
        $tables=$SD["table"];

//ez kell az �sszes tal�lat megsz�mol�s�hoz
        $mezokc.='count('.$SD["table"].'.id) as count';


        $fmezonev='id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`LIKE '".$filters[$fmezonev]."') ";
        }

        $fmezonev='status';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`= '".$filters[$fmezonev]."') ";
        }

//ha van felt�tel el� csapjuk hogy WHERE
        if ($where!=''){
            $where=" WHERE ".$where;
        }

//�sszes elem lek�rdez�se
        $queryc = "SELECT ".$mezokc." FROM ".$tables.$where.' '.$order;
        $resultc =db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "select");
        //echo $queryc;
        //arraylist ($resultc);
        $result['count']=$resultc[0]['count'];

//oldalaz�
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
    public function get($filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if($lang==''){
            $lang='hu';
        }

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else{
            $maxegyoldalon=8;
        }

        $SD=$this->table();

        if ($order!='')	{
            $order=' ORDER BY '.$order;
        }
        else
        {
            $order=' ORDER BY '.$SD["table"].'.`id` DESC ';
        }

        //a tábla saját mezői
        foreach ($SD["mezok"] as $mezoe)
        {
            $mezok.=$Sys_Class->comasupport($mezok);
            $mezok.=$mezoe['table'];
        }
        //Táblázatok
        $tables=$SD["table"];

        if($filters['lang']) {
            $SD2 = $this->table_text($data = array(), $language = $filters['lang']);
            $tables .= ',' . $SD2["table"];

            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $SD2["table"] . ".nev as 'nev'";
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $SD2["table"] . ".leiras as 'leiras'";
            $mezok .= $Sys_Class->comasupport($mezok);
            $mezok .= $SD2["table"] . ".leirash as 'leirash'";
            $where .= $Sys_Class->andsupport($where);
            $where .= $SD2["table"] . ".id" . ' = ' . $SD["table"] . ".id ";
        }
//ez kell az �sszes tal�lat megsz�mol�s�hoz
        $mezokc.='count('.$SD["table"].'.id) as count';


        $fmezonev='id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."` = '".$filters[$fmezonev]."') ";
        }

        $fmezonev='kat';
        if ($filters[$fmezonev]!=''){
            $what=explode(',',$filters[$fmezonev]);
            $Wherein='';
            foreach ($what as $word) {
             if ($Wherein!="")$Wherein.=' OR ';
                $Wherein.='('.$SD["table"].".`".$fmezonev."`LIKE '".$word."') ";
            }
            $where.=$Sys_Class->andsupport($where).'('.$Wherein.')';
        }

        $fmezonev='idin';
        if ($filters[$fmezonev]!=''){
            $what=explode(',',$filters[$fmezonev]);
            $Wherein='';
            foreach ($what as $word) {
             if ($Wherein!="")$Wherein.=' OR ';
                $Wherein .= '(' . $SD["table"] . ".`id` LIKE '" . $what . "') ";
            }
            $where.=$Sys_Class->andsupport($where).'('.$Wherein.')';
        }

        $fmezonev='status';
        if ($filters[$fmezonev]!='')if ($filters[$fmezonev]!='all'){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`= '".$filters[$fmezonev]."') ";
        }

//ha van feltétel elé csapjuk hogy WHERE
        if ($where!=''){
            $where=" WHERE ".$where;
        }

//�sszes elem lekérdezése
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

    public function save($datas)
    {
        global $adatbazis;
        $Sys_Class=new sys();
        //tábla adatai
        $SD=$this->table();


            //insert
            foreach ($SD["mezok"] as $mezoe)
            {
                $mezok.=$Sys_Class->comasupport($mezok);
                $mezok.=$mezoe['id'];
                $datasb.=$Sys_Class->comasupport($datasb);
                $datasb.="'".($datas[$mezoe['id']])."'";
            }
            $query="REPLACE INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
          //  echo $query.'<br>';
          //  echo $error.'<br>';
             $res=$datas["id"];
        return($res);//csak id-t ad vissza
    }
    public function savetext($lang='hu',$datas)
    {
        global $adatbazis;
        $Sys_Class=new sys();
        //tábla adatai
        $SD=$this->table_text($datas,$lang);


            //insert
            foreach ($SD["mezok"] as $mezoe)
            {
                $mezok.=$Sys_Class->comasupport($mezok);
                $mezok.=$mezoe['id'];
                $datasb.=$Sys_Class->comasupport($datasb);
                $datasb.="'".($datas[$mezoe['id']])."'";
            }
            $query="REPLACE INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
          //  echo $query.'<br>';
          //  echo $error.'<br>';
             $res=$datas["id"];
        return($res);//csak id-t ad vissza
    }

    public function create_table(){
        global $adatbazis;
        $SD=$this->table();
        $q= "CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
        foreach ($SD["mezok"] as $mezo){
         $q.=" ".$mezo['sqlcreate'];
        }
        $q.= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
	";
        $result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
        //echo $q.'<br>';
        //echo $error;
    }
    public function create_table_text($langg='hu'){
        global $adatbazis, $tbl,$prefix;
        $tbl['category_text_'.$langg]=$adatbazis["db1_db"].".".$prefix."'category_text_'.$langg";
        $SD=$this->table_text(array(),$langg);
       // arraylist( $SD);
        $q= "CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
        foreach ($SD["mezok"] as $mezo){
         $q.=" ".$mezo['sqlcreate'];
        }
        $q.= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;
	";
        $result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
        //echo $q.'<br>';
       // echo $error;
    }
    public function getimg($id,$x=369,$y=247){
        global $adatbazis,$folders,$defaultimg,$homeurl;

        $img='./uploads/categorie/'.$id.'/'.$id.'.jpg';
        //$img=randomimgtofldr($mappa);
        //echo $img;
        if (is_file($img)){
            //$img=$img;
        }
        else{
            $img="/uploads/".$defaultimg;
        }
        $img="/picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";

        /*
            if ($img!="none"){
                            //echo $mappa."/".$img;

                $img="picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";
                    //echo $mappa;

            }
            else{
                $img="uploads/".$defaultimg;
            }*/
        return($img);
    }
    public function createurl($hir){
        global $Text_Class,$homeurl,$separator;
        return $homeurl.$separator."cat/cat/".$hir["id"];
    }
    }
$category_class=new category();
$category_class->create_table();
$category_class->create_table_text();
