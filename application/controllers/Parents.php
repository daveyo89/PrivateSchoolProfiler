<?php

class Parents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Parentmodel'));
    }


    public function index()
    {
        if ($this->session->userdata('email') !== null) {
            if ($this->session->userdata('role') == 'parent') {
                $this->session->set_userdata('grade_year', $this->getDefaultYear());
                $output['grade'] = $this->getGrade();
                $output['self_data'] = $this->getSelfData();
                $output['all_grades'] = $this->Parentmodel->getAllChildrenGrade($this->getMyId());
                $output['def_year'] = $this->getDefaultYear();
                if ($output) {
                    $this->load->view('parent/parent_options', $output);
                } else {
                    $this->load->view('welcome_parent');
                }
            } else {
                $this->load->view('login');
            }
        } else {
            redirect(base_url('Login'));
        }
    }

    public function my_child($id) {
        if ($this->session->userdata('email') !== null && array_search($id, $this->getMyChildren()) !== false) {
            if ($this->session->userdata('role') == 'parent') {
                $output['child_info'] = $this->Parentmodel->getDetailedChildById($id);

                $this->load->view('parent/detailed_child', $output);
            } else {
                $this->load->view('wrong_page');
            }
        } else {
            $this->load->view('wrong_page');
        }
    }


    private function getDefaultYear() {
        $date = explode('-', date('Y-m',time()));
        $def_year = ((int)$date[1] < 9 ? $date[0]-1 : $date[0]);
        return $def_year;
    }

    public function getGrade()
    {
        $grade = (int)$this->input->post('grade_year');

        if (isset($grade) && $grade !== "" && $grade !== 0) {
            $this->session->set_userdata('grade_year', $grade);
            $grade = $this->session->userdata('grade_year');
        } else {
            $grade = $this->session->userdata('grade_year');
        }
        return $grade;
    }

    private function getSelfData()
    {
        $email = $this->getEmail();
        $result = $this->Parentmodel->getParentByEmail($email, $this->session->userdata('grade_year'));
        $this->session->set_userdata('my_class_id', $result[0]['sid']);
        $this->session->set_userdata('my_id', (int)$result[0]['id']);

        return $result;
    }

    private function getEmail()
    {
        $email = "'" . $this->session->userdata('email') . "'";

        return $email;
    }

    private function getMyId() {
        return (int)$this->session->userdata('my_id');
    }

    private function getMyChildren() {
        $result = array();
        $result = $this->Parentmodel->getChildrenIdByParentId($this->session->userdata('my_id'));
        for ($i = 0; $i < sizeof($result); $i++) {
            $ids[]=(int)$result[$i]['id'];
        }
        return $ids;
    }

}