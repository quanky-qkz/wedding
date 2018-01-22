<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendeemodel extends CI_Model
{
  function __construct()
  {
      parent::__construct();
  }

  public function isExistItem($name, $relation){
    $this->db->where('name', $name);
    $this->db->where('relation', $relation);
    $query = $this->db->get('attendee');
    if($query->num_rows() > 0){
        return true;
    }
    return false;
  }

  public function addAttendee($name, $relation, $guest, $event, $note) {
    $id = -1;
    $data = array(
      'name' => $name,
      'relation' => $relation,
      'guest' => $guest,
      'event' => $event,
      'note' => $note
    );
    $query = $this->db->insert('attendee', $data);
    if ($query) {
      $id = $this->db->insert_id();
    }
    return $id;
  }
}
