<?php

class Suser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Susermodel'));
    }

    public function index()
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $output['grade'] = $this->getGrade();
            $output['user_data'] = $this->getCurrentUserData();

           // $this->session->unset_userdata('chosen');

            $this->load->view('suser/suser_options', $output);
        } else {

            $this->load->view('welcome_message');
        }
    }

    /**
     * Selection functions
     */
    public function teachers()
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();
            $group_name = $this->getGroupNameSearch();
            $output['grade'] = $grade;
            if ($grade) {
                $output['teacher_list'] = $this->Susermodel->getOngoingTeachersGroups($grade, $search_firstname, $group_name);
                $this->load->view('suser/teacher_list', $output);
            }
        } else {
            $this->load->view('welcome_message');
        }
    }

    public function parents()
    {
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

    public function children()
    {
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

    public function evals($id = -1)
    {
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

    public function comments()
    {
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

    public function progress_reports()
    {
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

    /**
     * Add, Edit functions
     */
    public function add_teacher()
    {
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
                if (!isset($exists[0]->email)) {
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
                    $this->Susermodel->add_teacher($firstname, $lastname, $picture_path, $reg_email, $date_of_birth, $schoolgroup_id, $password, $reg_salt);

                    if ($this->upload->do_upload($picture_path)) {
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

    // TODO To show FLP (upload not clear
    public function add_parent()
    {
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
                if (!isset($exists[0]->email)) {
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

                    $this->Susermodel->add_parent($firstname, $lastname, $picture_path, $reg_email, $password, $reg_salt);

                    if ($this->upload->do_upload($picture_path)) {
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

    public function edit_member()
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $output['chosen'] =  $this->getChosenMember();

            switch ($this->session->userdata('selected_member')){
                case "teacher":
                    $this->edit_teacher_function($output);
                    break;
                case "parent":
                    $this->edit_parent_function($output);
                    break;
                case "child":
                    $this->edit_child_function($output);
                    var_dump($output);
                    break;
                default:
                    $this->load->view('suser/edit_member');
            }
        }
    }

    public function edit_teacher_function(array $output){
        $output['teacher_info'] = $this->Susermodel->getEveryTeacher();
        $output['groups'] = $this->Susermodel->getEveryGroup($this->getGrade());

        $selected_teacher_id = $this->getSelectedTeacher();
        if ($selected_teacher_id) {
            $output['selected_teacher'] = $this->Susermodel->getTeacherById($selected_teacher_id);
            $this->session->set_userdata('selected_teacher_id', $selected_teacher_id);
        }


        $editData = $this->editBuilder();
        if ($editData) {
            $selected_teacher_id = $this->session->userdata('selected_teacher_id');

            $this->Susermodel->editMember($this->getTableName(),$selected_teacher_id, $editData);
            $this->load->view('suser/success', $output);
        }
        $this->load->view('suser/edit_member', $output);
    }

    public function edit_parent_function(array $output){
        $output['parent_info'] = $this->Susermodel->getEveryParent();

        $selected_parent_id = $this->getSelectedParent();
        if ($selected_parent_id) {
            $output['selected_parent'] = $this->Susermodel->getParentById($selected_parent_id);
            $this->session->set_userdata('selected_parent_id', $selected_parent_id);
        }

        $editData = $this->editBuilder();
        if ($editData) {
            $selected_parent_id = $this->session->userdata('selected_parent_id');
            $this->Susermodel->editMember($this->getTableName(),$selected_parent_id, $editData);
            $this->load->view('suser/success', $output);
        }
        $this->load->view('suser/edit_member', $output);
    }

    public function edit_child_function(array $output){
        $output['child_info'] = $this->Susermodel->getEveryChild();

        $selected_child_id = $this->getSelectedChild();
        if ($selected_child_id) {

            $output['selected_child'] = $this->Susermodel->getChildById($selected_child_id);
            $this->session->set_userdata('selected_child_id', $selected_child_id);
        }

        $editData = $this->editBuilder();
        if ($editData) {
            $selected_child_id = $this->session->userdata('selected_child_id');
            $this->Susermodel->editMember($this->getTableName(), $selected_child_id, $editData);
            $this->load->view('suser/success', $output);
        }
        $this->load->view('suser/edit_member', $output);
    }

    private function getTableName() {
        $table_name = ($this->session->userdata('selected_member'));
        return $table_name;
    }

    public function add_child()
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();

            $output['groups'] = $this->Susermodel->getEveryGroup($this->getGrade());
            $this->form_validation->set_rules('firstname', 'First name', 'required');
            $this->form_validation->set_rules('lastname', 'Last name', 'required');
            $this->form_validation->set_rules('date_of_birth', 'Date of birth', 'required');
            $this->form_validation->set_rules('reg_grade', 'Starting year', 'required');
            $this->form_validation->set_rules('reg_group_id', 'Select Class', 'required');

            if (isset($output['groups']) && $this->form_validation->run() === TRUE) {
                if (!isset($exists[0]->email)) {
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

                    if ($this->upload->do_upload($picture_path)) {
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

    public function add_eval()
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $output = array();
            $grade = $this->getGrade();
            $search_firstname = $this->getSearch();
            $output['eval_teachers'] = $this->Susermodel->getEvalTeachers($grade, $search_firstname);

            $this->form_validation->set_rules('teacher_eval', 'Text', 'required');

            $teacher_eval = $this->input->post('teacher_eval');
            $teacher_eval_id = (int)$this->input->post('eval_teacher_id');

            if (isset($teacher_eval) && isset($teacher_eval_id) && $this->form_validation->run() === TRUE) {
                $grade = $this->getGrade();
                $this->Susermodel->add_eval($teacher_eval_id, $teacher_eval, $grade);

                $this->load->view('suser/success', $output);
            }

            $this->load->view('suser/add_eval', $output);
        }
    }

    /**
     * Helper functions
     */
    private function editBuilder()
    {
        $data = array();
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $picture_path = $this->input->post('picture');
        $reg_email = $this->input->post('reg_email');
        $reg_grade = $this->input->post('edit_grade');
        $reg_deleted = $this->input->post('reg_deleted');
        $pw = $this->input->post('reg_password');
        $schoolgroup_id = (int)$this->input->post('schoolgroup_id');
        $date_of_birth = $this->input->post('date_of_birth');

        if (isset($firstname) && $firstname != "") {
            $data['firstname'] = $firstname;
        }
        if (isset($lastname) && $lastname != "") {
            $data['lastname'] = $lastname;
        }
        if (isset($picture_path) && $picture_path != "") {
            $data['picture_path'] = $picture_path;
        }
        if (isset($reg_email) && $reg_email != "") {
            $data['email'] = $reg_email;
        }
        if (isset($reg_grade) && $reg_grade != "") {
            $data['grade'] = $reg_grade;
        }
        if (isset($reg_deleted) && $reg_deleted != "") {
            $data['deleted'] = $reg_deleted;
        }
        if (isset($pw) && $pw != "") {
            $reg_password = $this->hashPass($this->input->post('reg_password'));
            $data['password'] = $reg_password['password'];
            $data['salt'] = $reg_password['salt'];
        }
        if (isset($schoolgroup_id) && $schoolgroup_id != "") {
            $data['group_id'] = $schoolgroup_id;
        }
        if (isset($date_of_birth) && $date_of_birth != "") {
            $data['dob'] = $date_of_birth;
        }
        return $data;
    }

    public function success()
    {
        if ($this->session->userdata('email') !== null && $this->session->userdata('role') == 'suser') {
            $this->load->view('suser/success');
        }
    }

    private function getEmail()
    {
        $reg_email = "'" . $this->input->post('reg_email') . "'";

        if (isset($reg_email) && $reg_email !== "") {
            $this->session->set_userdata('reg_email', $reg_email);
            $reg_email = $this->session->userdata('reg_email');
        } else {
            $reg_email = $this->session->userdata('reg_email');
        }
        return $reg_email;
    }

    private function getGrade()
    {
        $grade = $this->input->post('grade_year');

        if (isset($grade) && $grade !== "") {
            $this->session->set_userdata('grade_year', $grade);
            $grade = $this->session->userdata('grade_year');
        } else {
            $grade = $this->session->userdata('grade_year');
        }
        return $grade;
    }

    private function getSelectedChild()
    {
        $selected_child = $this->input->post('edit_child_id');
        if (isset($selected_child)) {
            $this->session->set_userdata('selected_child', $selected_child);
            $selected_child = $this->session->userdata('selected_child');
        } elseif ($selected_child == "") {
            $this->session->unset_userdata('edit_child_id');
        } else {
            $selected_child = $this->session->userdata('selected_child');
        }
        return $selected_child;
    }

    private function getSelectedTeacher()
    {
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


    private function getSelectedParent()
    {
        $selected_parent = $this->input->post('edit_parent_id');

        if (isset($selected_parent)) {
            $this->session->set_userdata('selected_parent', $selected_parent);
            $selected_parent = $this->session->userdata('selected_parent');
        } elseif ($selected_parent == "") {
            $this->session->unset_userdata('edit_parent_id');
        } else {
            $selected_parent = $this->session->userdata('selected_parent');
        }
        return $selected_parent;
    }

    private function getQuarter()
    {
        $quarter = $this->input->post('quarter');

        if (isset($quarter) && $quarter !== "") {
            $this->session->set_userdata('quarter', $_POST['quarter']);
            $quarter = (int)$this->session->userdata('quarter');
            return $quarter;
        } else {

            return $quarter = 1;
        }
    }

    private function getSearch()
    {
        $search = $this->input->post('search');

        if (isset($search) && (!is_numeric($search)) && $search !== "") {
            $this->session->set_userdata('search', $_POST['search']);
            $search = "\"" . $this->session->userdata('search') . "\"";
            return $search;
        } else {
            return $search = 0;
        }
    }

    private function getGroupNameSearch()
    {
        $search = $this->input->post('group_name_search');

        if (isset($search) && (!is_numeric($search)) && $search !== "") {
            $this->session->set_userdata('group_name_search', $_POST['group_name_search']);
            $search = "\"" . $this->session->userdata('group_name_search') . "\"";
            return $search;
        } else {
            return $search = 0;
        }
    }

    private function hashPass($password)
    {
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

    private function getChosenMember()
    {
        $chosen = $this->input->post('chosen');

        if (isset($chosen)) {
            $this->session->set_userdata('selected_member', $chosen);
            $chosen = $this->session->userdata('selected_member');
        } elseif ($chosen == "") {
            $this->session->unset_userdata('chosen');
        } else {
            $chosen = $this->session->userdata('selected_member');
        }
        return $chosen;
    }

}
