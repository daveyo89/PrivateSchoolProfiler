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
                <a class="btn btn-google" href="<?php echo base_url() . 'suser/teachers/';?>">List</a>

                <?php

                if (!isset($chosen)) {
                    $this->load->view('form_templates/select_chosen');
                }
                if ($chosen == "teacher") {
                    $this->load->view('form_templates/select_teacher');
                }
                if (isset($selected_teacher)) {
                    $this->load->view('form_templates/edit_teacher_form');
                }

                if (isset($selected_parent)) {
                    $this->load->view('form_templates/edit_parent_form');
                }
                ?>

            </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>