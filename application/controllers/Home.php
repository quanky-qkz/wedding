<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->data['page_title'] = 'Home';
    	$this->data['page_js'] = 'home';
      $this->render('home/home_view');
    }
}
