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
                            <a href="<?= base_url('admin/data_master/jam_absen') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body mb-2">
                            <form action="<?= base_url('admin/data_master/jam_absen/edit/' . $jam_absen['id_jam_absen']) ?>" method="POST" class="row justify-content-center">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label for="">Hari Absen <span class="text-danger">&#42;</span></label>
                                        <select name="hari" class="form-control">
                                            <option value="" <?= set_select('hari', '')?>>-- Pilih Hari --</option>
                                            <?php foreach ($hari as $hr) : ?>
                                                <option value="<?= $hr ?>" <?= set_select('hari', $hr); ?> <?= ($jam_absen['hari'] == $hr) ? 'selected' : ' ' ?>><?= custom_hari($hr); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('hari', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group  mb-2">
                                        <label for="">Untuk <span class="text-danger">&#42;</span></label>
                                        <select name="untuk" class="form-control" id="">
                                            <option value="">-- Pilih Status --</option>
                                            <?php foreach ($untuk as $utk) : ?>
                                                <option value="<?= $utk[0] ?>" <?= set_select('untuk', '')?> <?= ($jam_absen['role'] == $utk[0]) ?  "selected" : "" ?> ><?= $utk[1] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('untuk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-1 mt-4">
                                        <label for="">Absen Datang</label>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Jam Mulai <span class="text-danger">&#42;</span></label>
                                        <input type="time" name="datang_mulai" value="<?= set_value('datang_mulai', $jam_absen['datang_mulai']) ?>" class="form-control">
                                        <?= form_error('datang_mulai', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Jam Berakhir <span class="text-danger">&#42;</span></label>
                                        <input type="time" name="datang_berakhir" value="<?= set_value('datang_berakhir', $jam_absen['datang_berakhir']) ?>" class="form-control">
                                        <?= form_error('datang_berakhir', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Ditutup <span class="text-danger">&#42;</span></label>
                                        <input type="time" name="datang_tutup" value="<?= set_value('datang_tutup', $jam_absen['datang_tutup']) ?>" class="form-control">
                                        <?= form_error('datang_tutup', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-1 mt-4">
                                        <label for="">Absen Pulang</label>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Jam Mulai <span class="text-danger">&#42;</span></label>
                                        <input type="time" name="pulang_mulai" value="<?= set_value('pulang_mulai', $jam_absen['pulang_mulai']) ?>" class="form-control">
                                        <?= form_error('pulang_mulai', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Jam Berakhir <span class="text-danger">&#42;</span></label>
                                        <input type="time" name="pulang_berakhir" value="<?= set_value('pulang_berakhir', $jam_absen['pulang_berakhir']) ?>" class="form-control">
                                        <?= form_error('pulang_berakhir', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Ditutup <span class="text-danger">&#42;</span></label>
                                        <input type="time" name="pulang_tutup" value="<?= set_value('pulang_tutup', $jam_absen['pulang_tutup']) ?>" class="form-control">
                                        <?= form_error('pulang_tutup', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning float-right">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>