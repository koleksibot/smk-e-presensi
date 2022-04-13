<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Admin</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/admin/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Admin</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($admin as $ad) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $ad['nama'] ?></td>
                                                <td><?= $ad['username'] ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/admin/edit/' . $ad['id_admin']) ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                    <?php if ($this->session->userdata('id_admin') != $ad['id_admin']) : ?>
                                                        <a class="btn btn-sm btn-danger hapus" href="<?= base_url('admin/admin/hapus/' . $ad['id_admin']) ?>"><i class="fa fa-trash"></i> Hapus</a>
                                                    <?php endif; ?>
                                                    <?php if ($ad['role'] == 'admin') : ?>
                                                        <a href="<?= base_url('admin/admin/reset/' . $ad['id_admin']) ?>" class="btn btn-sm btn-success reset"><i class="fas fa-user-cog"></i> Reset</a>
                                                    <?php endif; ?>
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