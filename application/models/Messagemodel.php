<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Messagemodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getItemByID($id, $user)
    {
        $query = $this -> db -> query("SELECT messages.room_id, messages.id, messages.message, messages.created, messages.user_id, uvent_user.surname, uvent_user.firstname, uvent_user.email FROM messages LEFT JOIN uvent_user ON messages.user_id = uvent_user.id WHERE messages.id = '$id'");
        $rs = $query->row();

        $conversation = $this -> db -> query("SELECT conversations.id,conversations.event_id, uvent_event.event_name as title, conversation_members.user_id FROM conversations LEFT JOIN uvent_event ON uvent_event.id = conversations.event_id LEFT JOIN conversation_members ON conversations.id = conversation_members.conversation_id WHERE conversations.id = '$rs->room_id'");
        $rs->event_id = $conversation->row()->event_id;
        return $rs;

    }


    public function isExistItem($id){
        $query = $this -> db -> query('SELECT * FROM messages WHERE id = ' . $id);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function getInbox($id) {
        $query = "SELECT conversations.id,conversations.event_id, uvent_event.event_name as title, message_read.is_read, conversation_members.user_id FROM conversations LEFT JOIN uvent_event ON uvent_event.id = conversations.event_id INNER JOIN message_read ON message_read.conversation_id = conversations.id LEFT JOIN conversation_members ON conversations.id = conversation_members.conversation_id WHERE message_read.user_id = '$id' AND conversation_members.user_id != '$id' AND conversations.id IN (SELECT conversations.id FROM conversations INNER JOIN conversation_members ON conversations.id = conversation_members.conversation_id WHERE conversation_members.user_id = '$id') GROUP BY conversations.id";
        $rs = $this -> db -> query($query);
        $result = array();
        foreach ($rs->result() as $item) {
            $msgQuery = "SELECT messages.id, messages.message, messages.created, messages.user_id, uvent_user.surname, uvent_user.firstname, uvent_user.email FROM messages LEFT JOIN uvent_user ON messages.user_id = uvent_user.id WHERE messages.room_id = '$item->id' AND messages.user_id != '$id' ORDER BY messages.created DESC";
            $msgRs = $this -> db -> query($msgQuery);
            foreach ($msgRs->result() as $msg) {
                $msg->eventname = $item->title;
                $result[] = $msg;
            }
        }
        return $result;
    }


    public function getAllSent($id)
    {

        $query = "SELECT conversations.id,conversations.event_id, uvent_event.event_name as title, message_read.is_read, conversation_members.user_id FROM conversations LEFT JOIN uvent_event ON uvent_event.id = conversations.event_id INNER JOIN message_read ON message_read.conversation_id = conversations.id LEFT JOIN conversation_members ON conversations.id = conversation_members.conversation_id WHERE message_read.user_id = '$id' AND conversation_members.user_id != '$id' AND conversations.id IN (SELECT conversations.id FROM conversations INNER JOIN conversation_members ON conversations.id = conversation_members.conversation_id WHERE conversation_members.user_id = '$id') GROUP BY conversations.id";
        $rs = $this -> db -> query($query);
        $result = array();
        foreach ($rs->result() as $item) {
            $msgQuery = "SELECT messages.id, messages.message, messages.created, messages.user_id, uvent_user.surname, uvent_user.firstname, uvent_user.email FROM messages LEFT JOIN uvent_user ON messages.user_id = uvent_user.id WHERE messages.room_id = '$item->id' AND messages.user_id = '$id' ORDER BY messages.created DESC";
            $msgRs = $this -> db -> query($msgQuery);
            foreach ($msgRs->result() as $msg) {
                $msg->eventname = $item->title;
                $result[] = $msg;
            }
        }
        return $result;
    }

    public function removeItem($id)
    {
        $data = array(
               'id' => $id
            );
        return $this->db->delete("messages", $data);
    }

    public function createMessage($sender, $receiver, $message, $event)
    {
        $room = $this->isExistConversation($sender, $receiver, $event);
        if ($room > 0) {
            //Exist
            $data = array(
                'room_id' => $room,
                'user_id' => $sender,
                'message' => $message
                );
            $this -> db -> insert("messages", $data);

            $this->db->where('user_id', $sender);
            $this->db->where('conversation_id', $room);
            $data = array(
                   'is_read' => 1
                );
            $this->db->update("message_read", $data);
            $this->db->flush_cache();

            $this->db->where('user_id', $receiver);
            $this->db->where('conversation_id', $room);
            $data = array(
                   'is_read' => 0
                );
            $this->db->update("message_read", $data);
            $this->db->flush_cache();
            return $room;
        } else {
            //Create
            $id = -1;
            $data = array(
                   'event_id' => $event,
                );

            $query = $this -> db -> insert("conversations", $data);
            if($query){
                $id = $this->db->insert_id();
                $data = array(
                    array(
                       'user_id' => $sender,
                       'conversation_id' => $id
                    ),
                    array(
                       'user_id' => $receiver,
                       'conversation_id' => $id
                    )
                );
                $this -> db -> insert_batch("conversation_members", $data);
                $data = array(
                    'room_id' => $id,
                    'user_id' => $sender,
                    'message' => $message
                    );
                $this -> db -> insert("messages", $data);
                $data = array(
                    array(
                       'user_id' => $sender,
                       'conversation_id' => $id,
                       'is_read' => 1
                    ),
                    array(
                       'user_id' => $receiver,
                       'conversation_id' => $id,
                       'is_read' => 0
                    )
                );
                $this -> db -> insert_batch("message_read", $data);
            }
            return $id;
        }
    }

    public function isExistConversation($sender, $receiver, $event) {
        $query = "SELECT `conversations`.`id` FROM `conversations`
        INNER JOIN `conversation_members` as `first_mem` ON `conversations`.id = `first_mem`.`conversation_id`
        INNER JOIN `conversation_members` as `second_mem` ON `conversations`.id = `second_mem`.`conversation_id` WHERE `conversations`.`event_id` = '$event' AND (`first_mem`.`user_id` = '$sender' AND `second_mem`.`user_id` = '$receiver') AND (`first_mem`.`conversation_id` = `second_mem`.`conversation_id`)";
        // echo $query;
        $rs = $this->db->query($query);
        // echo $rs->num_rows() ;
        if ($rs->num_rows() > 0) {
            return $rs->result()[0]->id;
        }
        return -1;
    }
}