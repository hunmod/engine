<?php
$filters["status"]=2;
$sliderelements=$class_slider->get($filters);
?>
<style>

#myslider .item img{
    display: block;
    width: 100%;
    height: auto;
}

#myslider .slideContent{
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}
#myslider .slideContent a{
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

#myslider .slideText{
  display: block;
  position: absolute;
  left: 0%;
  bottom: 10%;
  max-height:80%;
  overflow:hidden;
  width:auto;
  min-width:30%;
  background:#fff;
}

</style>
  <link rel="stylesheet" href="<?php echo $server_url;?>/scripts/owl-carousel/owl.carousel.css" />
  <script src="<?php echo $server_url;?>/scripts/owl-carousel/owl.carousel.min.js"></script>

<script>
$(document).ready(function() {
 
  $("#myslider").owlCarousel({
       autoPlay: 3000, //Set AutoPlay to 3 seconds

      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});
</script>



<div id="myslider" class="owl-carousel owl-theme">
<?php
foreach($sliderelements["datas"] as $slider){
$img="picture2.php?picture=".encode($slider['imgurl'])."";
?>
  <div class="item"><img src="<?php echo $server_url.$img;?>&x=1220&y=435" alt="The Last of us">
      <div class="slideContent">
      <div class="slideText">
        <h2><?php echo $slider["name"]; ?></h2>
        <p><?php echo $slider["description"]; ?></p>
      </div>
      <a href="<?php echo $slider["url"]; ?>"></a>
      </div>

      </div>
<?php } ?>  
</div>  