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
    public function getOngoingTeachersGroups($grade) {
        $sql = "SELECT * FROM teacher tc 
			LEFT JOIN school_group sg ON(tc.group_id = sg.id)
			WHERE sg.grade = " . $grade . "
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
    public function getTeacherEvalsById($grade) {
        $sql = "SELECT * FROM teacher tc
		RIGHT JOIN teacher_eval te ON(tc.id = te.teacher_id)
        WHERE te.eval_grade = ". $grade ."
		";
        $query = $this->db->query($sql);
        $result = array();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function getTeacherCommentsById($deleted = 2, $search_firstname = 0, $grade = 2017) {
        $sql = "SELECT tc.firstname fn, tc.lastname ln, tc.picture_path pcp, tc.deleted, teacher_comment tcc, teacher_id 
                tcid, crd_cm, cm.child_id cid, ch.firstname cfn, ch.lastname cln, ch.group_id cgid, sg.group_name sggn, 
                sg.group_picture sggp, sg.grade sgg 
        FROM teacher tc
		RIGHT JOIN comment cm ON(tc.id = cm.teacher_id)
        RIGHT JOIN child ch on (cm.child_id = child_id)
        RIGHT JOIN school_group sg on (ch.group_id = sg.id)
        where tc.deleted = " . $deleted . " AND
        tc.firstname = " . $search_firstname ." AND
        sg.grade = " . $grade ."
        order by cfn
		";
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