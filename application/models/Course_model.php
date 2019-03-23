<?php
/**
 *
 */
class Course_model extends CI_Model
{
    //Attribute
    public $course_id;
    public $name;
    public $start_time;
    public $end_time;
    public $category_id;
    public $location_id;
    public $price;
    public $available_seats;
    public $description;
    public $level_id;
    public $email;

    //Function
    public function courseSearch()
    {
      $this->db->select('course_id, course.name AS course_name, course.start_time, course.end_time, location.name AS location_name, course.price, course.available_seats, course.description');
      $this->db->from('course');
      $this->db->join('location', 'location.location_id = course.location_id');
      $query = $this->db->get();

      return $query->result();
    }

    public function getCourseById($course_id)
    {
      $this->db->select('course.course_id, course.name AS name, course.start_time AS start_time, course.end_time AS end_time, category.description AS category, location.name AS location, course.price AS price, course.available_seats AS available_seats, course.description AS description, level.description AS level, course.email');
      $this->db->from('course');
      $this->db->join('location', 'location.location_id = course.location_id');
      $this->db->join('category', 'category.category_id = course.category_id');
      $this->db->join('level', 'level.level_id = course.level_id');
      $this->db->where('course.course_id', $course_id);
      $query = $this->db->get();

      return $query->result()[0];
    }
}
?>
