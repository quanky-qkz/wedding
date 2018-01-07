<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notificationmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    private function send($token, $title, $message) {
        $url = "https://fcm.googleapis.com/fcm/send";

        $values = array();
        $values ['title'] = $title;
        $values ['body'] =  $message;

        $data = array();
        $data ['to'] = $token;
        $data ['notification'] = $values;

        $content = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Content-type: application/json",
                    "Authorization: key=AAAAbHzeZR4:APA91bEF8LvXrg7RiTQINCqXcGoej429-fuvybiIcLsz16bcZ6-eds0JB4SF1E6xVfybWBkrM3Vt_0t8E0jv9SwEY7JgQYDQFL2aPxzZ2d_-0QoSDJItdQExD8SpVUNbGwNamk8QkE3M"
                    ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ( $status != 201 ) {
            return ("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
        }

        curl_close($curl);
        return json_decode($json_response, true);
    }

    public function pushNotification($admin, $receiver, $message)
    {
        $query = $this -> db -> query('SELECT * FROM uvent_user WHERE id = ' . $admin);
        $sender  =  $query->row();

        $query = $this -> db -> query('SELECT * FROM devices WHERE user_id = ' . $receiver);
        $receiver_devices  =  $query->result();
        foreach ($receiver_devices as $device) {
            $this->send($device->device_token, $sender->firstname, $message);
        }
    }



}