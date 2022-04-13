<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Ubah Password</h4>
                        </div>
                        <form id="formUbahPassword" action="<?= base_url('user/ubah_password') ?>" method="POST">
                            <div class="card-body mb-1">
                                <div class="form-group row justify-content-center mb-2">
                                    <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password_lama" class="form-control showHideUbhPw" id="password_lama" value="<?= set_value('password_lama') ?>" placeholder="Password lama">
                                        <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                                        <small class="text-danger"><?= ($this->session->flashdata('passwordSalah') ? 'Password Lama Salah!' : '') ?></small>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center mb-2">
                                    <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password_baru" class="form-control showHideUbhPw" id="password_baru" value="<?= set_value('password_baru') ?>" placeholder="Password baru">
                                        <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center mb-2">
                                    <label for="konfirmasi_pasoword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" name="konfirmasi_password" class="form-control showHideUbhPw" id="konfirmasi_pasoword" value="<?= set_value('konfirmasi_password') ?>" placeholder="Konfirmasi password">
                                        <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center mb-2">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="showHidePassword">
                                            <label class="custom-control-label" for="showHidePassword">Lihat Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-5 text-right">
                                        <button type="submit" class="btn btn-primary ubah-password">Ubah Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>