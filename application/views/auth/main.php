<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $judul ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/fontawesome/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/css/components.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/izitoast/css/iziToast.min.css">
</head>


<body>
    <div id="app">
        <div class="flashdata_gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
        <div class="flashdata_sukses" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
        <section class="section">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="login-brand">
                            <img src="<?= base_url('stisla/dist') ?>/assets/img/logosmk.png" alt="logo" width="200" class="mb-4">
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-4 col-sm-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h4>Login</h4>
                                        <?php
                                        if ($this->uri->segment(2) == 'admin') {
                                            echo "<div class='card-header-action'>Admin</div>";
                                        } else {
                                        ?>
                                            <div class="card-header-action">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('login/guru') ?>" class="btn btn-sm <?= ($this->uri->segment(2) == 'guru' || $this->uri->segment(2) == '') ? 'btn-light' : 'btn-primary' ?>">Guru</a>
                                                    <a href="<?= base_url('login/siswa') ?>" class="btn btn-sm <?= ($this->uri->segment(2) == 'siswa') ? 'btn-light' : 'btn-primary' ?>">Siswa</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view($konten) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8 col-sm-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h4>Pemberitahuan</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Pemberitahuan mengenai presensi <i>online</i>:</p>
                                        <ul>
                                            <li>Presensi <i>online</i> akan dimulai pukul 06:00.</li>
                                            <li>Absen diatas pukul 08:00 dinyatakan terlambat.</li>
                                            <li>Apabila izin harus menyertakan alasan yang jelas.</li>
                                            <li>Absen datang akan ditutup pukul 15:00 sore.</li>
                                            <li>Absen pulang akan dibuka jika sudah menyelesaikan absen datang.</li>
                                            <li>Absen pulang akan ditutup pukul 21:00 malam dan dinyatakan alpha jika tidak absen pulang.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; E - Presensi
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/jquery.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/popper.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/tooltip.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/moment.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/izitoast/js/iziToast.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('stisla/dist') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/js/custom.js"></script>
</body>

</html>