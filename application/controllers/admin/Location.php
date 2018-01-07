<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('universitymodel','',TRUE);
        if(!$this->session->userdata('adminType') || $this->session->userdata('adminType') != '2'){
            redirect('event');
            exit();
        }
    }

    public function index()
    {
    	$this->data['all_category'] = $this->universitymodel->getAllItems();
    	$this->data['page_title'] = 'Location Management';
    	$this->data['page_js'] = 'university';
        $this->render('location/location_view');
    }

    public function doAdd()
    {
        try{
                $name = $_POST['name'];
                // $admin = $this->session->userdata('adminID');
                $insertID =  $this->universitymodel->addItem( $name);
                if($insertID != -1){

                    $status = true;
                    $msg = "Successfully added item";
                } else{
                    $status = false;
                    $msg = "An error occured! Please try again";
                }
            } catch(Exception $e){
                $status = false;
                $msg = "Item ID is not a number";
            }
        $dt = array('status' => $status,
                    'msg' => $msg,
                    'insertedID'  => $insertID);
        echo json_encode($dt);
    }

    public function edit($id)
    {
        if(!$this->universitymodel->isExistItem($id)){
            $this->render('admin/404');
        } else{
            $item = $this->universitymodel->getItemByID($id);
            $this->data['page_title'] = 'Location Management - Edit Location';
            $this->data['page_js'] = 'university';
            $this->data['item'] = $item;
            $this->render('location/location_edit');
        }
    }

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                $cid = intval($id);
                if(!$this->universitymodel->isExistItem($cid)){
                    $status = false;
                     $msg = "Invalid category";
                } else{
                    $name = $_POST['name'];
                    $status = $this->universitymodel->editItem($cid, $name);
                    if($status){
                        $msg = "Successfully edited item";
                    } else{
                        $msg = "An error occured! Please try again";
                    }
                }
            } catch(Exception $e){
                $status = false;
                $msg = "Item ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function doRemove($id){
        $status = $this->universitymodel->removeItem($id);
        if($status){
                    $msg = "Successfully removed order";
                } else{
                    $msg = "An error occured! Please try again";
                }
        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }
}
