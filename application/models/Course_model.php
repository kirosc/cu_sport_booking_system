<?php
/**
 *
 */
class Course_model extends CI_Model
{
    //Attribute
    public $course_id;
    public $name;
    public $datetime;
    public $category_id;
    public $location;
    public $price;
    public $available_seats;
    public $description;
    public $level_id;
    public $email;

    //Function
    public function courseSearch()
    {
      $this->db->select('name, datetime, location, price, available_seats, description');
      $query = $this->db->get('course');

      return $query->result();
    }
}
