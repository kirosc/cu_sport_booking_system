<?php
/**
 *
 */
class Private_session_model extends CI_Model
{
    //Attribute
    public $session_id;      //Primary Key
    public $price;


    public function new_private_session($session_id, $price)
    {
      $this->session_id = $session_id;
      $this->price = $price;

      $this->db->insert('private_session', $this);
    }
}
?>
