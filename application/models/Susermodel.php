<?php

class Susermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $grade
     * Grade tells us the year the class started, for example: 2017 means 2017/2018 class.
     * @return array
     */
    public function getOngoingTeachersGroups($grade, $search_firstname = 0) {
        $sql = "SELECT * FROM teacher tc 
			LEFT JOIN school_group sg ON(tc.group_id = sg.id)
			WHERE sg.grade = " . $grade . " AND
			tc.firstname = ". $search_firstname . "
			ORDER BY firstname;";
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
        $sql = "SELECT * FROM teacher tc
		RIGHT JOIN teacher_eval te ON(tc.id = te.teacher_id)
        WHERE te.eval_grade = ". $grade ." 
        AND tc.firstname = " . $search_firstname . " 
		";
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
    public function getTeacherCommentsById($deleted = 2, $search_firstname = 0, $grade = 2017) {
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

    public function getProgressReports($search_firstname, $grade, $quarter) {
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
                ORDER BY ch.group_id ";

        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function add_teacher() {
        if((int)$child_id > 0){
            $updateArray = array(
                'progress_post'     =>$memo,
                'child_id'          =>$child_id,
                'teacher_id'        =>$teacher_id,
                'schoolgroup_id'    =>$schoolgroup_id
            );

            $this->db->insert('progress_post', $updateArray);
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


    public function getEveryParent() {

    }

    public function getEveryChild() {

    }

}