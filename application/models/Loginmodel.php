<?php

class Loginmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetUserByEmail($email)
    {
        $sql = "SELECT * FROM members WHERE email = '" .$email . "' and deleted = 2 ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    public function UserUpdateByEmail($email, array $data) {
        # todo;
    }

    public function UserDeleteByEmail($email, $role_table) {
        $sql = "DELETE FROM " . $role_table . " WHERE email = " . $email .";";
        return $this->db->query($sql);
    }
}
