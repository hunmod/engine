<script type="text/javascript">
    <!--//--><![CDATA[//><!--
      $(document).ready(function(){
        // Apply jrac on some image.
        $('.pane img').jrac({
          'crop_width': <?= $cropdata["cw"];?>,
          'crop_height': <?= $cropdata["ch"];?>,
          'crop_x': <?= $cropdata["cx"];?>,
          'crop_y': <?= $cropdata["cy"];?>,
          'image_width': <?= $cropdata["iw"];?>,
          'viewport_onload': function() {
            var $viewport = this;
            var inputs = $viewport.$container.parent('.pane').find('.coords input:text');
            var events = ['jrac_crop_x','jrac_crop_y','jrac_crop_width','jrac_crop_height','jrac_image_width','jrac_image_height'];
            for (var i = 0; i < events.length; i++) {
              var event_name = events[i];
              // Register an event with an element.
              $viewport.observator.register(event_name, inputs.eq(i));
              // Attach a handler to that event for the element.
              inputs.eq(i).bind(event_name, function(event, $viewport, value) {
                $(this).val(value);
              })
              // Attach a handler for the built-in jQuery change event, handler
              // which read user input and apply it to relevent viewport object.
              .change(event_name, function(event) {
                var event_name = event.data;
                $viewport.$image.scale_proportion_locked = $viewport.$container.parent('.pane').find('.coords input:checkbox').is(':checked');
                $viewport.observator.set_property(event_name,$(this).val());
              });
            }
            $viewport.$container.append('<div>Image natual size: '
              +$viewport.$image.originalWidth+' x '
              +$viewport.$image.originalHeight+'</div>')
          }
        })
        // React on all viewport events.
        .bind('jrac_events', function(event, $viewport) {
          var inputs = $(this).parents('.pane').find('.coords input');
          inputs.css('background-color',($viewport.observator.crop_consistent())?'chartreuse':'salmon');
        });
      });
      //--><!]]>
</script>
<style>
  img {
    max-width: none;
  }
  .jrac_viewport{
    width: 630px;
    height: 842px;

  }
  .jrac_crop_drag_handler{
    border-radius: 400px;
    border: #00ff00 2px;
    background: transparent;
    border-style: dashed;
    opacity: 0.7;

  }
</style>
<div class="container">


<div class="pane clearfix">
    <img src="<?= $server_url;?>/uploads/_konyha/konyha/103/20150920200151.jpg" alt="Loulou form Sos Chats Geneva" />
  <?= $folders["uploads"];?>
  <form method="post">
    <table class="coords">
      <tr><td>crop x</td><td><input type="text" name="cx"  /></td></tr>
        <tr><td>crop y</td><td><input type="text" name="cy" /></td></tr>
        <tr><td>crop width</td><td><input type="text" name="cw" /></td></tr>
        <tr><td>crop height</td><td><input type="text" name="ch" /></td></tr>
        <tr><td>image width</td><td><input type="text" name="iw" /></td></tr>
        <tr><td>image height</td><td><input type="text" name="ih"/></td></tr>
        <tr><td>lock proportion</td><td><input type="checkbox" checked="checked" /></td></tr>
      <tr><td>imageurl</td><td><input type="text" name="imgurl" value="/uploads/_konyha/konyha/103/20150920200151.jpg" /></td></tr>

    </table>
    <button type="submit"><?= $lan["save"];?></button>
  </form>
</div>


</div>