<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Student_model extends User_model
{
    //Attribute
    public $email;                  //Primary Key
    public $interest;
    public $birthday;
    public $phone_no;
    public $self_introduction;

    //Function
    //New User & Student (New Entry)
    public function new_student($email, $password, $username, $first_name, $last_name, $icon, $interest, $birthday, $phone_no, $self_introduction)
    {
        $this->$email = $email;
        $this->$password = $password;
        $this->$username = $username;
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$icon = $icon;
        $this->$interest = $interest;
        $this->$birthday = $birthday;
        $this->$phone_no = $phone_no;
        $this->$self_introduction = $self_introduction;

        $this->db->insert('user', $User_model);
        $this->db->insert('student', $this);
    }

    //Warning - User can't change their email
    //Update User & Student (Update Entry)
    public function update_admin($email, $password, $username, $first_name, $last_name, $icon, $interest, $birthday, $phone_no, $self_introduction)
    {
        $this->$password = $password;
        $this->$username = $username;
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$icon = $icon;
        $this->$interest = $interest;
        $this->$birthday = $birthday;
        $this->$phone_no = $phone_no;
        $this->$self_introduction = $self_introduction;

        $this->db->where('email', $email);
        $this->db->update('user', $User_model);

        $this->db->where('email', $email);
        $this->db->update('student', $this);
    }

    //Delete Student (Delete Entry)
    public function delete_student($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user')

        $this->db->where('email', $email);
        $this->db->delete('student')
    }

    //Get Interest
    public function get_interest($email)
    {
        $this->db->select('interest');
        $this->db->where('email', $email);
        $query = $this->db->get('student');

        return $query->result();
    }

    //Get Birthday
    public function get_experience($email)
    {
        $this->db->select('birthday');
        $this->db->where('email', $email);
        $query = $this->db->get('student');

        return $query->result();
    }

    //Get Phone Number
    public function get_phone_no($email)
    {
        $this->db->select('phone_no');
        $this->db->where('email', $email);
        $query = $this->db->get('student');

        return $query->result();
    }

    //Get Self Intro
    public function get_self_introduction($email)
    {
        $this->db->select('self_introduction');
        $this->db->where('email', $email);
        $query = $this->db->get('student');

        return $query->result();
    }
}

?>
