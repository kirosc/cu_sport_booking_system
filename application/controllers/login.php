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
    $username = $_POST["user_name"];
    $password = $_POST["password"];

    $data = $this->getHeaderData();
    $data["user_name"] = $username;
    $data["password"] = $password;

    $sql_string =
      "SELECT count(*) as count FROM user
        WHERE username='{$username}' AND password='{$password}'";
    $sql_query = $this->db->query($sql_string)->result();

    $this->setTitle("Login Checking");
    $this->load->view('header', $data);

    if ($sql_query[0]->count == 0) {
      $this->load->view('login_failure');
    }else {
      $sql_string = "SELECT * FROM user where username='{$username}'";
      $sql_query = $this->db->query($sql_string)->result();
      $cookie = array(
        'name' => 'user_name',
        'value' => $username,
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
    $username = $_POST["user_name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $data = $this->getHeaderData();

    $this->setTitle("Register Checking");
    $this->load->view('header', $data);

    $sql_string =
      "SELECT count(*) as count FROM user
      WHERE username='{$username}'";
    $sql_query = $this->db->query($sql_string)->result();
    if ($sql_query[0]->count != 0) {
      $this->load->view('register_failure');
    }else {
      $this->load->model('User_model');
      $this->User_model->new_user($email, $password, $username, $first_name, $last_name);

      $this->load->view('register_success');
    }
    $this->load->view('footer');


  }
}
?>
