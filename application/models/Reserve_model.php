<?php
/**
 *
 */
class Reserve_model extends CI_Model
{
    //Attribute
    public $email;      //Primary Key
    public $session_id;


    public function new_reserve($email, $session_id)
    {
        $this->email = $email;
        $this->session_id = $session_id;

        $this->db->insert('reserve', $this);
    }
}
?>
