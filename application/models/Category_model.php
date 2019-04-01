<?php
/**
 *
 */
class Category_model extends CI_Model
{
    //Attribute
    public $category_id;      //Primary Key
    public $description;


    public function getCategory()
    {
      $this->db->select('*');
      $query = $this->db->get('category');

      return $query->result();
    }
}
?>
