<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promoter extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('promotermodel','',TRUE);
        if(!$this->session->userdata('adminType') || $this->session->userdata('adminType') != '2'){
            redirect('event');
            exit();
        }
    }

    public function index()
    {
    	$this->data['all_items'] = $this->promotermodel->getAllItems();
    	$this->data['page_title'] = 'Promoter Management';
    	$this->data['page_js'] = 'promoter';
        $this->render('promoter/promoter_view');
    }

    public function doRemove($id){
        $status = $this->promotermodel->removeItem($id);
        if($status){
                    $msg = "Successfully removed promoter";
                } else{
                    $msg = "An error occured! Please try again";
                }
        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function doAdd()
    {
        try{

                $firstname = $_POST['firstname'];
                $avatar = "";
                if (isset($_POST['profileAvatarName'])) {
                    $avatar = $_POST['profileAvatarName'];
                };
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                if($this->promotermodel->isExistEmail($email)){
                    $status = false;
                    $msg = "Email already in use";
                    $insertID = -1;
                } else {
                    $insertID =  $this->promotermodel->addItem( $firstname, $lastname, $email, $password, $avatar);
                    if($insertID != -1){

                        $status = true;
                        $msg = "Successfully added item";
                    } else{
                        $status = false;
                        $msg = "An error occured! Please try again";
                    }
                }
                // $admin = $this->session->userdata('adminID');

            } catch(Exception $e){
                $status = false;
                $msg = "Cannot add item";
            }
        $dt = array('status' => $status,
                    'msg' => $msg,
                    'insertedID'  => $insertID);
        echo json_encode($dt);
    }

    public function edit($id)
    {
        if(!$this->promotermodel->isExistItem($id)){
            $this->render('404');
        } else {
            $item = $this->promotermodel->getItemByID($id);
            $this->data['page_title'] = 'Promoter Management - Edit promoter';
            $this->data['page_js'] = 'promoter';
            $this->data['item'] = $item;
            $this->render('promoter/promoter_edit');
        }
    }

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->promotermodel->isExistItem($id)){
                    $status = false;
                    $msg = "Invalid promoter";
                } else {
                    $firstname = $_POST['firstname'];
                    $avatar = "";
                    if (isset($_POST['profileAvatarName'])) {
                        $avatar = $_POST['profileAvatarName'];
                    };
                    $lastname = $_POST['lastname'];
                    // $password = $_POST['password'];
                    $email = $_POST['email'];
                    $status = $this->promotermodel->editItem( $id,$firstname, $lastname, $email, $avatar);
                    if($status){
                        $msg = "Successfully edited item";
                    } else{
                        $msg = "An error occured! Please try again";
                    }
                }

            } catch(Exception $e){
                $status = false;
                $msg = "Promoter ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function change($id)
    {
        if(!$this->promotermodel->isExistItem($id)){
            $this->render('404');
        } else {
            $item = $this->promotermodel->getItemByID($id);
            $this->data['page_title'] = 'Promoter Management - Change password';
            $this->data['page_js'] = 'promoter';
            $this->data['item'] = $item;
            $this->render('promoter/promoter_change_password');
        }
    }

    public function doChangePassword($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->promotermodel->isExistItem($id)){
                    $status = false;
                    $msg = "Invalid promoter";
                } else {
                    $password = $_POST['password'];
                    $status = $this->promotermodel->changePassword( $id, $password);
                    if($status){
                        $msg = "Successfully changed password";
                    } else{
                        $msg = "An error occured! Please try again";
                    }
                }

            } catch(Exception $e){
                $status = false;
                $msg = "Promoter ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }
}