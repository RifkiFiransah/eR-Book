<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page Header) -->
  <section class="content-header">
    <div class="content-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Halaman Kategori</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><?= $data['judul']; ?></h3>
      </div>

      <!-- Bagian Form -->
      <form role="form" action="<?= BASEURL; ?>/kategori/updateKategori" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['kategori']['id']; ?>">
        <div class="card-body">
          <div class="form-group">
            <label>
              Nama Kategori
            </label>
            <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan Kategori..." value="<?= $data['kategori']['nama_kategori']; ?>">
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
      <!-- AKhir Bagian Form -->
    </div>
  </section>
</div>