<?php
/**
 *
 */
class Course extends SBooking_Controller
{

  public function course_main()
  {
    $this->load->model('Course_model');
    $this->load->model('Participate_model');

    $this->setTitle('Course');
    $this->setNav('course');

    $this->loadCSS('libraries/material-clear.css');
    $this->loadCSS('libraries/material-combobox.css');
    $this->loadCSS('libraries/material-textbox.css');
    $this->loadCSS('libraries/material-form.css');
    $this->loadCSS('course_listing.css');

    $data = $this->getHeaderData();

    $data['courses'] = $this->Course_model->courseSearch();
    $data['seat_remain'] = array();
    foreach ($data['courses'] as $course) {
      $data['date'] = substr($course->start_time, 0, 10);
      $data['start_time'] = substr($course->start_time, 11, 5);
      $data['end_time'] = substr($course->end_time, 11, 5);
      $seat_remain = $course->seats - $this->Participate_model->get_participate_by_id($course->course_id, 1);
      array_push(
        $data['seat_remain'],
        $seat_remain
      );
    }

    $data['detail_url'] = $data['page_url'] . 'course/id/';

    $this->load->view('header', $data);
    $this->load->view('course', $data);
    $this->load->view('footer');
  }

  //course detail page
  public function detail()
  {
    $this->load->model('Course_model');
    $this->load->model('Participate_model');

    $this->setNav('course');

    $this->loadCSS('course_detail.css');
    $data = $this->getHeaderData();
    $course_id = $this->uri->segment(3);

    $data['course'] = $this->Course_model->get_course_detail_by_courseid($course_id);
    $data['seat_remain'] = $data['course']->seats - $this->Participate_model->get_participate_by_id($course_id, 1);

    $data['date'] = substr($data['course']->start_time, 0, 10);
    $data['start_time'] = substr($data['course']->start_time, 11, 5);
    $data['end_time'] = substr($data['course']->end_time, 11, 5);

    $this->setTitle('Course');
    $this->load->view('header', $data);
    $this->load->view('course_detail', $data);
    $this->load->view('footer');
  }

  public function add_course_page()
  {
    $this->load->model('College_model');
    $this->load->model('Sports_model');
    $this->load->model('Venue_model');
    $this->load->model('Level_model');
    $this->load->model('Session_model');

    $this->setNav('course');

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
    $data['levels'] = $this->Level_model->getLevel();

    $this->load->view('header', $data);
    $this->load->view('course_add', $data);
    $this->load->view('footer');
  }

  public function check_add_course()
  {
    $this->load->model('Course_model');
    $this->load->model('Session_model');
    $this->load->model('Reserve_model');

    $this->setNav('course');
    $data = $this->getHeaderData();

    $this->Reserve_model->new_reserve($_SESSION['email'], $_POST['session']);
    $start = $this->Session_model->get_start_time($_POST['session']);
    $end = $this->Session_model->get_end_time($_POST['session']);
    $this->Course_model->new_course($_POST["course_title"], $start, $end, $_POST["category"], $_POST["facility"], $_POST["price"], $_POST["seat"], $_POST["description"], $_POST["level"], $_SESSION["email"]);

    $this->load->view('header', $data);
    $this->load->view('course_add_success', $data);
    $this->load->view('footer');
  }

  public function apply_check()
  {
    $this->load->model('Course_model');
    $this->load->model('Participate_model');

    $this->setNav('course');
    $data = $this->getHeaderData();
    $course_id = $this->uri->segment(3);

    $participates = $this->Participate_model->get_participate_by_id($course_id, 0);

    foreach ($participates as $participate) {
      if ($_SESSION['email'] == $participate->email) {
        echo '<script>alert("You Have Already Join This Course!");</script>';
        redirect('course', 'refresh');
      }
    }
    $data['price'] = $this->Course_model->get_price_by_id($course_id)->price;
    $data['course_id'] = $course_id;

    $this->load->view('header', $data);
    $this->load->view('payment', $data);
    $this->load->view('footer');
  }

  public function payment_finish()
  {
    $this->load->model('Participate_model');
    $this->Participate_model->new_participate($_SESSION['email'], $_POST['course_id']);
    redirect('course', 'refresh');

  }
}

?>
