<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Halaman <?= $data['judul']; ?></h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?= $data['judul']; ?></h3>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-2 text-right">
            Nama :
          </div>
          <div class="col-md-10 text-left">
            <?= $data['nama']; ?>
          </div>
          <div class="col-md-2 text-right">
            No Hp :
          </div>
          <div class="col-md-10 text-left">
            <?= $data['no_hp']; ?>
          </div>
          <div class="col-md-2 text-right">
            Alamat :
          </div>
          <div class="col-md-10 text-left">
            <?= $data['alamat']; ?>
          </div>
          <div class="col-md-2 text-right">
            instagram :
          </div>
          <div class="col-md-10 text-left">
            <?= $data['instagram']; ?>
          </div>
        </div>
      </div>

      <div class="card-footer">
        Copyright-2021 <a href="">@RifkiFiransah</a>
      </div>
    </div>
  </section>
</div>