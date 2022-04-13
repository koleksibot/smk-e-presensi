<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Laporan</div>
                <div class="breadcrumb-item">Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/laporan/siswa') ?>" method="POST" target="_blank">
                                <h5 class="text-center">Filter</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control datepicker" id="tanggal">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jurusan_select">Jurusan</label>
                                        <select id="jurusan_select" name="jurusan" class="form-control" required>
                                            <option value="" <?= set_select('jurusan', ''); ?>>Pilih jurusan</option>
                                            <?php foreach ($jurusan as $jrs) : ?>
                                                <option value="<?= $jrs['id_jurusan'] ?>" <?= set_select('jurusan', ''); ?>><?= $jrs['nama_jurusan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="kelas">Kelas</label>
                                        <select id="kelas" name="kelas" class="form-control" required>
                                            <option value="" <?= set_select('kelas', ''); ?>>Pilih kelas</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="cetak" class="btn btn-primary rounded btn-sm float-right"><i class="fa fa-file"></i> Cetak</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>