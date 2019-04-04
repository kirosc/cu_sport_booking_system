<?php
/**
 *
 */
//Missing Database entry
class College_model extends CI_Model
{
    //Attribute
    public $college_id;
    public $name;
    public $image;

    //Function
    public function college_search()
    {
      $this->db->select('college_id, name, image');
      $query = $this->db->get('college');

      return $query->result();
    }

    public function college_search_by_courseid($course_id)
    {
      $this->db->select('college.name AS name, college.image AS image');
      $this->db->from('college');
      $this->db->join('course', 'course.location_id = location.location_id');
      $this->db->where('course_id', $course_id);
      $query = $this->db->get();

      return $query->result()[0];
    }
}
?>
