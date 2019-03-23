<?php
class Login extends SBooking_Controller{
  public function login_main()
  {
    // code...
    $this->setTitle('Login');

    $this->loadCSS('login.css');
    $this->loadCSS('util.css');
    $this->loadCSS('../vendor/animate/animate.css');
    $this->loadCSS('../vendor/css-hamburgers/hamburgers.min.css');
    $this->loadCSS('../vendor/animsition/css/animsition.min.css');
    $this->loadCSS('../vendor/select2/select2.min.css');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadCSS('../fonts/iconic/css/material-design-iconic-font.css');
    $this->loadJS('../vendor/jquery/jquery-3.2.1.min.js');
    $this->loadJS('../vendor/animsition/js/animsition.min.js');
    $this->loadJS('../vendor/select2/select2.min.js');
    $this->loadJS('../vendor/daterangepicker/moment.min.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadJS('../vendor/countdowntime/countdowntime.js');
    $this->loadJS('login.js');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('login');
    $this->load->view('footer');
  }

  public function register_main()
  {
    // code...
    $this->setTitle('Register');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('register');
    $this->load->view('footer');
  }

  public function login_check()
  {
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];

    $data["user_name"] = $user_name;
    $data["password"] = $password;

    // TODO: match username and password in database
  }

  public function signup_check()
  {
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];

    $data["user_name"] = $user_name;
    $data["password"] = $password;
    $data["first_name"] = $_POST["first_name"];
    $data["last_name"] = $_POST["last_name"];
    $data["phone"] = $_POST["phone"];

    // TODO: check no same username

    // TODO: create user
  }
}
?>
