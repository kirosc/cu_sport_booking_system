<?php
/**
 *
 */
//Missing Database entry
class Venue_model extends CI_Model
{
    //Attribute
    public $venue_id;
    public $name;
    public $map;
    public $price;
    public $sports_id;
    public $college_id;

    //Function
    public function venue_search($college_id = '', $sports_id = '')
    {
      $this->db->select('venue_id, name AS venue');
      $this->db->from('venue');
      if ($college_id != '') {
        $this->db->where('college_id', $college_id);
      }
      if ($sports_id != '') {
        $this->db->where('sports_id', $sports_id);
      }
      $query = $this->db->get();
      return $query->result();
    }
}
?>
