<?php
/**
 *test
 */
class Home extends SBooking_Controller
{

  public function index()
  {
    // code...
    $this->setTitle('Home');
    $this->setNav('home');

    $this->loadCSS('../vendor/slick/slick.css');
    $this->loadCSS('../vendor/slick/slick-theme.css');
    $this->loadCSS('index.css');
    $this->loadJS('../vendor/slick/slick.min.js');
    $this->loadJS('index.js');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('index');
    $this->load->view('footer');
  }
}

?>
