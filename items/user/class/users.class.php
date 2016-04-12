<?php
include('class/facebook/facebook.php');
/*
Users class

*/
class user
{


	public function errormessages()
	{
		global $lan;
		$status['foglaltemail'] = $lan['foglaltemail'];
		$status['foglaltuname'] = $lan['foglaltuname'];
		$status['hibasjelszo'] = $lan['hibasjelszo'];
		$status['nemegyezik'] = $lan['nemegyezik'];
		$status['regok'] = $lan['regok'];
		return $status;
	}


	public function status()
	{
		global $lan;
		$status[1] = $lan['user_status_1'];
		$status[2] = $lan['user_status_2'];
		$status[3] = $lan['user_status_3'];
		$status[4] = $lan['user_status_4'];
		return $status;
	}

	public function jog()
	{
		global $lan;

		$status[1] = $lan['user_jog_1'];
		$status[2] = $lan['user_jog_2'];
		$status[3] = $lan['user_jog_3'];
		$status[4] = $lan['user_jog_4'];
		$status[5] = $lan['user_jog_5'];
		return $status;
	}


	public function table()
	{
		global $adatbazis, $tbl, $lan;
		$table = 'user';
		$mezo = array();
		$mezo["id"] = 'id';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = "ID";
		$mezo["display"] = 0;
		$mezo["type"] = 'int';
		$mezok[] = $mezo;
		$mezo = array();

		$mezo["id"] = 'unev';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 1;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '100';
		$mezo["requied"] = 1;
		$mezok[] = $mezo;
		$mezo = array();


		$mezo["id"] = 'nev';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 1;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '100';
		$mezo["requied"] = 0;
		$mezok[] = $mezo;
		$mezo = array();


		$mezo["id"] = 'pass';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 1;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '100';
		$mezo["requied"] = 1;
		$mezok[] = $mezo;
		$mezo = array();

		$mezo["id"] = 'email';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 1;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '100';
		$mezo["requied"] = 1;
		$mezok[] = $mezo;
		$mezo = array();


		$mezo["id"] = 'fbid';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = "Facebookid";
		$mezo["display"] = 1;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '100';
		$mezo["requied"] = 1;
		$mezok[] = $mezo;
		$mezo = array();


		$mezo["id"] = 'hirlevel';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["type"] = 'int';
		$mezo["length"] = '1';
		$mezo["requied"] = 1;
		$mezo["display"] = 1;
		$mezok[] = $mezo;
		$mezo = array();

		$mezo["id"] = 'jogid';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 1;
		$mezo["type"] = 'array';
		$mezo["values"] = $this->jog();
		$mezo["values_type"] = '0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
		$mezok[] = $mezo;
		$mezo = array();

		$mezo["id"] = 'status';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 1;
		$mezo["type"] = 'array';
		$mezo["values"] = $this->status();
		$mezo["values_type"] = '0';//array('id'=>idmezoneve,'value'=ertekmezoneve)
		$mezok[] = $mezo;
		$mezo = array();
		$mezo["id"] = 'lastactive';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = "lastactive";
		$mezo["display"] = 0;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '100';
		$mezo["requied"] = 1;
		$mezok[] = $mezo;
		$mezo = array();

		$mezo["id"] = 'fbtoken';
		$mezo["table"] = $table . '.' . '`' . $mezo["id"] . '`';
		$mezo["name"] = $lan[$mezo["id"]];
		$mezo["display"] = 0;
		$mezo["type"] = 'varchar';
		$mezo["length"] = '500';
		$mezo["requied"] = 0;
		$mezok[] = $mezo;
		$mezo = array();


		$datas['table'] = $table;
		$datas['mezok'] = $mezok;

		return $datas;
	}

	public function table_fields()
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

//id alapján a user adatait adja vissza
	public function get_userid($uid)
	{
		$filters['id'] = $uid;
		$users = $this->get_users($filters, '', 'all');
		$user = $users["datas"][0];;
		//
		$user['jog'] = $user['jogid'];
		return $user;
	}

//belépéshez szükséges cuccok lekérdezése
	public function userlogin($email, $pass)
	{
		$filters['email'] = $email;
		$filters['pass'] = $pass;
		$users = $this->get_users($filters, '', 'all');
		//arraylist($users);
		return $users["datas"][0];
	}

//facebookos belépés
	public function userlogin_fb($fbid)
	{
		$filters['fbid'] = $fbid;
		$users = $this->get_users($filters, '', 'all');
		return $users["datas"][0];
	}

