<script type="text/javascript">
    function roomkosarba(tipus,id){
       // console.log(tipus);
        parancs='q=rooms/kosar&rkosar=1&tipus='+tipus+'&id='+id+'';
        phpopenf('roomkosar','service',parancs);
    }
    function roomkosarbbol(tipus,id){
        console.log(tipus);
        parancs='q=rooms/kosar&del=1&rkosar=1&tipus='+tipus+'&id='+id+'';
        phpopenf('roomkosar','service',parancs);
    }
</script>
<?php
foreach ($kosarszobak as $elem){
?>
    <span onclick="roomkosarbbol('room','<?= $elem["id"]?>');">X</span>
<?php
include('room_display2.php');
}