<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Guru</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/guru') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body mb-2">
                            <form action="<?= base_url('admin/data_master/guru/tambah') ?>" method="POST" class="row justify-content-center">
                                <div class="col-lg-5 col-md-7 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label for="">Nip <span class="text-danger">&#42;</span></label>
                                        <input class="form-control" type="text" name="nip" value="<?= set_value('nip') ?>" placeholder="Masukkan nip" autocomplete="off">
                                        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nama Lengkap Guru <span class="text-danger">&#42;</span></label>
                                        <input class="form-control" type="text" name="namaGuru" value="<?= set_value('namaGuru') ?>" placeholder="Masukkan nama lengkap" autocomplete="off">
                                        <?= form_error('namaGuru', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="">Status <span class="text-danger">&#42;</span></label>
                                            <select name="status" class="form-control">
                                                <option value="" <?= set_select('status', '') ?>>Pilih status</option>
                                                <?php foreach ($status as $sts) : ?>
                                                    <option value="<?= $sts['id_sts'] ?>" <?= set_select('status', $sts['id_sts']) ?>><?= $sts['nama_sts'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col form-group mb-2">
                                            <label for="">Password Default</label>
                                            <input class="form-control" type="text" name="password" value="user" readonly autocomplete="off">
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