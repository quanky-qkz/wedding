<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel','',TRUE);
        if(!$this->session->userdata('adminType') || $this->session->userdata('adminType') != '2'){
            redirect('event');
            exit();
        }
    }

    public function index()
    {
        $this->data['all_items'] = $this->usermodel->getAllUsers();
        $this->data['page_title'] = 'User Management';
        $this->data['page_js'] = 'user';
        $this->render('user/user_view');
    }

    public function doRemove($id){
        if ($this->usermodel->isAdmin($id)){
            $status = false;
            $msg = "Cannot remove admin";
        } else {
            $status = $this->usermodel->removeItem($id);
            if($status){
                    $msg = "Successfully removed user";
                } else{
                    $msg = "An error occured! Please try again";
                }
        }

        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function edit($id)
    {
        if(!$this->usermodel->isExistItem($id)){
            $this->render('404');
        } else {
            $item = $this->usermodel->getItemByID($id);
            $this->data['page_title'] = 'User Management - Edit user';
            $this->data['page_js'] = 'user';
            $this->data['item'] = $item;
            $this->render('user/user_edit');
        }
    }

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->usermodel->isExistItem($id)){
                    $status = false;
                    $msg = "Invalid user";
                } else {
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $stt = $_POST['status'];
                    $status = $this->usermodel->editItem( $id,$firstname, $lastname, $email, $stt);
                    echo 'deo choi';
                    if($status){
                        $msg = "Successfully edited item" . $email;
                    } else{
                        $msg = "An error occured! Please try again";
                    }
                }

            } catch(Exception $e){
                $status = false;
                $msg = "user ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function change($id)
    {
        if(!$this->usermodel->isExistItem($id)){
            $this->render('404');
        } else {
            $item = $this->usermodel->getItemByID($id);
            $this->data['page_title'] = 'user Management - Change password';
            $this->data['page_js'] = 'user';
            $this->data['item'] = $item;
            $this->render('user/user_change_password');
        }
    }

    public function doChangePassword($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->usermodel->isExistItem($id)){
                    $status = false;
                    $msg = "Invalid user";
                } else {
                    $password = $_POST['password'];
                    $status = $this->usermodel->changePassword( $id, $password);
                    if($status){
                        $msg = "Successfully changed password";
                    } else{
                        $msg = "An error occured! Please try again";
                    }
                }

            } catch(Exception $e){
                $status = false;
                $msg = "user ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }
}