<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }



    public function getAllItems()
    {
        $query = $this -> db -> query('SELECT uvent_event.*, uvent_university.university as university_name FROM uvent_event INNER JOIN uvent_university ON uvent_event.university = uvent_university.id');
        return $query->result();
    }

    public function  getAllItemsByPromoter($id) {
        $query = $this -> db -> query('SELECT uvent_event.*, uvent_university.university as university_name FROM uvent_event INNER JOIN uvent_university ON uvent_event.university = uvent_university.id WHERE user_id = ' . $id);
        return $query->result();
    }

    public function totalCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as Total FROM uvent_event");
        return $query->row()->Total;
    }

    public function getItemByID($id)
    {
        $query = $this -> db -> query('SELECT * FROM uvent_event WHERE id = ' . $id);

        return $query->row();
    }

    public function getItemToPrint($id)
    {
        $query = $this -> db -> query('SELECT uvent_event.*, uvent_user.firstname, uvent_user.surname FROM uvent_event INNER JOIN uvent_user ON uvent_event.user_id = uvent_user.id WHERE uvent_event.id = ' . $id);

        return $query->row();
    }

    public function getListGuest($id)
    {
        $query = $this -> db -> query('SELECT uet.id,uet.no_of_ticket,uet.created,tick.ticket_name,user.firstname,user.firstname,user.surname,user.student_no,u.university FROM `uvent_event_ticket` as uet

            join `tickets` as tick

            on (tick.id = uet.ticket_id)

            join `uvent_user` as user

            on(user.id = uet.user_id)

            join `uvent_event` as ev

            on(ev.id = uet.event_id)

            join `uvent_university` as u

            on(u.id = user.university)  where uet.event_id =' . $id . ' ORDER BY `uet`.`id` DESC');

        return $query->result();
    }

    public function getUniqueCode($id) {
        $query = $this -> db -> query('select * from `ticket_code` where purchased_ticket_id = ' . $id);

        return $query->result();

    }



    public function isExistItem($id){
        $query = $this -> db -> query('SELECT * FROM uvent_event WHERE id = ' . $id);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

     public function removeItem($id)
    {
        $data = array(
               'id' => $id
            );
        $rs = $this->db->delete("uvent_event", $data);
        if ($rs) {
            //Remove tickets
        }
        return $rs;
    }

    public function addItem( $name, $logo, $date, $start_time, $end_time, $venue, $postcode, $info, $uni,  $admin)
    {
        $id = -1;
        $time = $start_time . " - " . $end_time;
        $data = array(
                'event_name' => $name,
                'event_pic' => $logo,
                'event_date' => $date,
                'event_time' => $time,
                'event_start_time' => $start_time,
                'event_end_time' => $end_time,
                'event_venue' => $venue,
                'postcode' => $postcode,
                'venue_information' => $info,
                'university' => $uni,
                'user_id' => $admin
            );

        $query = $this -> db -> insert("uvent_event", $data);
        if($query){
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function editItem($id, $name, $logo, $date, $start_time, $end_time, $venue, $postcode, $info, $uni,  $admin)
    {
      $time = $start_time . " - " . $end_time;
        $data = array(
                'event_name' => $name,
                'event_pic' => $logo,
                'event_date' => $date,
                'event_time' => $time,
                'event_start_time' => $start_time,
                'event_end_time' => $end_time,
                'event_venue' => $venue,
                'postcode' => $postcode,
                'venue_information' => $info,
                'university' => $uni,
                'user_id' => $admin
            );
        $this->db->where('id', $id);
        return $this->db->update("uvent_event", $data);
    }



}
