<form method="post" action="<?= base_url('login/siswa') ?>">
    <div class="form-group">
        <label for="nisn">NISN</label>
        <input id="nisn" type="text" class="form-control" name="nisn" value="<?= set_value('nisn') ?>" tabindex="1" autocomplete="off" autofocus placeholder="1270018000">
        <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
    </div>

    <div class="form-group">
        <label for="pw" class="control-label">Password</label>
        <div class="input-group mb-2">
            <input id="pw" type="password" class="form-control" name="password" tabindex="2" autocomplete="off" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text"><i class="fa fa-eye-slash showhide"></i></div>
            </div>
        </div>
        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
        </button>
    </div>
</form>