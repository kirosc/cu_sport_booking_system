<?php
/**
 *
 */
class User_model extends CI_Model
{
    //Attribute
    public $user_id;     //Assume this exist
    public $email;
    public $password;
    public $username;
    public $first_name;
    public $last_name;
    public $icon;

    //Function
    //New User (New Entry)
    public function new_user($email, $password, $username, $first_name, $last_name, $icon)
    {
        //user_id will be auto generated? It should be.
        $this->$email = $email;
        $this->$password = $password;
        $this->$username = $username;
        $this->$first_name = $first_name;
        $this->last_name = $last_name;
        $this->$icon = $icon;

        $this->db->insert('user', $this);
    }

    //Problem -- Email address can be updated by user
    //Update User (Update Entry)
    public function update_user($user_id, $email, $name, $icon)
    {
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $this);
    }

    //Delete User (Delete Entry)
    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user')
    }

    //Get Email address
    public function get_email($user_id)
    {
        $this->db->select('email');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get Password
    public function get_password($user_id)
    {
        $this->db->select('password');
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get Name
    public function get_name($user_id)
    {
        $this->db->select('name');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');

        return $query->result();
    }

    //Get Icon
    public function get_icon($user_id)
    {
        $this->db->select('icon');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');

        return $query->result();
    }
}

?>
