<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('messagemodel','',TRUE);
        $this->load->model('usermodel','',TRUE);
        $this->load->model('notificationmodel','',TRUE);
    }

    public function index()
    {
        $this->inbox();
    }

    public function inbox()
    {
        $admin = $this->session->userdata('adminID');
        $this->data['all_inbox'] = $this->messagemodel->getInbox($admin);
        $this->data['page_title'] = 'Message Management';
        $this->data['page_js'] = 'message';
        $this->render('message/message_inbox');
    }

    public function sent()
    {
        $admin = $this->session->userdata('adminID');
        $this->data['all_inbox'] = $this->messagemodel->getAllSent($admin);
        $this->data['page_title'] = 'Message Management';
        $this->data['page_js'] = 'message';
        $this->render('message/message_sent');
    }

    public function reply($id)
    {
        if(!$this->messagemodel->isExistItem($id)){
            $this->render('404');
        } else{
            $admin = $this->session->userdata('adminID');
            $item = $this->messagemodel->getItemByID($id, $admin);
            $this->data['page_title'] = 'Message Management - Reply Message';
            $this->data['page_js'] = 'message';
            $this->data['item'] = $item;
            // $this->data['all_events'] = $this->eventmodel->getAllItems();
            $this->render('message/message_reply');
        }
    }

    public function doReply($event)
    {
        $insertID = -1;
        try{
                $receiver = $_POST['receiver'];
                $message = $_POST['message'];
                $admin = $this->session->userdata('adminID');
                    $insertID =  $this->messagemodel->createMessage($admin, $receiver, $message, $event);
                    if($insertID != -1){
                        $this->notificationmodel->pushNotification($admin, $receiver, $message);
                        $status = true;
                        $msg = "Successfully sent message";
                    } else{
                        $status = false;
                        $msg = "An error occured! ";
                    }


            } catch(Exception $e){
                $status = false;
                $msg = "User ID is not a number";
            }
            $dt = array('status' => $status,
                        'msg' => $msg,
                        'insertedID'  => $insertID);
        echo json_encode($dt);
    }

    public function write()
    {
        if($this->session->userdata('adminType') != '2') {
            $this->render('404');
        } else {
            $admin = $this->session->userdata('adminID');
            $this->data['page_title'] = 'Message Management - New message';
            $this->data['page_js'] = 'message';
            $this->render('message/message_new');
        }
    }

    public function doAdd()
    {
        $insertID = -1;
        try{
                $receiver = $_POST['receiver'];
                $message = $_POST['message'];
                $admin = $this->session->userdata('adminID');
                $event = "0";
                if (isset($_POST['event']) && $_POST['event'] != "" && $this->session->userdata('adminType') != '2'){
                    $insertID =  $this->messagemodel->createMessage($admin, $receiver, $message, $event);
                    if($insertID != -1){
                        $this->notificationmodel->pushNotification($admin, $receiver, $message);
                        $status = true;
                        $msg = "Successfully sent message";
                    } else{
                        $status = false;
                        $msg = "An error occured! ";
                    }
                } else {
                    $status = false;
                    $msg = "You don't have permission to send message as Administrator";
                }

            } catch(Exception $e){
                $status = false;
                $msg = "User ID is not a number";
            }
            $dt = array('status' => $status,
                        'msg' => $msg,
                        'insertedID'  => $insertID);
        echo json_encode($dt);
    }


    public function doRemove($id){
        $status = $this->messagemodel->removeItem($id);
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