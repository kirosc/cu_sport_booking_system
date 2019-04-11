<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *test
 */
class Profile extends SBooking_Controller
{

  public function profile_main()
  {
    $this->load->model('User_model');
    $username = $this->uri->segment(2);

    $this->setTitle('Profile');
    $this->setNav('profile');

    $this->loadCSS('profile.css');

    $data = $this->getHeaderData();

    $data['user'] = $this->User_model->get_user_detail($username);

    $this->load->view('header', $data);
    $this->load->view('profile', $data);
    $this->load->view('footer');
  }

  public function schedule()
  {
    $this->load->model('Coach_model');
    $this->load->model('Student_model');

    $this->setTitle('Profile');
    $this->setNav('profile');

    $this->loadCSS('profile_schedule.css');

    $data = $this->getHeaderData();

    $data['username'] = $this->uri->segment(2);

    if ($_SESSION['usertype'] == 'coach') {
      $data['courses_student'] = array();
      $data['courses'] = $this->Coach_model->get_coach_schedule($_SESSION['email']);
      foreach ($data['courses'] as $course) {
        $join_student = $this->Coach_model->get_participate_student($course->course_id);
        array_push($data['courses_student'], $join_student);
      }
    }elseif ($_SESSION['usertype'] == 'student') {
      $data['courses_join'] = $this->Student_model->get_student_join_course($_SESSION['email']);
      $data['venues_book'] = $this->Student_model->get_student_book_venue($_SESSION['email']);
      $data['shares_join'] = $this->Student_model->get_student_join_share($_SESSION['email']);
    }

    $this->load->view('header', $data);
    $this->load->view('profile_schedule', $data);
    $this->load->view('footer');
  }

  public function edit_profile()
  {
    $this->load->model('User_model');

    $this->setTitle('Profile');
    $this->setNav('profile');

    $this->loadJS('libraries/moment.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
    $this->loadCSS('profile.css');

    $data = $this->getHeaderData();

    $data['user'] = $this->User_model->get_user_detail($_SESSION['username']);

    $this->load->view('header', $data);
    $this->load->view('profile_edit', $data);
    $this->load->view('footer');
  }

  public function update_profile()
  {
    $this->load->model('User_model');
    $this->load->model('Student_model');
    $this->load->model('Coach_model');

    $this->setTitle('Profile');
    $this->setNav('profile');

    $config = array(
      'upload_path' => "./images/user",
      'allowed_types' => "jpg|png|jpeg",
      'overwrite' => TRUE,
      'max_size' => "10485760", // Can be set to particular file size , here it is 10 MB
      'max_height' => "200",
      'max_width' => "200",
      'file_name' => $_SESSION['username'].".jpg"
    );

    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('icon'))
    {
      $this->loadJS('libraries/moment.js');
      $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
      $this->loadCSS('../vendor/daterangepicker/daterangepicker.css');
      $this->loadCSS('profile.css');
      $data = $this->getHeaderData();
      $data['user'] = $this->User_model->get_user_detail($_SESSION['username']);

      $data['error'] = array('error' => $this->upload->display_errors());
      $this->load->view('header', $data);
      $this->load->view('profile_edit', $data);
      $this->load->view('footer');
    }else{
      $icon = $this->upload->data('file_name');

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $password = $_POST['password'];
      $intro = $_POST['intro'];

      if ($_SESSION['usertype'] == 'student') {
        $interest = $_POST['interest'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $this->Student_model->update_student($_SESSION['email'], $interest, $birthday, $phone, $intro);
      }elseif ($_SESSION['usertype'] == 'coach') {
        $experience = $_POST['experience'];
        $this->Coach_model->update_coach($_SESSION['email'], $intro, $experience);
      }

      $this->User_model->update_user($_SESSION['email'], $password, $_SESSION['username'], $first_name, $last_name, $icon);

      echo '<script>alert("You Have Successfully updated profile!");</script>';
      redirect('profile/'.$_SESSION['username'], 'refresh');
    }

  }

  public function change_password()
  {
    $this->setTitle('Profile');

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
    $this->loadJS('libraries/moment.js');
    $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
    $this->loadJS('../vendor/countdowntime/countdowntime.js');
    $this->loadJS('register.js');

    $data = $this->getHeaderData();

    $this->load->view('header', $data);
    $this->load->view('change_password');
    $this->load->view('footer');
  }

  public function change_password_check()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('password', 'Password', 'required|trim|callback_old_password_check');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|trim');
    $this->form_validation->set_rules('new_passconf', 'New Password Confirmation', 'required|trim|matches[new_password]');

    if ($this->form_validation->run() == FALSE) {
      $this->setTitle('Profile');

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
      $this->loadJS('libraries/moment.js');
      $this->loadJS('../vendor/daterangepicker/daterangepicker.js');
      $this->loadJS('../vendor/countdowntime/countdowntime.js');
      $this->loadJS('register.js');

      $data = $this->getHeaderData();

      $this->load->view('header', $data);
      $this->load->view('change_password');
      $this->load->view('footer');
    }else{
      $this->load->model('User_model');
      $this->User_model->update_password($_SESSION['username'], $_POST['new_password']);
      echo '<script>alert("You Have Successfully Change the Password!");</script>';
      redirect('home', 'refresh');
    }
  }

  public function old_password_check($value)
  {
    $this->load->model('User_model');
    $result = $this->User_model->get_password($_SESSION['email'])->password;

    if ($result != $value) {
      $this->form_validation->set_message('old_password_check', 'Wrong Password!');
      return FALSE;
    }else{
      return TRUE;
    }
  }
}

?>
