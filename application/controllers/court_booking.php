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

    $this->loadCSS('libraries/bootstrap-table.min.css');
    $this->loadCSS('court_booking.css');
    $this->loadJS('libraries/bootstrap-table.min.js');
    $this->loadJS('libraries/moment.js');
    $this->loadJS('court_booking.js');

    $data = $this->getHeaderData();

    $data['colleges'] = $this->College_model->college_search();
    $data['sports'] = $this->Sports_model->get_sports();
    $data['venues'] = $this->Venue_model->venue_search();
    $data['sessions'] = $this->Session_model->get_available_session();
    $data['json'] = json_encode($this->json_formatter($data['sessions']));

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

  public function json_formatter($sessions)
  {
    $array = array();
    $venue_id = array();
    $data = array();
    foreach ($sessions as $session) {
      $check = true;
      $data['venue_id'] = $session->venue_id;
      $data['date'] = substr($session->start_time, 0, 10);
      $data['availableTimeSlot'] = array();
      $availableTimeSlot = (int)substr($session->start_time, 11, 2) - 8;


      for ($i=0; $i < count($array); $i++) {
        if ($array[$i]['venue_id'] == $data['venue_id'] && $array[$i]['date'] == $data['date']) {
          array_push($array[$i]['availableTimeSlot'], $availableTimeSlot);
          $check = false;
        }
      }
      if ($check) {
        array_push($data['availableTimeSlot'], $availableTimeSlot);
        array_push($venue_id, $data['venue_id']);
        array_push($array, $data);

      }
      unset($data['availableTimeSlot']);
    }

    return $array;
  }

  public function search_venue_handler()
  {
    $this->load->model('Venue_model');

    if (isset($_POST["college_id"]) && isset($_POST["sport_id"])) {
      $data = $this->Venue_model->venue_search($_POST["college_id"], $_POST["sport_id"]);
    }elseif (isset($_POST["college_id"])) {
      $data = $this->Venue_model->venue_search($_POST["college_id"]);
    }elseif (isset($_POST["sport_id"])) {
      $data = $this->Venue_model->venue_search('', $_POST["sport_id"]);
    }else {
      $data = $this->Venue_model->venue_search();
    }

    echo json_encode($data);
  }
}

?>
