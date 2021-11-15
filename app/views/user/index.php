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
    <div class="row">
      <div class="col-sm-12">
        <?= Flasher::Message(); ?>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?= $data['judul']; ?></h3>
        <div class="btn-group float-right">
          <a href="<?= BASEURL; ?>/user/tambah" class="btn float-right btn-xs btn btn-primary">Tambah User</a>
        </div>
      </div>

      <div class="card-body">
        <form action="<?= BASEURL; ?>/user/cari" method="post">
          <div class="row mb-3">
            <div class="col-lg-6">
              <div class="input-group">
                <input type="text" class="form-control" name="key" id="">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                  <a class="btn btn-outline-danger" href="<?= BASEURL; ?>/user">Reset</a>
                </div>
              </div>
            </div>
          </div>
        </form>

        <table class="table table-bordered">
          <thead>
            <th style="width: 10px">No</th>
            <th>Nama</th>
            <th>username</th>
            <th style="width: 150px">Action</th>
          </thead>

          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($data['user'] as $user) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $user['nama']; ?></td>
                <td><?= $user['username']; ?></td>
                <td>
                  <a href="<?= BASEURL; ?>/user/edit/<?= $user['id']; ?>" class="badge badge-info">Edit</a>
                  <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                </td>
              </tr>
            <?php $i++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        Copyright-2021 <a href="">@RifkiFiransah</a>
      </div>
    </div>
  </section>
</div>