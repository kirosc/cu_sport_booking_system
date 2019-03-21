<?php
class Login extends SBooking_Controller{
  public function login_main()
  {
    // code...
    $this->setTitle('Login');

    $this->loadCSS('login.css');

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
