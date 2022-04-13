<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Kelas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/kelas') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/data_master/kelas/edit/' . $kelas['id_kelas']) ?>" method="POST" class="row justify-content-center">
                                <div class="col-lg-5 col-md-7 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Nama Kelas</label>
                                        <input class="form-control" type="text" name="namaKelas" value="<?= set_value('namaKelas', $kelas['nama_kelas']) ?>" placeholder="Masukkan nama kelas" autocomplete="off">
                                        <?= form_error('namaKelas', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jurusan</label>
                                        <select name="jurusan" class="form-control">
                                            <option value="" <?= set_select('jurusan', '') ?>>Pilih Jurusan</option>
                                            <?php foreach ($jurusan as $jrsn) : ?>
                                                <option value="<?= $jrsn['id_jurusan'] ?>" <?= set_select('jurusan', $jrsn['id_jurusan']); ?> <?= ($jrsn['id_jurusan'] == $kelas['jurusan_id'] ? 'selected' : '')?>><?= $jrsn['nama_jurusan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
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