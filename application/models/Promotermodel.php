<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promotermodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function getAllItems()
    {
    	$query = $this -> db -> query('SELECT * FROM uvent_user WHERE type=1');
        return $query->result();
    }

    public function removeItem($id)
    {
        $data = array(
               'id' => $id
            );
        $rs = $this->db->delete("uvent_user", $data);
        if ($rs) {
            //Remove tickets
        }
        return $rs;
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

    public function isExistEmail($email){
        $query = $this -> db -> query("SELECT * FROM uvent_user WHERE email = '$email'");
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function addItem( $firstname, $lastname, $email, $password, $avatar)
    {
        $id = -1;
        $data = array(
                'firstname' => $firstname,
                'surname' => $lastname,
                'email' => $email,
                'password' => md5($password),
                'profile_pic' => $avatar,
                'type' => 1
            );

        $query = $this -> db -> insert("uvent_user", $data);
        if($query){
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function editItem( $id,$firstname, $lastname, $email, $avatar)
    {
        $data = array(
                'firstname' => $firstname,
                'surname' => $lastname,
                'email' => $email,
                'profile_pic' => $avatar
            );
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


}