<?php
class shop{

public function status(){
	$status[1]= lan('status1');
	$status[2]= lan('status2');
	$status[3]= lan('status3');
	$status[4]= lan('status4');
	return $status;
}

public function sorrend(){
	for ($i = 1; $i <= 10; $i++) 
	{
	$status[$i]=$i;	}

	return $status;
}

    public function order_status()
    {
        $n=0;
        $order_status = array();
        $order_status[$n]["id"] = 0;
        $order_status[$n]["nev"] = lan("megrendelve");
        $n++;
        $order_status[$n]["id"] = 1;
        $order_status[$n]["nev"] = lan("fizetve");
        $n++;
        $order_status[$n]["id"] = 2;
        $order_status[$n]["nev"] = lan("fizetés jóváhagyva");
        $n++;
        $order_status[$n]["id"] = 3;
        $order_status[$n]["nev"] = lan("Termékre vár");
        $n++;
        $order_status[$n]["id"] = 4;
        $order_status[$n]["nev"] = lan("elküldve");
        $n++;
        $order_status[$n]["id"] = $n;
        $order_status[$n]["nev"] = lan("Utánvét-elküldve");
        $n++;
        $order_status[$n]["id"] = $n;
        $order_status[$n]["nev"] = lan("csomag visszajött");
        $n++;
        $order_status[$n]["id"] = $n;
        $order_status[$n]["nev"] = lan("lezárva");
        $n++;
        $order_status[$n]["id"] = $n;
        $order_status[$n]["nev"] = lan("lemodva");
        $n++;
        $order_status[$n]["id"] = $n;
        $order_status[$n]["nev"] = lan("Jováhagyásra vár");


        return $order_status;
    }
    public function paymod()
    {
        //fizetési mód
        $paymod_typ["value"] = "id";
        $paymod_typ["name"] = "nev";

        $paymod = array();
        $paymod[0]["id"] = 0;
        $paymod[0]["nev"] = "Kp (csak személyes átvétel esetén)";
        $paymod[1]["id"] = 1;
        $paymod[1]["nev"] = "Utalás";
        $paymod[2]["id"] = 2;
        $paymod[2]["nev"] = "Utánvét !!2600.ft!!";
        $paymod[3]["id"] = 3;
        $paymod[3]["nev"] = "paypal";
        //$paymod[4]["id"] = 4;
        //$paymod[4]["nev"] = "bankkártya";

        return $paymod;
    }
    public function storage_status()
    {
        $n = 1;
        $storage_satus = array();
        $storage_satus[$n]["id"] = 1;
        $storage_satus[$n]["nev"] = "Raktáron";
        $n++;
        $storage_satus[$n]["id"] = 2;
        $storage_satus[$n]["nev"] = "külső raktárban";
        $n++;
        $storage_satus[$n]["id"] = 3;
        $storage_satus[$n]["nev"] = "rendelhető";
        $n++;
        $storage_satus[$n]["id"] = 4;
        $storage_satus[$n]["nev"] = "kifutó";
        $n++;
        $storage_satus[$n]["id"] = 5;
        $storage_satus[$n]["nev"] = "hiány";
        return $storage_satus;
    }

    public function pay_status()
    {
        $n = 0;
        $storage_satus = array();
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('nincs fizetve');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('Utalásra vár');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('fizetve');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('utanvetrevar');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('lezarva');


        return $storage_satus;
    }

    public function post_status()
    {
        $n = 0;
        $storage_satus = array();
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('nincs feadva');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('fizetésre vár');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('feladva');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('utanvetrevar');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('lezarva');


        return $storage_satus;
    }

    public function order_status2()
    {
        $n = 0;
        $storage_satus = array();
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('fizetesre var');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('Postára vár');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('Uton a csomag');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('Lezárva(áttvette)');
        $n++;
        $storage_satus[$n]["id"] = $n ;
        $storage_satus[$n]["nev"] = lan('Lemondva');
        $n++;

        return $storage_satus;
    }



