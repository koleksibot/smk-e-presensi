<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Status</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Status</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/status') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/data_master/status/edit/'. $status['id_sts']) ?>" method="POST" class="row justify-content-center">
                                <div class="col-lg-5 col-md-7 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Nama Status</label>
                                        <input class="form-control" type="text" name="namaStatus" value="<?= set_value('namaStatus', $status['nama_sts']) ?>" placeholder="Masukkan nama status" autocomplete="off">
                                        <?= form_error('namaStatus', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" name="keterangan" class="form-control" style="height: 100px;"><?= set_value('keterangan', $status['ket_sts']) ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning float-right">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>