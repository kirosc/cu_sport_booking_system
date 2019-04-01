<?php
/**
 *
 */
class SBooking_Controller extends CI_Controller
{
  private $page_url, $image_url, $css_url, $js_url;
  private $header_data;

  public function __construct()
  {
    parent::__construct();
    $this->page_url = base_url().'index.php/';
    $this->image_url = base_url().'images/';
    $this->css_url = base_url().'styles/';
    $this->js_url = base_url().'scripts/';

    $this->header_data = array(
      'title' => '',
      'page_url' => $this->page_url,
      'image_url' => $this->image_url,
      'css_file' => array(),
      'js_file' => array()
    );

    $this->loadCSS('normalize.css');
    $this->loadCSS('style.css');
    $this->loadCSS('libraries/bootstrap.min.css');
    $this->loadCSS('libraries/font-awesome.min.css');
      $this->loadCSS('custom.css');
    $this->loadCSS('header.css');
    $this->loadCSS('footer.css');

    $this->loadJS('libraries/jquery-3.3.1.min.js');
    $this->loadJS('libraries/bootstrap.min.js');

  }

  protected function setTitle($title)
  {
    $this->header_data['title'] = $title;
  }

  protected function getHeaderData()
  {
    return $this->header_data;
  }

  protected function loadCSS($path)
  {
    array_push(
      $this->header_data['css_file'],
      $this->css_url.$path
    );
  }

  protected function loadJS($path)
  {
    array_push(
      $this->header_data['js_file'],
      $this->js_url.$path
    );
  }

}

?>
