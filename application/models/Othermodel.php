<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Othermodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


	public function getAbout()
    {
    	$query = $this -> db -> query('SELECT * FROM uvent_about');
        return $query->row();
    }



    public function editAbout($id, $content)
    {
        $data = array(
               'about_content' => $content
            );
        $this->db->where('id', $id);
        return $this->db->update("uvent_about", $data);
    }


}