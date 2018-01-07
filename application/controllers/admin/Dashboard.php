<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel','',TRUE);
        $this->load->model('universitymodel','',TRUE);
        $this->load->model('eventmodel','',TRUE);
        $this->load->model('faqmodel','',TRUE);
        // if(!$this->session->userdata('adminID') || $this->session->userdata('adminID') == ''){
        //     redirect('login');
        //     exit();
        // }

        // if(!$this->session->userdata('adminType') || $this->session->userdata('adminType') != '2'){
        //     redirect('event');
        //     exit();
        // }
    }

    public function index()
    {
        // $this->load->view('404');
        $this->data['page_title'] = 'Dashboard';

        $this->data['totalUserCount'] = $this->usermodel->totalCount();
        $this->data['totalStaffCount'] = $this->usermodel->totalStaffCount();
        $this->data['totalUniversityCount'] = $this->universitymodel->totalCount();
        $this->data['totalFAQCount'] = $this->faqmodel->totalCount();
        $this->data['totalEventCount'] = $this->eventmodel->totalCount();
        $this->render('dashboard_view');
    }

    public function error(){
    	$this->load->view('404');
    }
}