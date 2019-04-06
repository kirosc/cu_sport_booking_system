<?php
/**
 *test
 */
class Admin extends SBooking_Controller
{

  public function index()
  {
    $this->setTitle('Admin');
    $this->setNav('admin');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('admin');
    $this->load->view('footer');
  }

  public function session()
  {
    $this->load->model('College_model');
    $this->load->model('Sports_model');
    $this->load->model('Venue_model');
    $this->load->model('Session_model');

    $this->setTitle('Admin');
    $this->setNav('admin_session');

    $this->loadCSS('libraries/bootstrap-table.min.css');
    $this->loadJS('libraries/bootstrap-table.min.js');
    $this->loadJS('libraries/moment.js');
    $this->loadJS('admin_session_table.js');

    $data = $this->getHeaderData();

    $data['colleges'] = $this->College_model->college_search();
    $data['sports'] = $this->Sports_model->get_sports();
    $data['venues'] = $this->Venue_model->venue_search();
    $data['sessions'] = $this->Session_model->get_available_session();
    $data['json'] = json_encode($this->json_formatter($data['sessions']));

    $this->load->view('header', $data);
    $this->load->view('admin_session', $data);
    $this->load->view('footer');
  }

  public function course()
  {
    $this->setTitle('Admin');
    $this->setNav('admin_course');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('admin_course', $data);
    $this->load->view('footer');
  }

  public function user()
  {
    $this->setTitle('Admin');
    $this->setNav('admin_user');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('admin_user', $data);
    $this->load->view('footer');
  }

  public function json_formatter($sessions)
  {
    $array = array();
    $venue_id = array();
    $data = array();
    foreach ($sessions as $session) {
      $test = false;
      $data['venue_id'] = $session->venue_id;
      $data['date'] = substr($session->start_time, 0, 10);
      $data['availableTimeSlot'] = array();
      $availableTimeSlot = (int)substr($session->start_time, 11, 2) - 8;
      for ($i=0; $i < count($array); $i++) {
        if ($array[$i]['venue_id'] == $data['venue_id'] && $array[$i]['date'] == $data['date']) {
          array_push($array[$i]['availableTimeSlot'], $availableTimeSlot);
          $test = true;
          break;
        }
      }
      if ($test != true) {
        array_push($data['availableTimeSlot'], $availableTimeSlot);
        array_push($venue_id, $data['venue_id']);
        array_push($array, $data);
      }


      unset($data['availableTimeSlot']);
    }


    return $array;
  }

  public function session_handler()
  {
    $date = array();
    $time = array();
    for ($i=0; $i < 15; $i++) {
      for ($j=0; $j < 7; $j++) {
        if (isset($_POST['checkbox-'.$j.$i])) {
          array_push($week, $j.$i);
        }
      }
    }
  }
}

?>
