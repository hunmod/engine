<?
if($_POST)foreach($_POST as $postname=>$postvalue){
$_SESSION[$postname]=$_POST[$postvalue];	
}
echo json_encode($_SESSION);
?>