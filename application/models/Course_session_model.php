<?php
/**
 *
 */
class Course_session_model extends CI_Model
{
    //Attribute
    public $course_id;      //Primary Key
    public $session_id;

    //Function
    public function new_course_session($course_id, $session_id)
    {
        $this->course_id = $course_id;
        $this->session_id = $session_id;

        $this->db->insert('course_session', $this);
    }
}
?>
