<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('string');
    }


    public function do_upload()
    {
        $user_id = $this->session->userdata('user_id');
        $config['upload_path']          = './uploads/user'.$user_id;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1200;
        $config['max_height']           = 900;
        $config['file_name'] = time().'_'.rand(1,1000);
        if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
        {
            mkdir($config['upload_path'],0755,TRUE);
        }
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            redirect('albums/get_albums', 'refresh');
        }
        else
        {
            $photo_name = $this->upload->data('file_name');

            $this->session->set_userdata('pic', $photo_name);
            $this->load->model('registration_model');
            $this->registration_model->add_photo($photo_name);
            redirect(site_url('albums/get_albums'));
        }
    }

}
