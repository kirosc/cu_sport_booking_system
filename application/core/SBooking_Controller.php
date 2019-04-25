<?php

//based controller of all controllers in controllers folder
class SBooking_Controller extends CI_Controller
{
  private $page_url, $image_url, $css_url, $js_url;
  private $header_data;

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Hong_Kong");

    $this->page_url = base_url().'index.php/';
    $this->image_url = base_url().'images/';
    $this->css_url = base_url().'styles/';
    $this->js_url = base_url().'scripts/';

    //store all the data we need that need to show on HTML header tag
    $this->header_data = array(
      'title' => '',
      'nav' => '',
      'page_url' => $this->page_url,
      'image_url' => $this->image_url,
      'css_file' => array(),
      'js_file' => array()
    );

    //base CSS file
    $this->loadCSS('normalize.css');
    $this->loadCSS('style.css');
    $this->loadCSS('libraries/bootstrap.min.css');
    $this->loadCSS('libraries/font-awesome.min.css');
    $this->loadCSS('custom.css');
    $this->loadCSS('header.css');
    $this->loadCSS('footer.css');

    //base JS file
    $this->loadJS('libraries/jquery-3.3.1.min.js');
    $this->loadJS('libraries/popper.min.js');
    $this->loadJS('libraries/bootstrap.min.js');
  }

  //set HTML title
  protected function setTitle($title)
  {
    $this->header_data['title'] = $title;
  }

  //set HTML page type
  protected function setNav($nav)
  {
    $this->header_data['nav'] = $nav;
  }

  //return header data to controller
  protected function getHeaderData()
  {
    return $this->header_data;
  }

  //push CSS file into header_data array
  protected function loadCSS($path)
  {
    array_push(
        $this->header_data['css_file'],
        $this->css_url.$path
    );
  }

  //push CDNCSS file into header_data array
  protected function loadCDNCSS($path)
  {
    array_push(
        $this->header_data['css_file'], $path
    );
  }

  //push JS file into header_data array
  protected function loadJS($path)
  {
    array_push(
      $this->header_data['js_file'],
      $this->js_url.$path
    );
  }

  //push CDNJS file into header_data array
  protected function loadCDNJS($path)
  {
    array_push(
        $this->header_data['js_file'], $path
    );
  }

}

?>
