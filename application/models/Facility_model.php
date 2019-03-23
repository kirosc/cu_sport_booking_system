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
}
