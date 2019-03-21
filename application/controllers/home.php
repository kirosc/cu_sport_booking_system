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

    $data['db'] = $this->test();

    $this->load->view('header', $data);
    $this->load->view('index', $data);
    $this->load->view('footer');
  }
}

?>
