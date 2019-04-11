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

    $this->setNav('court_booking');

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
    $this->load->model('Venue_model');

    $this->setNav('court_booking');

    $this->loadCSS('court_booking_payment.css');

    $data = $this->getHeaderData();

    $data['date'] = $_POST['date'];
    $year = substr($data['date'], 0, 4);
    $month = substr($data['date'], 5, 2);
    $day = substr($data['date'], 8, 2);

    $data['venue_id'] = $_POST['venue'];
    $data['venue'] = $this->Venue_model->get_name($_POST['venue'])->venue;
    $data['sessions_time'] = array();
    foreach ($_POST['time'] as $value) {
      $time = 8+substr($value, 5);
      $data['end_time'] = ($time + 1).":00";
      $start_time = date("Y-m-d H:i:s", mktime($time, 0, 0, $month, $day, $year));
      array_push($data['sessions_time'], $start_time);
    }
    $data['start_time'] = substr($data['sessions_time'][0], 11, 5);

    $price = $this->Venue_model->get_venue_price($data['venue_id'])->price;
    $data['price'] = $price * sizeof($data['sessions_time']);

    if (isset($_POST['is-share'])) {
      $data['is_share'] = $_POST['is-share'];
    }else {
      $data['is_share'] = 0;
    }

    if ($data['is_share'] == 1) {
      $data['seats'] = $_POST['seats'];
      $data['description'] = $_POST['description'];
    }
    $data['sessions_time'] = json_encode($data['sessions_time']);

    $this->load->view('header', $data);
    $this->load->view('court_booking_payment', $data);
    $this->load->view('footer');
  }

  public function payment_finish()
  {
    $this->load->model('Reserve_model');
    $this->load->model('Shared_session_model');
    $this->load->model('Session_model');

    $venue_id = $_POST['venue_id'];
    $sessions_time = $_POST['sessions_time'];
    if (isset($_POST['seats']) && isset($_POST['description'])) {
      $seats = $_POST['seats'];
      $description = $_POST['description'];
    }

    foreach ($sessions_time as $start_time) {
      $session_id = $this->Session_model->get_session_id($venue_id, $start_time)->session_id;
      $this->Reserve_model->new_reserve($_SESSION['email'], $session_id);
      if (isset($_POST['seats']) && isset($_POST['description'])) {
        $this->Shared_session_model->new_shared_session($session_id, $seats, $description);
      }
    }
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
}

?>
