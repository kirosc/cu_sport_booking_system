<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Admin_model extends User_model
{
    //Function
    //New User & Admin (New Entry)
    public function new_admin($email, $name, $icon)
    {
        //user_id will be auto generated?
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;

        $this->db->insert('user', $User_model);
        $this->db->insert('admin', $this);
    }

    //Problem -- Email address can be updated by user
    //Update User & Admin (Update Entry)
    public function update_admin($user_id, $email, $name, $icon)
    {
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $User_model);

        $this->db->where('user_id', $user_id);
        $this->db->update('admin', $this);

    }

    //Delete Admin (Delete Entry)
    public function delete_admin($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user')

        $this->db->where('user_id', $user_id);
        $this->db->delete('admin')
    }
}

?>