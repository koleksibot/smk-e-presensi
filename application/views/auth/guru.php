<form action="<?= base_url('login/guru') ?>" method="POST">
    <div class="form-group">
        <label for="nip">NIP</label>
        <input id="nip" type="text" class="form-control" name="nip" value="<?= set_value('nip') ?>" tabindex="1" autocomplete="off" autofocus placeholder="127001800012700180">
        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
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