<?php
/**
 *
 */
class Level_model extends CI_Model
{
    //Attribute
    public $level_id;      //Primary Key
    public $description;

    //get level id
    public function getLevel()
    {
      $this->db->select('*');
      $query = $this->db->get('level');

      return $query->result();
    }

    //get level's name
    public function get_name($level_id)
    {
      $this->db->select('description');
      $this->db->where('level_id', $level_id);
      $query = $this->db->get('level');

      return $query->result()[0];
    }
}
?>
