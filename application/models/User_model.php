<?php
/**
 *
 */
class User_model extends CI_Model
{
    //Attribute
    public $email;          //Primary Key
    public $password;
    public $username;
    public $first_name;
    public $last_name;
    public $icon;

    //Function
    public function get_user_detail($username)
    {
      $this->db->select('user.email AS u, coach.email AS c, student.email AS s');
      $this->db->from('coach');
      $this->db->join('user', 'user.email = coach.email', 'right');
      $this->db->join('student', 'user.email = student.email', 'left');
      $this->db->where('user.username', $username);
      $query = $this->db->get();
      $result = $query->result()[0];

      if ($result->s != NULL) {
        $data['usertype'] = 'student';
        $this->db->select(
          "user.username AS username,
          user.password AS password,
          user.first_name AS first_name,
          user.last_name AS last_name,
          user.icon AS icon,
          student.interest AS interest,
          student.birthday AS birthday,
          student.phone_no AS phone,
          student.self_introduction AS intro
          ");
        $this->db->from('user');
        $this->db->join('student', 'user.email = student.email');
        $this->db->where('user.username', $username);
      }elseif ($result->c != NULL) {
        $data['usertype'] = 'coach';
        $this->db->select(
          "user.username AS username,
          user.password AS password,
          CONCAT(user.first_name, ' ', user.last_name) AS user_fullname,
          user.icon AS icon,
          coach.self_introduction AS intro,
          coach.experience AS experience
          ");
        $this->db->from('user');
        $this->db->join('coach', 'user.email = coach.email');
        $this->db->where('user.username', $username);
      }

      $fetch = $this->db->get();
      $data['db'] = $fetch->result()[0];
      return $data;

    }


    //New User (New Entry)
    public function new_user($email, $password, $username, $first_name, $last_name, $icon = "NA")
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->icon = $icon;

        $this->db->insert('user', $this);
    }

    //Update User (Update Entry)
    public function update_user($email, $password, $username, $first_name, $last_name, $icon)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->icon = $icon;

        $this->db->where('email', $email);
        $this->db->update('user', $this);
    }

    //Delete User (Delete Entry)
    public function delete_user($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user');
    }

    /*  This part no longer valid, saved for possible future use
    //Get Email address
    public function get_email($user_id)
    {
        $this->db->select('email');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');

        return $query->result();
    }*/

    //Get Password
    public function get_password($email)
    {
        $this->db->select('password');
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get UserName
    public function get_username($email)
    {
        $this->db->select('username');
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get First_Name
    public function get_first_name($email)
    {
        $this->db->select('first_name');
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get Second_Name
    public function get_last_name($email)
    {
        $this->db->select('last_name');
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get Icon
    public function get_icon($email)
    {
        $this->db->select('icon');
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        return $query->result();
    }
}

?>
