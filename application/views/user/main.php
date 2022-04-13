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
    <script type="text/javascript">
        let base_url = '<?= base_url() ?>';
    </script>
</head>

<body class="layout-3">
    <div id="app">
        <div class="flashdata_gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
        <div class="flashdata_sukses" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
        <div class="main-wrapper container">
            <div class="userdata_sebagai" data-sebagai="<?= $this->session->userdata('sebagai') ?>"></div>
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= base_url('user/beranda') ?>" class="navbar-brand sidebar-gone-hide"><img src="<?= base_url('stisla/dist') ?>/assets/img/logosmk.png" alt="logo" width="45" class="mr-2">E - Presensi</a>
                <div class="nav-collapse">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                </div>
                <form class="form-inline ml-auto">
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('stisla/dist') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= ucwords(strtolower($this->session->userdata('nama'))) ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Menu</div>
                            <a href="<?= base_url('user/ubah_password') ?>" class="dropdown-item has-icon">
                                <i class="fas fa-lock"></i> Ubah Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item <?= ($this->uri->segment(2) == "beranda") ? 'active' : '' ?>">
                            <a href="<?= base_url('user/beranda') ?>" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
                        </li>
                        <li class="nav-item <?= ($this->uri->segment(2) == "absen") ? 'active' : '' ?>">
                            <a href="<?= base_url('user/absen') ?>" class="nav-link"><i class="fa fa-book"></i><span>Absen</span></a>
                        </li>
                        <li class="nav-item <?= ($this->uri->segment(2) == "ubah_password") ? 'active' : '' ?>">
                            <a href="<?= base_url('user/ubah_password') ?>" class="nav-link"><i class="fa fa-lock"></i><span>Ubah Password</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <!-- konten -->
            <?php $this->load->view($konten) ?>
            <!-- end konten -->
            <footer class="main-footer">
                <div class="text-center">
                    Copyright &copy; E - Presensi
                </div>
            </footer>
        </div>
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
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/ttd/signature_pad.umd.js"></script>
    <!-- JS Libraies -->
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/sweetalert/sweetalert.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('stisla/dist') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/js/custom.js"></script>

    <?php isset($js) ? $this->load->view($js) : '' ?>
</body>

</html>