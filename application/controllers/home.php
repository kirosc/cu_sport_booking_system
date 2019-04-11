<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *test
 */
class Home extends SBooking_Controller
{

  public function index()
  {
    // code...
    $this->setTitle('Home');
    $this->setNav('home');

    $this->loadCSS('index.css');
    $this->loadJS('index.js');

    $this->load->model('Announcement_model');

    $data = $this->getHeaderData();
    $data['announcements'] = $this->Announcement_model->get_announcement();
    $data['detail_url'] = $data['page_url'] . 'announcement/id/';

    $this->load->view('header', $data);
    $this->load->view('index');
    $this->load->view('footer');
  }

  public function about_us()
  {
    $this->setTitle('Home');
    $this->setNav('home');

    $this->loadCSS('about_us.css');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('about_us');
    $this->load->view('footer');
  }
}

?>
