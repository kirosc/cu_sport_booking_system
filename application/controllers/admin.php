<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *test
 */
class Admin extends SBooking_Controller
{

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
    $data['sessions'] = $this->Session_model->get_all_session();
    $data['available_sessions'] = $this->Session_model->get_available_session();

    $this->load->view('header', $data);
    $this->load->view('admin_session', $data);
    $this->load->view('footer');
  }

  public function user()
  {
    $this->load->model('User_model');

    $this->setTitle('Admin');
    $this->setNav('admin_user');

    $this->loadCSS('admin_user.css');

    $data = $this->getHeaderData();

    $data['users'] = $this->User_model->get_users_on_usertype();

    $this->load->view('header', $data);
    $this->load->view('admin_user', $data);
    $this->load->view('footer');
  }

  public function add_session_handler()
  {
    $this->load->model('Session_model');

    $count = $_SESSION['admin_session_page'];
    $ts = date(strtotime('previous monday'));
    $ts = $ts + $count * 86400 * 7;
    $start_times = array();

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
    foreach ($start_times as $k) {
      $this->Session_model->new_session($k, $_POST['venue']);
    }


    echo '<script>alert("Session Added!");</script>';
    redirect('admin/session', 'refresh');
  }

  public function delete_session_handler()
  {
    $this->load->model('Session_model');

    $venue_id = $_POST['venue'];
    foreach ($_POST['delete-checkbox'] as $key => $value) {
      $year = substr($key, 0, 4);
      $month = substr($key, 5, 2);
      $day = substr($key, 8, 2);
      $hour = substr($key, 10);
      $start_time = date("Y-m-d H:i:s", mktime($hour, 0, 0, $month, $day, $year));
      $this->Session_model->delete_session($start_time, $venue_id);
    }
    echo '<script>alert("Session Deleted!");</script>';
    redirect('admin/session', 'refresh');
  }

  public function reset_password_handler()
  {
    $this->load->model('User_model');
    $this->User_model->update_password($_POST['user']);
    echo '<script>alert("'. $_POST['user'] .'\'s password reset to 000000!");</script>';
    redirect('admin/user', 'refresh');
  }

  public function delete_user_handler()
  {
    $this->load->model('User_model');
    $this->load->model('Student_model');
    $this->load->model('Coach_model');

    $usertype = $this->User_model->check_usertype($_POST['user'], NULL);

    if ($usertype->s != NULL){
      $this->Student_model->delete_student($_POST['user']);
    }elseif ($usertype->c != NULL) {
      $this->Coach_model->delete_coach($_POST['user']);
    }
    echo '<script>alert("'. $_POST['user'] .' deleted!");</script>';
    redirect('admin/user', 'refresh');
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
