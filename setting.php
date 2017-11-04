
<?php
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
//error_reporting(E_ALL );

if ($_POST['server']!=""){
$adatbazis["db1_srv"]=$_POST['server'];
$adatbazis["db1_db"]=$_POST['database'];
$adatbazis["db1_user"]=$_POST['username'];
$adatbazis["db1_pass"]=$_POST['pass'];
$datas["db_conf"]=$adatbazis;
$datas["homefolder"]=$_POST['homefolder'];
$datas["oldalid"]=$_POST['oldalid'];
$datas["homefolder"]=$_POST['homefolder'];
$datas["prefix"]=$_POST['prefix'];
$datas["prefix_pagesetting"]=$datas["oldalid"]."_";
$file = "items/config_files/". $_SERVER['SERVER_NAME'].".txt";
//var_dump($datas);
//var_dump($file);	

file_put_contents($file,json_encode($datas));
header("Location: index.php?q=user/enter");
exit;
}
//print_r ($_SERVER['HTTP_HOST']);
if ($_SERVER['SERVER_NAME']){
?>
<h1>HUNMOD WEB ENGINE INSTALL</h1>

<form action="" method="post">

<table width="100%" border="0">
  <tr>
    <td>Database Settings</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Server</td>
    <td>      <input type="text" name="server" id="server" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Database</td>
    <td><input type="text" name="database" id="database" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>prefix</td>
    <td><input type="text" name="prefix" id="prefix" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="username" id="username" required/></td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td>Password</td>
    <td><input type="password" name="pass" id="pass"/></td>
    <td>&nbsp;</td>
  </tr>  
   <tr>
    <td>Page Setting</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>   
  
   <tr>
    <td>Homefolder</td>
    <td>www/puplic_html<input type="text" name="homefolder" id="homefolder" /></td>
    <td>Example: /mainpage1/ If use the html folder, this empty</td>
  </tr>    
  <tr>
    <td>Page ID</td>
    <td><input type="text" name="oldalid" id="oldalid" required/></td>
    <td>Your project id, without special chars or whitespace (a-z,A-Z)</td>
  </tr>    
  
  </table>
<input name="" type="submit" />
</form>
<?php } ?>