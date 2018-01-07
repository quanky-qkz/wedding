<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function getAllUsers()
    {
        $query = $this -> db -> query('SELECT * FROM uvent_user');
        return $query->result();
    }

    public function getOtherUser($admin)
    {
        $query = $this -> db -> query('SELECT * FROM uvent_user WHERE id != ' .$admin);
        return $query->result();
    }

    public function getPromoterUser($admin)
    {
        $query = $this -> db -> query("SELECT uvent_user.* FROM uvent_user INNER JOIN uvent_event_ticket ON uvent_user.id = uvent_event_ticket.user_id WHERE uvent_user.id != " . $admin . " AND uvent_event_ticket.event_id IN (SELECT uvent_event.id FROM uvent_event LEFT JOIN uvent_user ON uvent_event.user_id = uvent_user.id WHERE uvent_user.id = " . $admin . ") GROUP BY uvent_user.id");
        return $query->result();
    }

    public function getEventUser($admin, $id)
    {
        $query = $this -> db -> query("SELECT uvent_user.* FROM uvent_user INNER JOIN uvent_event_ticket ON uvent_user.id = uvent_event_ticket.user_id WHERE uvent_user.id != " . $admin . " AND uvent_event_ticket.event_id IN (SELECT uvent_event.id FROM uvent_event LEFT JOIN uvent_user ON uvent_event.user_id = uvent_user.id WHERE uvent_user.id = " . $admin . " AND uvent_event.id = " . $id . ") GROUP BY uvent_user.id");
        return $query->result();
    }





    public function getAdminByID($id)
    {
        $query = $this -> db -> query('SELECT * FROM admin INNER JOIN role ON  admin.role = role.rid WHERE uid = ' . $id);

        return $query->row();
    }

    public function totalCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as Total FROM uvent_user");
        return $query->row()->Total;
    }

    public function totalStaffCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as Total FROM uvent_user WHERE type = 1");
        return $query->row()->Total;
    }

    public function getItemByID($id)
    {
        $query = $this -> db -> query('SELECT * FROM uvent_user WHERE id = ' . $id);

        return $query->row();

    }

    public function isExistItem($id){
        $query = $this -> db -> query('SELECT * FROM uvent_user WHERE id = ' . $id);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function editItem( $id,$firstname, $lastname, $email, $avatar, $status)
    {
        $data = array(
                'firstname' => $firstname,
                'surname' => $lastname,
                'email' => $email,
                'profile_pic' => $avatar,
                'status' => $status
            );
        echo var_dump($data);
        $this->db->where('id', $id);
        return $this->db->update("uvent_user", $data);
    }

    public function changePassword( $id, $password)
    {
        $data = array(
                'password' => md5($password)
            );
        $this->db->where('id', $id);
        return $this->db->update("uvent_user", $data);
    }

    public function isAdmin( $id)
    {
        $user = $this->getItemByID($id);
        if ($user) {
            return $user->type == 2;
        } else {
            return false;
        }

    }

    public function isPromoter( $id)
    {
        $user = $this->getItemByID($id);
        if ($user) {
            return $user->type == 1;
        } else {
            return false;
        }
    }

    public function removeItem($id)
    {
        $data = array(
               'id' => $id
            );
        return $this->db->delete("uvent_user", $data);
    }

}