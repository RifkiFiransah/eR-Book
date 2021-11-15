<?php

class Home extends Controller
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
    $data['judul'] = 'Home';

    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}
