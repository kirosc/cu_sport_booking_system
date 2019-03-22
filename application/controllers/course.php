<?php
/**
 *
 */
class Course extends SBooking_Controller
{

  public function course_main()
  {
    // code...
    $this->load->model('Course_model');
    $this->setTitle('Course');

    $data = $this->getHeaderData();

    $data['courses'] = $this->Course_model->courseSearch();

    $this->load->view('header', $data);
    $this->load->view('course', $data);
    $this->load->view('footer');
  }
}

?>
