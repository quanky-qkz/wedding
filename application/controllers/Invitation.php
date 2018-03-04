<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invitation extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->data['page_title'] = 'Invitation';
    	$this->data['page_js'] = 'invitation';
      $this->render('invitation/index');
    }
}
