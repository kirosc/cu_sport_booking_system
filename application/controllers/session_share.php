<?php
/**
 *
 */
class Session_share extends SBooking_Controller
{

  public function session_share_main()
  {
    // code...
    $this->setTitle('Home');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('session-share');
    $this->load->view('footer');
  }
}

?>
