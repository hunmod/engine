function call(){
alert("call");
}
function phpopenf(location,file,parancs) 
	{
	   window.$("#"+location).load(server_url+file+".php?"+parancs);
	}
	  
function phpsendone(location,file,box) 
	{
	   window.$("#"+location).load(server_url+file+".php?"+"d="+document.getElementById(box).value+"&tid="+document.getElementById('tid').value);
	}	  
function postform(location,file,formid,get)  {
   $.ajax({
	   type: "POST",
	   url: server_url+file+".php"+get,
	   data: $('#'+formid).serialize(),
	   success: function(data)
	   {
		   $('#'+location).html(data);
		   //alert(data); // show response from the php script.
	   }
	 });
}
function phpopenf2(location,file,parancs) {
showdiv('hiddendiv');
window.$("#"+location).load(server_url+file+".php?"+parancs);
popuppos(location);
}
function phpopenf3(file,parancs) {
//showdiv('hiddendiv');
$('#hiddenbox').modal('show');
//$('#error').modal('hide');
window.$("#hiddencontent").load(server_url+file+".php?"+parancs);
//popuppos(location);
}
function hidediv(divname) {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById(divname).style.display = 'none';
}
else {
if (document.layers) { // Netscape 4
document.hideShow.display = 'none';
}
else { // IE 4
document.all.hideShow.style.display = 'none';
}
}
}
function showdiv(divname) {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById(divname).style.display = 'block';
}
else {
if (document.layers) { // Netscape 4
document.hideShow.display = 'block';
}
else { // IE 4
document.all.hideShow.style.display = 'block';
}
}
}
function xmlhttpPost(strURL,formname,responsediv,responsemsg) {
    var xmlHttpReq = false;
    var self = this;
    // Xhr per Mozilla/Safari/Ie7
    if (window.XMLHttpRequest) {
	  self.xmlHttpReq = new XMLHttpRequest();
    }
    // per tutte le altre versioni di IE
    else if (window.ActiveXObject) {
	  self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open('POST', strURL, true);
	
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.setRequestHeader('charset', 'UTF-8');	
    self.xmlHttpReq.onreadystatechange = function() {
	  if (self.xmlHttpReq.readyState == 4) {
			// Quando pronta, visualizzo la risposta del form
		updatepage(self.xmlHttpReq.responseText,responsediv);
	  }
		else{
			// In attesa della risposta del form visualizzo il msg di attesa
			updatepage(responsemsg,responsediv);
		}
    };
    self.xmlHttpReq.send(getquerystring(formname));
}
function getquerystring(formname) {
    var form = document.forms[formname];
	var qstr = "";
    function GetElemValue(name, value) {
	  qstr += (qstr.length > 0 ? "&" : "")
		+ escape(name).replace(/\+/g, "%2B") + "="
		+ escape(value ? value : "").replace(/\+/g, "%2B");
			//+ escape(value ? value : "").replace(/\n/g, "%0D");
    }
	
	var elemArray = form.elements;
    for (var i = 0; i < elemArray.length; i++) {
	  var element = elemArray[i];
	  var elemType = element.type.toUpperCase();
	  var elemName = element.name;
	  if (elemName) {
		if (elemType == "TEXT"
			  || elemType == "TEXTAREA"
			  || elemType == "PASSWORD"
					|| elemType == "BUTTON"
					|| elemType == "RESET"
					|| elemType == "SUBMIT"
					|| elemType == "FILE"
					|| elemType == "IMAGE"
			  || elemType == "HIDDEN")
		    GetElemValue(elemName, element.value);
		else if (elemType == "CHECKBOX" && element.checked)
		    GetElemValue(elemName, 
			  element.value ? element.value : "On");
		else if (elemType == "RADIO" && element.checked)
		    GetElemValue(elemName, element.value);
		else if (elemType.indexOf("SELECT") != -1)
		    for (var j = 0; j < element.options.length; j++) {
			  var option = element.options[j];
			  if (option.selected)
				GetElemValue(elemName,
				    option.value ? option.value : option.text);
		    }
	  }
    }
    return qstr;
}
function updatepage(str,responsediv){
    document.getElementById(responsediv).innerHTML = str;
}
function redirect(page){
window.location = page;
}
function toBottom()
{testitem=document.getElementById('wrapper');
testitem.scrollTop = 2000000;
}
function numericFilter(txb) {
	document.getElementById(txb).value=document.getElementById(txb).value.replace(/[^\0-9]/ig, "");
   //txb.value = txb.value.replace(/[^\0-9]/ig, "");
}
// Numeric only control handler
function listbox_short(listbox) {
	  var $r = $("#"+listbox+" option");
	  $r.sort(function(a, b) {
		if (a.text < b.text) return -1;z
		if (a.text == b.text) return 0;
		return 1;
	  });
	  $($r).remove();
	  $("#"+listbox).append($($r));
			document.getElementById(listbox).selectedIndex = 0;  
	  }
function clone_listbox(listbox,clone)
 {
	   var secondbox = document.getElementById(clone);
		var foo= new Array;
		var fox=new Array;
		$('#'+listbox+' option').each(function(i, value){ 
			  foo[i] = $(value).text(); 
			  fox[i] = $(value).val();
			secondbox.options.add(new Option(foo[i],fox[i]));
	}); 
		listbox_short(clone);
		document.getElementById(clone).selectedIndex = 0;  
 }
		 
		 
/*listboxból lpozós elem*/
	function Count_Listbox_Items(listbox) {
		  var n=0;
		$('#'+listbox+' option').each(function(i, value){n++;}); 
	     return n;
		 }
function listbox_pager(listboxid,textbox,pager){
	var list = document.getElementById(listboxid);
	var max_listbox_element_number=Count_Listbox_Items(listboxid)-1;
	
if (list.selectedIndex < 0){
	list.selectedIndex=0;	
}
	listoind=list.selectedIndex;
	
	if (pager=="+"){
		listoind=list.selectedIndex+1;
		if (listoind > max_listbox_element_number){listoind=0;}
	}
	if (pager=="-"){listoind=list.selectedIndex-1;
		if (listoind < 0){listoind=max_listbox_element_number;}
	}
		//alert(list.selectedIndex+" - "+listoind+" | "+max_listbox_element_number);
list.selectedIndex=listoind;
	var ertek=list[list.selectedIndex].value;
	var text_value = list.options[list.selectedIndex].text;
		$("#"+textbox+"").text(text_value);
}
/* jobneked */
function job_ua(act,jid,del){
if ($( "#"+act+"s"+jid ).val()!=4){
$.getJSON( server_url+"service.php?q=recipe/user_action&"+act+"="+jid, function( json ) {
  if(json['ret']=='loginerror'){
	  phpopenf3('hiddencontent','service','q=jobs/plslogin');
	  }
  else{
	$( '#'+act+jid ).text( json["count"] );
	$("#"+act+"i"+jid).addClass("active");
	$("#"+act+"s"+jid).val("4");
		if (act=='like')
		{
		    $('#favok_text').html('Thank you for cherish!');   
		    $('#favok').modal('show');  
		}
		if (act=='fav')
		{
		    $('#favok_text').html('The recipe is saved to your profile!');
		    $('#favok').modal('show');  
		}
	}
 });
}
else
{
$.getJSON( server_url+"service.php?q=recipe/user_action&del=1&"+act+"="+jid, function( json ) {
	$( '#'+act+jid ).text( json["count"] );
	$("#"+act+"i"+jid).removeClass("active");
	$("#"+act+"s"+jid).val("0");

});
}
}
function job_ua2(act,jid,del){
if ($( "#"+act+"s"+jid ).val()!=4){
$.getJSON( server_url+"service.php?q=hirek/user_action&"+act+"="+jid, function( json ) {
  if(json['ret']=='loginerror'){
	  phpopenf3('hiddencontent','service','q=jobs/plslogin');
	  }
  else{
	$( '#'+act+jid ).text( json["count"] );
	$("#"+act+"i"+jid).addClass("active");
	$("#"+act+"s"+jid).val("4");
	}
		if (act=='like')
		{
		    $('#favok_text').html('Thank you for cherish!');   
		    $('#favok').modal('show');  
		}
		if (act=='fav')
		{
		    $('#favok_text').html('This article is saved to your profile!');
		    $('#favok').modal('show');  
		}
	  });
}
else
{
$.getJSON( server_url+"service.php?q=hirek/user_action&del=1&"+act+"="+jid, function( json ) {
	$( '#'+act+jid ).text( json["count"] );
	$("#"+act+"i"+jid).removeClass("active");
	$("#"+act+"s"+jid).val("0");
 });
}
//$.getJSON('includes/service.php?q=jobs/user:action&report='+jid, function(data) {	}}//
}
// reg
$(document).ready(function() {
  $("#pass1").keyup(validate);
  $("#aszf").click(validate);
  $( "input[name=email]" ).keyup(validate);
  $( "#firstname" ).keyup(validate);
  $( "#lastname" ).keyup(validate);
});
function validate2() {
	if ($("#aszf").is(':checked')){
			$("#aszfl").removeClass("error");
			$("#fbregsubmit").removeAttr("disabled");
	}else{
			$("#aszfl").addClass("error");
			$("#fbregsubmit").attr("disabled", "disabled");
	}
}
function validate() {
  var password1 = $("#pass").val();
  var password2 = $("#pass1").val();
  var email = $( "#email" ).val();
  var fname = $( "#firstname" ).val();
  var lame = $( "#lastname" ).val();
    if( email=='') {
		$("#email").addClass("error");
    }
    else {
		$("#email").removeClass("error");
    }
  /*  if( fname=='') {
		$("#firstname").addClass("error");
    }
    else {
		$("#firstname").removeClass("error");
    }
    if( lame=='') {
		$("#lastname").addClass("error");
    }
    else {
		$("#lastname").removeClass("error");
    }
	if(password1 != password2||password1 ==''||password2 ==''||password1 ==''){
		$("#pass").addClass("error");
		$("#pass1").addClass("error");
    }
    else {
		$("#pass").removeClass("error");
		$("#pass1").removeClass("error");
    }
	*/
	validate2();
/*
	
*/
    if(password1 == password2 && password1!='' && fname!='' && lame!='' && email!='' && $("#aszf").is(':checked')) {
		$("#regsubmit").removeAttr("disabled");
    }
    else {
		$("#regsubmit").attr("disabled", "disabled");
    }
    
}
function popuppos(location){
	
    $('html, body').animate({
	  scrollTop: $("#"+location).offset().top
    }, 1000);	
}
function movebottompos(location){
	
    $('html, body').animate({
	  scrollTop: $("#"+location).offset().bottom
    }, 1000);	
}
function ocmenu(){
	$('#hmenu').toggle('slow');
  }

  
function mlogin(){
phpopenf3('service','q=user/loginpls');	  
}
function login(){
phpopenf3('service','q=user/login');	  
}
function reg(){
phpopenf3('service','q=user/reg');	  
}
function newpas(){
phpopenf3('service','q=user/newpass');	  
}
function writeCookie(name,value,days) {
    var date, expires;
    if (days) {
	  date = new Date();
	  date.setTime(date.getTime()+(days*24*60*60*1000));
	  expires = "; expires=" + date.toGMTString();
		}else{
	  expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
writeCookie('screenwidth',$(window).width(),100);
writeCookie('screenheight',$(window).height(),100);

/* Ország,Város lekérdezések*/
function getjsonfromcity(myzip='',text='',country='',regio='') {
	$.ajax({
		type: "GET",
		url: server_url + 'service.php?q=locations/citys_data&zip='+myzip+'&country='+country,
		success: function (data) {
			loadelements_citys(data);
		}
	});
}
function getjsonfromcountry(myzip) {
	$.ajax({
		type: "GET",
		url: server_url + 'service.php?q=locations/countrys_data&id='+myzip,
		success: function (data) {
			loadelements_citys(data);
		}
	});
}
function getjsonfromcregions(country='',regio='',text='') {
	params='';
	if (country){
		params+='&country_id='+country;
	}
	if (country){
		params+='&regio_id='+regio;
	}
	if (country){
		params+='&text='+text;
	}

	$.ajax({
		type: "GET",
		url: server_url + 'service.php?q=locations/regions_data'+params,
		success: function (data) {
			loadelements_regions(data);
		}
	});
}
function loadelements_citys(data) {
	// console.log(data);
	// console.log(data);

	data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
	menudatas = jQuery.parseJSON(data2);
	//  console.log(menudatas);
	ideglenes=$("#city").val();
	$("#itemcontainer").html('<select id="city" name="city" value="'+ideglenes+'" class="form-control"></select>');


	var midsel = document.getElementById('city');
	$.each(menudatas, function (key, value) {
		console.log(value["city_id"]);
		var opt = document.createElement('option');
		opt.innerHTML = value["city_name"];
		opt.value = value["city_id"];
		midsel.appendChild(opt);
	});

	$("#city").val(ideglenes);
}
function loadelements_country(data) {
	// console.log(data);
	// console.log(data);

	data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
	menudatas = jQuery.parseJSON(data2);
	//  console.log(menudatas);
	ideglenes=$("#country_id").val();
	$("#country_id").html('<select id="country_id" name="country_id" value="'+ideglenes+'" class="form-control"></select>');


	var midsel = document.getElementById('country_id');
	$.each(menudatas, function (key, value) {
		console.log(value["country_id"]);
		var opt = document.createElement('option');
		opt.innerHTML = value["country_name"];
		opt.value = value["country_id"];
		midsel.appendChild(opt);
	});

	$("#country_id").val(ideglenes);
}
function loadelements_regions(data) {
	// console.log(data);
	// console.log(data);

	data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
	menudatas = jQuery.parseJSON(data2);
	//  console.log(menudatas);
	ideglenes=$("#regio_id").val();
	$("#regio_id").html('<select id="regio_id" name="regio_id" value="'+ideglenes+'" class="form-control"></select>');


	var midsel = document.getElementById('regio_id');
	$.each(menudatas, function (key, value) {
		console.log(value["regio_id"]);
		var opt = document.createElement('option');
		opt.innerHTML = value["regio_name"];
		opt.value = value["regio_id"];
		midsel.appendChild(opt);
	});

	$("#regio_id").val(ideglenes);
}

/* Ország,Város lekérdezések*/


function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};


/*dátumszamolas*/

function agecalc(birthdate, nowdate) {
	if (!nowdate) {
		var   datum1 = new Date();
	} else {
		// datum1 = new Date();
		var   datum1arr = nowdate.split('.');
		datum1 = new Date(datum1arr[0],datum1arr[1],datum1arr[2],0,0,0,0);
	}
	var datum2arr = birthdate.split('.');
	datum2 = new Date(datum2arr[0],datum2arr[1],datum2arr[2],0,0,0,0);

	//console.log(datum1);
	//console.log(datum2);

	kul = datum1.getTime() - datum2.getTime();
	kor = Math.floor(kul / (1000 * 60 * 60 * 24) / 365);
	return (kor);
}
function daycalc(firstdate, seconddate) {
	if (seconddate.indexOf(".")) {
		var datum1arr = seconddate.split('.');
	}
	if (seconddate.indexOf("-")) {
		var datum1arr = seconddate.split('-');
	}
	if (firstdate.indexOf(".")) {
		var datum2arr = firstdate.split('.');
	}
	if (seconddate.indexOf("-")) {
		var datum2arr = firstdate.split('-');
	}

	var datum1 = new Date(datum1arr[0],datum1arr[1],datum1arr[2],0,0,0,0);
	var  datum2 = new Date(datum2arr[0],datum2arr[1],datum2arr[2],0,0,0,0);
	kul = datum1.getTime() - datum2.getTime();
	kor = Math.floor(kul / (1000 * 60 * 60 * 24));
	return (kor);
	console.log(datum2arr)
}



//oldalváltásnál effekt
$(window).unload(function() {
    $('.container').fadeOut(1000);
});
//betöltés után effekt
function gomemove(){
    scrollanimate('article','fadeIn');
    scrollanimate('shoparticle','fadeIn');
    scrollanimate('site','fadeIn');
}
jQuery(document).ready(function() {
    $(window).on('scroll resize', gomemove);
    $(window).trigger('scroll');
});





/* Session mod*/
/*
function SetSession(name,val)
{
	'<%Session["'+name+'"] = "' + val + '"; %>';
	//alert('<%=Session["UserName"] %>');
}
function GetSession(name)
{

	return  '<%= Session["'+name+'"] %>';
	//alert(username );
}
		*/