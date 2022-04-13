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
                    <div class="card">
                        <div class="card-header">
                            <h4>Tanggal : <?= $tanggal ?></h4>
                            <div class="card-header-action">
                                <form action="<?= base_url('admin/absen/datang/guru') ?>" method="POST">
                                    <div class="form-group mb-0">
                                        <div class="btn-group">
                                            <div class="input-group">
                                                <input name="tanggal" class="form-control datepicker" type="text" value="<?= set_value('tanggal') ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
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
                                        foreach ($absen_guru as $absgr) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $absgr['jam'] ?></td>
                                                <td><?= $absgr['keterangan'] ?></td>
                                                <td><?= $absgr['nip'] ?></td>
                                                <td><?= $absgr['nama'] ?></td>
                                                <td><?= $absgr['nama_sts'] ?></td>
                                                <td>
                                                    <?php if ($absgr['status'] == "hadir") : ?>
                                                        <span class="badge badge-pill badge-success">Hadir</span>
                                                    <?php elseif ($absgr['status'] == "izin") : ?>
                                                        <span class="badge badge-pill badge-warning">Izin</span>
                                                    <?php elseif ($absgr['status'] == "sakit") : ?>
                                                        <span class="badge badge-pill badge-danger">Sakit</span>
                                                    <?php else : ?>
                                                        <span><?= $absgr['status'] ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($absgr['surat_izin'] != "") : ?>
                                                        <a href="<?= base_url('surat_guru/' . $absgr['surat_izin']) ?>" target="_blank">Lihat</a>
                                                    <?php else : ?>
                                                        Tidak ada
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('ttd_guru/' . $absgr['ttd']) ?>" alt="ttd" width="100px">
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