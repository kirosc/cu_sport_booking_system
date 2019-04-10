<?php
/**
 *
 */
class Level_model extends CI_Model
{
    //Attribute
    public $level_id;      //Primary Key
    public $description;


    public function getLevel()
    {
      $this->db->select('*');
      $query = $this->db->get('level');

      return $query->result();
    }

    public function get_name($level_id)
    {
      $this->db->select('description');
      $this->db->where('level_id', $level_id);
      $query = $this->db->get('level');

      return $query->result()[0];
    }
}
?>
