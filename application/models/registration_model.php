<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// product model zzzz hgfgf tgrt
// product model ccc
class registration_model extends CI_Model
{
    /**
     *
     * @return array
     */
    public function set_rules_for_reg(){
        $rules_data = array(
            array(
                'field'   => 'first_name',
                'label'   => 'First Name',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'last_name',
                'label'   => 'Last Name',
                'rules'   => 'required|max_length[100]'
            ),
            array(
                'field'   => 'Email',
                'label'   => 'email',
                'rules'   => 'required|max_length[100]|valid_email'
            ),
            array(
                'field'   => 'Login',
                'label'   => 'login',
                'rules'   => 'required|max_length[100]'
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

    }
}
