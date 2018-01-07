<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faqmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAllItems()
    {
        $query = $this -> db -> query('SELECT * FROM uvent_faq');
        return $query->result();
    }

    public function totalCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as Total FROM uvent_faq");
        return $query->row()->Total;
    }

    public function removeItem($id)
    {
        $data = array(
               'id' => $id
            );
        return $this->db->delete("uvent_faq", $data);
    }

    public function addItem($question, $answer)
    {
        $id = -1;
        $data = array(
               'question' => $question,
               'answer' => $answer,
            );

        $query = $this -> db -> insert("uvent_faq", $data);
        if($query){
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function editItem($id, $question, $answer)
    {
        $data = array(
               'question' => $question,
               'answer' => $answer,
            );
        $this->db->where('id', $id);
        return $this->db->update("uvent_faq", $data);
    }


    public function getItemByID($id)
    {
        $query = $this -> db -> query('SELECT * FROM uvent_faq WHERE id = ' . $id);

        return $query->row();

    }


    public function isExistItem($id){
        $query = $this -> db -> query('SELECT * FROM uvent_faq WHERE id = ' . $id);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

}