function hiraction(act,jid,del){
if ($( "#"+act+"s"+jid ).val()!=4){
$.getJSON( server_url+"service.php?q=hirek/user_action&"+act+"="+jid, function( json ) {
  if(json['ret']=='loginerror'){
	  phpopenf3('hiddencontent','service','q=user/login');
	  }
  else{
	$( '#'+act+jid ).text( json["count"] );
	$("#"+act+"i"+jid).addClass("active");
	$("#"+act+"s"+jid).val("4");
	}
            if (act=='like')
            {
                $('#favok_text').html('Kedvelted ezt a cikket!');   
                $('#favok').modal('show');  
            }
            if (act=='fav')
            {
                $('#favok_text').html('Kedvencek közé mentve!');
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
