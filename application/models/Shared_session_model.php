<?php
/**
 *
 */
class Shared_session_model extends CI_Model
{
    //Attribute
    public $session_id;      //Primary Key
    public $available_seats;
    public $description;

    public function new_shared_session($session_id, $available_seats, $description)
    {
      $this->session_id = $session_id;
      $this->available_seats = $available_seats;
      $this->description = $description;

      $this->db->insert('shared_session', $this);
    }

    // SELECT
    // session.session_id,
    // shared_session.available_seats AS seats,
    // shared_session.description AS description,
    // session.start_time AS start_time,
    // reserve.email AS host_email,
    // venue.name AS venue,
    // college.name AS college,
    // college.image AS college_image,
    // sports.name AS sport,
    // CONCAT(user.first_name, ' ', user.last_name) AS user_fullname,
    // student.phone_no AS phone_no
    // FROM `shared_session`
    // JOIN session ON session.session_id = shared_session.session_id
    // JOIN reserve ON session.session_id = reserve.session_id
    // JOIN venue ON venue.venue_id = session.venue_id
    // JOIN college ON college.college_id = venue.college_id
    // JOIN sports ON sports.sports_id = venue.sports_id
    // JOIN user ON reserve.email = user.email
    // JOIN student ON student.email = user.email


    public function get_shared_session()
    {

      $this->db->select(
        "session.session_id,
        shared_session.available_seats AS seats,
        shared_session.description AS description,
        session.start_time AS start_time,
        reserve.email AS host_email,
        venue.name AS venue,
        college.name AS college,
        college.image AS college_image,
        sports.name AS sport,
        user.username AS host,
        CONCAT(user.first_name, ' ', user.last_name) AS user_fullname,
        student.phone_no AS phone_no
        ");
      $this->db->from('shared_session');
      $this->db->join('session', 'session.session_id = shared_session.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('college', 'college.college_id = venue.college_id');
      $this->db->join('reserve', 'shared_session.session_id = reserve.session_id');
      $this->db->join('user', 'reserve.email = user.email');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->join('student', 'student.email = user.email');
      $query = $this->db->get();

      return $query->result();
    }

    public function get_shared_session_by_id($session_id)
    {
      $this->db->select(
        "session.session_id,
        shared_session.available_seats AS seats,
        shared_session.description AS description,
        session.start_time AS start_time,
        reserve.email AS host_email,
        venue.name AS venue,
        college.name AS college,
        college.image AS college_image,
        sports.name AS sport,
        user.username AS host,
        CONCAT(user.first_name, ' ', user.last_name) AS user_fullname,
        student.phone_no AS phone_no
        ");
      $this->db->from('shared_session');
      $this->db->join('session', 'session.session_id = shared_session.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('college', 'college.college_id = venue.college_id');
      $this->db->join('reserve', 'shared_session.session_id = reserve.session_id');
      $this->db->join('user', 'reserve.email = user.email');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->join('student', 'student.email = user.email');
      $this->db->where('shared_session.session_id', $session_id);
      $query = $this->db->get();

      return $query->result()[0];
    }
}
?>
