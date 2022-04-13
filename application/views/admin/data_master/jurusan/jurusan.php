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
                            <a href="<?= base_url('admin/data_master/jurusan/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Jurusan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Jurusan</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jurusan as $jrsn) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $jrsn['nama_jurusan'] ?></td>
                                                <td><?= $jrsn['ket'] ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/data_master/jurusan/edit/' . $jrsn['id_jurusan']) ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                    <a class="btn btn-sm btn-danger hapus" href="<?= base_url('admin/data_master/jurusan/hapus/' . $jrsn['id_jurusan']) ?>"><i class="fa fa-trash"></i> Hapus</a>
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