<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Edit existing Teacher</title>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('templates/userpanel'); ?>
    <?php $this->load->view('templates/menu'); ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">

            <div id="body">
                <a class="btn btn-danger" href="<?php echo (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : base_url() . 'suser';?>">Back</a>
                <a class="btn btn-google" href="<?php echo base_url() . 'suser/';?>">List</a>

                <?php
                if (!isset($chosen) || $chosen == "") {
                    $this->load->view('form_templates/select_chosen');
                }
                if (isset($chosen) && $chosen == "teacher") {
                    $this->load->view('form_templates/select_teacher');
                }
                if (isset($selected_teacher)) {
                    $this->load->view('form_templates/edit_teacher_form');
                }
                if (isset($chosen) && $chosen == "parent") {
                    $this->load->view('form_templates/select_parent');
                }
                if (isset($selected_parent)) {
                    $this->load->view('form_templates/edit_parent_form');
                }
                if (isset($chosen) && $chosen == "child") {
                    $this->load->view('form_templates/select_child');
                }
                if (isset($selected_child)){
                    $this->load->view('form_templates/edit_child_form');
                }
                if (isset($chosen) && $chosen == "school_group") {
                    $this->load->view('form_templates/select_group');
                }
                if (isset($selected_group)){
                    $this->load->view('form_templates/edit_group_form');
                }
                ?>

            </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
