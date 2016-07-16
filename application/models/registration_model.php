<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// product model zzzz hgfgf tgrt
// product model ccc
class registration_model extends CI_Model
{
    public function __construct()
    {
        $this->load->library('session');
    }

    /**
     * Set rules for registration
     * @return array
     */
    public function set_rules_for_reg(){
        $rules_data = array(
            array(
                'field'   => 'first_name',
                'label'   => 'First Name',
                'rules'   => 'required|max_length[100]'
            ),
            array(
                'field'   => 'last_name',
                'label'   => 'Last Name',
                'rules'   => 'required|max_length[100]'
            ),
            array(
                'field'   => 'Email',
                'label'   => 'email',
                'rules'   => 'max_length[100]|valid_email'
            ),
            array(
                'field'   => 'Login',
                'label'   => 'login',
                'rules'   => 'max_length[100]'
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'trim|required|max_length[100]'
            ),
            array(
                'field'   => 'password_confirm',
                'label'   => 'Password Confirm',
                'rules'   => 'trim|required|max_length[100]|matches[password]'
            )
        );
        return $rules_data;
    }


    public function user_reg($user_data){
        $result = $this->db->insert('users', $user_data);
         if($this->db->affected_rows() === 1){
           $result = $this->db->select('user_id, verification_key')
                 ->where('email', $user_data['email'])
                 ->limit(1)
                 ->get('users');
             $row = $result->row();
             $this->session->set_userdata('user_id', $row->user_id);
             $this->session->set_userdata('first_name', $user_data['first_name']);
             $this->session->set_userdata('last_name', $user_data['last_name']);
             $this->session->set_userdata('email', $user_data['email']);
             $this->session->set_userdata('login', $user_data['login']);
             $this->session->set_userdata('verification_key', $row->verification_key);
             return $user_data['verification_key'];
        } else {
            return false;
        }
    }


    private function activate_account($verification_key){
        $result = $this->db->select('user_id')
            ->where('email', $email_address)
            ->limit(1)
            ->get('users');
        if($this->db->affected_rows === 1){
            return true;
        }else {
            return false;
        }
    }

}

























