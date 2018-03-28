<?php

class Parentmodel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getParentByEmail($email, $grade)
    {
        $sql = "
        SELECT p.id, p.firstname, p.lastname, p.email, p.picture_path, p.updated, p.grade,
               c.id cid, c.firstname cfname, c.lastname clname, c.dob cdob, c.picture_path cpp,
               sg.group_name, sg.id sid, sg.group_picture, sg.grade sgrade,
               group_concat(\"  \",concat(t.firstname,\"  \", t.lastname),\"  \") as class_teachers
        FROM parent p
		LEFT JOIN child c ON(c.parent_id = p.id)
        LEFT JOIN school_group sg ON(c.group_id = sg.id)
        LEFT JOIN teacher t ON(c.group_id = t.group_id)
        WHERE p.email = " . $email ."
        AND c.grade = " . $grade . "
        GROUP BY c.id ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getChildrenIdByParentId($id) {
        $sql = "SELECT id FROM child WHERE parent_id = ".$id." ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getDetailedChildById($id) {
        $sql = "SELECT c.id, c.firstname, c.lastname, c.dob, c.picture_path, c.deleted,
	   group_name, sg.grade, group_picture,
       progress_post, updated, quarter,
       pp.id pid
       FROM child c
       LEFT JOIN progress_post pp ON(pp.child_id = c.id)
       LEFT JOIN school_group sg ON(group_id = sg.id)
	   WHERE c.id = ". $id ." ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getAllChildrenGrade($id) {
        $sql = "SELECT grade FROM child WHERE parent_id = " .$id . "
                GROUP BY grade";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }


}