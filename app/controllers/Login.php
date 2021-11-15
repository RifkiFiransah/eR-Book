<?php

class Login extends Controller
{

  public function index()
  {
    $data['judul'] = 'Login';
    $this->view('login/login', $data);
  }

  public function prosesLogin()
  {
    if ($row = $this->model('loginModel')->checkLogin($_POST) > 0) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['session_login'] = 'sudah Login';

      header('Location: ' . BASEURL . '/home');
    } else {
      Flasher::setMessage('Username / Password', 'salah', 'danger');
      header('Location: ' . BASEURL . '/login');
      exit;
    }
  }
}
