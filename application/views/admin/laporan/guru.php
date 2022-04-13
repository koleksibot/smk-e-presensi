<div class="main-content" style="min-height: 598px;">
    <section class="section">
        <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Laporan</div>
                <div class="breadcrumb-item">Guru</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/laporan/guru') ?>" method="POST" target="_blank">
                                <h5 class="text-center">Filter</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control datepicker" id="tanggal">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jabatan">Status</label>
                                        <select id="jabatan" name="jabatan" class="form-control">
                                            <option value="" <?= set_select('jabatan', ''); ?>>Semua</option>
                                            <?php foreach ($status as $sts) : ?>
                                                <option value="<?= $sts['nama_sts'] ?>" <?= set_select('jabatan', ''); ?>><?= $sts['nama_sts'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="cetak" class="btn btn-primary rounded btn-sm float-right"><i class="fa fa-file"></i> Cetak</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>