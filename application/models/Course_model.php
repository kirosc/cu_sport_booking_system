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
      $this->db->select('course.name AS course_name, course.start_time, course.end_time, location.name AS location_name, course.price, course.available_seats, course.description');
      $this->db->from('course');
      $this->db->join('location', 'location.location_id = course.location_id');
      $query = $this->db->get();

      return $query->result();
    }
}
