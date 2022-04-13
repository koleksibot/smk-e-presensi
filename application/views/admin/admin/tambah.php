<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Admin</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/admin') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body  mb-2">
                            <form action="<?= base_url('admin/admin/tambah') ?>" method="POST" class="d-flex justify-content-center">
                                <div class="col-5">
                                    <div class="form-group mb-2">
                                        <label for="">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukkan nama lengkap" autocomplete="off">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Username</label>
                                        <input class="form-control" type="text" name="username" value="<?= set_value('username') ?>" placeholder="Masukkan username" autocomplete="off">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <input class="form-control" type="text" name="role" value="Admin" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Password Default</label>
                                                <input class="form-control" type="text" name="password" value="admin" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>