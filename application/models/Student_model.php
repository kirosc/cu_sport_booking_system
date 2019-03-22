<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Student_model extends User_model
{
    //Attribute
    public $interest;
    public $birthday;
    public $phone_no;
    public $self_introduction;

    //Function
    //New User & Student (New Entry)
    public function new_student($email, $name, $icon, $interest, $birthday, $phone_no, $self_introduction)
    {
        //user_id will be auto generated?
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;
        $this->$interest = $interest;
        $this->$birthday = $birthday;
        $this->$phone_no = $phone_no;
        $this->$self_introduction = $self_introduction;

        $this->db->insert('user', $User_model);
        $this->db->insert('student', $this);
    }

    //Problem -- Email address can be updated by user
    //Update User & Student (Update Entry)
    public function update_admin($user_id, $email, $name, $icon, $interest, $birthday, $phone_no, $self_introduction)
    {
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;
        $this->$interest = $interest;
        $this->$birthday = $birthday;
        $this->$phone_no = $phone_no;
        $this->$self_introduction = $self_introduction;

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $User_model);

        $this->db->where('user_id', $user_id);
        $this->db->update('student', $this);

    }

    //Delete Student (Delete Entry)
    public function delete_student($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user')

        $this->db->where('user_id', $user_id);
        $this->db->delete('student')
    }

    //Get Interest
    public function get_interest($user_id)
    {
        $this->db->select('interest');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('student');

        return $query->result();
    }

    //Get Birthday
    public function get_experience($user_id)
    {
        $this->db->select('birthday');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('student');

        return $query->result();
    }

    //Get Phone Number
    public function get_phone_no($user_id)
    {
        $this->db->select('phone_no');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('student');

        return $query->result();
    }

    //Get Self Intro
    public function get_self_introduction($user_id)
    {
        $this->db->select('self_introduction');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('student');

        return $query->result();
    }
}

?>
