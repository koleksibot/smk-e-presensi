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
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <h2>Selamat Datang, <?= ucwords(strtolower($this->session->userdata('nama'))) ?>!</h2>
              <p class="lead">Halo <?= ucwords(strtolower($this->session->userdata('nama'))) ?>, Selamat datang di web e-presensi online, Anda bisa absen secara online di web ini.</p>
              <div class="mt-4">
                <a href="<?= base_url('user/absen') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Absen Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>