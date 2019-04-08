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

    $data = $this->getHeaderData();

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $icon = $_POST['icon'];
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

?>
