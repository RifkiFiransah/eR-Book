<?php

class About extends Controller
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
    $data['judul'] = 'About Me';
    $data['nama'] = 'Muhammad Rifki Firansah';
    $data['alamat'] = 'Kuningan Jawa Barat Indonesia';
    $data['no_hp'] = '0859110109108';
    $data['instagram'] = '@rifkifiransah';

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }
}
