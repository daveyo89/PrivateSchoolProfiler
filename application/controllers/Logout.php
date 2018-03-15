<?php

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('fullname');
        redirect('home');
    }
}
