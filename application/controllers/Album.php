<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->data['page_title'] = 'Album';
    	$this->data['page_js'] = 'album';
      $this->render('album/index');
    }
}
