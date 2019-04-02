<?php
/**
 *
 */
class Reserve_model extends CI_Model
{
    //Attribute
    public $email;      //Primary Key
    public $session_id;
    public $payment_method;


    public function newReserve($email, $session_id, $payment_method='Credit Card')
    {
        $this->email = $email;
        $this->session_id = $session_id;
        $this->payment_method = $payment_method;

        $this->db->insert('reserve', $this);
    }
}
?>
