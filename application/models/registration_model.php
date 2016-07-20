<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// product model zzzz hgfgf tgrt
// product model ccc
class registration_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    /**
     * Set rules for registration
     * @return array
     */
    public function set_rules_for_reg()
    {
        $rules_data = array(
            array(
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'required|max_length[100]'
            ),
            array(
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'required|max_length[100]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'max_length[100]|valid_email|is_unique[users.email]'
            ),
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'max_length[100]|is_unique[users.login]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'password_confirm',
                'label' => 'Password Confirm',
                'rules' => 'trim|required|max_length[100]|matches[password]'
            )
        );
        return $rules_data;
    }

    public function generate_pass_hash($string){
        return md5($string.'key#$%gdf');
    }

    public function user_reg()
    {
        $this->load->helper('string');
        $user_data = [
            'first_name' => $this->input->post('first_name', true),
            'last_name' => $this->input->post('last_name', true),
            'email' => $this->input->post('email', true),
            'login' => $this->input->post('login', true),
            'password' => $this->generate_pass_hash($this->input->post('password', true)),
            'verification_key' => random_string('alnum', 50)
        ];

        $this->db->insert('users', $user_data);
        $this->session->set_userdata('new_user', 0);
        return $user_data;
    }

    public function verify($key)
    {
        $this->db   ->set('status', '1')
                    ->where('verification_key', $key)
                    ->update('users');
    }


    public function log_in($user_data)
    {
        $result = $this->db ->select('user_id, first_name, pic, status')
                            ->where('password', $this->generate_pass_hash($user_data['password']))
                            ->where('login', $user_data['login'])
                            ->limit(1)
                            ->get('users');
        if ($result->num_rows()) {
            $row = $result->row();
            $this->session->set_userdata('user_id', $row->user_id);
            $this->session->set_userdata('first_name', $row->first_name);
            $this->session->set_userdata('pic', $row->pic);
            $this->session->set_userdata('status', $row->status);
        }

    }

    public function add_photo($photo_name)
    {
        $user_id = $this->session->userdata('user_id');
        $this->db   ->set('pic', $photo_name)
                    ->where('user_id', $user_id)
                    ->update('users');
    }


}

























