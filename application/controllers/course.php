<?php
/**
 *
 */
class Course extends SBooking_Controller
{

  public function course_main()
  {
    $this->load->model('Course_model');
    $this->setTitle('Course');

    $this->loadCSS('libraries/material-clear.css');
    $this->loadCSS('libraries/material-combobox.css');
    $this->loadCSS('libraries/material-textbox.css');
    $this->loadCSS('libraries/material-form.css');
    $this->loadCSS('course_listing.css');

    $data = $this->getHeaderData();

    $data['courses'] = $this->Course_model->courseSearch();
    $data['detail_url'] = $data['page_url'] . 'course/id/';

    $this->load->view('header', $data);
    $this->load->view('course', $data);
    $this->load->view('footer');
  }

  //course detail page
  public function detail()
  {
    $this->load->model('Course_model');
    $this->loadCSS('course_detail.css');
    $data = $this->getHeaderData();
    $course_id = $this->uri->segment(3);

    $data['course'] = $this->Course_model->getCourseById($course_id);

    $this->setTitle('Course');
    $this->load->view('header', $data);
    $this->load->view('course_detail', $data);
    $this->load->view('footer');
  }

  public function add_course_page()
  {
    $this->load->model('Facility_model');
    $data = $this->getHeaderData();

    $data['facilities'] = $this->Facility_model->facilitySearch();

    $this->load->view('header', $data);
    $this->load->view('course_add', $data);
    $this->load->view('footer');
  }

  public function check_add_course()
  {
    foreach ($_POST as $key => $value) {
      echo '<p>'.$key.': '.$value.'</p>';
    }
  }
}

?>