    public function post_mod()
    {
        $post_mod = array();
        $n = 0;
        $post_mod[$n]["id"] = 0;
        $post_mod[$n]["nev"] = "Személyes átvétel Ócsán";
        $n++;
        $post_mod[$n]["id"] = 1;
        $post_mod[$n]["nev"] = "Posta";
       // $n++;
       // $post_mod[$n]["id"] = 2;
       // $post_mod[$n]["nev"] = "Futár";
        return $post_mod;

    }
    public function vat()
    {
        $vat = array();
        $vat[0]["id"] = 0;
        $vat[0]["nev"] = 0;
        $vat[1]["id"] = 27;
        $vat[1]["nev"] = 27;
        return $vat;
    }

public function table_text($lang){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table='shop_text_'.$lang;

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]= 0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL PRIMARY KEY,";
	$mezok[]=$mezo;

	$mezo=array();		
	$mezo["id"]='title';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="title";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 100 ) NOT NULL,";
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='leadtext';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="leadtext";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='longtext';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="longtext";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
	$mezok[]=$mezo;
	
	$mezo=array();		
	$mezo["id"]='included';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="included";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["value"]=$data[$mezo["id"]];
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT";
	$mezok[]=$mezo;

	$datas['mysql_end']=")ENGINE = MYISAM ;";
	$datas['table']=$table;
	$datas['mezok']=$mezok;
	return $datas;

}
public function table(){
	global $adatbazis,$tbl;
	//arraylist($tbl);
	$table='shop';

	$mezo=array();		
	$mezo["id"]='id';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="ID";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();

	$mezo["id"]='mid';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="mid";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;	
	$mezo=array();

	$mezo["id"]='jog';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="jog";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();

	$mezo["id"]='jsondatas';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="jsondatas";
	$mezo["display"]=0;
	$mezo["type"]='text';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
	$mezo=array();

	$mezo["id"]='sorrend';
	$mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
	$mezo["name"]="sorrend";
	$mezo["display"]=0;
	$mezo["type"]='int';
	$mezo["displaylist"]=1;
	$mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '5',";
	$mezo["value"]=$data[$mezo["id"]];
	$mezok[]=$mezo;
    $mezo = array();

    $mezo["id"] = 'priece';
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["name"] = "ár";
    $mezo["type"] = 'num';
    $mezo["display"] = 1;
    $mezo["displaylist"] = 0;
    $mezo["mysql_field"]="`".$mezo["id"]."` DECIMAL NOT NULL DEFAULT  '0',";
    $mezo["value"] = $data[$mezo["id"]];
    $mezok[] = $mezo;
    $mezo = array();

    $mezo["id"] = 'priece1';
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["name"] = "ár";
    $mezo["type"] = 'num';
    $mezo["display"] = 1;
    $mezo["displaylist"] = 0;
    $mezo["mysql_field"]="`".$mezo["id"]."` DECIMAL NOT NULL DEFAULT  '0',";
    $mezo["value"] = $data[$mezo["id"]];
    $mezok[] = $mezo;
    $mezo = array();

    $mezo["id"] = 'priece_old';
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["name"] = "ár";
    $mezo["type"] = 'num';
    $mezo["display"] = 1;
    $mezo["displaylist"] = 0;
    $mezo["mysql_field"]="`".$mezo["id"]."` DECIMAL NOT NULL DEFAULT  '0',";
    $mezo["value"] = $data[$mezo["id"]];
    $mezok[] = $mezo;
    $mezo = array();


    $mezo["id"] = "vat";
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["value"] = $ertek[$mezo["id"]];
    $typ["value"] = "id";
    $typ["name"] = "VAT";
    $mezo["typ"] = $typ;
    $mezo["param"] = $this->vat();
    $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '1',";
    $mezo["type"] = "selectbox";
    $mezok[] = $mezo;
    $mezo = array();

    $mezo=array();
    $mezo["id"]='storage';
    $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
    $mezo["name"]="included";
    $mezo["display"]=0;
    $mezo["type"]='text';
    $mezo["displaylist"]=1;
    $mezo["value"]=$data[$mezo["id"]];
    $mezo["mysql_field"]="`".$mezo["id"]."` INT DEFAULT  '1',";
    $mezok[]=$mezo;

    $mezo["id"] = "storage_status";
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["value"] = $ertek[$mezo["id"]];
    $typ["value"] = "id";
    $typ["name"] = "storage_status";
    $mezo["param"] = $this->status();
    $mezo["typ"] = $typ;
    $mezo["type"] = "selectbox";
    $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '1',";
    $mezok[] = $mezo;
    $mezo = array();

    $mezo["id"] = 'ordertime';
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["name"] = "ido";
    $mezo["display"] = 0;
    $mezo["displaylist"] = 0;
    $mezo["type"] = 'text';
    $mezo["value"] = $data[$mezo["id"]];
    $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '1',";
    $mezok[] = $mezo;
    $mezo = array();

    $mezo["id"] = 'barcode';
    $mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
    $mezo["name"] = "barcode";
    $mezo["type"] = 'num';
    $mezo["display"] = 1;
    $mezo["displaylist"] = 0;
    $mezo["value"] = $data[$mezo["id"]];
    $mezo["mysql_field"]="`".$mezo["id"]."` VARCHAR( 24 ) NOT NULL,";
    $mezok[] = $mezo;
    $mezo = array();

    $mezo=array();
    $mezo["id"]='included';
    $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
    $mezo["name"]="included";
    $mezo["display"]=0;
    $mezo["type"]='text';
    $mezo["displaylist"]=1;
    $mezo["value"]=$data[$mezo["id"]];
    $mezo["mysql_field"]="`".$mezo["id"]."` TEXT,";
    $mezok[]=$mezo;



    $mezo["id"]='status';
    $mezo["table"]=$table.'.'.'`'.$mezo["id"].'`';
    $mezo["name"]="status";
    $mezo["display"]=0;
    $mezo["type"]='int';
    $mezo["displaylist"]=1;
    $mezo["mysql_field"]="`".$mezo["id"]."` INT NOT NULL DEFAULT  '1' ";
    $mezo["value"]=$data[$mezo["id"]];
    $mezok[]=$mezo;
    $mezo = array();


	$datas['mysql_end']=")ENGINE = MYISAM ;";
	$datas['table']=$table;
	$datas['mezok']=$mezok;
	return $datas;




}

 public function table_fields(){
	global $adatbazis,$tbl;

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	$mdata=$this->table();
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
	$datas['mezok']=$mezok;
	
	return $datas;	
}
public function table_fields_text($lan){
	global $adatbazis,$tbl;

	//$table=$tbl['service_cat'];
	//$mezok[]=$table.'.'.'`status`';
	
	$mdata=$this->table_text($lan);
	if (count($mdata['mezok']))
	foreach ($mdata['mezok'] as $mezo)
	{
		$mezok[]=$mezo['id'];	
	}
	
	$datas['table']=$mdata['table'];
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

	$SD=$this->table_text($lang);

	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		$order=' ORDER BY '.$SD["table"].'.`id` DESC ';
	}

	//a t�bla saj�t mez�i
	foreach ($SD["mezok"] as $mezoe)
	{
		$mezok.=$Sys_Class->comasupport($mezok);
		$mezok.=$mezoe['table'];
	}
	//T�bl�zatok
	$tables=$SD["table"];

