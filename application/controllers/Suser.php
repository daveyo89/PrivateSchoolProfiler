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
            $output['grade'] = $this->getGrade();
            $this->load->view('suser/suser_options', $output);
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function teachers() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();
            $group_name =$this->getGroupNameSearch();
            $output['grade'] = $grade;
            if ($grade) {
                $output['teacher_list'] = $this->Susermodel->getOngoingTeachersGroups($grade, $search_firstname, $group_name);
            $this->load->view('suser/teacher_list', $output);
            }
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function parents() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();
            $group_name = $this->getGroupNameSearch();

            $output['grade'] = $grade;
            if ($grade) {
                $output['parent_list'] = $this->Susermodel->getOngoingParentsGroups($grade, $search_firstname, $group_name);

                $this->load->view('suser/parent_list', $output);
            }
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function children() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();
            $group_name = $this->getGroupNameSearch();

            $output['grade'] = $grade;
            if ($grade) {
                $output['child_list'] = $this->Susermodel->getOngoingChildrenGroups($grade, $search_firstname, $group_name);
                $this->load->view('suser/child_list', $output);
            }
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function evals($id =-1) {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();

            $output['teacher_eval'] = $this->Susermodel->getTeacherEvalsById($grade, $search_firstname);
            if (isset($output['teacher_eval'])) {
                $this->load->view('suser/teacher_list', $output);
            } else {
                $this->load->view('suser');
            }

        } else {
            $this->load->view('login');
        }
    }

    public function comments() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            if (isset($_POST['deleted'])) {
                $this->session->set_userdata('deleted', $_POST['deleted']);
                $deleted = $this->session->userdata('deleted');
            } else $deleted = 2;

            $search_firstname = $this->getSearch();
            $grade = $this->getGrade();

            $output['comments'] = $this->Susermodel->getTeacherCommentsById($deleted, $search_firstname, $grade);
            if (isset($output['comments'])) {
                $this->load->view('suser/teacher_list', $output);
            } else {
                $this->load->view('suser');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function progress_reports() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $group_name = $this->getGroupNameSearch();
            $search_firstname = $this->getSearch();
            $grade = $this->getGrade();
            $quarter = $this->getQuarter();
            $output['progress_posts'] = $this->Susermodel->getProgressReports($search_firstname, $grade, $quarter, $group_name);

            if (isset($output['progress_posts'])) {
                $this->load->view('suser/teacher_list', $output);
            } else {
                $this->load->view('suser');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function add_teacher() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $email = $this->getEmail();

            $output['groups'] = $this->Susermodel->getEveryGroup($this->getGrade());
            $this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email|is_unique[members.email]');
            $this->form_validation->set_rules('reg_password', 'Password', 'trim|required|min_length[7]');
            $this->form_validation->set_rules('reg_passconf', 'Password Confirmation', 'trim|required|matches[reg_password]');
            if (isset($email) && $this->form_validation->run() === TRUE) {
            $exists = $this->Susermodel->checkEmail($email);
            // If posted email address is not present in members view/table:
                if(!isset($exists[0]->email)) {
                    $config = array(
                        'upload_path' => "assets/uploads/images/teachers/",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "768",
                        'max_width' => "1024"
                    );
                    $this->load->library('upload', $config);

                    $firstname = $this->input->post('firstname'); //Returns radio button (group_id)
                    $lastname = $this->input->post('lastname');
                    $picture_path = $this->input->post('picture');
                    $reg_email = $this->input->post('reg_email');
                    $reg_password = $this->hashPass($this->input->post('reg_password'));
                    $password = $reg_password['password'];
                    $reg_salt = $reg_password['salt'];

                    $schoolgroup_id = (int)$this->input->post('schoolgroup_id');
                    $date_of_birth = $this->input->post('date_of_birth');
                    $this->Susermodel->add_teacher($firstname, $lastname, $picture_path, $reg_email,$date_of_birth ,$schoolgroup_id,$password, $reg_salt);

                    if($this->upload->do_upload($picture_path))
                    {
                        $output['upload_data'] = $this->upload->data();
                        $this->load->view('suser/success', $output);
                    }
                    $this->load->view('suser/success', $output);

                }
           }
            $this->load->view('suser/add_teacher', $output);
        } else {
            $this->load->view('login');
        }
    }

    public function edit_teacher() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();

            $output['teacher_info'] = $this->Susermodel->getEveryTeacher();
            $selected_teacher_id = $this->getSelectedTeacher();

            if($selected_teacher_id) {
                $output['selected_teacher'] = $this->Susermodel->getTeacherById($selected_teacher_id);
            }

            $this->load->view('suser/edit_teacher', $output);
        }
    }

    public function add_parent() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $email = $this->getEmail();

            $output['children'] = $this->Susermodel->getEveryChild($this->getGrade());
            $this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email|is_unique[members.email]');
            $this->form_validation->set_rules('reg_password', 'Password', 'trim|required|min_length[7]');
            $this->form_validation->set_rules('reg_passconf', 'Password Confirmation', 'trim|required|matches[reg_password]');
            if (isset($email) && $this->form_validation->run() === TRUE) {
                $exists = $this->Susermodel->checkEmail($email);
                // If posted email address is not present in members view/table:
                if(!isset($exists[0]->email)) {
                    $config = array(
                        'upload_path' => "assets/uploads/images/teachers/",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "768",
                        'max_width' => "1024"
                    );
                    $this->load->library('upload', $config);

                    $firstname = $this->input->post('firstname'); //Returns radio button (group_id)
                    $lastname = $this->input->post('lastname');
                    $picture_path = $this->input->post('picture');
                    $reg_email = $this->input->post('reg_email');
                    $reg_password = $this->hashPass($this->input->post('reg_password'));
                    $password = $reg_password['password'];
                    $reg_salt = $reg_password['salt'];

                    $child_id = (int)$this->input->post('child_id');
                    $this->Susermodel->add_parent($firstname, $lastname, $picture_path, $reg_email ,$child_id,$password, $reg_salt);

                    if($this->upload->do_upload($picture_path))
                    {
                        $output['upload_data'] = $this->upload->data();
                        $this->load->view('suser/success', $output);
                    }
                    $this->load->view('suser/success', $output);

                }
            }
            $this->load->view('suser/add_parent', $output);
        } else {
            $this->load->view('login');
        }
    }

    public function add_child() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();

            $output['groups'] = $this->Susermodel->getEveryGroup($this->getGrade());
            $this->form_validation->set_rules('firstname', 'First name', 'required');
            $this->form_validation->set_rules('lastname', 'Last name', 'required');
            $this->form_validation->set_rules('date_of_birth', 'Date of birth', 'required');
            $this->form_validation->set_rules('reg_grade', 'Starting year', 'required');
            $this->form_validation->set_rules('reg_group_id', 'Select Class', 'required');

            if (isset($output['groups']) && $this->form_validation->run() === TRUE) {
                if(!isset($exists[0]->email)) {
                    $config = array(
                        'upload_path' => "assets/uploads/images/teachers/",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "768",
                        'max_width' => "1024"
                    );
                    $this->load->library('upload', $config);

                    $firstname = $this->input->post('firstname'); //Returns radio button (group_id)
                    $lastname = $this->input->post('lastname');
                    $date_of_birth = $this->input->post('date_of_birth');
                    $reg_group_id = $this->input->post('reg_group_id');
                    $picture_path = $this->input->post('picture');
                    $reg_grade = $this->input->post('reg_grade');

                    $this->Susermodel->add_child($firstname, $lastname, $date_of_birth, $reg_group_id, $picture_path, $reg_grade);

                    if($this->upload->do_upload($picture_path))
                    {
                        $output['upload_data'] = $this->upload->data();
                        $this->load->view('suser/success', $output);
                    }
                    $this->load->view('suser/success', $output);

                }
            }
            $this->load->view('suser/add_child', $output);
        } else {
            $this->load->view('login');
        }
    }

    public function add_eval() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();
            $output['eval_teachers'] = $this->Susermodel->getEvalTeachers($grade, $search_firstname);

            $this->form_validation->set_rules('teacher_eval', 'Text', 'required');

            $teacher_eval = $this->input->post('teacher_eval');
            $teacher_eval_id = (int)$this->input->post('eval_teacher_id');

            if (isset($teacher_eval) && isset($teacher_eval_id) && $this->form_validation->run() === TRUE ) {
                $grade = $this->getGrade();
                $this->Susermodel->add_eval($teacher_eval_id, $teacher_eval, $grade);

                $this->load->view('suser/success', $output);
            }

            $this->load->view('suser/add_eval', $output);
        }
    }

    public function success() {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $this->load->view('suser/success');
        }
    }

    private function getEmail() {
        $reg_email = "'" . $this->input->post('reg_email') . "'" ;

        if (isset($reg_email) && $reg_email !== "") {
            $this->session->set_userdata('reg_email', $reg_email);
            $reg_email = $this->session->userdata('reg_email');
        } else {
            $reg_email = $this->session->userdata('reg_email');
        }
        return $reg_email;
    }

    private function getGrade() {
        $grade = $this->input->post('grade_year');

        if (isset($grade) && $grade !== "") {
            $this->session->set_userdata('grade_year', $grade);
            $grade = $this->session->userdata('grade_year');
        } else {
            $grade = $this->session->userdata('grade_year');
        }
        return $grade;
    }

    private function getSelectedTeacher() {
        $selected_teacher = $this->input->post('edit_teacher_id');

        if (isset($selected_teacher)) {
            $this->session->set_userdata('selected_teacher', $selected_teacher);
            $selected_teacher = $this->session->userdata('selected_teacher');
        } elseif ($selected_teacher == "") {
            $this->session->unset_userdata('edit_teacher_id');
        } else {
            $selected_teacher = $this->session->userdata('selected_teacher');
        }
        return $selected_teacher;
    }

    private function getQuarter() {
        $quarter = $this->input->post('quarter');

        if (isset($quarter) && $quarter !== "") {
            $this->session->set_userdata('quarter', $_POST['quarter']);
            $quarter = (int)$this->session->userdata('quarter');
            return $quarter;
        } else {

            return $quarter = 1;
        }
    }

    private function getSearch() {
        $search = $this->input->post('search');

        if (isset($search) && (!is_numeric($search)) && $search !== "") {
            $this->session->set_userdata('search', $_POST['search']);
            $search = "\"" . $this->session->userdata('search'). "\"";
            return $search;
        } else {
            return $search = 0;
        }
    }

    private function getGroupNameSearch() {
        $search = $this->input->post('group_name_search');

        if (isset($search) && (!is_numeric($search)) && $search !== "") {
            $this->session->set_userdata('group_name_search', $_POST['group_name_search']);
            $search = "\"" . $this->session->userdata('group_name_search'). "\"";
            return $search;
        } else {
            return $search = 0;
        }
    }

    private function hashPass($password) {
        try {
            $salt = random_int(100, 999);
            $password = hash('sha512', $password . $salt);
        } catch (Exception $e) {
            print $e;
        }
        return array(
            'password' => $password,
            'salt' => $salt
        );
    }

}
