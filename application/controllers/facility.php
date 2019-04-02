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
    $this->load->model('Session_model');

    $data = $this->getHeaderData();

    $data['facilities'] = $this->Facility_model->facilitySearch();
    $data['sessions'] = $this->Session_model->get_available_session();

    $this->load->view('header', $data);
    $this->load->view('facility_booking', $data);
    $this->load->view('footer');
  }

  public function check_booking()
  {
    $price = '10';

    $this->load->model('Session_model');
    $this->load->model('Private_session_model');
    $this->load->model('Shared_session_model');
    $this->load->model('Reserve_model');

    $this->setNav('course');
    $data = $this->getHeaderData();

    $this->Reserve_model->new_reserve($_SESSION['email'], $_POST['session']);
    if ($_POST['is_share'] == '1') {
      $this->Shared_session_model->new_shared_session($_POST['session'], $_POST['description'], $_POST['seat']);
    }else {
      $this->Private_session_model->new_private_session($_POST['session'], $price);
    }


    $this->load->view('header', $data);

    $this->load->view('footer');
  }
}

?>
