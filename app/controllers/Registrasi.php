<?php

class Registrasi extends Controller
{
  public function index()
  {
    $data['judul'] = 'Registrasi';
    $this->view('registrasi/registrasi', $data);
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah User';
    $data['user'] = $this->model('kategoriModel')->getAllKategori();

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('registrasi/registrasi', $data);
    $this->view('templates/footer');
  }

  public function simpanUser()
  {
    if ($_POST['password'] == $_POST['ulangi_password']) {
      $row = $this->model('userModel')->cekUsername();
      if ($row['useraname'] == $_POST['username']) {
        Flasher::setMessage('Gagal', 'Username yang anda masukan sudah pernah digunakan', 'danger');
        header('Location: ' . BASEURL . '/registrasi/registrasi');
        exit;
      } else {
        if ($this->model('userModel')->tambahUser($_POST) > 0) {
          Flasher::setMessage('Berhasil', 'Ditambahkan', 'success');
          header('Location: ' . BASEURL . '/login');
          exit;
        } else {
          Flasher::setMessage('Gagal', 'Ditambahkan', 'danger');
          header('Location: ' . BASEURL . '/login');
          exit;
        }
      }
    } else {
      Flasher::setMessage('Gagal', 'Password tidak sama', 'danger');
      header('Location: ' . BASEURL . '/registrasi/registrasi');
      exit;
    }
  }
}
