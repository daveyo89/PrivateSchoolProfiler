<?php

class Teachermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTeacherByEmail($email)
    {
        $sql = "SELECT t.id, t.firstname, t.lastname, t.email, t.picture_path, t.group_id, t.grade,
				sg.id sid, sg.group_name, sg.grade sgrade,sg.group_picture
		FROM teacher t
        LEFT JOIN school_group sg ON(t.group_id =sg.id)
		WHERE email = " . $email . " ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getGroupById($id)
    {
        $sql = "SELECT sg.id sgid, sg.group_name, sg.group_picture, sg.grade,
	   ch.id cid, ch.firstname cfname, ch.lastname clname, ch.dob cdob, ch.picture_path cpp, ch.deleted cdeleted,
       p.id pid, p.firstname pfname, p.lastname plname, p.email pemail, p.picture_path ppp,
       group_concat(\"  \",concat(tc.firstname,\"  \", tc.lastname),\"  \") as class_teachers
				FROM teacher tc, school_group sg
                LEFT JOIN child ch ON(sg.id = ch.group_id)
                LEFT JOIN parent p ON(ch.parent_id = p.id)
                
                WHERE sg.id = " . $id . " 
                GROUP BY ch.id";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getEvalById($id)
    {
        $sql = "SELECT * FROM privateschoolprofiler.teacher_eval 
                WHERE teacher_id = " . $id . "
                ORDER by crd_eval";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }
}