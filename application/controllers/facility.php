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
    $this->setNav('facility');

    $this->loadCSS('facility_listing.css');

    $data = $this->getHeaderData();

    $data['facilities'] = $this->Facility_model->facilitySearch();

    $this->load->view('header', $data);
    $this->load->view('facility', $data);
    $this->load->view('footer');
  }

  public function book_facility()
  {
    $this->load->model('Facility_model');

    $data = $this->getHeaderData();

    $data['facilities'] = $this->Facility_model->facilitySearch();

    $this->load->view('header', $data);
    $this->load->view('facility_booking', $data);
    $this->load->view('footer');
  }

  public function check_booking()
  {
    $this->load->model('Session_model');
    $this->setNav('course');
    $data = $this->getHeaderData();
    $this->Session_model->new_session($_POST['type'], $_POST['start_time'], $_POST['end_time'], $_POST['facility']);

    $this->load->view('header', $data);
    
    $this->load->view('footer');
  }
}

?>
