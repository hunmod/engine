<?php
//friss magazin cikkek
$filtersm['id']=1;
$filtersm['lang']=$_SESSION['lang'];
$filtersm["maxegyoldalon"]=8;
$qhir=$SiteClass->get($filtersm,'',$_GET["page"]) ;
$oldalelemek['fohir']=($qhir['datas']);

$filtersm=array();
$filtersm['mid']=14;
$filtersm['status']=2;
$filtersm['lang']=$_SESSION['lang'];
$filtersm["maxegyoldalon"]=2;
$qhir=$SiteClass->get($filtersm,'',$_GET["page"]) ;
$oldalelemek['tobbhir']=($qhir['datas']);

$filtersm=array();
$filtersm['status']=2;
$filtersm["maxegyoldalon"]=2;
$qhir=$video_class->get($filtersm,'',$_GET["page"]) ;
$oldalelemek['vid']=($qhir['datas']);
//bf lista
$filtersm=array();
$filtersm['status']=2;
$filtersm['lang']=$_SESSION['lang'];
$filtersm["maxegyoldalon"]=6;

$qhir=$bfclass->get($filtersm,'',$_GET["page"]) ;
$oldalelemek['list']=($qhir['datas']);
//arraylist($oldalelemek['list']);


?>
<div class="container">
<?php
foreach($oldalelemek['fohir'] as $elem){
    $elem['url']=$SiteClass->createurl($elem);
    ?>
    <?php
    //arraylist($elem);
    include('./items/site/web/display2.php');
    ?>
    <?php
}
?>
</div>

<div class="clear"></div>
<div class="container">
<?php
foreach($oldalelemek['tobbhir'] as $elem){
    $elem['url']=$SiteClass->createurl($elem);
    ?>
    <div class="col-xs-6">
    <?php
    //arraylist($elem);
    include('./items/site/web/display1.php');
    ?>
    </div>
    <?php
}
?>
</div>

<div class="container">
<?php
foreach($oldalelemek['vid'] as $mdata){
    $elem['url']=$SiteClass->createurl($elem);
    ?>
    <onevideo class="col-md-6" itemscope itemtype="http://schema.org/VideoObject">
		<?php echo $mdata["nev"]; ?><br>

        <div align="center" class="box embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $mdata["url"]; ?>" frameborder="0" allowfullscreen="" itemprop="url"></iframe>
        </div>
        </onevideo>
    <?php
}
?>
</div>

<div class="clear"></div>
    <div class="container">
<?php foreach($oldalelemek['list'] as $elem){
    ?>
    <?php
    //arraylist($elem);
    include('./items/bf/web/display_2.php');
    ?>
    <?php
}
?>
</div>
<script>
    $(function() {
        $('location').matchHeight();
    });
</script>