//ez kell az �sszes tal�lat megsz�mol�s�hoz
	$mezokc.='count('.$SD["table"].'.id) as count';


//sz�mos felt�telek
	$fmezonev='id';
	if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
	}
	$fmezonev='ids';
	if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`id` in (".$filters[$fmezonev].") ";
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

if ($filters['maxegyoldalon']>0){
	$maxegyoldalon=$filters['maxegyoldalon'];
	}else if ($filters['maxegyoldalon']!='all'){
	$maxegyoldalon=8;
}

	$SD=$this->table();
	
	if ($order!='')	{
		$order=' ORDER BY '.$order;
	}
	else
	{
		$order=' ORDER BY '.$SD["table"].'.`sorrend` ASC ';
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

//ez kell az összes találat megszámolásához	
	$mezokc.='count('.$SD["table"].'.id) as count';


//számos feltételek	
$fmezonev='id';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}
    $fmezonev = 'notid';
    if ($filters[$fmezonev] != '') {
        $where .= $Sys_Class->andsupport($where);
        $where .= '' . $SD["table"] . ".`id` not in(" . $filters['notid'] . ") ";
    }
$fmezonev='mid';
if ($filters[$fmezonev]!=''){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}$fmezonev='status';
if ($filters[$fmezonev]!=''&& $filters[$fmezonev]!='all'){
		$where.=$Sys_Class->andsupport($where);
		$where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
}
$fmezonev='ids';
if ($filters[$fmezonev]!=''){
	$where.=$Sys_Class->andsupport($where);
	$where.='('.$SD["table"].".`id` in (".$filters[$fmezonev].") ";
}
    $fmezonev='storage';
    if ($filters[$fmezonev]!=''&& $filters[$fmezonev]!='all'&& $filters[$fmezonev]=='y'){
        $where.=$Sys_Class->andsupport($where);
        $where.='('.$SD["table"].".`".$fmezonev."`>0) ";
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
public function save_text($lan,$datas)
{
	global $adatbazis;
	$Sys_Class=new sys();
	//t�bla adatai
	$SD=$this->table_fields_text($lan);	
	$mtbl=$this->table_text($lan);
	
//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
		//insert
		foreach ($mtbl["mezok"] as $mezoe)
		{
			$mezok.=$Sys_Class->comasupport($mezok);	
			$mezok.=$mezoe['table'];	
			$datasb.=$Sys_Class->comasupport($datasb);	
			$datasb.="'".($datas[$mezoe['id']])."'";
		}
		$query="replace INTO  ".$SD["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
		//echo $query.'<br>';
		//echo $error.'<br>';
		$res=mysql_insert_id();

return($res);//csak id-t ad vissza
}
public function save($datas)
{
	global $adatbazis;
	$Sys_Class=new sys();
	//t�bla adatai
	$SD=$this->table_fields();	
	$mtbl=$this->table();	
	
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



    public function shop_order_tbl($ertek=array()){
        $table="shop_order";
        $formelements=array();
        $elem=array();
        $elem["name"]="id";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="id";
        $elem["tipe"]="hidden";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="uid";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="uid";
        $elem["tipe"]="hidden";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="articles";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="articles";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="name";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="name";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="email";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="email";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;


        $elem=array();
        $elem["name"]="phone";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="phone";
        $elem["tipe"]="num";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="country";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="country";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="zip";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="zip";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="city";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="city";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="address";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="address";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pname";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="pname";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pcountry";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="pcountry";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pzip";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="pzip";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pcity";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="pcity";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="paddress";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="paddress";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pvatno";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="pvatno";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="post_status";
        $elem["title"]="post_status";
        $elem["value"]=$ertek[$elem["name"]];
        $typ["value"]="id";
        $typ["name"]="nev";
        $elem["param"]=$status;
        $elem["typ"]=$typ;
        $elem["tipe"]="selectboxa";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="track_id";
        $elem["title"]="track_id";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pstatus";
        $elem["title"]="pstatus";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="pmod";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="pmod";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="payment_date";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="payment_date";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="post_priece";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="postaár";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="post_date";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="post_date";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="post_mod";
        $elem["title"]="postázási mód";

        $elem["value"]=$ertek[$elem["name"]];
        $typ["value"]="id";
        $typ["name"]="nev";
        $elem["param"]=$post_mod;
        $elem["typ"]=$typ;
        $elem["tipe"]="selectboxa";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="order_date";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="order_date";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="post_id";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="trackingnr";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="subject";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="subject";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;


        $elem=array();
        $elem["name"]="oder_priece";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="oder_priece";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="oder_piece";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="oder_priece";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $elem=array();
        $elem["name"]="status";
        $elem["value"]=$ertek[$elem["name"]];
        $elem["title"]="status";
        $elem["tipe"]="text";
        $elem["table"] = $table . '.' . '`' . $elem["name"] . '`';
        $formelements[]=$elem;

        $datas['mysql_end']=")ENGINE = MYISAM ;";
        $datas['table']=$table;
        $datas['mezok']=$formelements;

        return $datas;
    }
    public function table_fields_order(){
        global $adatbazis,$tbl;

        $mdata=$this->table_fields_order();
        if (count($mdata['mezok']))
            foreach ($mdata['mezok'] as $mezo)
            {
                $mezok[]=$mezo['id'];
            }

        $datas['table']=$mdata['table'];
        $datas['mezok']=$mezok;

        return $datas;
    }
    public function save_shop_order($datas)
    {
        global $adatbazis,$TextClass;
        $Sys_Class=new sys();
        //tabla adatai
        $mtbl=$this->shop_order_tbl();

//Alap�rtemlezett �rt�k defini�l�s, jobb lenne a t�bla struktur�b�l megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
        if ($datas["id"]<1)
        {
           // arraylist($mtbl["mezok"]);
            //insert
            foreach ($mtbl["mezok"] as $mezoe)
            {
                $mezok.=$Sys_Class->comasupport($mezok);
                $mezok.="`".$mezoe['name']."`";

                $datasb.=$Sys_Class->comasupport($datasb);
                $datasb.="'".$TextClass->htmltochars($datas[$mezoe['name']])."'";
            }
            $query="INSERT INTO  `shop_order` (".$mezok.")VALUES (".$datasb.")";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
           // echo $query.'<br>';
           // echo $error.'<br>';
            $res=mysql_insert_id();
        }
        else
        {
            $res=$datas["id"];



            //update
            // arraylist($mtbl["mezok"]);

            foreach ($mtbl["mezok"] as $mezoe)
            {
                if (isset($datas[$mezoe['name']]) && $mezoe['name']!='id'){
                    $datasb.=$Sys_Class->comasupport($datasb);
                    $datasb.="".$mezoe['table']." =  '".($datas[$mezoe['name']])."'";
                }
            }
            $query="UPDATE  shop_order SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
            $result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
           // echo $query;
           // echo $error;

        }
        return($res);//csak id-t ad vissza
    }
    public function get_shop_order($filters,$order='',$page='all')
    {
        global $adatbazis,$tbl,$prefix;
        $Sys_Class=new sys();

        if ($filters['maxegyoldalon']>0){
            $maxegyoldalon=$filters['maxegyoldalon'];
        }else if ($filters['maxegyoldalon']!='all'){
            $maxegyoldalon=8;
        }

        $SD=$this->shop_order_tbl();

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
       /* if($filters['lang']) {
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
        }*/

//ez kell az összes találat megszámolásához
        $mezokc.='count('.$SD["table"].'.id) as count';


//számos feltételek
        $fmezonev='id';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }
        $fmezonev = 'notid';
        if ($filters[$fmezonev] != '') {
            $where .= $Sys_Class->andsupport($where);
            $where .= '' . $SD["table"] . ".`id` not in(" . $filters['notid'] . ") ";
        }
        $fmezonev='mid';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }

        $fmezonev='pstatus';
        if ($filters[$fmezonev]!=''&& $filters[$fmezonev]!='all'){
            $where.=$Sys_Class->andsupport($where);
            $where.='('.$SD["table"].".`".$fmezonev."`='".$filters[$fmezonev]."') ";
        }

        $fmezonev='ids';
        if ($filters[$fmezonev]!=''){
            $where.=$Sys_Class->andsupport($where);
            $where.=''.$SD["table"].".`id` in (".$filters[$fmezonev].") ";
        }
        $fmezonev='status';
        if ($filters[$fmezonev]!='' ){
            if($filters[$fmezonev]!='all'){
            $where.=$Sys_Class->andsupport($where);
            $where.=''.$SD["table"].".`status` = (".$filters[$fmezonev].") ";
            }
        }else
            {
                $where.=$Sys_Class->andsupport($where);
                $where.=''.$SD["table"].".`status` != '4' ";
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













    public function getimg($id,$x=369,$y=247){

	global $adatbazis,$folders,$defaultimg,$shop_loc,$homeurl,$site_loc;
	$defaultimg='noimage.jpg';
	$img=$shop_loc.'/'.$id.'/'.$id.'.jpg';

	//echo $img;
	if (is_file($img)){
		$img=$img;
	}
	else{
        $mappa=$shop_loc.'/'.$id.'/';
        $img=$mappa.randomimgtofldr($mappa);
        //$img="./uploads/".uploadfolder."".$defaultimg;
	}
	//echo $img;
	if (is_file($img)){
	}
	else{
        $img="./uploads/".uploadfolder."".$defaultimg;
	}
	$img=$homeurl."/picture2.php?picture=".encode($img)."&x=".$x."&y=".$y."&ext=.jpg";
	return($img);
}



public function createurl($hir){
global $Text_Class,$homeurl,$separator;
	return $homeurl.$separator."shop/shop/".$hir["id"]."/".$Text_Class->to_link($Text_Class->htmlfromchars($hir["title"]));
}

public function jsons_from($data)
{
	$data["datas"]=array();
    str_replace('
','',$data["jsondatas"]);
    $data["datas"]=json_decode($data['jsondatas'],true);
    return  $data;
}
public function jsons_to($data){
	$data["jsondatas"]="";
    $data["jsondatas"]=json_encode($data["datas"]);
    return ($data);
}

public function create_table(){
	global $adatbazis,$tbl;
	$SD=$this->table();
	$q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
	foreach ($SD["mezok"] as $mezo){
		$q.=" ".$mezo["mysql_field"];

	}
	$q.=" ".$SD["mysql_end"];

	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
	//	echo $q.'<br>';
		echo $error;

    //ordertable
    $qreatetbl="CREATE TABLE IF NOT EXISTS ".$tbl['shop_order']." (
  `id` bigint(20) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL,
  `articles` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `pname` varchar(200) ,
  `pcountry` varchar(200) ,
  `pzip` varchar(6) ,
  `pcity` varchar(200) ,
  `paddress` varchar(400) ,
  `pvatno` varchar(100) ,
  `track_id` varchar(100) ,
  `pstatus` int(11) NOT NULL,
  `pmod` int(11) NOT NULL,
  `payment_date` datetime ,
  `payment_id` varchar(200) ,
  `post_date` datetime ,
  `post_mod` int(3) NULL,  
  `post_priece` varchar(50),  
  `post_id` varchar(50),  
  `oder_priece` varchar(50),  
  `oder_piece` varchar(50),  
  `order_date` datetime NOT NULL,
  `subject` text,
    `status` int(11) NOT NULL,
    `post_status` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `pstatus` (`pstatus`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
    $returnquery=db_Query($qreatetbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");



}
public function create_table_text($lang){
	global $adatbazis;
	$SD=$this->table_text($lang);
	$q="CREATE TABLE IF NOT EXISTS ".$SD["table"]." (";
	foreach ($SD["mezok"] as $mezo){
		$q.=" ".$mezo["mysql_field"];

	}
	$q.=" ".$SD["mysql_end"];

	$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");
	//echo $q.'<br>';
	//echo $error;
}



}
$ShopClass=new shop();
$ShopClass->create_table();
$ShopClass->create_table_text('hu');
$shopstatus=$ShopClass->status();
$shopsorrend=$ShopClass->sorrend();
?>