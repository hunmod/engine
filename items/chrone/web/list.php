<?php
$qchrone="SELECT * FROM  ".$tbl['chron']." LIMIT 0 , 30";
$chronlist=db_Query($qchrone, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
?>
<cron>
<?php if ($auser["jogid"]>=4){?>
<a href="?q=chrone/edit">NEW</a>
    <table width="100%">
    <?php 
    //arraylist($hirekelemek);
    if (count($chronlist)>0){
    foreach($chronlist as $elem){
    ?>
    <tr>
        <td>
			<?php echo $elem["name"];?>        
        </td>
        <td>
			<?php echo $elem["file"];?>        
        </td>
        <td>
			<?php echo $elem["lastrun"];?>        
        </td>
        <td>
			<?php echo $elem["intervalt"];?>        
        </td>   
         <td>
			<?php echo $elem["status"];?>        
        </td>          
        <td>
			<a href="<?php echo $kezdooldal.$separator.$getparams[0]."/edit/".($elem["id"]);?>"><?php echo $buttons["edit"];?></a>
        </td>                                
    </tr>
    <?php }}?>
    </table>
<?php }?>
</cron>