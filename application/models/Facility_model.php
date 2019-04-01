<?php
/**
 *
 */
//Missing Database entry
class Facility_model extends CI_Model
{
    //Attribute
    public $location_id;
    public $name;
    public $photo;

    //Function
    public function facilitySearch()
    {
      $this->db->select('location_id, name, photo');
      $query = $this->db->get('location');

      return $query->result();
    }

    public function facilitySearchById($course_id)
    {
      $this->db->select('location.name AS name, location.photo AS photo');
      $this->db->from('location');
      $this->db->join('course', 'course.location_id = location.location_id');
      $this->db->where('course_id', $course_id);
      $query = $this->db->get();

      return $query->result()[0];
    }
}
?>
