<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/siswa') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body mb-2">
                            <form action="<?= base_url('admin/data_master/siswa/edit/' . $siswa['nisn']) ?>" method="POST" class="row justify-content-center">
                                <div class="col-lg-5 col-md-7 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label for="">Nisn</label>
                                        <input class="form-control" type="text" name="nisn" value="<?= set_value('nisn', $siswa['nisn']) ?>" placeholder="Masukkan nisn" autocomplete="off">
                                        <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nama Lengkap Siswa</label>
                                        <input class="form-control" type="text" name="namaSiswa" value="<?= set_value('namaSiswa', $siswa['nama']) ?>" placeholder="Masukkan nama lengkap" autocomplete="off">
                                        <?= form_error('namaSiswa', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Kelas</label>
                                        <select name="kelas" class="form-control">
                                            <option value="" <?= set_select('kelas', '') ?>>Pilih kelas</option>
                                            <?php
                                            foreach ($kelas as $kls) :
                                            ?>
                                                <option value="<?= $kls['id_kelas'] ?>" <?= set_select('kelas', $kls['id_kelas']) ?> <?= ($siswa['kelas_id'] == $kls['id_kelas'] ? 'selected' : '') ?>><?= $kls['nama_kelas'] . ' - ' . $kls['nama_jurusan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-muted d-block">Jurusan sudah ditentukan pada setiap kelas</small>
                                        <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
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