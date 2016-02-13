<style>
.button .facebookButton,.facebookButton{
color:#FFF !important;	
}
</style>
<div class="modal-body">

<?php 
	if (($fb_ap_id!="")&&($fb_ap_secret!=""))
	{
?>  

                            <a href="<?php echo $homeurl."?fblog=1"?>" class="button facebookButton">
							<?php echo $lan["loginw"]; ?> Facebook<?php echo $lan["al"]; ?> <i class="fa fa-facebook"></i></a>
                        <br>
                        <hr>
                        <div class="text-center or"><span><?php echo $lan["or"]; ?></span></div>

<?php 
	}
?>    
<form id="login" name="login" method="post">

                         <fieldset>
                            <div class="form-group has-success">  

                                <span class="reqStar"></span><input id="email" name="email" placeholder="<?php echo $lan["email"]; ?>" type="text" data-error="Sikertelen üzenet vagy form validálási hiba!" value="<?php echo $ertek["email"]; ?>" required="" class="form-control required">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-error">
                                <span class="reqStar"></span><input type="password" data-minlength="6" class="form-control required" id="pass" name="pass" value="<?php echo $ertek["pass"]; ?>" placeholder="<?php echo $lan["pass"]; ?>" required="">
                            </div>
                            <button class="button enterButton full"><?php echo $lan["login"]; ?> <i class="fa fa-sign-in"></i></button>
                            
                            
                            <div class="form-group">
                                <input name="stay" id="stay-2" value="1" type="checkbox">
                                <label class="checkbox-inline terms" for="stay-2"><?php echo $lan["loginck"]; ?>.</label>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="row">
                            <div class="col-sm-7">
                                <p><i><?php echo $lan["notregq"]; ?></i></p>
                            </div>
                            <div class="col-sm-5 text-right">
                            
                            <a href="javascript:reg();" class="button enterButton nomargin"><span><?php echo $lan["reg"]; ?></span></a>

                            </div>
                        </div>
                        <p><?php echo $lan["passlost"]; ?> <a href="javascript:newpas();"><?php echo $lan["kattints"]; ?> <?php echo $lan["here"]; ?></a>.</p>
    <input name="loginform_id" type="hidden" value="x" />

                    </form>
                    



<span class="error"><?php echo $loginerror; ?></span>


   </div>


