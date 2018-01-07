<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function doAdminLogin($username, $password){
        //SELECT * FROM admin INNER JOIN role ON admin.Role_ID = role.Role_ID WHERE Ad_Account = '" . $username ."' AND Ad_Account = '" . $username ."'
        $query = $this -> db -> query("SELECT * FROM uvent_user  WHERE email = '" . $username . "' AND password = MD5('" . $password . "')") ;
        if($query->num_rows() > 0){
            $info = $query->row();
            if ($info ->type == 0 ) {
              return false;
            }
                $newdata = array(
                   'adminName'    => $info->firstname,
                   'adminID'  => $info->id,
                   'adminAccount' => $info->email,
                   'adminAvatar' => $info->profile_pic,
                   'adminType' => $info->type,
                   'logged_in' => TRUE
               );

                $this->session->set_userdata($newdata);
                return true;
        } else{
            return false;
        }
    }

    public function doUserSignUp($username, $password, $firstname){
      $id = -1;
      $query = $this->db->query("INSERT INTO `SuperMarket`.`customers` (`Cus_FirstName`, `Cus_Status`, `Cus_Account`, `Cus_Password`) VALUES ('". $firstname ."', '2', '" . $username ."', '" . $password ."');");
      if($query){
            $id = $this->db->insert_id();
        }
        return $id;
    }







}