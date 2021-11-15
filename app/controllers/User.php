<?php

class User extends Controller
{
  public function __construct()
  {
    if ($_SESSION['session_login'] != 'sudah Login') {
      Flasher::setMessage('Login', 'Tidak Ditemukan', 'danger');
      header('Location: ' . BASEURL . '/login');
      exit;
    }
  }
  public function index()
  {
    $data['judul'] = 'Data User';
    $data['user'] = $this->model('userModel')->getAllUser();

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('user/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah User';
    $data['user'] = $this->model('kategoriModel')->getAllKategori();

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('user/tambah', $data);
    $this->view('templates/footer');
  }

  public function edit($id)
  {
    $data['judul'] = 'Edit User';
    // $data['kategori'] = $this->model('kategoriModel')->getAllKategori();
    $data['user'] = $this->model('userModel')->getUserById($id);

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('user/edit', $data);
    $this->view('templates/footer');
  }

  public function simpanUser()
  {
    if ($_POST['password'] == $_POST['ulangi_password']) {
      $row = $this->model('userModel')->cekUsername();
      if ($row['useraname'] == $_POST['username']) {
        Flasher::setMessage('Gagal', 'Username yang anda masukan sudah pernah digunakan', 'danger');
        header('Location: ' . BASEURL . '/user/tambah');
        exit;
      } else {
        if ($this->model('userModel')->tambahUser($_POST) > 0) {
          Flasher::setMessage('Berhasil', 'Ditambahkan', 'success');
          header('Location: ' . BASEURL . '/user');
          exit;
        } else {
          Flasher::setMessage('Gagal', 'Ditambahkan', 'danger');
          header('Location: ' . BASEURL . '/user');
          exit;
        }
      }
    } else {
      Flasher::setMessage('Gagal', 'Password tidak sama', 'danger');
      header('Location: ' . BASEURL . '/user/tambah');
      exit;
    }
  }

  public function updateUser()
  {
    if (empty($_POST['password'])) {
      if ($this->model('userModel')->updateUserData($_POST) > 0) {
        Flasher::setMessage('Berhasil', 'Diupdate', 'success');
        header('Location: ' . BASEURL . '/user');
        exit;
      } else {
        Flasher::setMessage('Gagal', 'Diupdate', 'danger');
        header('Location: ' . BASEURL . '/user');
        exit;
      }
    } else {
      if ($_POST['password'] == $_POST['ulangi_password']) {
        if ($this->model('userModel')->updateUserData($_POST) > 0) {
          Flasher::setMessage('Berhasil', 'Diupdate', 'success');
          header('Location: ' . BASEURL . '/user');
          exit;
        } else {
          Flasher::setMessage('Gagal', 'Diupdate', 'danger');
          header('Location: ' . BASEURL . '/user');
          exit;
        }
      } else {
        Flasher::setMessage('Gagal', 'password tidak sama', 'danger');
        header('Location: ' . BASEURL . '/user');
        exit;
      }
    }
  }

  public function hapus($id)
  {
    if ($this->model('userModel')->deleteUser($id) > 0) {
      Flasher::setMessage('Berhasil', 'Dihapus', 'success');
      header('Location: ' . BASEURL . '/user');
      exit;
    } else {
      Flasher::setMessage('Gagal', 'Dihapus', 'danger');
      header('Location: ' . BASEURL . '/user');
      exit;
    }
  }

  public function cari()
  {
    $data['judul'] = 'Data User';
    $data['user'] = $this->model('userModel')->cariUser();
    $data['key'] = $_POST['key'];

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('user/index', $data);
    $this->view('templates/footer');
  }
}
