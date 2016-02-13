	<style>
		textarea {
			width:100%;
			height:500px;
		}
	</style>

<script type="text/javascript">
			
function Insertigtokce(editorname,img)
{

x=document.getElementById(editorname+'x').value;
y=document.getElementById(editorname+'y').value

var addx='';
var addy='';
var addfx='';
var addfy='';

if (x>0){
addx='&x='+(x*1.2);
addfx=' width="'+x+'" ';
}

if (y>0){
addy='&y='+(y*1.2);
addfy=' height="'+y+'" ';
}


//'&x=100&y=100" 

CKEDITOR.instances[editorname].insertHtml( '<img src="uploads/picture.php?picture='+img+addx+addy+'" '+addfx+addfy+'/>' );	

}
</script>
<?php 
if ($getparams[2]!=''){
$qadatok="SELECT * FROM  ".$tbl['hir']." WHERE id='".base64_decode($getparams[2])."'";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$adat=$adatok[0];
}

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);
?>


	<form action="<?php echo $kezdooldal.$separator.$getparams[0]."/savetext/".base64_encode ($elem["id"]);?>" method="post">
    
    Menü:<select name="mid">
<?php 
//$feltetfomenu=" WHERE status!=".$status['del']; 
?>
<?php  foreach ($menupontselectbox_hirek as $elem){	 ?>   
 <option value="<?php echo $elem["id"]; ?>" <?php if ($elem["id"]==$adat["mid"]) {echo $selected;}?>><?php echo $elem["nev"]; ?></option>
  <?php }?>
  
</select>
<br />

    
    <input name="id" id="id" type="hidden" value="<?php echo base64_decode($getparams[2]); ?>" />
	Cím:<input name="cim" id="cim"  type="text" value="<?php echo htmlfromchars($adat["cim"]); ?>" /><br />
	Bevezető:<textarea cols="80" rows="10" id="hir" name="hir">
        <?php echo htmlfromchars($adat["hir"]); ?>
        </textarea>
<div>
<div>
X=<input id="hirx" type="text"  size="3"/>px ; Y=<input id="hiry" type="text" size="3" />px 
</div>
<?php
if ($adat["id"]>0){
	//$getparams[2]=decode($getparams[2]);
	$images=folderlist($getparams,'100','100');
	//arraylist($images);
//include_once("./items/files/web/list.php");	
}
if (count ($images)>0){
foreach ($images as $kep){
echo '<img src="uploads/picture.php?picture='.encode($kep["filepath"]).'&x=100&y=100"  onclick="Insertigtokce(\'hir\',\''.encode($kep["filepath"]).'\');" /> ';	
	
}
}
?>
</div>        
        <br />
    Belső:<textarea cols="80" id="hir2" name="hir2" rows="10">
        <?php echo htmlfromchars($adat["hir2"]); ?>
        </textarea>
<div>
X=<input id="hir2x" type="text"  size="3"/>px ; Y=<input id="hir2y" type="text" size="3" />px 
</div>
<?php
if ($adat["id"]>0){
	//$getparams[2]=decode($getparams[2]);
	$images=folderlist($getparams,'100','100');
	//arraylist($images);
//include_once("./items/files/web/list.php");	
}
if (count ($images)>0){
	foreach ($images as $kep){
	echo '<img src="uploads/picture.php?picture='.encode($kep["filepath"]).'&x=100&y=100"  onclick="Insertigtokce(\'hir2\',\''.encode($kep["filepath"]).'\');" /> ';	
	}
}
?>
</div>        
        
        <br /><select name="status" id="status" >
   	    <option value="1">Aktiv</option>
	        <option value="3">Felfüggesztve</option>
            <option value="4">Törölt</option>
  </select>
<p>
<select name="sorrend">
     <?php for ($i = 1; $i <= 30; $i++) {?>
            <option value="<?php echo $i; ?>" <?php if ($i==$adat["sorrend"]) {echo $selected;}?>><?php echo $i; ?></option>
     <?php }?> 
</select>       
</p>
<p>
			<input type="submit" value="Submit" />
		</p>
        

	</form>


	<script type="text/javascript">
		function inserttext($text) {
		if (Aloha.activeEditable) {
			Dom.insertIntoDOM($('+$text+'), range, Aloha.activeEditable.obj, true);
		}
		
		
		
	}
	Aloha.ready( function() {
		Aloha.jQuery('#hir').aloha();
		Aloha.jQuery('#hir2').aloha();

	});
	
	inserttext('fdsfdsf');
	</script>
<span onclick="inserttext('fdsfdsf');">trertzr</span>

<?php
if ($adat["id"]>0){
	$getparams[2]=decode($getparams[2]);
include_once("./items/files/web/list.php");	
}
?>     