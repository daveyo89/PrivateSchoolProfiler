<?php

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Teachermodel'));
    }

    public function index()
    {
        if ($this->session->userdata('email') !== null) {
            if ($this->session->userdata('role') == 'teacher') {
                $email = $this->getEmail();
                $output = array();
                $output['self_data'] = $this->Teachermodel->getTeacherByEmail($email);
                $output['grade'] = $output['self_data'][0]['grade'];
                var_dump($output);
                if ($output) {
                    $this->load->view('teacher/teacher_options', $output);
                } else {
                    $this->load->view('welcome_teacher');
                }
            } else {
                $this->load->view('login');
            }

        } else {
            redirect(base_url('Login'));
        }
    }

    private function getEmail()
    {
        $email = "'" . $this->session->userdata('email') . "'";

        return $email;
    }
}