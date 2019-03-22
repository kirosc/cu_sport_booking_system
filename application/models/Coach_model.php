<?php
/**
 *
 */
require_once(APPPATH . "/models/User_model.php");
class Coach_model extends User_model
{
    //Attribute
    public $self_introduction;
    public $experience;

    //Function
    //New User & Coach (New Entry)
    public function new_coach($email, $name, $icon, $self_introduction, $experience)
    {
        //user_id will be auto generated?
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;
        $this->$self_introduction = $self_introduction;
        $this->$experience = $experience;

        $this->db->insert('user', $User_model);
        $this->db->insert('coach', $this);
    }

    //Problem -- Email address can be updated by user
    //Update User & Coach (Update Entry)
    public function update_coach($user_id, $email, $name, $icon, $self_introduction, $experience)
    {
        $this->$email = $email;
        $this->$name = $name;
        $this->$icon = $icon;
        $this->$self_introduction = $self_introduction;
        $this->$experience = $experience;

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $User_model);

        $this->db->where('user_id', $user_id);
        $this->db->update('coach', $this);

    }

    //Delete Coach (Delete Entry)
    public function delete_coach($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user')

        $this->db->where('user_id', $user_id);
        $this->db->delete('coach')
    }

    //Get Self Intro
    public function get_self_introduction($user_id)
    {
        $this->db->select('self_introduction');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('coach');

        return $this->db->query($query)->result();
    }

    //Get Experience
    public function get_experience($user_id)
    {
        $this->db->select('experience');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('coach');

        return $this->db->query($query)->result();
    }
}

?>