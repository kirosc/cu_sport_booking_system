<?php
/**
 *
 */
class Session_share extends SBooking_Controller
{

  public function session_share_main()
  {
    // code...
    $this->setTitle('Session-Share');
    $this->setNav('session_share');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('session-share');
    $this->load->view('footer');
  }
}

?>
