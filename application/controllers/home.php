<?php
/**
 *
 */
class Home extends CI_Controller
{

  public function index()
  {
    // code...
    $this->load->view('header');
    $this->load->view('index');
    $this->load->view('footer');
  }
}

?>
