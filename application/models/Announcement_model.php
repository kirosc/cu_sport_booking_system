<?php
/**
 *
 */
class Announcement_model extends CI_Model
{
    //Attribute
    public $id;      //Primary Key
    public $name;
    public $description;
    public $details;
    public $image;

    public function get_announcement()
    {
      $this->db->select(
        'announcement.id AS id,
        announcement.name AS name,
        announcement.description AS description,
        announcement.details AS details,
        announcement.image AS image');
      $this->db->from('announcement');
      $query = $this->db->get();

      return $query->result();
    }

    public function get_announcement_by_id($announ_id)
    {
      $this->db->select('
        announcement.id AS id,
        announcement.name AS name,
        announcement.description AS description,
        announcement.details AS details,
        announcement.image AS image');
      $this->db->from('announcement');
      $this->db->where('announcement.id', $announ_id);
      $query = $this->db->get();

      return $query->result()[0];
    }
}
?>
