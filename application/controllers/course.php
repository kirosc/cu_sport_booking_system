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
    $this->setNav('course');

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
    $this->load->model('Facility_model');

    $this->setNav('course');

    $this->loadCSS('course_detail.css');
    $data = $this->getHeaderData();
    $course_id = $this->uri->segment(3);

    $data['course'] = $this->Course_model->getCourseById($course_id);
    $data['facility'] = $this->Facility_model->facilitySearchById($course_id);
    $this->setTitle('Course');
    $this->load->view('header', $data);
    $this->load->view('course_detail', $data);
    $this->load->view('footer');
  }

  public function add_course_page()
  {
    $this->load->model('Facility_model');
    $this->load->model('Category_model');
    $this->load->model('Level_model');

    $this->setNav('course');
    $data = $this->getHeaderData();


    $data['facilities'] = $this->Facility_model->facilitySearch();
    $data['categories'] = $this->Category_model->getCategory();
    $data['levels'] = $this->Level_model->getLevel();

    $this->load->view('header', $data);
    $this->load->view('course_add', $data);
    $this->load->view('footer');
  }

  public function check_add_course()
  {
    $this->load->model('Course_model');

    $this->setNav('course');
    $data = $this->getHeaderData();
    
    $this->Course_model->new_course($_POST["course_title"], $_POST["start_time"], $_POST["end_time"], $_POST["category"], $_POST["facility"], $_POST["price"], $_POST["seat"], $_POST["description"], $_POST["level"], $_SESSION["email"]);
    $this->load->view('header', $data);
    $this->load->view('course_add_success', $data);
    $this->load->view('footer');
  }
}

?>
