<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>eR-Book Login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck Bootstrap -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- theme style -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>eR</b>-Book
    </div>

    <!-- Login logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login Terebih Dahulu</p>

        <form action="<?= BASEURL; ?>/login/prosesLogin" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Pasword...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Login card body -->
    <div class="row">
      <div class="col-sm-12">
        <?php Flasher::Message(); ?>
      </div>
    </div>
  </div>

  <!-- JQuery -->
  <script src="<?= BASEURL; ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= BASEURL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= BASEURL; ?>/dist/js/adminlte.min.js"></script>
</body>

</html>