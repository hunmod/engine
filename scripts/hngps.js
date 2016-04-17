var map;
var countmarker=0
var markers=[];
var zoomlevel=10;
var startmappos={lat: -34.397, lng: 150.644};

function clearmarkers(){
    for(var i=0; i < markers.length; i++){
	markers[i].setMap(null);
    markers = new Array();
	};
	countmarker=0;	
}

function makemarker(latx,lngx,caption){
  markers[countmarker] = new google.maps.Marker({
    position: new google.maps.LatLng(latx,lngx),
    map: map,
    title: caption
  });
    countmarker++;
}

function rszch(newrsz){
rsz=newrsz;	
getcardata();
} 

function getcardata(){
	var zoomlevel=map.getZoom();
$.getJSON( 'http://riafon.hu/service.php?q=gpsa/refreshdata'+'&rsz='+rsz, function( data ) {
 // var items = [];
 var mapcenterlng=0;
 var mapcenterlat=0;
		clearmarkers();
		map.setZoom(zoomlevel);
		  $.each( data, function( key, val ) {
			  makemarker(val.lng,val.lat,val.addres);
			   console.log(rsz);
			   mapcenterlng=val.lng;
			   mapcenterlat=val.lat;
		  });
		  map.setCenter(new google.maps.LatLng(mapcenterlng,mapcenterlat));

});	
}

function initMap() {
//  map = new google.maps.Map(document.getElementById('map'), {center: startmappos,zoom: zoomlevel});
  map = new google.maps.Map(document.getElementById('map'));
}
