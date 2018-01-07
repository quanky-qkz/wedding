<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ceremony extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->data['page_title'] = 'Ceremony';
    	$this->data['page_js'] = 'ceremony';
      $this->render('ceremony/index');
    }
}
