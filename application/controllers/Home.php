<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('attendeemodel','',TRUE);
    }

    public function index()
    {
      $this->data['page_title'] = 'Home';
    	$this->data['page_js'] = 'home';
      $this->render('home/home_view');
    }


    public function doAttend() {
      $insertID = -1;
      try {
              $attendee = $_POST['attendee'];
              $relation = $_POST['relation'];
              $event = $_POST['event'];
              $guest = $_POST['guest'];
              $note = "";
              if (isset($_POST['note'])) {
                $note = $_POST['note'];
              }
              if ($this->attendeemodel->isExistItem($attendee, $relation)) {
                $status = false;
                $msg = "This user has already exist";
              } else {
                $insertID =  $this->attendeemodel->addAttendee($attendee, $relation, $guest, $event, $note);
                if($insertID != -1){
                    $status = true;
                    $msg = "Successfully added attendee";
                } else{
                    $status = false;
                    $msg = "An error occured! ";
                }
              }
          } catch(Exception $e){
              $status = false;
              $msg = "Cannot add new attendee";
          }
          $dt = array('status' => $status,
                      'msg' => $msg,
                      'insertedID'  => $insertID);
      echo json_encode($dt);
    }
}
