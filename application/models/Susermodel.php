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

    public function getEveryParent() {

    }

    public function getEveryChild() {

    }

}