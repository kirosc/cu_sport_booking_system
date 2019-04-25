<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//login controller handle login/register page and all functions relate to login/register subsystem
class Login extends SBooking_Controller{

  //login page
  public function login_main()
  {
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
    $this->loadJS('libraries/moment.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadJS('../vendor/countdowntime/countdowntime.js');
    $this->loadJS('login.js');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('login');
    $this->load->view('footer');
  }

  //register page
  public function register_main()
  {
    $this->setTitle('Register');

    $this->loadCSS('register.css');
    $this->loadCSS('util.css');
    $this->loadCSS('../vendor/animate/animate.css');
    $this->loadCSS('../vendor/css-hamburgers/hamburgers.min.css');
    $this->loadCSS('../vendor/animsition/css/animsition.min.css');
    $this->loadCSS('../vendor/select2/select2.min.css');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadCSS('../fonts/iconic/css/material-design-iconic-font.css');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadJS('libraries/moment.js');
    $this->loadJS('../vendor/animsition/js/animsition.min.js');
    $this->loadJS('../vendor/select2/select2.min.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadJS('../vendor/countdowntime/countdowntime.js');
    $this->loadJS('register.js');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('register');
    $this->load->view('footer');
  }

  //forget password page
  public function forgot_main()
  {
    $this->setTitle('Forgot Password');

    $this->loadCSS('forgot.css');
    $this->loadCSS('util.css');
    $this->loadCSS('../vendor/animate/animate.css');
    $this->loadCSS('../vendor/css-hamburgers/hamburgers.min.css');
    $this->loadCSS('../vendor/animsition/css/animsition.min.css');
    $this->loadCSS('../vendor/select2/select2.min.css');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadCSS('../fonts/iconic/css/material-design-iconic-font.css');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadJS('libraries/moment.js');
    $this->loadJS('../vendor/animsition/js/animsition.min.js');
    $this->loadJS('../vendor/select2/select2.min.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadJS('../vendor/countdowntime/countdowntime.js');
    $this->loadJS('forgot.js');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('forgot');
    $this->load->view('footer');
  }

  //checking user login
  public function login_check()
  {
    $username = $_POST["user_name"];
    $password = $_POST["password"];

    $data = $this->getHeaderData();
    $data["user_name"] = $username;
    $data["password"] = $password;

    //this sql will check the db if it contains user input's username & password
    $sql_string =
      "SELECT count(*) as count FROM user
        WHERE username='{$username}' AND password='{$password}'";
    $sql_query = $this->db->query($sql_string)->result();

    $this->setTitle("Login Checking");

    $this->loadCSS('login_result.css');
    $data = $this->getHeaderData();

    //no match result found in db, it means login fail
    if ($sql_query[0]->count == 0) {
      $this->load->view('header', $data);
      $this->load->view('login_failure');
    //match result found in db, it means login success
    }else {
      //this sql will check the login user's usertype
      $sql_string = "
        SELECT user.email, user.username, coach.email AS couch, student.email AS student
        FROM coach
        RIGHT JOIN user ON user.email = coach.email
        LEFT JOIN student ON user.email = student.email
        WHERE username='{$username}'";
      $sql_query = $this->db->query($sql_string)->result();
      //cookie data
      $user_data = array(
        'username' => $username,
        'email' => $sql_query[0]->email,
        'logged_in' => TRUE
      );
      //assign usertype into cookie
      if ($sql_query[0]->couch != NULL) {
        $user_data['usertype'] = 'coach';
      }elseif ($sql_query[0]->student != NULL) {
        $user_data['usertype'] = 'student';
      }else {
        $user_data['usertype'] = 'admin';
      }
      $this->session->set_userdata($user_data);//make a cookie
      $this->load->view('header', $data);
      $this->load->view('login_success');
    }

    $this->load->view('footer');
  }

  //checking user register information
  public function signup_check()
  {
    $this->load->library('form_validation');

    //register form rules
    $this->form_validation->set_rules('user_name', 'Name', 'required|trim|is_unique[user.username]|callback_username_check');//username must be unique, cannot blank and cannot name 'admin'
    $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[user.email]');//email must be unique, cannot blank
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|trim|matches[password]');//password confirm must be same as password
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');

    //the form does not pass the validation
    if ($this->form_validation->run() == FALSE) {
      $this->setTitle('Register');

      $this->loadCSS('register.css');
      $this->loadCSS('util.css');
      $this->loadCSS('../vendor/animate/animate.css');
      $this->loadCSS('../vendor/css-hamburgers/hamburgers.min.css');
      $this->loadCSS('../vendor/animsition/css/animsition.min.css');
      $this->loadCSS('../vendor/select2/select2.min.css');
      $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
      $this->loadCSS('../fonts/iconic/css/material-design-iconic-font.css');
      $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
      $this->loadJS('libraries/moment.js');
      $this->loadJS('../vendor/animsition/js/animsition.min.js');
      $this->loadJS('../vendor/select2/select2.min.js');
      $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
      $this->loadJS('../vendor/countdowntime/countdowntime.js');
      $this->loadJS('register.js');
      $data = $this->getHeaderData();

      //back to register page with error message
      $this->load->view('header', $data);
      $this->load->view('register');

    //the form is all correct
    }else {
      $this->loadCSS('login_result.css');
      $data = $this->getHeaderData();

      $this->setTitle("Register Checking");
      $this->load->view('header', $data);

      $this->load->model('User_model');
      //add new user to db
      $this->User_model->new_user($_POST['email'], $_POST['password'], $_POST['user_name'], $_POST['first_name'], $_POST['last_name']);

      //check the usertype
      //coach
      if (isset($_POST["is_coach"]) && $_POST["is_coach"] == 'on') {
        $this->load->model('Coach_model');
        //add new coach to db
        $this->Coach_model->new_coach($_POST['email'], $_POST['description'], $_POST['experience']);
      //student
      }else{
        $this->load->model('Student_model');
        //add new student to db
        $this->Student_model->new_student($_POST['email'], $_POST['interest'], $_POST['birthday'], $_POST['phone'], $_POST['description']);
      }
      $this->load->view('register_success');
    }
    $this->load->view('footer');
  }

  //for form validation username checking
  public function username_check($str)
  {
    //username cannot call 'admin'
    if ($str == 'admin') {
        $this->form_validation->set_message('username_check', 'The {field} field can not be the word "admin"');
        return FALSE;
    }else{
        return TRUE;
    }
  }

  public function forgot_check()
  {
    /*$username = $_POST["user_name"];

    $data = $this->getHeaderData();
    $data["user_name"] = $username;*/

    //$this->load->view('forgot_failure');

    $this->setTitle("Verifying Your Identity");
    $this->loadCSS('login_result.css');
    $data = $this->getHeaderData();
    $this->load->view('header', $data);
    $this->load->view('forgot_success');

    $this->load->view('footer');
  }

  //user logout
  public function logout()
  {
    //delete user information's cookie
    unset($_SESSION['user_name'], $_SESSION['email'], $_SESSION['usertype']);
    $data = array('logged_in' => FALSE);//set the 'logged_in' cookie to false
    $this->session->set_userdata($data);

    //redirect to index page
    echo '<script>alert("You Have Successfully Logout!");</script>';
    redirect(base_url(), 'refresh');
  }
}
?>
