<?php
/**
 *
 */
class Share_model extends CI_Model
{
    //Attribute
    public $email;      //Primary Key
    public $session_id;


    public function get_share_by_id($session_id, $method)
    {
      $this->db->from('share');
      $this->db->where('session_id', $session_id);

      if ($method == 0) {
        return $this->db->get()->result();
      }elseif ($method == 1) {
        return $this->db->count_all_results();
      }
    }

    public function new_share($email, $session_id)
    {
        $this->email = $email;
        $this->session_id = $session_id;

        $this->db->insert('share', $this);
    }
}
?>
