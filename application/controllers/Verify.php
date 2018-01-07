<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
      $this->load->view('verify_view');
    }
}
