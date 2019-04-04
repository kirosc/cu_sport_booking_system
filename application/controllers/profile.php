<?php
/**
 *test
 */
class Profile extends SBooking_Controller
{

  public function profile_main()
  {
    $this->setTitle('Profile');
    $this->setNav('profile');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('profile');
    $this->load->view('footer');
  }
}

?>
