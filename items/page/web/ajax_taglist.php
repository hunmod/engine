<?php header("Access-Control-Allow-Origin: *");
$jobclass=new recipe();
if($_REQUEST['tag'])
{
	$filters['name']=$_REQUEST['tag'];
}

if($_REQUEST['save']==1&&$_REQUEST['tag']!='')
{
	
	$stag['id']=NULL;
	$stag['name']=$_REQUEST['tag'];
	$stag['status']=2;
	$jobclass->save_list('tags',$stag);
}


$res=$jobclass->get_list('tags',$filters);

echo json_encode($res);
?>