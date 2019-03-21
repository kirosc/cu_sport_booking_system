<?php
/**
 *
 */
class Home extends SBooking_Controller
{

  public function index()
  {
    // code...
    $this->setTitle('Home');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('index');
    $this->load->view('footer');
  }
}

?>
