<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Student_model extends CI_Model
{
    //Attribute
    public $email;                  //Primary Key
    public $interest;
    public $birthday;
    public $phone_no;
    public $self_introduction;

    //Function
    //New User & Student (New Entry)
    public function new_student($email, $interest='NA', $birthday='NA', $phone_no='NA', $self_introduction='NA')
    {
        $this->email = $email;
        $this->interest = $interest;
        $this->birthday = $birthday;
        $this->phone_no = $phone_no;
        $this->self_introduction = $self_introduction;

        $this->db->insert('student', $this);
    }

    //Warning - User can't change their email
    //Update User & Student (Update Entry)
    public function update_student($email, $interest, $birthday, $phone_no, $self_introduction)
    {
        $this->email = $email;
        $this->interest = $interest;
        $this->birthday = $birthday;
        $this->phone_no = $phone_no;
        $this->self_introduction = $self_introduction;

        $this->db->where('email', $email);
        $this->db->update('student', $this);
    }

    //Delete Student (Delete Entry)
    public function delete_student($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('student');

        $this->db->where('email', $email);
        $this->db->delete('user');
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

    public function get_student_join_course($email)
    {
      $this->db->select(
        'course.course_id AS course_id,
        course.name AS course_name,
        course.start_time AS start_time,
        course.end_time AS end_time,
        venue.name AS venue,
        sports.name AS sport,
        level.description AS level');
      $this->db->from('participate');
      $this->db->join('course', 'course.course_id = participate.course_id');
      $this->db->join('course_session', 'course_session.course_id = course.course_id');
      $this->db->join('session', 'session.session_id = course_session.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->join('level', 'level.level_id = course.level_id');
      $this->db->where('participate.email', $email);
      $this->db->group_by('course.course_id');
      $query = $this->db->get();

      return $query->result();
    }

    public function get_student_book_venue($email)
    {
      $this->db->select(
        'session.session_id AS session_id,
        session.start_time AS start_time,
        venue.name AS venue,
        sports.name AS sport');
      $this->db->from('reserve');
      $this->db->join('session', 'session.session_id = reserve.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->where('reserve.email', $email);
      $query = $this->db->get();

      return $query->result();
    }

    public function get_student_join_share($email)
    {
      $this->db->select(
        'session.session_id AS session_id,
        session.start_time AS start_time,
        venue.name AS venue,
        sports.name AS sport,
        user.first_name AS first_name,
        user.last_name AS last_name');
      $this->db->from('share');
      $this->db->join('session', 'session.session_id = share.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->join('reserve', 'reserve.session_id = session.session_id');
      $this->db->join('user', 'user.email = reserve.email');
      $this->db->where('share.email', $email);
      $query = $this->db->get();

      return $query->result();
    }
}

?>
