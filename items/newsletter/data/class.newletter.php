<?php
class sparksend{

//üzenetek
    public function status(){
        $status[1]= lan('status1');
        $status[2]= lan('status2');
        $status[3]= lan('status3');
        $status[4]= lan('status4');
        return $status;
    }

    public function table_messages($data){
        global $adatbazis,$tbl;
        //arraylist($tbl);
        $table='newsletter_msg';

        $mezo=array();
        $mezo["id"]='id';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="ID";
        $mezo["display"]= 0;
        $mezo["type"]='int';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='lang';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="subject";
        $mezo["display"]=0;
        $mezo["type"]='text';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 2 ) NOT NULL,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='subj';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="subject";
        $mezo["display"]=0;
        $mezo["type"]='text';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='msg';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="msg";
        $mezo["display"]=0;
        $mezo["type"]='text';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='status';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="status";
        $mezo["values"]=$this->status();
        $mezo["display"]=0;
        $mezo["type"]='int';
        $mezo["displaylist"]=1;
        $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '2'";
        $mezo["value"]=$data[$mezo["id"]];
        $mezok[]=$mezo;

        $datas['mysql_end']=")ENGINE = MYISAM ;";
        $datas['table']=$table;
        $datas['mezok']=$mezok;
        return $datas;

    }
    public function table_fields_messages(){
        global $adatbazis,$tbl;

        //$table=$tbl['service_cat'];
        //$mezok[]=$table.'.'.'`status`';

        $mdata=$this->table_messages();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo)
            {
                $mezok[]=$mezo['id'];
            }

        $datas['table']=$mdata['table'];
        $datas['mezok']=$mezok;

        return $datas;
    }
    public function save_messages($datas)
    {
        global $adatbazis;
        $Sys_Class=new sys();
        //t�bla adatai
        $SD=$this->table_fields_messages();
        $mtbl=$this->table_messages($datas);

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
arraylist($datas);

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
           // echo $query.'<br>';
            //echo $error.'<br>';
            $res=mysql_insert_id();
        }
        else
        {
            $res=$datas["id"];
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
    public function get_messages($filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else if ($filters['maxegyoldalon']!='all'){
            $maxegyoldalon=8;
        }

        $SD=$this->table_messages();

        if ($order!='')	{
            $order=' ORDER BY '.$order;
        }
        else
        {
            $order=' ORDER BY '.$SD["table"].'.`id` ASC ';
        }

        //a t�bla saj�t mez�i
        foreach ($SD["mezok"] as $mezoe)
        {
            $mezok.=$Sys_Class->comasupport($mezok);
            $mezok.=$mezoe['table'];
        }
        //T�bl�zatok
        $tables=$SD["table"];
        if($filters['lang']) {
            $SD2 = $this->table_messages( $data = array());
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

//ez kell az összes találat megszámolásához
        $mezokc.='count('.$SD["table"].'.id) as count';


//számos feltételek
        $fmezonev='id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }
        $fmezonev='status';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }
        $fmezonev='ids';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`id` in (".$filters[$fmezonev].") ";
        }

        $fmezonev = 'subj';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "` like '%" . $filters[$fmezonev] . "%') ";
        }
        $fmezonev = 'msg';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "` like '%" . $filters[$fmezonev] . "%') ";
        }
        $fmezonev = 'lang';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "` like '%" . $filters[$fmezonev] . "%') ";
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

    public function create_messages(){
        global $adatbazis;
        $SD=$this->table_messages();
        $q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
        foreach ($SD["mezok"] as $mezo){
            $q.=" ".$mezo["mysql_field"];

        }
        $q.=" ".$SD["mysql_end"];

        $result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
        //	echo $q.'<br>';
        //	echo $error;
    }

//feliratkozók

    public function table_users($data){
        global $adatbazis,$tbl;
        //arraylist($tbl);
        $table='newsletter_users';

        $mezo=array();
        $mezo["id"]='email';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="email";
        $mezo["display"]= 0;
        $mezo["type"]='email';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 300 ) NOT NULL PRIMARY KEY,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='lang';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="lang";
        $mezo["display"]=0;
        $mezo["type"]='text';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 2 ) NOT NULL,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='nev';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="nev";
        $mezo["display"]=0;
        $mezo["type"]='text';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='msg';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="msg";
        $mezo["display"]=0;
        $mezo["type"]='text';
        $mezo["displaylist"]=1;
        $mezo["value"]=$data[$mezo["id"]];
        $mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
        $mezok[]=$mezo;

        $mezo=array();
        $mezo["id"]='status';
        $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
        $mezo["name"]="status";
        $mezo["values"]=$this->status();
        $mezo["display"]=0;
        $mezo["type"]='int';
        $mezo["displaylist"]=1;
        $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '2'";
        $mezo["value"]=$data[$mezo["id"]];
        $mezok[]=$mezo;

        $datas['mysql_end']=")ENGINE = MYISAM ;";
        $datas['table']=$table;
        $datas['mezok']=$mezok;
        return $datas;

    }
    public function table_fields_users(){
        global $adatbazis,$tbl;

        //$table=$tbl['service_cat'];
        //$mezok[]=$table.'.'.'`status`';

        $mdata=$this->table_users();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo)
            {
                $mezok[]=$mezo['id'];
            }

        $datas['table']=$mdata['table'];
        $datas['mezok']=$mezok;

        return $datas;
    }

    public function get_users($filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else if ($filters['maxegyoldalon']!='all'){
            $maxegyoldalon=100;
        }

        $SD=$this->table_users();

        if ($order!='')	{
            $order=' ORDER BY '.$order;
        }
        else
        {
            $order=' ORDER BY '.$SD["table"].'.`email` ASC ';
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
        $mezokc.='count('.$SD["table"].'.id) as count';


//számos feltételek
        $fmezonev='email';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }
        $fmezonev='status';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }
        $fmezonev = 'nev';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "` like '%" . $filters[$fmezonev] . "%') ";
        }
        $fmezonev = 's';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`email` like '%" . $filters[$fmezonev] . "%') ";
        }
        $fmezonev = 'msg';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "` like '%" . $filters[$fmezonev] . "%') ";
        }
        $fmezonev = 'lang';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '(' . $SD["table"] . ".`" . $fmezonev . "` like '%" . $filters[$fmezonev] . "%') ";
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

    public function save_users( $datas)
    {
        global $adatbazis;
        $Sys_Class = new sys();
        //t�bla adatai
        $SD = $this->table_fields_users();
        $mtbl = $this->table_users();

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
        $query = "replace INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
        $result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
        //echo $query.'<br>';
        //echo $error.'<br>';
        $res = $datas['email'];

        return ($res);//csak id-t ad vissza
    }

    public function create_users(){
        global $adatbazis;
        $SD=$this->table_users();
        $q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
        foreach ($SD["mezok"] as $mezo){
            $q.=" ".$mezo["mysql_field"];

        }
        $q.=" ".$SD["mysql_end"];

        $result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
        //	echo $q.'<br>';
        //	echo $error;
    }