	public function user_by_email($email)
	{
		$filters['email'] = $email;
		$users = $this->get_users($filters, '', 'all');
		return $users["datas"][0];
	}


	public function reg_users($datas)
	{
//ha nincs megadva userid akkor mentem
		if ($datas['id'] < 1) {
//ellenőrzöm hogy létezik e a user
			$emsg = $this->errormessages();
			$filters['email'] = $datas['email'];
			$users = $this->get_users($filters, '', 'all');
			if ($users["count"] > 0) {
				$session["form_error"] = $emsg['foglaltemail'];
			}

			if (!$session["form_error"]) {
				$datas['status'] = '1';
				$datas['jogid'] = '1';

				$this->save($datas);
				$session["form_ok"] = $emsg['regok'];
			}
		}

	}


//user lekérdezése
	public function get_users($filters, $order = '', $page = 'all')
	{
		global $adatbazis, $tbl;
		$Sys_Class = new sys();

		$maxegyoldalon = 20;
		$SD = $this->table_fields();

		if ($order != '') {
			$order = ' ORDER BY ' . $order;
		}

		//a tábla saját mezői
		foreach ($SD["mezok"] as $mezoe) {
			$mezok .= $Sys_Class->comasupport($mezok);
			$mezok .= $mezoe;
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
		if ($filters[$fmezonev] > 0) {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "'";
		}
		$fmezonev = 'jogid';
		if ($filters[$fmezonev] > 0) {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "'";
		}

		$fmezonev = 'status';
		if ($filters[$fmezonev] > 0) {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "'";
		}

		$fmezonev = 'hirlevel';
		if ($filters[$fmezonev] > 0) {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`='" . $filters[$fmezonev] . "'";
		}
//szöveges feltételek	
		$fmezonev = 'nev';
		if ($filters[$fmezonev] != '') {
			$where .= andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'%" . $filters[$fmezonev] . "%'";
		}
		$fmezonev = 'unev';
		if ($filters[$fmezonev] != '') {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'" . $filters[$fmezonev] . "'";
		}
		$fmezonev = 'pass';
		if ($filters[$fmezonev] != '') {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'" . $filters[$fmezonev] . "'";
		}
		$fmezonev = 'email';
		if ($filters[$fmezonev] != '') {
			$where .= $Sys_Class->andsupport($where);
			$where .= $SD["table"] . ".`" . $fmezonev . "`LIKE'" . $filters[$fmezonev] . "'";
		}


//ha van feltétel elé csapjuk hogy WHERE	
		if ($where != '') {
			$where = " WHERE " . $where;
		}

//összes elem lekérdezése
		$queryc = "SELECT " . $mezokc . " FROM " . $tables . $where . ' ' . $order;
		$resultc = db_Query($queryc, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
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

		$result['query'] = $query;
		$result['datas'] = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "select");
		return $result;
	}

	public function save($datas)
	{
		global $adatbazis, $Sys_Class;

		//tábla adatai
		$SD = $this->table_fields();

//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
		if ($datas["id"] < 1) {
			//insert
			foreach ($SD["mezok"] as $mezoe) {
				$mezok .= $Sys_Class->comasupport($mezok);
				$mezok .= $mezoe;
				$datasb .= $Sys_Class->comasupport($datasb);
				$datasb .= "'" . $datas[$mezoe] . "'";
			}
			$query = "INSERT INTO  " . $SD["table"] . " (" . $mezok . ")VALUES (" . $datasb . ")";
			$result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "INSERT");
			//echo $query.'<br>';
			//echo $error;
			$res = mysql_insert_id();
		} else {
			$res = $datas["id"];
			//update
			foreach ($SD["mezok"] as $mezoe) {
				if (isset($datas[$mezoe]) && $mezoe != "id") {
					$datasb .= $Sys_Class->comasupport($datasb);
					$datasb .= "" . $mezoe . " =  '" . $datas[$mezoe] . "'";
				}
			}
			$query = "UPDATE  " . $SD["table"] . " SET  " . $datasb . "   WHERE  `id` =" . $datas["id"] . " LIMIT 1 ;";
			$result = db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"], $adatbazis["db1_srv"], $adatbazis["db1_db"], "UPDATE");
			//echo $query;
			//echo $error;

		}
		return ($res);//csak id-t ad vissza
	}

	public function profielimg2($user, $x = 200, $y = 200)
	{
		global $server_url, $oldalid, $defaultimg, $profilimage_loc;
		$uid = $user["id"];
		$profilimage_loc = 'uploads/profileimg/';
//arraylist($user);
		$defaultimg2 = 'picture2.php?picture=' . encode($profilimage_loc . 'dummyimg.png') . '&x=' . $x . '&y=' . $y . '.jpg';
		$defpic = $profilimage = $defaultimg2;

		if ($user['fbid'] != '') $fbpic = "https://graph.facebook.com/" . $user['fbid'] . "/picture?width=" . $x . "&height=" . $y . "";
		if ($user['id'] != '') $upic = '' . $profilimage_loc . "p" . $uid . ".jpg";
// echo ($upic)."|".$this->url_exists($upic)."|"; 
		if (file_exists('./' . $upic)) {
			$ret = $server_url . 'picture2.php?picture=' . encode($upic) . '&x=' . $x . '&y=' . $y . '.jpg';
		} else if ($user['fbid'] != '') {
			$ret = $fbpic;
		} else {
			$ret = $server_url . $defaultimg2;
		}

		return $ret;;

	}

	public function fblogin_save($getdatas = array())
	{
		global $facebook, $date;

		$fbuserdatas = $facebook->api('/me?fields=name,email,last_name,id');
		$token = $facebook->getAccessToken();
		$userupdate['fbid'] = $fbuser['fbid'] = $fbuserdatas['id'];
		$fbuser['email'] = $fbuserdatas['email'];
		$fbuser['nev'] = $fbuserdatas['name'];
		$fbuser['unev'] = $fbuserdatas['last_name'];
		$userupdate['fbtoken'] = $fbuser['fbtoken'] = $token;
		$fbuser['hirlevel'] = 1;
		$fbuser['status'] = 1;
		$fbuser['jogid'] = 1;
		$userupdate['lastactive'] = $fbuser['lastactive'] = $date;
//var_dump($fbuser);
//echo "<br>";
		if ($fbuser['email'] != '') {
			$users = $this->get_users(array('email' => $fbuser['email'], "active" => "all"));
			$theuser = $users['datas'][0];
			if ($theuser['id'] > 0) {
//regisztrált beléptetés	
				$userupdate['id'] = $theuser['id'];
				//arraylist($userupdate);
				$this->save($userupdate);

			} else {
				$theuser = $fbuser;
				$theuser['id'] = $this->save($fbuser);
			}
			return $theuser;
		} else return "emailerror";
	}

	public function requser(){
		global $auser,$server_url;
		if ($auser["id"] > 0) {
			return true;
		} else {
             header('Location: ' . $server_url . "user/noacces");
			//return false;
			//exit;
		}
	}
	public function reqgrantuser($grant=0){
		global $auser,$server_url;
		if ($auser["id"] > 0 && $auser["jog"]>=$grant) {
			return true;
		} else {
             header('Location: ' . $server_url . "user/noacces");
			//return false;
			//exit;
		}
	}


	public function create_table(){
	global $adatbazis;
	$SD=$this->table_fields();	
	$q="
CREATE TABLE IF NOT EXISTS ".$SD["table"]." (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unev` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL DEFAULT '',
  `jogid` mediumint(9) NOT NULL DEFAULT '1',
  `nev` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fbid` varchar(40) DEFAULT NULL,
  `hirlevel` int(1) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `lastactive` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fbtoken` VARCHAR( 500 ) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=183 ;
	
	
	";
		$result =db_Query($q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "CREATE");	
	//	echo '<br>'.'<br>'.'<br>'.$q.'<br>';
	//	echo $error;			
}



}


?>