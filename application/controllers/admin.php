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
    $data['sessions'] = $this->Session_model->get_all_session();

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

  public function session_handler()
  {
    $this->load->model('Session_model');

    $count = $_SESSION['admin_session_page'];
    $ts = date(strtotime('previous monday'));
    $ts = $ts + $count * 86400 * 7;

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
          $this->Session_model->new_session($start_time, $_POST['venue']);
        }
      }
    }

    echo '<script>alert("Session Added!");</script>';
    redirect('admin/session', 'refresh');
  }
}

?>
