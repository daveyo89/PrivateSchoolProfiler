<?php

class Teachermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTeacherByEmail($email) {
        $sql = "SELECT * FROM teacher
                WHERE email = ". $email ." ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }
}