<?php
/** 
 * 
 */
class Session_model extends CI_Model
{
    //Attribute
    public $session_id;     //Primary Key
    public $name;
    public $datetime;
    public $location;

    //Function
    //New Session (New Entry)
    public function new_session($name, $datetime, $location)
    {
        //session_id will be generated automatically
        $this->$name = $name;
        $this->$datetime = $datetime;
        $this->$location = $location;

        $this->db->insert('session', $this);
    }

    //Update Session (Update Entry)
    public function update_session($session_id, $name, $datetime, $location)
    {
        $this->$name = $name;
        $this->$datetime = $datetime;
        $this->$location = $location;

        $this->db->where('session_id', $session_id);
        $this->db->update('session', $this);
    }

    //Delete Session (Delete Entry)
    public function delete_session($session_id)
    {
        $this->db->where('session_id', $session_id);
        $this->db->delete('session');
    }

    //Get Name
    public function get_name($session_id)
    {
        $this->db->select('name');
        $this->db->where('session_id', $session_id);
        $query = $this->db->get('session');

        return $query->result();
    }

    //Get DateTime
    public function get_datetime($session_id)
    {
        $this->db->select('datetime');
        $this->db->where('session_id', $session_id);
        $query = $this->db->get('session');

        return $query->result();
    }

    //Get Location
    public function get_location($session_id)
    {
        $this->db->select('location');
        $this->db->where('session_id', $session_id);
        $query = $this->db->get('session');

        return $query->result();
    }
}