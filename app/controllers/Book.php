<?php

class Book extends Controller
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
    $data['judul'] = 'Data Buku';
    $data['book'] = $this->model('bookModel')->getAllBook();

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('book/index', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah Buku';
    $data['book'] = $this->model('kategoriModel')->getAllKategori();

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('book/tambah', $data);
    $this->view('templates/footer');
  }

  public function simpanbuku()
  {
    if ($this->model('bookModel')->tambahBuku($_POST) > 0) {
      Flasher::setMessage('Berhasil', 'Ditambahkan', 'success');
      header('Location: ' . BASEURL . '/book');
      exit;
    } else {
      Flasher::setMessage('Gagal', 'Ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/book');
      exit;
    }
  }

  public function edit($id)
  {
    $data['judul'] = 'Edit Buku';
    $data['kategori'] = $this->model('kategoriModel')->getAllKategori();
    $data['book'] = $this->model('bookModel')->getBookById($id);

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('book/edit', $data);
    $this->view('templates/footer');
  }

  public function updateBuku()
  {
    if ($this->model('bookModel')->updateDataBuku($_POST) > 0) {
      Flasher::setMessage('Berhasil', 'Diupdate', 'success');
      header('Location: ' . BASEURL . '/book');
      exit;
    } else {
      Flasher::setMessage('Gagal', 'Diupdate', 'danger');
      header('Location: ' . BASEURL . '/book');
      exit;
    }
  }

  public function hapus($id)
  {
    if ($this->model('bookModel')->deleteBuku($id) > 0) {
      Flasher::setMessage('Berhasil', 'Dihapus', 'success');
      header('Location: ' . BASEURL . '/book');
      exit;
    } else {
      Flasher::setMessage('Gagal', 'Dihapus', 'danger');
      header('Location: ' . BASEURL . '/book');
      exit;
    }
  }

  public function cari()
  {
    $data['judul'] = 'Data Buku';
    $data['book'] = $this->model('bookModel')->cariBuku();
    $data['key'] = $_POST['key'];
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('book/index', $data);
    $this->view('templates/footer');
  }

  public function lihatLaporan()
  {
    $data['judul'] = 'Data Laporan Buku';
    $data['book'] = $this->model('bookModel')->getAllBook();

    $this->view('book/lihatLaporan', $data);
  }

  public function laporan()
  {
    $data['book'] = $this->model('bookModel')->getAllBook();

    $pdf = new FPDF('p', 'mm', 'A4');
    // membuat halaman Baru
    $pdf->AddPage();
    // Setting jenis font yang akan digunakan
    $pdf->SetFont('Arial', 'B', 14);
    // mencetak String
    $pdf->Cell(190, 7, 'LAPORAN BUKU', 0, 1, 'C');

    // Memberikan cell kebawah agar tidak terlalu rapat
    $pdf->Cell(10, 7, '', 0, 1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(85, 6, 'JUDUL', 1);
    $pdf->Cell(30, 6, 'PENERBIT', 1);
    $pdf->Cell(30, 6, 'PENGARANG', 1);
    $pdf->Cell(15, 6, 'TAHUN', 1);
    $pdf->Cell(25, 6, 'KATEGORI', 1);

    $pdf->Ln();

    $pdf->SetFont('Arial', 10);

    foreach ($data['book'] as $row) {
      $pdf->Cell(85, 6, $row['judul'], 1);
      $pdf->Cell(30, 6, $row['penerbit'], 1);
      $pdf->Cell(30, 6, $row['pengarang'], 1);
      $pdf->Cell(15, 6, $row['tahun'], 1);
      $pdf->Cell(25, 6, $row['nama_kategori'], 1);
      $pdf->Ln();
    }

    $pdf->Output('D', 'Laporan Buku.pdf', true);
  }
}
