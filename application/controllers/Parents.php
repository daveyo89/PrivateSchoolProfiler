<?php

class Parents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Parentmodel'));
        $this->load->helper(array('parent'));
    }


    public function index()
    {
        if ($this->session->userdata('email') !== null) {
            if ($this->session->userdata('role') == 'parent') {
                $output['grade'] = getsGrade();
                $output['self_data'] = $this->getSelfData();

                $output['all_grades'] = $this->Parentmodel->getAllChildrenGrade(getMyId());
                $output['def_year'] = default_date();
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

    private function getSelfData()
    {
        $email = getEmail();
        $result = $this->Parentmodel->getParentByEmail($email, $this->session->userdata('grade_year'));
        $this->session->set_userdata('my_class_id', $result[0]['sid']);
        $this->session->set_userdata('my_id', (int)$result[0]['id']);

        return $result;
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