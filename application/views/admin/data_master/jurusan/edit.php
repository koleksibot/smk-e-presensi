<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Jurusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Jurusan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/jurusan') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body mb-2">
                            <form action="<?= base_url('admin/data_master/jurusan/edit/' . $jurusan['id_jurusan']) ?>" method="POST" class="row justify-content-center">
                                <div class="col-lg-5 col-md-7 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label for="">Nama Jurusan</label>
                                        <input class="form-control" type="text" name="namaJurusan" value="<?= set_value('namaJurusan', $jurusan['nama_jurusan']) ?>" placeholder="Masukkan nama jurusan" autocomplete="off">
                                        <?= form_error('namaJurusan', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="" style="height: 100px;"><?= set_value('keterangan', $jurusan['ket']) ?></textarea>
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