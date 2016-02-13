<ul class="nav navbar-nav navbar-right">
<?php if ($auser["id"]<1){?>
                                    <li><a href="javascript:reg();"><span><?php echo $lan["reg"]; ?></span></a></li>
                                    <li><a href="javascript:login();"><span><?php echo $lan["login"]; ?></span></a></li>
                                    
<?php } else {?>
                                    <li class="sub-menu"><a href="<?php echo $homeurl.'/'.$separator;?>user/profil"><span><img src="<?php echo $User_Class->profielimg2($auser,$x=20,$y=20); ?>" class="menuprofilimg" /><?php echo $auser["unev"]; ?></span></a>
                                    <ul>
		                               <li><a href="<?php echo $homeurl.'/'.$separator;?>user/logout"><?php echo $lan["logout"]; ?></a></li>

                                    </ul>
                                    </li>                     
<?php }?>                                    
                                </ul>