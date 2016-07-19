<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('string');
    }

    public function index()
    {
        $this->view_load->view('home_page_view', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1200;
        $config['max_height']           = 900;
        $config['file_name'] = time().'_'.rand(1,1000);
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->view_load->view('home_page_view', $error);
        }
        else
        {
            $photo_name = $this->upload->data('file_name');

            $data = array('upload_data' => $this->upload->data());
            $this->session->set_userdata('pic', $photo_name);
            $this->load->model('registration_model');
            $this->registration_model->add_photo($photo_name);
            $this->view_load->view('home_page_view');
        }
    }

}
