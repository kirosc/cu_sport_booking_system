<?php
/**
 *
 */
//Missing Database entry
class Sports_model extends CI_Model
{
    //Attribute
    public $sports_id;
    public $name;
    public $share;

    //Function
    public function get_sports()
    {
      $this->db->select('sports_id, name');
      $query = $this->db->get('sports');

      return $query->result();
    }
}
?>
