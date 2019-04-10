<?php
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
}

?>
