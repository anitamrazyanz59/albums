<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('messages_model');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $current_url = base_url(uri_string());
        switch($this->session->userdata('status')){
            case false:
                redirect(site_url('registration/log_in'));

                break;
            case '0' :
                redirect(site_url('registration/thank_you'));
                break;
        }
    }

    public function new_message($id){
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect($this->uri->uri_string().'/'.$id);
        }
        else
        {
            $this->messages_model->new_message();

            redirect('messages/get_messages/'.$id.'');
        }
    }

    public function show_chats(){
        $user_id = $this->session->userdata('user_id');
        $this->load->model('album_model');
        $user_data = $this->album_model->get_user_data($user_id);
        $chats = $this->messages_model->show_chats();
        $this->view_load->view('messages_view',compact('user_data', 'chats'));
    }

    public function get_messages($chat_user_id){

        if($chats_messages = $this->messages_model->get_chats_messages($chat_user_id)){
            $this->view_load->view('chat_messages_view', compact('chats_messages','chat_user_id'));
        }else {
            redirect('messages/show_chats');
        }

    }

}

/*
 * SELECT to_id as user_id FROM `messages` JOIN `users` On messages.to_id=users.user_id WHERE messages.from_id = 1 GROUP BY messages.to_id
UNION SELECT from_id as user_id FROM messages JOIN `users` On messages.from_id=users.user_id  WHERE messages.to_id = 1 GROUP BY messages.from_id
 */