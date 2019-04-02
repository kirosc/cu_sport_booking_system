<?php
/**
 *
 */
class Participate_model extends CI_Model
{
    //Attribute
    public $email;      //Primary Key
    public $course_id;
    public $payment_method;


    public function countParticipateByCourseID($course_id)
    {
      $this->db->from('participate');
      $this->db->where('course_id', $course_id);

      return $this->db->count_all_results();
    }

    public function newParticipate($email, $course_id, $payment_method='Credit Card')
    {
        $this->email = $email;
        $this->course_id = $course_id;
        $this->payment_method = $payment_method;

        $this->db->insert('participate', $this);
    }
}
?>
