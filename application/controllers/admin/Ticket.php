<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ticketmodel','',TRUE);
        $this->load->model('eventmodel','',TRUE);
    }

    public function index()
    {
        if($this->session->userdata('adminType') == '2'){
            $this->data['all_items'] = $this->ticketmodel->getAllItems();
            $this->data['all_events'] = $this->eventmodel->getAllItems();
        } else {
            $admin = $this->session->userdata('adminID');
            $this->data['all_events'] = $this->eventmodel->getAllItemsByPromoter($admin);

            $this->data['all_items'] = $this->ticketmodel->getAllItemsByPromoter($admin);
        }

    	$this->data['page_title'] = 'Ticket Management';
    	$this->data['page_js'] = 'ticket';
        $this->render('ticket/ticket_view');
    }


    public function doRemove($id){
        $status = $this->ticketmodel->removeItem($id);
        if($status){
                    $msg = "Successfully removed order";
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
                $event = $_POST['event'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $admin = $this->session->userdata('adminID');
                $insertID =  $this->ticketmodel->addItem($admin, $event, $name, $price, $quantity);
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
        if(!$this->ticketmodel->isExistItem($id)){
            $this->render('404');
        } else{
            $item = $this->ticketmodel->getItemByID($id);
            $this->data['page_title'] = 'Ticket Management - Edit Ticket';
            $this->data['page_js'] = 'ticket';
            $this->data['item'] = $item;
            $this->data['all_events'] = $this->eventmodel->getAllItems();
            $this->render('ticket/ticket_edit');
        }
    }

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->ticketmodel->isExistItem($id)){
                    $status = false;
                     $msg = "Invalid ticket";
                } else{
                    $event = $_POST['event'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $admin = $this->session->userdata('adminID');
                    $status = $this->ticketmodel->editItem($admin, $id, $event, $name, $price, $quantity);
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




}