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
    public $category_id;
    public $location_id;
    public $price;
    public $available_seats;
    public $description;
    public $level_id;
    public $email;

    //Function
    //New Course (New Entry)
    public function new_course($name, $start_time, $end_time, $category_id, $location_id, $price, $available_seats, $description, $level_id, $email)
    {
        //course_id will be generated automatically
        $this->$name = $name;
        $this->$start_time = $start_time;
        $this->$end_time = $end_time;
        $this->$category_id = $category_id;
        $this->$location_id = $location_id;
        $this->$price = $price;
        $this->$available_seats = $available_seats;
        $this->$description = $description;
        $this->$level_id = $level_id;
        $this->$email = $email;

        $this->db->insert('course', $this);
    }

    //Update Course (Update Entry)
    public function update_course($course_id, $name, $start_time, $end_time, $category_id, $location_id, $price, $available_seats, $description, $level_id, $email)
    {
      $this->$name = $name;
      $this->$start_time = $start_time;
      $this->$end_time = $end_time;
      $this->$category_id = $category_id;
      $this->$location_id = $location_id;
      $this->$price = $price;
      $this->$available_seats = $available_seats;
      $this->$description = $description;
      $this->$level_id = $level_id;
      $this->$email = $email;

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
    public function courseSearch()
    {
      $this->db->select('course.name AS course_name, course.start_time, course.end_time, location.name AS location_name, course.price, course.available_seats, course.description');
      $this->db->from('course');
      $this->db->join('location', 'location.location_id = course.location_id');
      $query = $this->db->get();

      return $query->result();
    }
}
