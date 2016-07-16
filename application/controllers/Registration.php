<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
        $this->load->model('album_model');
        $this->load->library('session');
    }

    public function user_reg() {
        $this->load->helper('string');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');


        $rules = $this->registration_model->set_rules_for_reg();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == FALSE){
            $this->view_load->view('user_reg_view');
        } else {
            $user_data = array(
                'first_name'       => $this->input->post('first_name'),
                'last_name'        => $this->input->post('last_name'),
                'email'            => $this->input->post('email'),
                'login'            => $this->input->post('login'),
                'password'         => $this->input->post('password'),
                'verification_key' => random_string('alnum', 50)

            );
            $verification_key['key'] = $this->registration_model->user_reg($user_data);
            $this->view_load->view('activate_view',$verification_key);
        }

    }

    public function validate_email($key){
        $key = trim($key);
        $verification_key = $this->session->userdata('verification_key');
var_dump($key);
        if($key == $verification_key){

            $this->view_load->view('home_page_view');
        } else {
            echo 'validation error';
        }

    }

}














