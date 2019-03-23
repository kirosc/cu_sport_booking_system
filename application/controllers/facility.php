<?php
/**
 *
 */
class Facility extends SBooking_Controller
{

  public function facility_main()
  {
    // code...
    $this->load->model('Facility_model');
    $this->setTitle('Facility');

    $this->loadCSS('facility_listing.css');

    $data = $this->getHeaderData();

    $data['facilities'] = $this->Facility_model->facilitySearch();

    $this->load->view('header', $data);
    $this->load->view('facility', $data);
    $this->load->view('footer');
  }
}

?>
