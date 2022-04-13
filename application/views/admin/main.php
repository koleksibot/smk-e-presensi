<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $judul ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/modules/izitoast/css/iziToast.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('stisla/dist') ?>/assets/css/components.css">
    <script>
        let base_url = '<?= base_url() ?>';
    </script>
</head>

<body>
    <div id="app">
        <div class="flashdata_gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
        <div class="flashdata_sukses" data-flashdata="<?= $this->session->flashdata('sukses') ?>"></div>
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('stisla/dist') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= ucwords($this->session->userdata('nama')) ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Menu</div>
                            <a href="<?= base_url('admin/ubah_password') ?>" class="dropdown-item has-icon">
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
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"><img src="<?= base_url('stisla/dist') ?>/assets/img/logosmk.png" alt="logo" width="40" class="mr-2"> E - Presensi</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html"><img src="<?= base_url('stisla/dist') ?>/assets/img/logosmk.png" alt="logo" width="40"></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu</li>
                        <li class="<?= ($this->uri->segment(2) == 'beranda') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/beranda') ?>"><i class="fas fa-home  "></i> <span>Beranda</span></a></li>
                        <?php if ($this->session->userdata('role_admin') === 'super') : ?>

                            <li class="<?= ($this->uri->segment(2) == 'admin') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/admin') ?>"><i class="fas fa-user-secret"></i> <span>Admin</span></a></li>
                        <?php endif; ?>

                        <li class="dropdown <?= ($this->uri->segment(2) == 'data_master') ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= ($this->uri->segment(2) == 'data_master') &&  ($this->uri->segment(3) == 'guru') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/data_master/guru') ?>">Guru</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'data_master') &&  ($this->uri->segment(3) == 'siswa') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/data_master/siswa') ?>">Siswa</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'data_master') &&  ($this->uri->segment(3) == 'kelas') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/data_master/kelas') ?>">Kelas</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'data_master') &&  ($this->uri->segment(3) == 'jurusan') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/data_master/jurusan') ?>">Jurusan</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'data_master') &&  ($this->uri->segment(3) == 'status') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/data_master/status') ?>">Status</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'data_master') &&  ($this->uri->segment(3) == 'jam_absen') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/data_master/jam_absen') ?>">Jam Absen</a></li>
                            </ul>
                        </li>

                        <li class="dropdown <?= ($this->uri->segment(2) == 'absen') ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Absen</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= ($this->uri->segment(2) == 'absen' && $this->uri->segment(3) == 'guru') ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url('admin/absen/guru') ?>">Guru</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'absen' && $this->uri->segment(3) == 'siswa') ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url('admin/absen/siswa') ?>">Siswa</a></li>
                            </ul>
                        </li>

                        <li class="dropdown <?= ($this->uri->segment(2) == 'laporan') ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Laporan</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= ($this->uri->segment(2) == 'laporan' && $this->uri->segment(3) == 'guru') ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url('admin/laporan/guru') ?>">Guru</a></li>
                                <li class="<?= ($this->uri->segment(2) == 'laporan' && $this->uri->segment(3) == 'siswa') ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url('admin/laporan/siswa') ?>">Siswa</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="<?= base_url('logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <!-- content -->
            <?php $this->load->view($konten) ?>
            <!-- end content -->
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
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/sweetalert/sweetalert.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('stisla/dist') ?>/assets/js/page/modules-datatables.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('stisla/dist') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('stisla/dist') ?>/assets/js/custom.js"></script>
</body>

</html>