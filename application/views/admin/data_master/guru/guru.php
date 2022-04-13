<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Guru</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary btn-sm" href="<?= base_url('admin/data_master/guru/tambah') ?>"><i class="fa fa-plus-circle"></i> Tambah Guru</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <th>#</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($guru as $gr) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $gr['nip'] ?></td>
                                                <td><?= $gr['nama'] ?></td>
                                                <td><?= $gr['nama_sts'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin/data_master/guru/edit/' . $gr['nip']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/data_master/guru/hapus/' . $gr['nip']) ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                    <a href="<?= base_url('admin/data_master/guru/reset/' . $gr['nip']) ?>" class="btn btn-sm btn-success reset"><i class="fas fa-user-cog"></i> Reset</a>
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