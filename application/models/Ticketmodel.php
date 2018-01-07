<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function getAllItems()
    {
        $query = $this -> db -> query('SELECT tickets.*, uvent_event.event_name  FROM tickets INNER JOIN uvent_event ON tickets.event_id = uvent_event.id');
        return $query->result();
    }

    public function  getAllItemsByPromoter($id) {
        $query = $this -> db -> query('SELECT tickets.*, uvent_event.event_name  FROM tickets INNER JOIN uvent_event ON tickets.event_id = uvent_event.id WHERE uvent_event.user_id = ' . $id);
        return $query->result();
    }

    public function getItemByID($id)
    {
        $query = $this -> db -> query('SELECT tickets.*, uvent_event.event_name, uvent_event.id as event_id  FROM tickets INNER JOIN uvent_event ON tickets.event_id = uvent_event.id WHERE tickets.id = ' . $id);

        return $query->row();

    }

    public function isExistItem($id){
        $query = $this -> db -> query('SELECT * FROM tickets WHERE id = ' . $id);
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
        return $this->db->delete("tickets", $data);
    }

    public function addItem($admin, $event, $name, $price, $quantity)
    {
        $id = -1;
        $data = array(
                'event_id' => $event,
                'user_id' => $admin,
                'ticket_name' => $name,
                'ticket_price' => $price,
                'no_of_tickets' => $quantity
            );

        $query = $this -> db -> insert("tickets", $data);
        if($query){
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function editItem($admin, $id, $event, $name, $price, $quantity)
    {
        $id = -1;
        $data = array(
                'event_id' => $event,
                'user_id' => $admin,
                'ticket_name' => $name,
                'ticket_price' => $price,
                'no_of_tickets' => $quantity
            );
        $this->db->where('id', $id);

        return $this->db->update("tickets", $data);
    }

}