<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class View_load
{
    private $get_inst;

    public function __construct()
    {
        $this->get_inst = &get_instance();
    }

    public function view($view, $data = null)
    {
        $this->get_inst->load->view('header', $data);
        $this->get_inst->load->view($view);
        $this->get_inst->load->view('footer');
    }
}