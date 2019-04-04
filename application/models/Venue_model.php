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
    public $price;
    public $sports_id;
    public $college_id;

    //Function
    public function venue_search()
    {
      $this->db->select(
        'venue_id,
        college_id,
        venue.name AS venue,
        sports.name AS sport');
      $this->db->from('venue');
      $this->db->join('sports', 'sports.sports_id = venue.sports_id');
      $query = $this->db->get();


      return $query->result();
    }
}
?>
