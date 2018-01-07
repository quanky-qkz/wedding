<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('eventmodel','',TRUE);
        $this->load->model('usermodel','',TRUE);
        $this->load->model('universitymodel','',TRUE);
        $this->load->model('messagemodel','',TRUE);
        $this->load->model('notificationmodel','',TRUE);

    }

    public function info() {
        $this->load->view('event/event_info');
    }

    public function index()
    {
        if($this->session->userdata('adminType') == '2'){
            $this->data['all_event'] = $this->eventmodel->getAllItems();
        } else {
            $admin = $this->session->userdata('adminID');
            $this->data['all_event'] = $this->eventmodel->getAllItemsByPromoter($admin);
        }

        $this->data['all_uni'] = $this->universitymodel->getAllItems();
    	$this->data['page_title'] = 'Event Management';
    	$this->data['page_js'] = 'event';
        $this->render('event/event_view');
    }

    public function message($id)
    {
        $admin = $this->session->userdata('adminID');
        if($this->session->userdata('adminType') == '2') {
            $this->data['all_user'] = $this->usermodel->getOtherUser($admin);
        } else {
            $this->data['all_user'] = $this->usermodel->getEventUser($admin, $id);
        }
        $this->data['event'] = $this->eventmodel->getItemByID($id);
        $this->data['page_title'] = 'Event Management';
        $this->data['page_js'] = 'event';
        $this->render('event/message_view');
    }

    public function doSendMessage($event)
    {
        $insertID = -1;
        try{
                $receiver = $_POST['receiver'];
                $message = $_POST['message'];
                $admin = $this->session->userdata('adminID');
                $insertID =  $this->messagemodel->createMessage($admin, $receiver, $message, $event);
                if($insertID != -1){
                    $this->notificationmodel->pushNotification($admin, $receiver, $message);
                    $status = true;
                    $msg = "Successfully sent message";
                } else{
                    $status = false;
                    $msg = "An error occured! ";
                }
            } catch(Exception $e){
                $status = false;
                $msg = "Event ID is not a number";
            }
            $dt = array('status' => $status,
                        'msg' => $msg,
                        'insertedID'  => $insertID);
        echo json_encode($dt);
    }

    public function doRemove($id){
        $status = $this->eventmodel->removeItem($id);
        if($status){
                    $msg = "Successfully removed order";
                } else{
                    $msg = "An error occured! Please try again";
                }
        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function doAdd()
    {
        try{
                $name = $_POST['name'];
                $logo = "";
                if (isset($_POST['eventLogoName'])) {
                    $logo = $_POST['eventLogoName'];
                };
                $date = $_POST['date'];
                $myTime = strtotime($date . " 11:59:59 pm");
                $date = date("Y-m-d H:i:s", $myTime);
                $start_time = $_POST['time'];
                $end_time = $_POST['time-end'];
                $venue = $_POST['venue'];
                $postcode = $_POST['postcode'];
                $uni = $_POST['university'];
                $info = "";
                if (isset($_POST['venue_information'])) {
                    $info = $_POST['venue_information'];
                };
                $admin = $this->session->userdata('adminID');
                $insertID =  $this->eventmodel->addItem( $name, $logo, $date, $start_time, $end_time, $venue, $postcode, $info, $uni, $admin);
                if($insertID != -1){

                    $status = true;
                    $msg = "Successfully added item";
                } else{
                    $status = false;
                    $msg = "An error occured! Please try again";
                }
            } catch(Exception $e){
                $status = false;
                $msg = "Cannot add item";
            }
        $dt = array('status' => $status,
                    'msg' => $msg,
                    'insertedID'  => $insertID);
        echo json_encode($dt);
    }

    public function edit($id)
    {
        if(!$this->eventmodel->isExistItem($id)){
            $this->render('404');
        } else {
            $event = $this->eventmodel->getItemByID($id);
            $this->data['page_title'] = 'Event Management - Edit event';
            $this->data['page_js'] = 'event';
            $datetime = strtotime($event->event_date);
            $date = date("Y-m-d", $datetime);
            $event->event_date = $date;
            $this->data['item'] = $event;
            $this->data['all_uni'] = $this->universitymodel->getAllItems();
            $this->render('event/event_edit');
        }
    }

    public function doEdit($id){
        if(!isset($id) || $id == ''){
            $status = false;
            $msg = "No selected item";
        } else{
            try{
                if(!$this->eventmodel->isExistItem($id)){
                    $status = false;
                    $msg = "Invalid event";
                } else {
                    $name = $_POST['name'];
                    $logo = "";
                    if (isset($_POST['eventLogoName'])) {
                        $logo = $_POST['eventLogoName'];
                    };
                    $date = $_POST['date'];
                    $myTime = strtotime($date . " 11:59:59 pm");
                    $date = date("Y-m-d H:i:s", $myTime);
                    // $time = $_POST['time'];
                    $start_time = $_POST['time'];
                    $end_time = $_POST['time-end'];
                    $venue = $_POST['venue'];
                    $postcode = $_POST['postcode'];
                    $uni = $_POST['university'];
                    $info = "";
                    if (isset($_POST['venue_information'])) {
                        $info = $_POST['venue_information'];
                    };
                    $admin = $this->session->userdata('adminID');
                    $status = $this->eventmodel->editItem($id, $name, $logo, $date, $start_time, $end_time, $venue, $postcode, $info, $uni, $admin);
                    if($status){
                        $msg = "Successfully edited item";
                    } else{
                        $msg = "An error occured! Please try again";
                    }
                }

            } catch(Exception $e){
                $status = false;
                $msg = "Item ID is not a number";
            }

        }


        $dt = array('status' => $status,
                    'msg' => $msg );
        echo json_encode($dt);
    }

    public function guestlist($id){
        if(!$this->eventmodel->isExistItem($id)){
            $this->render('404');
        } else {
            $event = $this->eventmodel->getItemToPrint($id);
            $this->load->library('UventPdf');

            $pdf = new UventPdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
            $pdf->SetCreator(PDF_CREATOR);

            $title = "   " . $event->event_name . " Guest List";
            $date = date_create($event->event_date);
            $formatedDate =date_format($date,"d-M-Y"); //('m.d.y');
            $subTitle = "   " . "Hosted by " . $event->firstname . ' ' . $event->surname . "\n". "   " .  $event->event_time . " " . $formatedDate . " at " . $event->event_venue;
            $pdf->SetTitle($title);
            $pdf->SetAuthor($event->firstname . ' ' . $event->surname);
            $pdf->SetSubject('Guest List');

// set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $subTitle);
// set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            $pdf->AddPage();

            $html = '<html>
                    <head>
                        <style>
                            .table {
                            border-collapse: collapse;
                        }
                        table, th, td {
                            border: 1px solid black;
                        }
                        </style>
                    </head>
                    <body>
                            <div>
                                <table class="table" >
                                <thead class="flip-content">
                                    <tr style="border:1px solid #000;background-color:#f00;height:70px;color:#fff;">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Tickets</th>
                                        <th>Ticket Type</th>
                                        <th>Unique code</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>';



            $listguest = $this->eventmodel->getListGuest($id);
            foreach ($listguest as $index => $guest) {
                # code...
                $ticket_code ="";
                $test =  $guest->id;
                $result = $this->eventmodel->getUniqueCode($test);
                foreach ($result as $row) {
                    $ticket_code .= ", ".$row->id;
                }
                $ticket_code = trim($ticket_code,",");
                $ticket_code = trim($ticket_code);
                $date = date_create($guest->created);
                $formatedDate =date_format($date,"d M y"); //('m.d.y');
                $html .= '<tr >
                            <td>'. ($index + 1) .'</td>
                            <td>'.$guest->firstname." ".$guest->surname.'</td>
                            <td>'.$guest->no_of_ticket.'</td>
                            <td>'.$guest->ticket_name.'</td>
                            <td>'.
                                $ticket_code
                            .'</td>
                            <td>'.$formatedDate.'</td>
                        </tr>';
            }
            $html .= '</tbody>
                            </table>
                            </div>

                    </div>
                </body>
            </html>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->lastPage();
            $pdf->Output($event->event_name . "-Guest-List.pdf", 'I');
            // echo ($html);
        }
    }

}
