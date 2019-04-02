<?php
class Login extends SBooking_Controller{

  // public function __construct()
  // {
  //   parent::__construct();
  //   if ($this->session->userdata('id')) {
  //     redirect('private_area');
  //   }
  //   $this->load->library('form_validation');
  //   $this->load->library('encrypt');
  //   $this->load->model('User_model');
  // }

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

    $this->loadCSS('register.css');
    $this->loadCSS('util.css');
    $this->loadCSS('../vendor/animate/animate.css');
    $this->loadCSS('../vendor/css-hamburgers/hamburgers.min.css');
    $this->loadCSS('../vendor/animsition/css/animsition.min.css');
    $this->loadCSS('../vendor/select2/select2.min.css');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadCSS('../fonts/iconic/css/material-design-iconic-font.css');
    $this->loadJS('../vendor/animsition/js/animsition.min.js');
    $this->loadJS('../vendor/select2/select2.min.js');
    $this->loadJS('../vendor/daterangepicker/moment.min.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadJS('../vendor/countdowntime/countdowntime.js');
    $this->loadJS('register.js');

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


    if ($sql_query[0]->count == 0) {
      $this->load->view('header', $data);
      $this->load->view('login_failure');
    }else {
      $sql_string = "
        SELECT user.email, user.username, coach.email AS couch, student.email AS student
        FROM coach
        RIGHT JOIN user ON user.email = coach.email
        LEFT JOIN student ON user.email = student.email
        WHERE username='{$username}'";
      $sql_query = $this->db->query($sql_string)->result();
      $user_data = array(
        'username' => $username,
        'email' => $sql_query[0]->email,
        'logged_in' => TRUE
      );
      if ($sql_query[0]->couch != NULL) {
        $user_data['usertype'] = 'couch';
      }elseif ($sql_query[0]->student != NULL) {
        $user_data['usertype'] = 'student';
      }else {
        $user_data['usertype'] = 'admin';
      }
      $this->session->set_userdata($user_data);

      $this->loadCSS('login_success.css');
      $data = $this->getHeaderData();

      $this->load->view('header', $data);
      $this->load->view('login_success');
    }
    $this->load->view('footer');
  }

  public function signup_check()
  {
    // $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
    // $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[cu_sport_booking.email]');
    // $this->form_validation->set_rules('password', 'Password', 'required');
    // $this->form_validation->set_rules('first_name', 'First Name', 'required');
    // $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    //
    // if ($this->form_validation->run())
    // {
    //   $verification_key = md5(rand());
    //   $encrypted_password = $this->encrypt->encode($this->input->post('password'));
    //   $data = array(
    //    'name'  => $this->input->post('user_name'),
    //    'email'  => $this->input->post('user_email'),
    //    'password' => $encrypted_password,
    //    'first_name' => $this->input->post('first_name'),
    //    'last_name' => $this->input->post('last_name'),
    //    'verification_key' => $verification_key
    //   );
    // }
    // $id = $this->User_model->new_user($data);
    //
    // if ($id > 0){
    //   $subject = "Please verify email for login";
    //   $message = "
    //   <p>Hi ".$this->input->post('user_name')."</p>
    //   <p>This is email verification mail from CU Sport Booking System. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."login/verify_email/".$verification_key."'>link</a>.</p>
    //   <p>Once you click this link your email will be verified and you can login into system.</p>
    //   <p>Thanks,</p>
    //   ";
    //
    //   $config = array(
    //     'protocol'  => 'smtp',
    //     'smtp_host' => 'smtpout.secureserver.net',
    //     'smtp_port' => 80,
    //     'smtp_user' => 'test',
    //     'smtp_pass' => '123456',
    //     'mailtype'  => 'html',
    //     'charset'   => 'iso-8859-1',
    //     'wordwrap'  => TRUE
    //   );
    //   $this->load->library('email', $config);
    //   $this->email->set_newline("\r\n");
    //   $this->email->from('tsangkahung3@gmail.com');
    //   $this->email->to($this->input->post('email'));
    //   $this->email->subject($subject);
    //   $this->email->message($message);
    //   if($this->email->send()){
    //    $this->session->set_flashdata('message', 'Check in your email for email verification mail');
    //    redirect('login/register_main');
    //   }
    // }else{
    //   $this->register_main();
    // }

    $data = $this->getHeaderData();

    $this->setTitle("Register Checking");
    $this->load->view('header', $data);

    $sql_string =
      "SELECT count(*) as count FROM user
      WHERE username='{$_POST['user_name']}'";
    $sql_query = $this->db->query($sql_string)->result();
    if ($sql_query[0]->count != 0) {
      $this->load->view('register_failure');
    }else {
      $this->load->model('User_model');
      $this->User_model->new_user($_POST['email'], $_POST['password'], $_POST['user_name'], $_POST['first_name'], $_POST['last_name']);
      if (isset($_POST["is_coach"]) && $_POST["is_coach"] == 'Yes') {
        $this->load->model('Coach_model');
        $this->Coach_model->new_coach($_POST['email']);
      }else{
        $this->load->model('Student_model');
        $this->Student_model->new_student($_POST['email']);
      }
      $this->load->view('register_success');
    }
    $this->load->view('footer');
  }

  public function logout()
  {
    unset($_SESSION['user_name'], $_SESSION['email']);
    $data = array('logged_in' => FALSE);
    $this->session->set_userdata($data);

    $data = $this->getHeaderData();
    $this->setTitle("Logout");
    $this->load->view('header', $data);
    $this->load->view('logout');
    $this->load->view('footer');
  }

  // function verify_email(){
  //   if ($this->uri->segment(3)) {
  //     $verification_key = $this->uri->segment(3);
  //     if($this->register_model->verify_email($verification_key))
  //     {
  //       $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login</h1>';
  //     }
  //     else
  //     {
  //       $data['message'] = '<h1 align="center">Invalid Link</h1>';
  //     }
  //     $this->load->view('email_verification', $data);
  //     }
  //   }
  }
?>
