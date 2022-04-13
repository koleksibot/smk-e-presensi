<form action="<?= base_url('login/admin') ?>" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username') ?>" tabindex="1" autocomplete="off" autofocus placeholder="Username">
        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
    </div>

    <div class="form-group">
        <label for="pw" class="control-label">Password</label>
        <div class="input-group">
            <input id="pw" type="password" class="form-control" name="password" tabindex="2" autocomplete="off" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text"><i class="fa fa-eye-slash showhide"></i></div>
            </div>
        </div>
        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
            Login
        </button>
    </div>
</form>