<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Absen</div>
                <div class="breadcrumb-item">Guru</div>
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
                            <form action="<?= base_url('admin/absen/guru') ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="text" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control datepicker" id="tanggal">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="">Semua</option>
                                                <?php foreach ($status as $sts) : ?>
                                                    <option value="<?= $sts['nama_sts'] ?>" <?= set_select('status', $sts['nama_sts']); ?>><?= $sts['nama_sts'] ?></option>
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
                                    <td><b>Status</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $status_; ?></b></td>
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
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Ket Absen</th>
                                        <th>Surat Izin</th>
                                        <th>Ttd</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($absen_guru as $absg) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $absg['jam'] ?></td>
                                                <td><?= $absg['keterangan'] ?></td>
                                                <td><?= $absg['nip'] ?></td>
                                                <td><?= $absg['nama'] ?></td>
                                                <td><?= $absg['nama_sts'] ?></td>
                                                <td>
                                                    <?php if ($absg['status'] == "hadir") : ?>
                                                        <span class="badge badge-pill badge-success">Hadir</span>
                                                    <?php elseif ($absg['status'] == "izin") : ?>
                                                        <span class="badge badge-pill badge-warning">Izin</span>
                                                    <?php elseif ($absg['status'] == "sakit") : ?>
                                                        <span class="badge badge-pill badge-danger">Sakit</span>
                                                    <?php else : ?>
                                                        <span><?= $absg['status'] ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($absg['surat_izin'] != "") : ?>
                                                        <a href="<?= base_url('surat_guru/' . $absg['surat_izin']) ?>" target="_blank">Lihat</a>
                                                    <?php else : ?>
                                                        Tidak ada
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('ttd_guru/' . $absg['ttd']) ?>" alt="ttd" width="100px">
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