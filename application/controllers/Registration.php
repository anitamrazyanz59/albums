<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->model('registration_model');
        $this->load->library('form_validation');
        $current_url = base_url(uri_string());

    }

    public function user_reg() {

        $rules = $this->registration_model->set_rules_for_reg();
        $this->form_validation->set_rules($rules);
        if(!$this->form_validation->run()){
            $this->view_load->view('user_reg_view');
        } else {
            if($user_data = $this->registration_model->user_reg()) {
                $this->load->library('email');
                $config = [
                    'mailtype' => 'html'
                ];
                $this->email->initialize($config);
                $this->email->from('Ani@Ani.com', 'Ani');
                $this->email->to($user_data['email']);

                $this->email->subject('Registration confirmation');
                $this->email->message($this->load->view('emails/registration', $user_data, true));
                $this->email->send(FALSE);
                print_r($this->email->print_debugger()) ;
                echo 'sfds';
               // $this->view_load->view('reg_view');

            };

        }

    }
    public function thank_you(){
        if ($this->session->userdata('status') !== FALSE){
            $this->view_load->view('thank_you');
        } else{
            show_404();
        }

    }
    //http://albums.loc/registration/verify/bxLQX9nPh0KfwuMlOVEg674iIaSoHjWGytm1YedrsN3pTAczkC

    public function verify($key){
        if($this->registration_model->verify($key)){
            redirect('albums/get_albums', 'refresh');
        }
        show_404();
    }

    public function log_in(){

        $user_data = array(
            'login'            => $this->input->post('login', true),
            'password'         => $this->input->post('password', true),
        );

           if( $this->input->post('login') && $this->input->post('password')){
               $this->registration_model->log_in($user_data);
               $status = $this->session->userdata('status');
               if($status === '1'){
                   redirect('albums/get_albums', 'refresh');
               } elseif ($status === '0') {
                   redirect('registration/thank_you', 'refresh');
               }
               $error = 'Login or password is incorrect';

           }

        $this->view_load->view('log_in_view', compact('error'));
    }

    public function log_out(){
        $this->session->sess_destroy();
        redirect('registration/log_in', 'refresh');
    }



}














