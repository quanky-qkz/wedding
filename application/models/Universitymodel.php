<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Universitymodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAllItems()
    {
        $query = $this -> db -> query('SELECT * FROM uvent_university');
        return $query->result();
    }


    public function getItemByID($id)
    {
        $query = $this -> db -> query('SELECT * FROM uvent_university WHERE id = ' . $id);

        return $query->row();

    }

    public function isExistItem($id){
        $query = $this -> db -> query('SELECT * FROM uvent_university WHERE id = ' . $id);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }





    public function editItem($id, $name)
    {
        $data = array(
               'university' => $name
            );
        $this->db->where('id', $id);
        return $this->db->update("uvent_university", $data);
    }

    public function removeItem($id)
    {
        $data = array(
               'id' => $id
            );
        return $this->db->delete("uvent_university", $data);
    }

    public function addItem($name)
    {
        $id = -1;
        $data = array(
                'university' => $name
            );

        $query = $this -> db -> insert("uvent_university", $data);
        if($query){
            $id = $this->db->insert_id();
        }
        return $id;

    }

    public function totalCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as Total FROM uvent_university");
        return $query->row()->Total;
    }
}