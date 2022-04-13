<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Beranda</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Beranda</div>
      </div>
    </div>
    <div class="section-body">

      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Guru</h4>
              </div>
              <div class="card-body">
                <?= $guru; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Siswa</h4>
              </div>
              <div class="card-body">
                <?= $siswa; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-home"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Kelas</h4>
              </div>
              <div class="card-body">
                <?= $kelas; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-landmark"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Jurusan</h4>
              </div>
              <div class="card-body">
                <?= $jurusan; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <h2>Selamat Datang, <?= $this->session->userdata('nama') ?>!</h2>
              <p class="lead">Halo <?= $this->session->userdata('nama') ?>, Anda bisa mengelola web E-Presensi disini.</p>
              <div class="mt-4">
                <a href="<?= base_url('logout  ') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>