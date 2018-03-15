<?php

class Loginmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $role
     *      e.g.: suser, parent, teacher.
     *
     * @return array
     */
    public function GetUserGroup($role) {
        $this->db
            ->from($role);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
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

    /**
     * @param $email
     * @param $role_table
     *      Remove user from given table.
     * @return mixed
     */
    public function UserDeleteByEmail($email, $role_table) {
        $sql = "DELETE FROM " . $role_table . " WHERE email = " . $email .";";
        return $this->db->query($sql);
    }

    /**
     * @param array $data
     *      $data['role'] contains corresponding database table name.
     * @return array
     */
    public function UserInsertByEmail(array $data) {
        $error = array();

        if (!isset($data['firstname'])){
            $error[] = 1;
        }
        if (!isset($data['lastname'])){
            $error[] = 2;
        }
        if (!isset($data['email'])){
            $error[] = 3;
        }
        if (!isset($data['password'])){
            $error[] = 4;
        }

        if (!isset($data['role'])){
            $error[] = 9;
        } else {
            if (!array_search($data['role'], array('teacher', 'parent', 'suser'))) {
                $error[] = 10;
            }
        }

        if (count($error) == 0) {
            return $this->db->insert($data['role'], $data);
        } else {
            return $error;
        }
    }
}
