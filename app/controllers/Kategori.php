<?php

class Kategori extends Controller
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
    $data['judul'] = 'Data Kategori';
    $data['kategori'] = $this->model('kategoriModel')->getAllKategori();

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kategori/index', $data);
    $this->view('templates/footer');
  }

  public function cari()
  {
    $data['judul'] = 'Data Kategori';
    $data['kategori'] = $this->model('kategoriModel')->cariKategori();
    $data['key'] = $_POST['key'];

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kategori/index', $data);
    $this->view('templates/footer');
  }

  public function edit($id)
  {
    $data['judul'] = 'Edit Kategori';
    $data['kategori'] = $this->model('kategoriModel')->getKategoriById($id);

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kategori/edit', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah Kategori';

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kategori/tambah', $data);
    $this->view('templates/footer');
  }

  public function simpanKategori()
  {
    if ($this->model('kategoriModel')->tambahKategori($_POST) > 0) {
      Flasher::setMessage('Berhasil', 'Ditambahkan', 'success');
      header('Location: ' . BASEURL . '/kategori');
      exit;
    } else {
      Flasher::setMessage('Gagal', 'Ditambahan', 'danger');
      header('Location: ' . BASEURL . '/kategori');
      exit;
    }
  }

  public function updateKategori()
  {
    if ($this->model('kategoriModel')->updateDataKategori($_POST) > 0) {
      Flasher::setMessage('Berhasil', 'Di update', 'success');
      header('Location: ' . BASEURL . '/kategori');
    } else {
      Flasher::setMessage('Gagal', 'Di Update', 'danger');
      header('Location: ' . BASEURL . '/kategori');
      exit;
    }
  }

  public function delete($id)
  {
    if ($this->model('kategoriModel')->deleteKategori($id) > 0) {
      Flasher::setMessage('Berhasil', 'Dihapus', 'success');
      header('Location: ' . BASEURL . '/kategori');
      exit;
    } else {
      Flasher::setMessage('Gagal', 'Dihapus', 'danger');
      header('Location: ' . BASEURL . '/kategori');
      exit;
    }
  }
}
