<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->data['page_title'] = 'Contact';
    	$this->data['page_js'] = 'contact';
      $this->render('contact/index');
    }
}
