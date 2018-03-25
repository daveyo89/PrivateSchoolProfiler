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
                $output['self_data'] = $this->getSelfData();
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

    public function my_class($id=-1){
        if ($this->session->userdata('email') !== null && $id == $this->session->userdata('my_class_id') ) {
            if ($this->session->userdata('role') == 'teacher') {
                $output['class_data'] = $this->Teachermodel->getGroupById($id);

                $this->load->view('teacher/my_class_view', $output);
            }
        } else {
            $this->load->view('wrong_page');
        }
    }

    public function my_evals($id=-1){
        if ($this->session->userdata('email') !== null && $id == $this->session->userdata('my_id') ) {
            if ($this->session->userdata('role') == 'teacher') {
                $output['eval_data'] = $this->Teachermodel->getEvalById($id);

                $this->load->view('teacher/my_evals_view', $output);
            }
        } else {
            $this->load->view('wrong_page');
        }
    }

    private function getSelfData(){
        $email = $this->getEmail();
        $result = $this->Teachermodel->getTeacherByEmail($email);
        $this->session->set_userdata('my_class_id', $result[0]['sid']);
        $this->session->set_userdata('my_id', $result[0]['id']);
        return $result;
    }
    private function getEmail()
    {
        $email = "'" . $this->session->userdata('email') . "'";

        return $email;
    }
}