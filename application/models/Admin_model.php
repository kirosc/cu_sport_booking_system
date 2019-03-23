<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Admin_model extends User_model
{
    //Attribute
    public $email;      //Primary Key

    //Function
    //New User & Admin (New Entry)
    public function new_admin($email, $password, $username, $first_name, $last_name, $icon)
    {
        $this->$email = $email;
        $this->$password = $password;
        $this->$username = $username;
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$icon = $icon;

        $this->db->insert('user', $User_model);
        $this->db->insert('admin', $this);
    }

    //Warning - User can't change their email
    //Update User & Admin (Update Entry)
    public function update_admin($email, $password, $username, $first_name, $last_name, $icon)
    {
        $this->$password = $password;
        $this->$username = $username;
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$icon = $icon;

        $this->db->where('email', $email);
        $this->db->update('user', $User_model);

        $this->db->where('email', $email);
        $this->db->update('admin', $this);

    }

    //Delete Admin (Delete Entry)
    public function delete_admin($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user');

        $this->db->where('email', $email);
        $this->db->delete('admin');
    }
}

?>