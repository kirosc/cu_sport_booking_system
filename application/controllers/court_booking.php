<?php
/**
 *
 */
class Court_booking extends SBooking_Controller
{

  public function book_court()
  {
    $this->load->model('College_model');
    $this->load->model('Sports_model');
    $this->load->model('Venue_model');
    $this->load->model('Session_model');

    $data = $this->getHeaderData();

    $data['colleges'] = $this->College_model->college_search();
    $data['sports'] = $this->Sports_model->get_sports();
    $data['venues'] = $this->Venue_model->venue_search();
    $data['sessions'] = $this->Session_model->get_available_session();

    $this->load->view('header', $data);
    $this->load->view('court_booking', $data);
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
