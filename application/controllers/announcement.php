<?php

class Announcement extends SBooking_Controller
{
  public function details() {
    $this->load->model('Announcement_model');

    $data = $this->getHeaderData();
    $announ_id = $this->uri->segment(3);

    $data['announcement'] = $this->Announcement_model->get_announcement_by_id($announ_id);

    $this->setTitle('Announcement');
    $this->load->view('header', $data);
    $this->load->view('announcement_details', $data);
    $this->load->view('footer');
  }
}

 ?>
