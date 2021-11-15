<?php

class Logout
{
  public function Logout()
  {
    session_start();
    session_destroy();
    header('Location: ' . BASEURL . '/login');
  }
}
