<?php
/**
 *
 */
class Course extends SBooking_Controller
{

  public function course_main()
  {
    // code...
    $this->setTitle('Course');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('course');
    $this->load->view('footer');
  }
}

?>
