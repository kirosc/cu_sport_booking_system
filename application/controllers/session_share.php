<?php
/**
 *
 */
class Session_share extends SBooking_Controller
{

  public function session_share_main()
  {
    $this->load->model('Shared_session_model');
    $this->load->model('Share_model');

    $this->setTitle('Session-Share');
    $this->setNav('session_share');
    $data = $this->getHeaderData();

    $data['sessions'] = $this->Shared_session_model->get_shared_session();
    $data['seat_remain'] = array();
    foreach ($data['sessions'] as $session) {
      $seat_remain = $session->seats - $this->Share_model->count_share_by_sessionid($session->session_id);
      array_push(
        $data['seat_remain'],
        $seat_remain
      );
    }
    $data['detail_url'] = $data['page_url'] . 'session_share/id/';

    $this->load->view('header', $data);
    $this->load->view('session-share', $data);
    $this->load->view('footer');
  }

  public function detail()
  {
    $this->load->model('Shared_session_model');
    $this->load->model('Share_model');

    $this->setNav('session_share');

    $data = $this->getHeaderData();
    $session_id = $this->uri->segment(3);

    $data['session'] = $this->Shared_session_model->get_shared_session_by_id($session_id);
    $data['seat_remain'] = $data['session']->seats - $this->Share_model->count_share_by_sessionid($session_id);


    $this->setTitle('Session-Share');
    $this->load->view('header', $data);
    $this->load->view('session_share_detail', $data);
    $this->load->view('footer');
  }
}

?>
