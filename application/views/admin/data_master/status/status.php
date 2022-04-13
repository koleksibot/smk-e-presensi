<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Status</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Status</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/status/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Status</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($status as $sts) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $sts['nama_sts'] ?></td>
                                                <td><?= $sts['ket_sts'] ?></td>
                                                <td class="text-center" width="20%">
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/data_master/status/edit/' . $sts['id_sts']) ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                    <a class="btn btn-sm btn-danger hapus" href="<?= base_url('admin/data_master/status/hapus/' . $sts['id_sts']) ?>"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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