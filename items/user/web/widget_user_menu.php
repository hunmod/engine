<?php 
if (($auser["id"]<=0))
{
?>
    <nav class="veritcalmenu">
     <h3 class="bgcolor2 border8"><?= $lan['menu'];?></h3>	
              <hr />
            <ul>
				<li><a onclick="login();"><?= $lan['login']?></a></li>
				<li><a onclick="reg();"><?= $lan['reg']?></a></li>             </ul>   
      </nav>    
<?php
}
else
{
?>
    <nav class="veritcalmenu">
     <h3 class="bgcolor2 border8"><?= $lan['menu'];?></h3>
       
            <ul>
				<li><a href="<?php echo $homeurl.$separator."user/profil";?>">Adataim</a></li>
    		</ul>
				<?php  
				$MenuClass->printmenu2($usermenu,2);

                /*if (count($usermenu)>0){
                foreach ($usermenu as $admmenu){
                ?>
				<li><a href="<?php echo $homeurl.$separator.$admmenu["modules"]."/".$admmenu["file"]."/".$admmenu["id"].$admmenu["param"];?>"><?php echo $admmenu["name"];?></a></li>
            <?php	
                }
                }*/
                ?>
               
              <hr />
            <ul>
				<li><a href="<?php echo $homeurl.$separator."user/logout/";?>"><?= $lan['logout']?></a></li>
             </ul>   
      </nav>    
	<?php if ($auser["jogid"]>=4){    ?>
    <h3 class="bgcolor2 border8">Admin</h3>
		<?php  
		//arraylist($adminmenu);
			$MenuClass->printmenu2($adminmenu,2);
		?>
        
	
  
        
        <div class="adminseourl">SEO-URL<br />

	<?php 
	echo $_GET['q']."=".$MenuClass->shorturl_get($_GET['q']);
	
	
	if (($_POST["paramsseo"]!="")&&($_POST["getseo"]!="")&&($_POST["getseo"]!=$_POST["paramsseo"])){
	//save	
	$qs="replace INTO ".$tbl["short_url"]." (`get` ,`params` ,`status`) VALUES ('".$_POST["getseo"]."', '".$_POST["paramsseo"]."', '1');";
	$eredmeny=db_query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', 'replace');
	//echo $qs;

	//modification	
//	$qs="UPDATE ".$tbl["short_url"]." SET `params` = '".$_POST["paramsseo"]."',`get` = '".$_POST["getseo"]."' WHERE `get`  = '".$_POST["paramsseo"]."' LIMIT 1 ;";
	
	}
	
	
	$shorturledit=$getparams[0]."/".$getparams[1];
	if ($getparams[2]!=""){
		$shorturledit.="/".$getparams[2];
		}
	?>
<form action="" method="post">
<input name="paramsseo" type="hidden" value="<?php echo $shorturledit; ?>"/>
<?php echo $shorturledit; ?><br />
<input name="getseo" type="text" value="<?php echo $MenuClass->shorturl_get($shorturledit); ?>"/>
<input name="" type="submit" />
</form>
</div>
<?php }?>
        
	<?php }?>