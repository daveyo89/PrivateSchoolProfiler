<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array());
    }

    public function index()
	{
        if($this->session->userdata('email') !== null) {
            $output = array();
            $output['role'] = $this->session->userdata('role');

            $this->load->view('welcome_message', $output);

        } else {
            $this->load->view('login');
        }
	}
}
