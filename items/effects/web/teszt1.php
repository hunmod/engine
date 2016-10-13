
<!--script src="./scripts/jquery.viewportchecker.min.js"></script-->

<script>
$(document).ready(function(){
$('.dummy').viewportChecker({
classToAdd: 'visible',
classToRemove : 'invisible',
// The offset of the elements (let them appear earlier or later)
offset: 100,
repeat: true,
// Add the offset as a negative number to the element's bottom
invertBottomOffset: true,
callbackFunction: function(elem, action){},
// Set to true if your website scrolls horizontal instead of vertical.
scrollHorizontal: false
});
});
</script>


        <style>
            body,html{
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }

            .dummy{
                min-height: 300px;
                -webkit-transition: all .7s;
                transition: all .7s;
                -moz-transition: all .7s;
                opacity: 0;
            }

            .dummy.visible{
                color: white;
                opacity: 1;
            }
			.dummy.bg1{
				background-color: #2ecc71;
			}			
			.dummy.bg2{
				background-color: #f43f34;
			}
        </style>



   <div class="dummy bg1 col-sm-12" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-12" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-6" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-6" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-6" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-6" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-4" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-4" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-4" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-4" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-4" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-4" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-sm-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-sm-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-md-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-md-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg1 col-md-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>
   <div class="dummy bg2 col-md-3" data-vp-repeat="true">Elemem<div class="callback">recece</div></div>


  