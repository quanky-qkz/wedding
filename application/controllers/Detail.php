<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->data['page_title'] = 'Detail';
      $this->render('detail/index');
    }
}