//feliratkozók csoportok


   //private const apikey='c727bbdae7ae0628d5f725e01220aa547854e0e9';
    //private const apikey=sparkapikey;
/*
public function errors(){
    $array[]=array('id'=>400,'msg'=>'Bad Request	There is a problem with your request.','sol'=>'Check your request follows the API documentation and uses correct syntax.');
    $array[]=array('id'=>401,'msg'=>'Unauthorized	You don’t have the needed authorization to make the request.','sol'=>'Make sure you are using a valid API key with the necessary permissions for your request.');
    $array[]=array('id'=>403,'msg'=>'Forbidden	The server understood the request but refused to fulfill it.','sol'=>'See if your SparkPost plan includes the resource you are requesting and your API key has the necessary premissions.');
    $array[]=array('id'=>404,'msg'=>'Not Found	The server couldn’t find the requested file.','sol'=>'Change your request URL to match a valid API endpoint.');
    $array[]=array('id'=>405,'msg'=>'Method Not Allowed	The resource does not have the specified method. (e.g. PUT on transmissions)','sol'=>'Change the method to follow the documentation for the resource.');
    $array[]=array('id'=>409,'msg'=>'Conflict	A conflict arose from your request. (e.g. user already exists with that email)','sol'=>'Modify the payload to clear the conflict.');
    $array[]=array('id'=>415,'msg'=>'Unsupported Media Type	The request is not in a supported format.','sol'=>'Check that your Content-Type header is a supported type and that your request adheres to the documentation.');
    $array[]=array('id'=>420,'msg'=>'Exceed Sending Limit	You sent too many requests in a given time period.','sol'=>'Check that you are with in the limits of your SparkPost plan. (If you are using the sandbox domain you’ll need to add a sending domain to continue.)');
    $array[]=array('id'=>422,'msg'=>'Unprocessable Entity','sol'=>'The request was syntactically correct but failed do to semantic errors.	Make sure that you have all the required fields and that your data is valid.');
    $array[]=array('id'=>500,'msg'=>'Internal Server Error	Something went wrong on our end.','sol'=>'Try the request again later. If the error does not resolve, contact support.');
    $array[]=array('id'=>503,'msg'=>'Service Unavailable','sol'=>'We are experiencing higher than normal levels of traffic.	');
    return $array;
}
public function myerror($id){
    $errors=$this->errors();
    return $errors[$id];
}
*/
    function sparkmailsend ($from, $to, $subject, $message,  $reply_to='')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.sparkpost.com/api/v1/transmissions");
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Authorization:'.sparkapikey,"Content-Type: application/json"));
      /*  $marray["options"]=array(
            "start_time"=> "now",
            "open_tracking"=> true,
            "click_tracking"=> true,
            "transactional"=> false,
            "sandbox"=> false,
            "ip_pool"=> "sp_shared",
            "inline_css"=> false
        );*/
        $marray["description"]=$subject;
        $marray["campaign_id"]=$subject;
        $marray["content"]=array(
            'from'=>$from,
            'html'=>$message,
            'subject'=>$subject
        );
        //  "name"=>"Fred Flintstone",
        // 'headers'=>'"X-Customer-Campaign-ID": "christmas_campaign"',
        // 'text'=>$message,
        if ($reply_to != '') $marray["content"]["reply_to"] = $reply_to;

        if (is_array($to)){
            foreach ($to as $tos){
                $toadresses[]=   array("address"=>array("email"=> $tos));
                //echo $tos;
            }
        }
        else{
            $toadresses[]=   array("address"=> $to);
        }
        $marray["recipients"]= $toadresses;

        /*$marray["recipients"]= array(
            array("address"=> $to));*/
        $amessage=json_encode($marray);
        curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS,$amessage);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
      //  echo $amessage;

        return $server_output;
    }






}

$SparksendClass=new sparksend();
$SparksendClass->create_messages();
$SparksendClass->create_users();
$sparstatus=$SparksendClass->status();
?>