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

    public function getCommentByTeacherId($id)
    {
        $sql = "SELECT c.id, teacher_comment, child_id, teacher_id, crd_cm, c.updated,
                    ch.id cid, firstname, lastname, group_id, dob, ch.grade cgrade,
                    sg.id sid, sg.group_name, sg.grade sgrade
                FROM comment c
                LEFT JOIN child ch ON(c.child_id = ch.id)
                LEFT JOIN school_group sg ON(ch.group_id = sg.id)
                WHERE teacher_id = ". $id . "
                ORDER BY updated
                DESC ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getCommentById($id)
    {
        $sql = "SELECT * FROM privateschoolprofiler.comment 
                WHERE id = " . $id . "
                ORDER by crd_cm";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getChildrenByGrade($grade) {
        $sql = "SELECT * FROM child WHERE grade = ". $grade ." ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function getChildrenByGradeAndTeacher($id, $grade) {
        $sql = "SELECT c.id, c.firstname, c.lastname, c.dob, c.group_id, c.picture_path, c.crd_ch, c.grade, c.parent_id, c.deleted
                FROM child c
                LEFT JOIN teacher t ON(c.group_id = t.group_id)
                WHERE c.grade = ". $grade ." 
                AND t.id = ". $id ." ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }


    public function getProgressReportByTeacherId($id) {
        $sql = "SELECT pp.id, pp.progress_post, pp.child_id, pp.teacher_id, pp.crd_pp, pp.updated, pp.quarter, pp.grade pgrade,
	   c.id cid, c.firstname, c.lastname, c.dob, c.group_id, c.picture_path, c.grade cgrade, c.deleted
					FROM progress_post pp
                    LEFT JOIN child c ON(pp.child_id = c.id)
                    WHERE pp.teacher_id = " . $id . "
                    AND deleted = 2 ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }

    public function add_comment($teacher_id, $teacher_comment, $child_id){
        if (isset($teacher_id, $teacher_comment, $child_id)) {
            $insertArray = array(
                'teacher_comment' => $teacher_comment,
                'child_id' => $child_id,
                'teacher_id' => $teacher_id
            );
            $this->db->insert('comment', $insertArray);
        }
    }

    public function add_report($teacher_id, $teacher_report, $child_id, $grade, $quarter){
        if (isset($teacher_id, $teacher_report, $child_id)) {
            $insertArray = array(
                'progress_post' => $teacher_report,
                'child_id' => $child_id,
                'teacher_id' => $teacher_id,
                'quarter' => $quarter,
                'grade' => $grade
            );
            $this->db->insert('progress_post', $insertArray);
        }
    }

    public function editComment($id, $editData) {
        $this->db->set('teacher_comment', $editData['teacher_comment']);
        $this->db->where('id', $id);
        $this->db->update('comment', $editData);
    }

}