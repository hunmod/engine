<?= lan('hirlevelfelirtakozas')?>
<form method="post">
    <input name="captcha" type="text" class="form-inline captcha">
    <div class="col-sm-6">
        <input name="email" type="text" class="form-inline" placeholder="<?= lan('email') ?>" required>
    </div>
    <button class="btn btn-creme-inv pull-right "><?= lan('feliratkozom') ?></button>
</form>