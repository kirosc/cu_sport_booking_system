<?php
  class Util extends SBooking_Controller
  {
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

    public function search_session_handler()
    {
      $this->load->model('Session_model');
      $sessions = $this->Session_model->get_available_session_by_id($_POST['venue_id']);
      $data = json_encode($this->json_formatter($sessions));

      echo $data;
    }

    public function search_usertype_handler()
    {
      $this->load->model('User_model');
      $users = $this->User_model->get_users_on_usertype($_POST['usertype']);
      echo json_encode($users);
    }

  }


?>
