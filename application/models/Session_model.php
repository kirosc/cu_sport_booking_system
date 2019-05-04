<?php
/**
 *
 */
class Session_model extends CI_Model
{
    //Attribute
    public $session_id;     //Primary Key
    public $start_time;
    public $venue_id;

    //Function
    //New Session (New Entry)
    public function new_session($start_time, $venue_id)
    {
        //session_id will be generated automatically
        $this->start_time = $start_time;
        $this->venue_id = $venue_id;

        $this->db->insert('session', $this);
    }

    //Update Session (Update Entry)
    public function update_session($session_id, $name, $datetime, $venue_id)
    {
        $this->name = $name;
        $this->datetime = $datetime;
        $this->venue_id = $venue_id;

        $this->db->where('session_id', $session_id);
        $this->db->update('session', $this);
    }

    //Delete Session (Delete Entry)
    public function delete_session($start_time, $venue_id)
    {
        $this->db->where('start_time', $start_time);
        $this->db->where('venue_id', $venue_id);
        $this->db->delete('session');
    }

    //retrun all sessions
    public function get_all_session()
    {
      $this->db->select('*');
      $this->db->from('session');
      $this->db->where('start_time >', 'NOW()');//only those sessions that the time still not pass
      $query = $this->db->get();

      $allsession = $query->result();
      $data = array();

      foreach ($allsession as $session) {
        $venue_id = $session->venue_id;
        $date = substr($session->start_time, 0, 10);
        $hour = substr($session->start_time, 11, 2);

        $j['venue_id'] = $venue_id;
        $j['date'] = $date;
        $j['hour'] = $hour;

        array_push($data, $j);
      }

      return $data;
    }

    //return all sessions that still not reserved
    public function get_available_session($venue_id = NULL)
    {
      //student account only provide 7 days session slots
      if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'student') {
        $sql = "SELECT * FROM `session`
          LEFT JOIN reserve ON session.session_id = reserve.session_id
          WHERE session.start_time > NOW() AND session.start_time < (NOW() + INTERVAL 7 DAY)";

      //coach account provide 14 days session slots
      }elseif (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'coach') {
        $sql = "SELECT * FROM `session`
          LEFT JOIN reserve ON session.session_id = reserve.session_id
          WHERE session.start_time > NOW() AND session.start_time < (NOW() + INTERVAL 14 DAY)";

      //provide all session slots that time not pass
      }else {
        $sql = "SELECT * FROM `session`
          LEFT JOIN reserve ON session.session_id = reserve.session_id
          WHERE session.start_time > NOW()";
      }

      //provide specific venue's session slots
      if ($venue_id != NULL) {
        $sql = $sql . " AND session.venue_id = " . $venue_id;
      }
      $query = $this->db->query($sql);

      $allsession = $query->result();
      $available = array();

      //filter all reserved session out
      foreach ($allsession as $session) {
        if ($session->email == NULL) {
          array_push($available, $session);
        }
      }
      return $available;
    }

    public function get_session_id($venue_id, $start_time)
    {
      $this->db->select('session_id');
      $this->db->from('session');
      $this->db->where('venue_id', $venue_id);
      $this->db->where('start_time', $start_time);
      $query = $this->db->get();

      return $query->result()[0];
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
    public function get_start_time($session_id)
    {
        $this->db->select('start_time');
        $this->db->where('session_id', $session_id);
        $query = $this->db->get('session');

        return $query->result()[0];
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
