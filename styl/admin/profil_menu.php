<?php if ($auser["id"] < 1) { ?>
    <a href="javascript:login();"><span><?php echo $lan["login"]; ?></span> </a>
    <ul class="user-summary">
        <li><a href="javascript:reg();"><span><?php echo $lan["reg"]; ?></span></a></li>
        <li><a href="javascript:login();"><span><?php echo $lan["login"]; ?></span></a></li>
    </ul>
    <div class="clearfix"></div>

<?php } else { ?>

    <a href="<?php echo $homeurl . '/' . $separator; ?>user/profil"><span><img
                src="<?php echo $User_Class->profielimg2($auser, $x = 20, $y = 20); ?>"
                class="menuprofilimg"/><?php echo $auser["unev"]; ?></span></a>
    <ul class="user-summary">
        <li>
            <div class="summary">

            <a href="<?php echo $homeurl . '/' . $separator; ?>user/logout"><?php echo $lan["logout"]; ?></a>
                </div>
        </li>
    </ul>
    <div class="clearfix"></div>

<?php } ?>
