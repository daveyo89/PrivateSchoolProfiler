<?php

class Suser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Susermodel'));
    }

    public function index() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            if (isset($_POST['grade_year'])) {
                $grade = $this->session->set_userdata('grade_year', $_POST['grade_year']);
            } else {
                $grade = $this->session->userdata('grade_year');
            }
            $output['grade'] = $grade;
            $this->load->view('suser/suser_options', $output);
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function teachers() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->session->userdata('grade_year');
            $output['grade'] = $grade;
            if ($grade) {
                $output['teacher_list'] = $this->Susermodel->getOngoingTeachersGroups($grade);
            $this->load->view('suser/teacher_list', $output);
            }
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function evals($id =-1) {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->session->userdata('grade_year');

            $output['teacher_eval'] = $this->Susermodel->getTeacherEvalsById($id, $grade);

            if ($id > 0) {
                var_dump($output);
                $this->load->view('suser/teacher_list', $output);
            }

        }
    }

    public function comments() {

    }

    public function preports() {

    }

}