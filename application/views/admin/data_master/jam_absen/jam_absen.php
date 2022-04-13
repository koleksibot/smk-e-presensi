<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Jam Absen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Jam Absen</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/jam_absen/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Jam Absen</a>
                            <h4></h4>
                            <div class="card-header-action">
                                <?= form_open('admin/data_master/jam_absen') ?>
                                <div class="btn-group btn-group" role="group">
                                    <button class="btn <?= (set_value('role') == 'guru' || set_value('role') == '') ? 'btn-light' : 'btn-primary' ?>" type="submit" value="guru" name="role">Guru</button>
                                    <button class="btn  <?= (set_value('role') == 'siswa') ? 'btn-light' : 'btn-primary' ?>" type="submit" value="siswa" name="role">Siswa</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="3">Keterangan</th>
                                            <th class="text-center" colspan="3">Absen Datang</th>
                                            <th class="text-center" colspan="3">Absen Pulang</th>
                                            <th class="text-center" colspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <td>No</td>
                                            <td>Hari</td>
                                            <td>Untuk</td>
                                            <td>Mulai</td>
                                            <td>Berakhir</td>
                                            <td>Ditutup</td>
                                            <td>Mulai</td>
                                            <td>Berakhir</td>
                                            <td>Ditutup</td>
                                            <td class="text-center">Ubah</td>
                                            <td class="text-center">Hapus</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jam_absen as $jabs) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= custom_hari($jabs['hari']) ?></td>
                                                <td><?= $jabs['role'] ?></td>
                                                <td><?= $jabs['datang_mulai'] ?></td>
                                                <td><?= $jabs['datang_berakhir'] ?></td>
                                                <td><?= $jabs['datang_tutup'] ?></td>
                                                <td><?= $jabs['pulang_mulai'] ?></td>
                                                <td><?= $jabs['pulang_berakhir'] ?></td>
                                                <td><?= $jabs['pulang_tutup'] ?></td>
                                                <td class="text-center" width="10%">
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/data_master/jam_absen/edit/' . $jabs['id_jam_absen']) ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                </td>
                                                <td class="text-center" width="10%">
                                                    <a class="btn btn-sm btn-danger hapus" href="<?= base_url('admin/data_master/jam_absen/hapus/' . $jabs['id_jam_absen']) ?>"><i class="fa fa-trash"></i> Hapus</a>
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