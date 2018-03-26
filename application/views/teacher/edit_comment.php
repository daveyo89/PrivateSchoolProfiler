<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Edit Comments</title>
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('templates/userpanel'); ?>
    <?php $this->load->view('templates/menu'); ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div id="body">
            <a class="btn btn-danger" href="<?php echo base_url() . 'teacher/my_comments/' .$this->session->userdata('my_id') ;?>">Back</a>

            <?php
            $this->load->view('form_templates/edit_comment_form'); ?>
        </div>

    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
