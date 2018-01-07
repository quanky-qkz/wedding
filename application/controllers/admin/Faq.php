<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('faqmodel','',TRUE);
        if(!$this->session->userdata('adminType') || $this->session->userdata('adminType') != '2'){
            redirect('event');
            exit();
        }
    }

    public function index()
    {
        $this->data['all_items'] = $this->faqmodel->getAllItems();
        $this->data['page_title'] = 'FAQ Management';
        $this->data['page_js'] = 'faq';
        $this->render('faq/faq_view');

    }

    public function edit($id)
    {
        if(!$this->faqmodel->isExistItem($id)){
            $this->render('404');
        } else{
            $this->data['item'] = $this->faqmodel->getItemByID($id);
            $this->data['page_title'] = 'FAQ Management';
            $this->data['page_js'] = 'faq';
            $this->render('faq/faq_edit');
        }

    }

    public function doRemove($id){
        $status = $this->faqmodel->removeItem($id);
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
                $question = $_POST['question'];
                $answer = $_POST['answer'];
                $insertID =  $this->faqmodel->addItem( $question, $answer);
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

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->faqmodel->isExistItem($id)){
                    $status = false;
                     $msg = "Invalid faq";
                } else{
                    $question = $_POST['question'];
                    $answer = $_POST['answer'];
                    $status = $this->faqmodel->editItem($id, $question, $answer);
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