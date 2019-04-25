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
    //return venue name based on its id
    public function get_name($venue_id)
    {
      $this->db->select('name AS venue');
      $this->db->from('venue');
      $this->db->where('venue_id', $venue_id);
      $query = $this->db->get();
      return $query->result()[0];
    }

    //return search result of the venues' name
    public function venue_search($college_id = '', $sports_id = '')
    {
      $this->db->select('venue_id, name AS venue');
      $this->db->from('venue');
      //use college to search related venues
      if ($college_id != '') {
        $this->db->where('college_id', $college_id);
      }
      //use sport type to search related venues
      if ($sports_id != '') {
        $this->db->where('sports_id', $sports_id);
      }
      $query = $this->db->get();
      return $query->result();
    }

    //return venue's price
    public function get_venue_price($venue_id)
    {
      $this->db->select('price');
      $this->db->from('venue');
      $this->db->where('venue_id', $venue_id);
      $query = $this->db->get();
      return $query->result()[0];
    }
}
?>
