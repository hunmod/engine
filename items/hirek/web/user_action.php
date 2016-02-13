<?php
/*
JQUERYvel híjuk meg, json data-t ad vissza ez a kedvelések, reportok, kedvencek rögzítője
*/
$jobClass=new hir();
//echo 'UID:'.$_SESSION['uid'];
if ($_SESSION['uid']){
//like
if ($_GET['like']>0){
	
	if (!isset($_GET['del']))
	{
		$jobClass->user_like_ads($_SESSION['uid'],$_GET['like']);
	}
	else{
		$jobClass->user_like_ads($_SESSION['uid'],$_GET['like'],'4');
	}
	//echo $_SESSION['uid'];

		//megszámolom hány érvényes elem van.
		$en=$jobClass->get_user_like_ads(array("ad_id"=>$_GET['like']));
		//echo $_SESSION['uid'];
		//var_dump($en);
		$c=count($en);
		//visszaírom a jobs táblába
		$en=$jobClass->update_job_count(array("id"=>$_GET['like'],"like_count"=>$c));
		echo json_encode(array('ret'=>'ok','count'=>$c));		

}

//report
if ($_GET['rep']>0){
	if (!isset($_GET['del']))
	{
		$jobClass->user_report_ads($_SESSION['uid'],$_GET['rep']);
	}
	else{
		$jobClass->user_report_ads($_SESSION['uid'],$_GET['rep'],'4');
	}
		//megszámolom hány érvényes elem van.
		$en=$jobClass->get_user_report_ads(array("ad_id"=>$_GET['rep']));
		$c=count($en);
		//visszaírom a jobs táblába
		$en=$jobClass->update_job_count(array("id"=>$_GET['rep'],"report_count"=>$c));
		echo json_encode(array('ret'=>'ok','count'=>$c));		
		
}

//favorite
if ($_GET['fav']>0){
	if (!isset($_GET['del']))
	{
		$jobClass->user_favorite_ads($_SESSION['uid'],$_GET['fav']);
	}
	else{
		$jobClass->user_favorite_ads($_SESSION['uid'],$_GET['fav'],'4');
	}
		//megszámolom hány érvényes elem van.
		$en=$jobClass->get_user_favorite_ads(array("ad_id"=>$_GET['fav']));
		$c=count($en);
		//visszaírom a jobs táblába
		$en=$jobClass->update_job_count(array("id"=>$_GET['fav'],"favorite_count"=>$c));

		echo json_encode(array('ret'=>'ok','count'=>$c));		

}

}
else
{
		echo json_encode(array('ret'=>'loginerror'));		
	
}

?>