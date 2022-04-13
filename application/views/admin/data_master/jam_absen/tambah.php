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
              <form action="<?= base_url('admin/data_master/jam_absen/tambah') ?>" method="POST" class="row justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="form-group mb-2">
                    <label for="">Hari Absen <span class="text-danger">&#42;</span></label>
                    <select name="hari" class="form-control" id="">
                      <option value="">-- Pilih hari --</option>
                      <option <?= set_select('hari', '1'); ?> value="1">Senin</option>
                      <option <?= set_select('hari', '2'); ?> value="2">Selasa</option>
                      <option <?= set_select('hari', '3'); ?> value="3">Rabu</option>
                      <option <?= set_select('hari', '4'); ?> value="4">Kamis</option>
                      <option <?= set_select('hari', '5'); ?> value="5">Jum'at</option>
                      <option <?= set_select('hari', '6'); ?> value="6">Sabtu</option>
                      <option <?= set_select('hari', '0'); ?> value="0">Ahad</option>
                    </select>
                    <?= form_error('hari', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group  mb-2">
                    <label for="">Untuk <span class="text-danger">&#42;</span></label>
                    <select name="untuk" id="" class="form-control">
                      <option value="">-- Pilih Status --</option>
                      <option <?= set_select('untuk', 'guru'); ?> value="guru">Guru</option>
                      <option <?= set_select('untuk', 'siswa'); ?> value="siswa">Siswa</option>
                    </select>
                    <?= form_error('untuk', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group mb-1 mt-4">
                    <label for="">Absen Datang</label>
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Jam Mulai <span class="text-danger">&#42;</span></label>
                    <input type="time" name="datang_mulai" value="<?= set_value('datang_mulai') ?>" class="form-control">
                    <?= form_error('datang_mulai', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Jam Berakhir <span class="text-danger">&#42;</span></label>
                    <input type="time" name="datang_berakhir" value="<?= set_value('datang_berakhir') ?>" class="form-control">
                    <?= form_error('datang_berakhir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="">Jam Ditutup <span class="text-danger">&#42;</span></label>
                    <input type="time" name="datang_tutup" value="<?= set_value('datang_tutup') ?>" class="form-control">
                    <?= form_error('datang_tutup', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group mb-1 mt-4">
                    <label for="">Absen Pulang</label>
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Jam Mulai <span class="text-danger">&#42;</span></label>
                    <input type="time" name="pulang_mulai" value="<?= set_value('pulang_mulai') ?>" class="form-control">
                    <?= form_error('pulang_mulai', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Jam Berakhir <span class="text-danger">&#42;</span></label>
                    <input type="time" name="pulang_berakhir" value="<?= set_value('pulang_berakhir') ?>" class="form-control">
                    <?= form_error('pulang_berakhir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="">Jam Ditutup <span class="text-danger">&#42;</span></label>
                    <input type="time" name="pulang_tutup" value="<?= set_value('pulang_tutup') ?>" class="form-control">
                    <?= form_error('pulang_tutup', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>