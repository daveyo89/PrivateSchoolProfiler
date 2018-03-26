<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array());
    }

    public function index() {
        $output = array();
        $output['user_data'] = $this->getCurrentUserData();

        if ($this->session->userdata('email') !== null && $this->session->userdata('role') === 'suser') {
            redirect(base_url('Suser'));
        } elseif ($this->session->userdata('email') !== null && $this->session->userdata('role') === 'teacher') {
            redirect(base_url('Teacher'));
        } elseif ($this->session->userdata('email') !== null && $this->session->userdata('role') === 'parent') {
            redirect(base_url('Parents'));
        } else {
            $this->load->view('login');
        }
    }


    private function getCurrentUserData(){
        if ($this->session->userdata('email') !== null && array_search($this->session->userdata('role'), array('teacher', 'suser', 'parent'))) {
            $userData = array();
            $userData = [
                'fullname' => $this->session->userdata('fullname'),
                'email' => $this->session->userdata('email'),
                'role' => $this->session->userdata('role'),
                'picture_path' => $this->session->userdata('picture_path'),
            ];
            return $userData;
        }
        return array();
    }

}
