<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('othermodel','',TRUE);
        if(!$this->session->userdata('adminType') || $this->session->userdata('adminType') != '2'){
            redirect('event');
            exit();
        }
    }

    public function index()
    {

    	$this->data['page_title'] = 'About Uvent Management';
        $this->data['item'] = $this->othermodel->getAbout();
    	$this->data['page_js'] = 'about';
        $this->render('about/about_view');
    }

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "Invalid request";
        } else{
            try{
                $content = $_POST['content'];
                $status = $this->othermodel->editAbout($id, $content);
                if($status){
                    $msg = "Successfully modified about content";
                } else{
                    $msg = "An error occured! Please try again";
                }
            } catch(Exception $e){
                $status = false;
                $msg = "ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

}