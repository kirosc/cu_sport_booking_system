<?php
/**
 *
 */
class Course_model extends CI_Model
{
    //Attribute
    public $course_id;      //Primary Key
    public $name;
    public $start_time;
    public $end_time;
    public $price;
    public $available_seats;
    public $description;
    public $image;
    public $level_id;
    public $email;

    //Function
    //New Course (New Entry)
    public function new_course($name, $start_time, $end_time, $price, $available_seats, $description, $level_id, $email, $image='default.jpg')
    {
        //course_id will be generated automatically
        $this->name = $name;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->price = $price;
        $this->available_seats = $available_seats;
        $this->description = $description;
        $this->image = $image;
        $this->level_id = $level_id;
        $this->email = $email;

        $this->db->insert('course', $this);
    }

    //Update Course (Update Entry)
    public function update_course($course_id, $name, $start_time, $end_time, $price, $available_seats, $description, $level_id, $email, $image='')
    {
      $this->name = $name;
      $this->start_time = $start_time;
      $this->end_time = $end_time;
      $this->price = $price;
      $this->available_seats = $available_seats;
      $this->description = $description;
      $this->image = $image;
      $this->level_id = $level_id;
      $this->email = $email;

        $this->db->where('course_id', $course_id);
        $this->db->update('course', $this);
    }

    //Delete Course (Delete Entry)
    public function delete_course($course_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->delete('course');
    }

    //Search for Course
    public function course_search()
    {
      $this->db->select(
        'course.course_id AS course_id,
        course.name AS course_name,
        course.start_time AS start_time,
        course.end_time AS end_time,
        college.name AS college,
        venue.name AS venue,
        course.price AS price,
        course.available_seats AS seats,
        course.description AS description,
        sports.image AS course_image');
      $this->db->from('course');
      $this->db->join('course_session', 'course_session.course_id = course.course_id', 'right');
      $this->db->join('session', 'session.session_id = course_session.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('college', 'college.college_id = venue.college_id');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->where('course.start_time >', 'NOW()');
      $this->db->group_by('course_id');
      $query = $this->db->get();

      return $query->result();
    }

    public function get_course_detail_by_courseid($course_id)
    {
      $this->db->select(
        'course.course_id AS course_id,
        course.name AS course_name,
        course.start_time AS start_time,
        course.end_time AS end_time,
        venue.name AS venue,
        college.name AS college,
        college.image AS college_image,
        sports.name AS sport,
        course.price AS price,
        course.available_seats AS seats,
        course.description AS description,
        level.description AS level,
        CONCAT(user.first_name, " ", user.last_name) AS coach,
        user.username AS coach_username,
        user.icon AS coach_icon,
        course.image AS course_image,
        venue.map AS map');
      $this->db->from('course');
      $this->db->join('course_session', 'course_session.course_id = course.course_id');
      $this->db->join('session', 'session.session_id = course_session.session_id');
      $this->db->join('venue', 'venue.venue_id = session.venue_id');
      $this->db->join('college', 'college.college_id = venue.college_id');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $this->db->join('level', 'level.level_id = course.level_id');
      $this->db->join('user', 'user.email = course.email');
      $this->db->where('course.course_id', $course_id);
      $query = $this->db->get();

      return $query->result()[0];
    }

    public function get_price_by_id($course_id)
    {
      $this->db->select('price');
      $this->db->where('course_id', $course_id);
      $query = $this->db->get('course');

      return $query->result()[0];
    }

    public function get_course_id($name, $start_time, $end_time, $email)
    {
      $this->db->select('course_id');
      $this->db->where('name', $name);
      $this->db->where('start_time', $start_time);
      $this->db->where('end_time', $end_time);
      $this->db->where('email', $email);
      $query = $this->db->get('course');

      return $query->result()[0];
    }
}
?>
