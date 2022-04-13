<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Presensi Online SMK Negeri 6 Jember <span class="bullet"></span> Absen Pulang</h4>
                        </div>
                        <form id="formAbsen" action="<?= base_url('user/absen') ?>" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-sm-12 col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label">Nip</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nip" class="form-control" readonly value="<?= $absen['nip'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="jabatan" class="form-control" readonly value="<?= $absen['nama_sts'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama" class="form-control" readonly value="<?= $absen['nama'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tanggal" class="form-control" readonly value="<?= date('d-m-Y') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label">Jam</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="jam" class="form-control" readonly value="<?= date('H:i') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-12 col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="keteranganPulang" class="form-control keteranganPulang" readonly value="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label class="col-sm-3 col-form-label" for="ttd">Tanda Tangan</label>
                                            <div class="col-sm-8 text-right">
                                                <div id="signature-pad" class="mw-100 w-100">
                                                    <canvas id="signaturePad" class="w-auto signaturePad border rounded"></canvas>
                                                    <input id="output" name="ttd" type="hidden">
                                                    <small class="text-muted float-left emptyTtd">Menyatakan kejujuran dalam absensi online</small>
                                                    <small><a href="javascript:void(0);" class="text-right clear">clear</a></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>