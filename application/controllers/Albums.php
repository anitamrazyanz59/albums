<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('album_model');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

    }

    public function get_albums(){
        $data['albums'] =  $this->album_model->get_user_albums();
        $this->view_load->view('home_page_view', $data);

    }
    public function add_album(){

        if( $this->input->post('new_album_name')){
            $added_data['album_name'] = $this->input->post('new_album_name', true);
            $added_data['user_id'] = $this->session->userdata('user_id');
            $album_id = $this->album_model->add_album($added_data);
            $path = "uploads/user".$added_data['user_id']."/".$album_id;
            if(!is_dir($path)) //create the folder if it's not already exists
            {
                mkdir($path,0755,TRUE);
            }
            redirect(site_url('albums/get_albums'));
        }

    }

    public function album($album_id,$user_id){
        $album_name = $this->album_model->get_album($album_id);
        $pics = $this->album_model->show_album_and_pics($album_id);
        $this->view_load->view('album_view', compact('pics', 'album_name', 'album_id') );
    }

    public function add_album_pic(){
        $pic_data = [
            'album_id'    => $this->input->post('album_id')
        ];

        $user_id = $this->session->userdata('user_id');
        $config['upload_path']          = "./uploads/user".$user_id."/".$pic_data['album_id']."/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name'] = time().'_'.rand(1,1000);
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata('upload_error', $error);
            redirect('albums/album/'.$pic_data['album_id'].'/'.$user_id, 'refresh');
        }
        else
        {
            $pic_data['pic_src'] = $this->upload->data('file_name');
            $this->session->set_userdata('upload_error', '');
            $this->album_model->add_pic($pic_data);
            redirect('albums/album/'.$pic_data['album_id'].'/'.$user_id, 'refresh');
        }
    }

    public function del_album_pic($album_id, $pic_id){
        $pic_data = [
            'user_id' => $this->session->userdata('user_id'),
            'pic_id'  => $pic_id,
            'album_id'=> $album_id

        ];
        $this->album_model->del_album_pic($pic_data);
        redirect('albums/album/'.$album_id.'/'.$pic_data['user_id'], 'refresh');
    }

    public function del_album($album_id){

        $this->album_model->del_album($album_id);
        redirect('albums/get_albums/', 'refresh');
    }



}
