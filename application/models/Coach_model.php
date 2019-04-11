<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Coach_model extends CI_Model
{
    //Attribute
    public $email;                  //Primary Key
    public $self_introduction;
    public $experience;

    //Function
    //New User & Coach (New Entry)
    public function new_coach($email, $self_introduction="NA", $experience="NA")
    {
        $this->email = $email;
        $this->self_introduction = $self_introduction;
        $this->experience = $experience;

        $this->db->insert('coach', $this);
    }

    //Warning - User can't change their email
    //Update User & Coach (Update Entry)
    public function update_coach($email, $self_introduction, $experience)
    {
        $this->email = $email;
        $this->self_introduction = $self_introduction;
        $this->experience = $experience;

        $this->db->where('email', $email);
        $this->db->update('coach', $this);

    }

    //Delete Coach (Delete Entry)
    public function delete_coach($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('coach');

        $this->db->where('email', $email);
        $this->db->delete('user');
    }

    //Get Self Intro
    public function get_self_introduction($email)
    {
        $this->db->select('self_introduction');
        $this->db->where('email', $email);
        $query = $this->db->get('coach');

        return $query->result();
    }

    //Get Experience
    public function get_experience($email)
    {
        $this->db->select('experience');
        $this->db->where('email', $email);
        $query = $this->db->get('coach');

        return $query->result();
    }

    public function get_coach_schedule($email)
    {
      $this->db->select(
        'course.course_id AS course_id,
        course.name AS course_name,
        course.start_time AS start_time,
        course.end_time AS end_time,
        venue.name AS venue,
        sports.name AS sport,
        course.price AS price,
        course.available_seats AS seats,
        level.description AS level');
      $this->db->from('course');
      $this->db->join('course_session', 'course_session.course_id = course.course_id');
      $this->db->join('session', 'session.session_id = course_session.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->join('level', 'level.level_id = course.level_id');
      $this->db->where('course.email', $email);
      $this->db->group_by('course.course_id');
      $query = $this->db->get();

      return $query->result();
    }

    public function get_participate_student($course_id)
    {
      $this->db->select('
        user.first_name AS first_name,
        user.last_name AS last_name,
      ');
      $this->db->from('participate');
      $this->db->join('user', 'participate.email = user.email');
      $this->db->where('participate.course_id', $course_id);
      $query = $this->db->get();

      return $query->result();
    }
}

?>
