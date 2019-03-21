<?php
/**
 *
 */
class Facility extends SBooking_Controller
{

  public function facility_main()
  {
    // code...
    $this->setTitle('Facility');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('facility');
    $this->load->view('footer');
  }
}

?>
