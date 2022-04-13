<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Absen</div>
                <div class="breadcrumb-item">Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>Filter</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="collapse" id="mycard-collapse">
                            <form action="<?= base_url('admin/absen/siswa') ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="text" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control datepicker" id="tanggal">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="kelas">Kelas</label>
                                            <select id="kelas" name="kelas" class="form-control">
                                                <option value="">Semua</option>
                                                <?php foreach ($kelas as $kls) : ?>
                                                    <option value="<?= $kls['nama_kelas'] ?>" <?= set_select('kelas', $kls['nama_kelas']); ?>><?= $kls['nama_kelas'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="jenis_absen">Jenis Absen</label>
                                            <select id="jenis_absen" name="jenis_absen" class="form-control">
                                                <option value="datang">Absen Datang</option>
                                                <option value="pulang">Absen Pulang</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary">Terapkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table cellpadding="3">
                                <tr>
                                    <td><b>Kelas</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $kelas_; ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= custom_tanggal($tanggal); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Absen</b></td>
                                    <td><b>:</b></td>
                                    <td><b>Absen <?= $jenis_absen; ?></b></td>
                                </tr>
                            </table>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <th>#</th>
                                        <th>Jam</th>
                                        <th>Keterangan</th>
                                        <th>Nisn</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Ket Absen</th>
                                        <th>Surat Izin</th>
                                        <th>Ttd</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($absen_siswa as $abss) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $abss['jam'] ?></td>
                                                <td><?= $abss['keterangan'] ?></td>
                                                <td><?= $abss['nisn'] ?></td>
                                                <td><?= $abss['nama'] ?></td>
                                                <td><?= $abss['nama_kelas'] ?></td>
                                                <td><?= $abss['nama_jurusan'] ?></td>
                                                <td>
                                                    <?php if ($abss['status'] == "hadir") : ?>
                                                        <span class="badge badge-pill badge-success">Hadir</span>
                                                    <?php elseif ($abss['status'] == "izin") : ?>
                                                        <span class="badge badge-pill badge-warning">Izin</span>
                                                    <?php elseif ($abss['status'] == "sakit") : ?>
                                                        <span class="badge badge-pill badge-danger">Sakit</span>
                                                    <?php else : ?>
                                                        <span><?= $abss['status'] ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($abss['surat_izin'] != "") : ?>
                                                        <a href="<?= base_url('surat_siswa/' . $abss['surat_izin']) ?>" target="_blank">Lihat</a>
                                                    <?php else : ?>
                                                        Tidak ada
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('ttd_siswa/' . $abss['ttd']) ?>" alt="ttd" width="100px">
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>