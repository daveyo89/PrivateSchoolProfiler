<?php

/**
 * Class Susermodel
 */
class Susermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $grade
     * Grade tells us the year the class started, for example: 2017 means 2017/2018 class.
     * @param $search_firstname
     * @param $group_name
     * @return array
     */
    public function getOngoingTeachersGroups($grade, $search_firstname, $group_name) {
        $sql = "SELECT * FROM teacher tc 
			LEFT JOIN school_group sg 
			ON(tc.group_id = sg.id)
			WHERE sg.grade = " . $grade . " 
			AND tc.firstname = ". $search_firstname . " 
			AND sg.group_name = ". $group_name . " 
			ORDER BY tc.id;";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * @param $grade
     * @param $search_firstname
     * @param $group_name
     * @return array
     */
    public function getOngoingChildrenGroups($grade, $search_firstname, $group_name) {
        $sql = "SELECT ch.id cid, ch.firstname cfname, ch.lastname clname, dob,ch.picture_path cpp, group_id, crd_ch, ch.grade,
	    sg.id sgid, group_name, group_picture, sg.grade sgrade, p.firstname pfname, p.lastname plname, p.picture_path ppp
			FROM child ch 
			LEFT JOIN school_group sg ON(ch.group_id = sg.id)
            LEFT JOIN parent p ON (ch.parent_id = p.id)
			WHERE sg.grade = " . $grade . "
            AND ch.firstname = ". $search_firstname ."
            AND sg.group_name = ". $group_name ."
			ORDER BY ch.id;";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getOngoingParentsGroups($grade, $search_firstname, $group_name) {
        $sql = "SELECT pa.id pid, group_concat(\"  \", concat(ch.firstname,\"  \", ch.lastname)) as pchild,group_concat(\"  \", sg.group_name, \"  \") as gcsgn, pa.firstname paf, pa.lastname pal, pa.email, pa.picture_path papp,
                       sg.id sgid, sg.group_name sgname, sg.group_picture sggp, sg.grade
                FROM privateschoolprofiler.parent pa
                LEFT JOIN child ch ON(pa.id = ch.parent_id)
                RIGHT join school_group sg ON(ch.group_id = sg.id)
                WHERE pa.firstname = ". $search_firstname ."
                AND sg.group_name = ". $group_name ."
                AND sg.grade = ". $grade ."
                GROUP BY pid";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * @param $grade
     *
     * Get teacher evaluations by year, on teachers, only returning teachers with evaluations, hence right join.
     *
     * @return array
     */
    public function getTeacherEvalsById($grade=2017, $search_firstname = 0) {
        $sql = "SELECT tc.id tid, firstname, lastname, email, crd, dob, picture_path, group_id, deleted, 
                       te.id, te.teacher_eval, te.crd_eval, te.teacher_id, te.eval_grade FROM teacher tc
                LEFT JOIN teacher_eval te ON (tc.id = te.teacher_id)
                WHERE te.eval_grade = ". $grade ." 
                AND firstname = " . $search_firstname . " ";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * @param int $deleted
     * @param int $search_firstname
     * @param int $grade
     * @return array
     */
    public function getTeacherCommentsById($deleted = 2, $search_firstname, $grade) {
        $sql = "SELECT tc.firstname fn, tc.lastname ln, tc.picture_path pcp, tc.deleted, teacher_comment tcc, teacher_id 
                tcid, crd_cm, cm.child_id cid, ch.firstname cfn, ch.lastname cln, ch.group_id cgid, sg.group_name sggn, 
                sg.group_picture sggp, sg.grade sgg 
        FROM teacher tc
		RIGHT JOIN comment cm ON(tc.id = cm.teacher_id)
        RIGHT JOIN child ch ON (cm.child_id = child_id)
        RIGHT JOIN school_group sg ON (ch.group_id = sg.id)
        WHERE tc.deleted = " . $deleted . " 
        AND tc.firstname = " . $search_firstname ." 
        AND sg.grade = " . $grade ."
        ORDER BY cfn
		";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getProgressReports($search_firstname, $grade, $quarter, $group_name) {
        $sql = "SELECT pp.id, pp.progress_post ppp, pp.child_id pcid, 
                    pp.teacher_id ptid, pp.crd_pp, pp.updated, pp.quarter, pp.grade, 
                    tc.firstname tfn, tc.lastname tln, tc.picture_path tcp,
                    ch.firstname cfn, ch.lastname cln, ch.picture_path cpp, ch.group_id,
                    sg.group_name sgn, sg.group_picture sgp
                FROM progress_post pp
                LEFT JOIN teacher tc ON(pp.teacher_id = tc.id)
                LEFT JOIN child ch ON(pp.child_id = ch.id)
                LEFT JOIN school_group sg ON(ch.group_id = sg.id)
                WHERE pp.grade = ". $grade ." 
                AND pp.quarter = " . $quarter . " 
                AND tc.firstname = ". $search_firstname ."
                AND sg.group_name = " . $group_name . "
                ORDER BY ch.group_id ";

        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getEvalTeachers($grade, $search_firstname) {
        $sql = "SELECT tc.id tid, firstname, lastname, email, crd, dob, picture_path, group_id, deleted,grade, 
                       te.id, te.teacher_eval, te.crd_eval, te.teacher_id, te.eval_grade FROM teacher tc
                LEFT JOIN teacher_eval te ON (tc.id = te.teacher_id)
                WHERE tc.grade = ". $grade . " 
                AND firstname = ". $search_firstname." 
                GROUP BY tid";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function add_teacher($firstname, $lastname, $picture_path, $reg_email,$date_of_birth ,$schoolgroup_id,$password, $reg_salt) {
        if(isset($reg_email) > 0){
            $insertArray = array(
                'firstname'     =>$firstname,
                'lastname'      =>$lastname,
                'picture_path'  =>$picture_path,
                'email'         =>$reg_email,
                'group_id'      =>$schoolgroup_id,
                'dob'           =>$date_of_birth,
                'password'      =>$password,
                'salt'          =>$reg_salt,
            );
            $this->db->insert('teacher', $insertArray);
        }
    }

    public function add_parent($firstname, $lastname, $picture_path, $reg_email, $password, $reg_salt) {
        if(isset($reg_email) > 0){
            $insertArray = array(
                'firstname'     =>$firstname,
                'lastname'      =>$lastname,
                'picture_path'  =>$picture_path,
                'email'         =>$reg_email,
                'password'      =>$password,
                'salt'          =>$reg_salt,
            );
            $this->db->insert('parent', $insertArray);
        }
    }

    public function add_child($firstname, $lastname, $dob, $group_id, $picture_path, $grade) {
        if(isset($firstname, $lastname, $dob, $group_id)){
            $insertArray = array(
                'firstname'     =>$firstname,
                'lastname'      =>$lastname,
                'dob'         =>$dob,
                'group_id'      =>$group_id,
                'picture_path'      =>$picture_path,
                'grade'          =>$grade,
            );
            $this->db->insert('child', $insertArray);
        }
    }

    public function add_eval($tid, $teacher_eval, $grade){
        if (isset($tid)) {
            $insertArray = array(
                'teacher_id' => $tid,
                'teacher_eval' => $teacher_eval,
                'eval_grade' => $grade
            );
            $this->db->insert('teacher_eval', $insertArray);
        }
    }

    public function getEveryGroup($grade) {
        $sql = "SELECT * FROM school_group
                WHERE grade = ". $grade ." ";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getTeacherById($teacher_id) {
        $sql = "SELECT tc.id tid, firstname, lastname, email, password, salt, crd, dob, picture_path, group_id,
                       deleted, tc.grade, sg.id sgid, group_name, group_picture, sg.grade ggrd 
                       FROM teacher tc
                       LEFT JOIN school_group sg 
                       ON(group_id = sg.id)
                       WHERE tc.id = ". $teacher_id .";";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getParentById($parent_id) {
        $sql = "SELECT pa.id pid, pa.firstname, pa.lastname, email, password, salt, crd, pa.picture_path, pa.deleted, 
                       ch.id cid, ch.firstname cfn, ch.lastname cfl,dob,crd_ch, ch.picture_path chpp, ch.grade chgrade, ch.deleted ch_deleted
                       FROM parent pa
                       LEFT JOIN child ch 
                       ON(parent_id = pa.id)
                       WHERE pa.id =". $parent_id .";";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getChildById($child_id) {
        $sql = "SELECT ch.id cid, ch.firstname, ch.lastname, dob, group_id, ch.picture_path, crd_ch, grade, parent_id, ch.deleted,
		p.firstname pfname, p.lastname plname, p.email, p.deleted pdel, p.picture_path ppp, p.updated
                       FROM child ch
                       LEFT JOIN parent p 
                       ON(parent_id = p.id)
                       WHERE ch.id = ". $child_id ." ";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getEveryTeacher() {
        $sql = "SELECT tc.id tid, firstname, lastname, email, password, salt, crd, dob, picture_path, group_id,
                       deleted, tc.grade, sg.id sgid, group_name, group_picture, sg.grade ggrd 
                       FROM teacher tc
                       LEFT JOIN school_group sg 
                       ON(group_id = sg.id);";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getEveryParent() {
        $sql = "SELECT p.id pid, p.firstname pfname, p.lastname plname, email, password, salt, crd,deleted, p.picture_path
                       FROM parent p
                       ";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getEveryChild() {
        $sql = "SELECT * FROM child";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function checkEmail($email) {
        $sql = "SELECT email FROM members where email = ". $email ." ";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function editMember($table_name, $selected_teacher_id, array $editData) {
        $this->db->where('id', $selected_teacher_id);
        $this->db->update($table_name, $editData);
    }


}