<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
    }

    public function user_reg() {

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
                'password_confirm' => $this->input->post('password_confirm')
            );
            $this->products_model->add_user_and_order($user_data);
            redirect('registration/user_reg', 'refresh');
        }

    }
}
