                        <h3><?php echo $lan["new"]; ?> <?php echo $lan["pass"]; ?></h3>

<form method="post" action="<?php echo $homeurl."/fb/newpassget"?>" id="regfb">
<input name="passreset" type="hidden" value="1" />

  <fieldset>
                             <div class="form-group has-success">  
                                <input name="unev" placeholder="<?php echo $lan["email"]; ?>" type="text" required="required">
                                <div class="help-block with-errors" id="unev2_error" ></div>
                            </div>
                            
<input class="button full" type="submit" value="<?php echo $lan["save"]; ?>" />
                            
                        </fieldset>             
 </form>