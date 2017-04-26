<?
$mailhide_pubkey = '6LfWFRYUAAAAAGH29HrGvabcCCGsQyD3iiyv9Ddr';
$mailhide_privkey = '6LfWFRYUAAAAAN-kEVGje6DhUsDSnhR0ugx7gNNq';
//arraylist($_POST);
?>
<?php
require_once 'class/recaptha/autoload.php';
$siteKey = $mailhide_pubkey;
$secret = $mailhide_privkey;

$lang = $_SESSION['lang'];
?>

<div class="container">
    <h1><?= lan('hirlevel') ?></h1>
    <?php if ($siteKey === '' || $secret === '') { ?>
        <h2>Add your keys</h2>
        <p>If you do not have keys already then visit <tt>
                <a href="https://www.google.com/recaptcha/admin">
                    https://www.google.com/recaptcha/admin</a></tt> to generate them.
            Edit this file and set the respective keys in <tt>$siteKey</tt> and
            <tt>$secret</tt>. Reload the page after this.</p>
        <?php
    } else if (isset($_POST['g-recaptcha-response'])&& isset($_POST['email'])) {
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        if ($resp->isSuccess()) {
            $_POST['status'] = '2';
            $_POST['lang'] = $_SESSION['lang'];
            $_POST['msg'] = $Text_Class->htmltochars($_POST["msg"]);
//arraylist($_POST);
            $hirid = $SparksendClass->save_users($_POST);
            ?>
            <h2><?= lan('feliratkozva') ?></h2>
            <?php
        }
    } else {

        ?>
        <form method="post">
            <fieldset>
                <legend><?= lan('feliratkozas') ?></legend>
                <?php $Form_Class->textbox("email", $Text_Class->htmlfromchars($_REQUEST["email"]), lan('email'),'',1) ?>
                <?php $Form_Class->textbox("nev", $Text_Class->htmlfromchars($_REQUEST["nev"]), lan('nev')) ?>
                <?php $Form_Class->hiddenbox("status", 1); ?>


                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                <script type="text/javascript"
                        src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
                </script>
                <p><input class="btn btn-success" type="submit" value="<?= lan('save') ?>"/></p>
            </fieldset>
        </form>
    <?php } ?>
</div>



















