<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('album_model');
        $this->load->helper(array('form'));
        $this->load->model('registration_model');
        $this->load->library('form_validation');
    }

    public function add_album(){
        if($this->input->post('add_new_album')){
            var_dump($this->input->post('new_album_name', true));
            $added_data['album_name'] = $this->input->post('new_album_name', true);
            $added_data['user_id'] = $this->session->userdata('user_id');
            var_dump( $added_data); die;
            $this->album_model->add_album($added_data);
        }
    }


}
