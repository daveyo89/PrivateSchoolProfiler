<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if (! function_exists('getsGrade')) {
    function getsGrade()
    {

    $CI = get_instance();
    $grade = (int)$CI->input->post('grade_year');

    if (isset($grade) && $grade !== "" && $grade !== 0) {
        $CI->session->set_userdata('grade_year', $grade);
        $grade = $CI->session->userdata('grade_year');
    } else {
        $date = explode('-', date('Y-m', time()));
        $def_year = ((int)$date[1] < 9 ? $date[0] - 1 : $date[0]);
        $CI->session->set_userdata('grade_year', $def_year);
    }
    return $grade;
    }
}

if (! function_exists('default_date')) {
    function default_date() {
    $date = explode('-', date('Y-m',time()));
    $def_year = ((int)$date[1] < 9 ? $date[0]-1 : $date[0]);
    return $def_year;
    }
}

if (! function_exists('getEmail')) {
    function getEmail()
    {
        $CI = get_instance();
        $email = "'" . $CI->session->userdata('email') . "'";

        return $email;
    }
}

if (! function_exists('getMyId')) {
    function getMyId() {
        $CI = get_instance();
        return (int)$CI->session->userdata('my_id');
    }
}
