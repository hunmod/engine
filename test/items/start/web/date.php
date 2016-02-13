<style>

@media all and (max-width: 1024px) {
#ctable span{font-size:30px;}
#t { font-size:40px;  }
#h {  font-size:20px; }
}

@media all and (min-width: 1024px) {
#ctable span{font-size:60px;}
#t {  font-size:120px; }
#h {  font-size:30px; }
}

#ctable {
text-align:center;
font-size:60px;
font-weight:normal;
}
#t { 
border-radius:20px;
-webkit-border-radius:border-radius;
-moz-border-radius:border-radius;
text-shadow: 2px 2px 5px #000;
padding:15px;
}
</style>

<?php
	
   $json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn='. getIP_cdata()); 
   $data = json_decode($json,true);
	//arraylist($data);
?>

<div id="ctable">

<span ><?php

setlocale(LC_ALL,'hungarian');
echo utf8_encode (strftime("%Y %B %d <br /> %A", strtotime($date)));
?> </span><br>
<span id="t"></span><br>
<span id="h"></span>
</div>
	<div class="text">A te IP c&iacutemed: <strong><?php echo $_SERVER['REMOTE_ADDR'];?></strong>
 (<?php echo ($data["geobytesinternet"]);?>, <?php echo ($data["geobytescountry"]);?>, <?php echo ($data["geobytesregion"]);?>)
</div>


<script type="text/javascript">

$(document).ready(function() {
	dotime();	
});

function dotime(){
	$("#ctable").css({"transition": "all 0.5s", "-webkit-transition": "all 0.5s"});
	var d = new Date();
	var hours = d.getHours();
	var mins = d.getMinutes();
	var secs = d.getSeconds();
	var msecs = d.getMilliseconds();
	
	var hh = Math.round(hours  * 255 / 23);
	var mh = Math.round(mins   * 255 / 59);
	var sh = Math.round(secs   * 255 / 59); 
	var ms = Math.round(msecs   * 255 / 1000); 
	
	if (hours < 10){hours = "0" + hours};
	if (mins < 10){mins = "0" + mins};
	if (secs < 10){secs = "0" + secs};
	if (msecs < 10){msecs = "0" + msecs};
	  
	hours.toString();
	mins.toString();
	secs.toString();
	msecs.toString();
	
	$("#t").html(hours +" : "+ mins +" : "+ secs);
	
	var hex = "#" + hh + mh + sh;
	var RGBA="rgba("+ hh +","+ mh +","+ sh+",0.65)";
	var tRGBA="rgb("+ (255-hh) +","+ (255-mh) +","+ (255-ms)+")";
	
	$("#h").html(RGBA+"<br>"+tRGBA);
	$("#t").css("background-color", RGBA);  
	$("#t").css("color", tRGBA);  
	
	setTimeout(function(){ dotime();}, 10);
}

</script>


