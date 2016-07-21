<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// product model zzzz hgfgf tgrt
// product model ccc
class messages_model extends CI_Model
{
    public function new_message(){
        $message_data = [
            'from_id'    => $this->session->userdata('user_id'),
            'to_id'      => $this->input->post('to'),
            'message' => $this->input->post('message', true),
        ];
        $this->db->insert('messages',$message_data);
    }

    public function show_chats(){
        $user_id = $this->session->userdata('user_id');

            $this->db   ->select('to_id as `user_id`, users.first_name, users.last_name, users.pic')
                        ->from('messages')
                        ->join('users', 'messages.to_id=users.user_id')
                        ->where('messages.from_id',$user_id)
                        ->group_by("messages.to_id");
        $query1 = $this->db->get_compiled_select();

        $this->db   ->select('from_id as `user_id` , users.first_name, users.last_name, users.pic')
                    ->from('messages')
                    ->join('users', 'messages.from_id=users.user_id')
                    ->where('messages.to_id',$user_id)
                    ->group_by("messages.from_id");
        $query2 = $this->db->get_compiled_select();

        $query = $this->db->query($query1." UNION ".$query2);
        return $query->result_array();
    }

    public function get_chats_messages($chat_user_id){
        $user_id = $this->session->userdata('user_id');
        if($chat_user_id != $user_id){
            $query = $this->db   -> select('messages.id, messages.message, messages.to_id, messages.from_id, user1.first_name as from_name, user1.pic as from_pic, user2.first_name as to_name, user2.pic as to_pic,')

                ->group_start()
                ->where('from_id', $user_id)
                ->where('to_id', $chat_user_id)
                ->group_end()

                ->or_group_start()
                ->where('to_id', $user_id)
                ->where('from_id', $chat_user_id)
                ->group_end()

                ->join('users as user1', 'user1.user_id = messages.from_id')
                ->join('users as user2', 'user2.user_id = messages.to_id')
                ->order_by('messages.id','ASC')
                ->get('messages');
            return $query->result_array();
        } else {
            return false;
        }

    }

}
/*
 * SELECT to_id as user_id FROM `messages` JOIN `users` On messages.to_id=users.user_id WHERE messages.from_id = 1 GROUP BY messages.to_id
UNION SELECT from_id as user_id FROM messages JOIN `users` On messages.from_id=users.user_id  WHERE messages.to_id = 1 GROUP BY messages.from_id
 */