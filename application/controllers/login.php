<?php
class Login extends SBooking_Controller{
  public function login_main()
  {
    // code...
    $this->setTitle('Login');

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

    $sql_string =
      "SELECT count(*) as count FROM user
        WHERE username='{$user_name}' AND password='{$password}'";
    $sql_query = $this->db->query($sql_string)->result();

    $this->setPageTitle("Login Checking");
    $this->load->view('header');
    if ($sql_query->num_rows() == 0) {
      $this->load->view('login_failure');
    }else {
      $sql_string = "SELECT * FROM user where username='{$user_name}'";
      $sql_query = $this->db->query($sql_string)->result();
      $cookie = array(
        'name' => 'user_name',
        'value' => $user_name,
        'expire' => '86500', //1 day
        // 'secure' => TRUE
      );
      $this->input->set_cookie($cookie);
      $this->load->view('login_success');
    }
    $this->load->view('footer');
  }

  public function signup_check()
  {
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];

    $this->setPageTitle("Register Checking");
    $this->load->view('header');
    $sql_string =
      "SELECT count(*) as count FROM user
      WHERE username='{$user_name}'";
    $sql_query = $this->db->query($sql_string)->result();
    if ($sql_query->num_rows() != 0) {
      $this->load->view('register_failure');
    }else {
      $data["user_name"] = $user_name;
      $data["password"] = $password;
      $data["first_name"] = $_POST["first_name"];
      $data["last_name"] = $_POST["last_name"];
      $data["phone"] = $_POST["phone"];

      $sql_string =
        "INSERT INTO user (username, password, email, first_name, last_name, phone)
        values ('{$user_name}', '{'$password'}', '{$email}', '{$first_name}', '{$last_name}', '{$phone}')";
      $sql_query = $this->db->query($sql_string);
      $this->load->view('register_success');
    }
    $this->load->view('footer');


  }
}
?>
