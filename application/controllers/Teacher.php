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
                $this->session->set_userdata('grade_year', $this->getDefaultYear());
                $output['self_data'] = $this->getSelfData();
                $output['grade'] = $this->getGrade();
                $output['def_year'] = $this->getDefaultYear();

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

    public function my_class($id = -1)
    {
        if ($this->session->userdata('email') !== null && $id == $this->session->userdata('my_class_id')) {
            if ($this->session->userdata('role') == 'teacher') {
                $output['class_data'] = $this->Teachermodel->getGroupById($id);
                $this->load->view('teacher/my_class_view', $output);
            }
        } else {
            $this->load->view('wrong_page');
        }
    }

    public function my_evals($id = -1)
    {
        if ($this->session->userdata('email') !== null && $id == $this->session->userdata('my_id')) {
            if ($this->session->userdata('role') == 'teacher') {
                $output['eval_data'] = $this->Teachermodel->getEvalById($id);
                $this->load->view('teacher/my_evals_view', $output);
            }
        } else {
            $this->load->view('wrong_page');
        }
    }

    public function my_comments($id = -1)
    {
        if ($this->session->userdata('email') !== null && $id == $this->session->userdata('my_id')) {
            if ($this->session->userdata('role') == 'teacher') {
                $output['dataset'] = $this->Teachermodel->getCommentByTeacherId($id);
                $output = $this->getAge($output);
                $this->load->view('teacher/my_comment_view', $output);
            }
        } else {
            $this->load->view('wrong_page');
        }
    }

    public function edit_comment($id=-1)
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'teacher') {
            $id = (int)$id;
            if ($id > 0) {
            $this->session->set_userdata('selected_comment_id', $id);
            }
            $output['comment_teachers'] = $this->Teachermodel->getCommentById($id);
            $data = $this->editBuilder();
            $selected_comment_id = $this->session->userdata('selected_comment_id');
            if($data) {
                $this->Teachermodel->editComment($selected_comment_id, $data);
                $this->load->view('suser/success', $output);
            }
            $this->load->view('teacher/edit_comment', $output);
        }
    }

    public function add_comment() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'teacher') {
            $output = array();

            $this->form_validation->set_rules('teacher_comment', 'Text', 'required');
            $output['comment_children'] = $this->Teachermodel->getChildrenByGrade($this->getGrade());

            $teacher_comment = $this->input->post('teacher_comment');
            $comment_child_id = (int)$this->input->post('comment_child_id');

            if (isset($teacher_comment) && isset($comment_child_id) && $this->form_validation->run() === TRUE) {

                $this->Teachermodel->add_comment($this->getMyId() ,$teacher_comment, $comment_child_id);

                $this->load->view('suser/success', $output);
            }

            $this->load->view('teacher/add_comment', $output);
        }
    }

    public function my_progress_reports($id=-1) {
        if ($this->session->userdata('email') !== null && $id == $this->session->userdata('my_id')) {
            if ($this->session->userdata('role') == 'teacher') {
                $output['dataset'] = $this->Teachermodel->getProgressReportByTeacherId($id);
                $output = $this->getAge($output);
                $this->load->view('teacher/my_progress_report_view', $output);
            }
        } else {
            $this->load->view('wrong_page');
        }
    }

    public function add_report() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'teacher') {
            $output = array();
            $this->form_validation->set_rules('teacher_report', 'Text', 'required');
            $output['report_children'] = $this->Teachermodel->getChildrenByGradeAndTeacher( $this->getMyId(),$this->getGrade());

            $teacher_report = $this->input->post('teacher_report');
            $report_child_id = (int)$this->input->post('report_child_id');
            $quarter = (int)$this->input->post('report_quarter');
            if (isset($teacher_report) && isset($report_child_id) && $this->form_validation->run() === TRUE) {

                $this->Teachermodel->add_report($this->getMyId() ,$teacher_report, $report_child_id, $this->getGrade(), $quarter);

                $this->load->view('suser/success', $output);
            }

            $this->load->view('teacher/add_report', $output);
        }

    }

    public function edit_report($id=-1)
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'teacher') {
            $id = (int)$id;
            if ($id > 0) {
                $this->session->set_userdata('selected_report_id', $id);
            }
            $output['report_teachers'] = $this->Teachermodel->getReportById($id);
            $data = $this->editBuilder();
            $selected_report_id = $this->session->userdata('selected_report_id');
            if($data) {
                $this->Teachermodel->editReport($selected_report_id, $data);
                $this->load->view('suser/success', $output);
            }
            $this->load->view('teacher/edit_report', $output);
        }
    }

    /**
     * Helper functions.
     * camelCase
     * @return array
     */
    private function editBuilder()
    {
        $data = array();

        $teacher_id = (int)$this->input->post('teacher_id');
        $child_id = (int)$this->input->post('child_id');
        $parent_id = (int)$this->input->post('parent_id');
        $edit_comment = $this->input->post('edit_comment_form');
        $edit_report = $this->input->post('edit_report_form');
        $quarter = (int)$this->input->post('report_quarter');


        if (isset($teacher_id) && $teacher_id != "" && $teacher_id !== 0) {
            $data['teacher_id'] = $teacher_id;
        }
        if (isset($child_id) && $child_id != "" && $child_id !== 0) {
            $data['child_id'] = $child_id;
        }
        if (isset($parent_id) && $parent_id != "" && $parent_id !== 0) {
            $data['parent_id'] = $parent_id;
        }
        if (isset($edit_comment) && $edit_comment != "") {
            $data['teacher_comment'] = $edit_comment;
        }
        if (isset($edit_report) && $edit_report != "") {
            $data['progress_post'] = $edit_report;
        }
        if (isset($quarter) && $quarter != "" && $quarter !== 0) {
            $data['quarter'] = $quarter;
        }


        return $data;
    }

    private function getSelfData()
    {
        $email = $this->getEmail();
        $result = $this->Teachermodel->getTeacherByEmail($email);
        $this->session->set_userdata('my_class_id', $result[0]['sid']);
        $this->session->set_userdata('my_id', (int)$result[0]['id']);
        return $result;
    }

    private function getEmail()
    {
        $email = "'" . $this->session->userdata('email') . "'";

        return $email;
    }

    private function getAge(array &$data)
    {
        for($i = 0; $i < sizeof($data['dataset']); $i++) {
            $d = new DateTime(date($data['dataset'][$i]['dob']));
            $dtz = new DateTimeZone("Europe/Budapest"); //Your timezone
            $now = new DateTime(date("Y-m-d"), $dtz);
            $diff = date_diff($now, $d)->format('%y years and %m months');
            $data['dataset'][$i]['age'] = $diff;
        }


        return $data;
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

    private function getQuarter()
    {
        $quarter = (int)$this->input->post('quarter');

        if (isset($quarter) && $quarter !== "" && $quarter !== 0) {
            $this->session->set_userdata('quarter', $quarter);
            $quarter = (int)$this->session->userdata('quarter');
            return $quarter;
        } else {
            return $quarter = 1;
        }
    }

    private function getMyId() {
        return (int)$this->session->userdata('my_id');
    }

}