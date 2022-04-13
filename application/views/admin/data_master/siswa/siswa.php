<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Siswa</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/data_master/siswa/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Siswa</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <th>#</th>
                                        <th>Nisn</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $sw) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $sw['nisn'] ?></td>
                                                <td><?= ucwords(strtolower($sw['nama'])) ?></td>
                                                <td><?= $sw['nama_kelas'] ?></td>
                                                <td><?= $sw['nama_jurusan'] ?></td>
                                                <td><?= $sw['status'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin/data_master/siswa/edit/' . $sw['nisn']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/data_master/siswa/hapus/' . $sw['nisn']) ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
                                                    <a href="<?= base_url('admin/data_master/siswa/reset/' . $sw['nisn']) ?>" class="btn btn-sm btn-success reset"><i class="fas fa-user-cog"></i> Reset</a>
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