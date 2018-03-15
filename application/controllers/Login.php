<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email') == null) {
            // basic email field with email validation
            $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
            // password field with confirmation field matching
            $this->form_validation->set_rules('user_password', 'Password', 'required|trim|callback_userCheck');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('login');
            } else {
                $this->load->view('welcome_message');
            }
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function userCheck()
    {
        $email = $this->input->post('user_email');
        $password = $this->input->post('user_password');
        $this->load->model('Loginmodel');
        $auser = $this->Loginmodel->GetUserByEmail($email);
        if (count($auser) > 0) {
            $hashpass = hash('sha512', $password . $auser[0]->salt);
            if ($hashpass === $auser[0]->password) {
                $this->session->set_userdata('fullname', $auser[0]->firstname." ".$auser[0]->lastname);
                $this->session->set_userdata('email', $auser[0]->email);
                $this->session->set_userdata('role', $auser[0]->role);
                $this->session->set_userdata('picture_path', $auser[0]->picture_path);
                return true;
            }
        }
        $this->form_validation->set_message('userCheck', 'Invalid username or password');
        return false;
    }
}
