<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//admin controller handle admin page and admin function
class Admin extends SBooking_Controller
{

  //session control page
  public function session()
  {
    $this->load->model('College_model');
    $this->load->model('Sports_model');
    $this->load->model('Venue_model');
    $this->load->model('Session_model');

    $this->setTitle('Admin');
    $this->setNav('admin_session');

    $this->loadCSS('libraries/bootstrap-table.min.css');
    $this->loadCSS('admin_session.css');
    $this->loadJS('libraries/bootstrap-table.min.js');
    $this->loadJS('libraries/moment.js');

    $data = $this->getHeaderData();

    $data['colleges'] = $this->College_model->college_search();//get all the college name
    $data['sports'] = $this->Sports_model->get_sports();//get all the sport name
    $data['venues'] = $this->Venue_model->venue_search();//get all the venue name
    $data['sessions'] = $this->Session_model->get_all_session();//get all the session in db
    $data['available_sessions'] = $this->Session_model->get_available_session();//get all the session that is not booked

    //call html and pass needed data
    $this->load->view('header', $data);
    $this->load->view('admin_session', $data);
    $this->load->view('footer');
  }

  //user control page
  public function user()
  {
    $this->load->model('User_model');

    $this->setTitle('Admin');
    $this->setNav('admin_user');

    $this->loadCSS('admin_user.css');

    $data = $this->getHeaderData();

    $data['users'] = $this->User_model->get_users_on_usertype();//get all user account

    $this->load->view('header', $data);
    $this->load->view('admin_user', $data);
    $this->load->view('footer');
  }

  //handle add session slots where admin selected
  public function add_session_handler()
  {
    $this->load->model('Session_model');

    $count = $_SESSION['admin_session_page'];
    $ts = date(strtotime('previous monday'));
    $ts = $ts + $count * 86400 * 7;
    $start_times = array();//store all selected sessions
    //get all the checked checkbox, and store it's start_time of session
    for ($i=8; $i < 23; $i++) {
      for ($j=0; $j < 7; $j++) {
        if (isset($_POST['checkbox-'.$j.$i])) {
          $date = date('Y-m-d', $ts + 86400 * $j);
          if ($i == 8) {
            $time = '08:00:00';
          }elseif ($i == 9) {
            $time = '09:00:00';
          }else{
            $time = $i . ':00:00';
          }

          $start_time = $date . " " . $time;
          array_push($start_times, $start_time);

        }
      }
    }
    sort($start_times);
    //insert all selected sessions into db
    foreach ($start_times as $k) {
      $this->Session_model->new_session($k, $_POST['venue']);
    }

    //alert admin finishes the process and redirect to session control page
    echo '<script>alert("Session Added!");</script>';
    redirect('admin/session', 'refresh');
  }

  //handle delete session slots where admin selected
  public function delete_session_handler()
  {
    $this->load->model('Session_model');

    $venue_id = $_POST['venue'];//get the selected venue
    //delete the selected sessions
    foreach ($_POST['delete-checkbox'] as $key => $value) {
      //parse the string to match the format of start_time
      $year = substr($key, 0, 4);
      $month = substr($key, 5, 2);
      $day = substr($key, 8, 2);
      $hour = substr($key, 10);
      $start_time = date("Y-m-d H:i:s", mktime($hour, 0, 0, $month, $day, $year));
      $this->Session_model->delete_session($start_time, $venue_id);//delete session in db
    }
    //alert admin finish the process and redirect to session control page
    echo '<script>alert("Session Deleted!");</script>';
    redirect('admin/session', 'refresh');
  }

  //handle password reset of the selected user
  public function reset_password_handler()
  {
    $this->load->model('User_model');
    $this->User_model->update_password($_POST['user']);//reset the user's password in db

    //alert admin finishes the process and redirect to user control page
    echo '<script>alert("'. $_POST['user'] .'\'s password reset to 000000!");</script>';
    redirect('admin/user', 'refresh');
  }

  //handle user delete
  public function delete_user_handler()
  {
    $this->load->model('User_model');
    $this->load->model('Student_model');
    $this->load->model('Coach_model');

    //get the selected user's usertype
    $usertype = $this->User_model->check_usertype($_POST['user'], NULL);

    //usertype is student
    if ($usertype->s != NULL){
      $this->Student_model->delete_student($_POST['user']);
    //usertype is coach
    }elseif ($usertype->c != NULL) {
      $this->Coach_model->delete_coach($_POST['user']);
    }
    //alert admin finishes the process and redirect to user control page
    echo '<script>alert("'. $_POST['user'] .' deleted!");</script>';
    redirect('admin/user', 'refresh');
  }

  //get all the sessions' venue_id and start_time, tranform them to json, that can do further process in JS
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

      //checking if the venue and date is already in the array
      for ($i=0; $i < count($array); $i++) {
        if ($array[$i]['venue_id'] == $data['venue_id'] && $array[$i]['date'] == $data['date']) {
          array_push($array[$i]['availableTimeSlot'], $availableTimeSlot);//insert the time slot that have the same date and venue in the array
          $check = false;
        }
      }
      //append a new venue & date pair into array
      if ($check) {
        array_push($data['availableTimeSlot'], $availableTimeSlot);
        array_push($venue_id, $data['venue_id']);
        array_push($array, $data);

      }
      unset($data['availableTimeSlot']);
    }

    return $array;
  }

  //output selected user's profile in user control page, this function will called by ajax
  public function show_user_profile()
  {
    $this->load->model('User_model');
    $this->loadCSS('profile.css');
    $data = $this->getHeaderData();
    $data['user'] = $this->User_model->get_user_detail($_POST['user']);
    echo $this->load->view('profile', $data, true);
  }
}

?>
