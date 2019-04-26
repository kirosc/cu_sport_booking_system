<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_share controller handle session share page and all functions relate to session share
class Session_share extends SBooking_Controller
{

  //session share main page
  public function session_share_main()
  {
    $this->load->model('Shared_session_model');
    $this->load->model('Share_model');

    $this->setTitle('Session-Share');
    $this->setNav('session_share');

    $this->loadCSS('libraries/material-clear.css');
    $this->loadCSS('libraries/material-combobox.css');
    $this->loadCSS('libraries/material-textbox.css');
    $this->loadCSS('libraries/material-form.css');
    $this->loadCSS('session_share_listing.css');
    $data = $this->getHeaderData();

    //get all shared session from db
    $sessions = $this->Shared_session_model->get_shared_session();

    //get the seat_remain, date and time from each shared session
    $seat_remains = array();
    $dates = array();
    $start_times = array();
    foreach ($sessions as $session) {
      $date = substr($session->start_time, 0, 10);
      $start_time = substr($session->start_time, 11, 2);
      $seat_remain = $session->seats - $this->Share_model->get_share_by_id($session->session_id, 1);
      array_push(
        $dates,
        $date
      );
      array_push(
        $start_times,
        $start_time
      );
      array_push(
        $seat_remains,
        $seat_remain
      );
    }

    //merge all continue session that created by the same host
    $data['sessions'] = $this->merge_continue_session($sessions, $dates, $start_times, $seat_remains);

    $data['detail_url'] = $data['page_url'] . 'session_share/id/';

    $this->load->view('header', $data);
    $this->load->view('session_share', $data);
    $this->load->view('footer');
  }

  //shared session detail page
  public function detail()
  {
    $this->load->model('Shared_session_model');
    $this->load->model('Share_model');
    $this->load->model('Session_model');

    $this->setNav('session_share');

    $this->loadCSS('session_share_detail.css');
    $data = $this->getHeaderData();
    //get the sessions id from the uri
    $start_session_id = $this->uri->segment(3);
    $end_session_id = $this->uri->segment(4);

    //calculate the end time of this shared session
    $end_session_time = 1+substr($this->Session_model->get_start_time($end_session_id)->start_time, 11, 2);
    $data['session'] = $this->Shared_session_model->get_shared_session_by_id($start_session_id);
    $data['end_time'] = $end_session_time;

    $data['seat_remain'] = $data['session']->seats - $this->Share_model->get_share_by_id($start_session_id, 1);

    $this->setTitle('Session-Share');
    $this->load->view('header', $data);
    $this->load->view('session_share_detail', $data);
    $this->load->view('footer');
  }

  //student joins shared session
  public function join()
  {
    $this->load->model('Shared_session_model');
    $this->load->model('Share_model');

    $this->setNav('session_share');

    //get the session id from the uri
    $session_id = $this->uri->segment(3);

    $shares = $this->Share_model->get_share_by_id($session_id, 0);

    //check if this student already join this shared session
    foreach ($shares as $share) {
      if ($_SESSION['email'] == $share->email) {
        echo '<script>alert("You Have Already Join This Session!");</script>';
        redirect('session_share', 'refresh');
        return;
      }
    }

    //assign this student to this shared session, update the db
    $this->Share_model->new_share($_SESSION['email'], $session_id);

    echo '<script>alert("You Have Successfully Join This Session!");</script>';
    redirect('session_share', 'refresh');//redirect to session share main page
  }

  //merge all continue session that created by the same host
  public function merge_continue_session($sessions, $dates, $start_times, $seat_remains)
  {
    $merged = array();//store all the processed shared sessions

    //loop through all the shared sessions
    for ($i=0; $i < sizeof($sessions); $i++) {
      //first shared session add to $merged
      if ($i == 0) {
        $data = array(
          "start_session_id" => $sessions[$i]->session_id,
          "end_session_id" => $sessions[$i]->session_id,
          "seats" => $sessions[$i]->seats,
          "description" => $sessions[$i]->description,
          "date" => $dates[$i],
          "start_time" => (int)$start_times[$i],
          "end_time" => 1+((int)$start_times[$i]),
          "host_email" => $sessions[$i]->host_email,
          "venue" => $sessions[$i]->venue,
          "college" => $sessions[$i]->college,
          "sport" => $sessions[$i]->sport,
          "host" => $sessions[$i]->host,
          "user_fullname" => $sessions[$i]->user_fullname,
          "seat_remain" => $seat_remains[$i]
        );
        array_push($merged, $data);
      }else{
        //check if this shared session match the date, time and the user
        //match
        if (($index = $this->check_in_merged($merged, $sessions[$i], $dates[$i], $start_times[$i])) != -1) {
          $merged[$index]['end_time'] = $merged[$index]['end_time']+1;//extend the end_time
          $merged[$index]['end_session_id'] = $sessions[$i]->session_id;//add this session id
        //not match, create a new shared session to $merged
        }else{
          $data = array(
            "start_session_id" => $sessions[$i]->session_id,
            "end_session_id" => $sessions[$i]->session_id,
            "seats" => $sessions[$i]->seats,
            "description" => $sessions[$i]->description,
            "date" => $dates[$i],
            "start_time" => (int)$start_times[$i],
            "end_time" => 1+((int)$start_times[$i]),
            "host_email" => $sessions[$i]->host_email,
            "venue" => $sessions[$i]->venue,
            "college" => $sessions[$i]->college,
            "sport" => $sessions[$i]->sport,
            "host" => $sessions[$i]->host,
            "user_fullname" => $sessions[$i]->user_fullname,
            "seat_remain" => $seat_remains[$i]
          );
          array_push($merged, $data);
        }
      }


    }
    return $merged;
  }

  //merge_continue_session helper function
  public function check_in_merged($merged, $session, $date, $start_time)
  {
    for ($i=0; $i < sizeof($merged); $i++) {
      if ($merged[$i]['date'] == $date && $merged[$i]['host_email'] == $session->host_email && $merged[$i]['venue'] == $session->venue && $merged[$i]['end_time'] == $start_time) {
        return $i;
      }
    }
    return -1;
  }

}

?>
