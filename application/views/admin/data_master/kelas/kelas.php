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
                            <a href="<?= base_url('admin/data_master/kelas/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Kelas</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kelas</th>
                                            <th>Jurusan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kelas as $kls) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $kls['nama_kelas'] ?></td>
                                                <td><?= $kls['nama_jurusan'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin/data_master/kelas/edit/'.$kls['id_kelas']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                                    <a href="<?= base_url('admin/data_master/kelas/hapus/'.$kls['id_kelas']) ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-edit"></i> Hapus</a>
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