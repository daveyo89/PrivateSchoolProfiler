<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Welcome</title>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('templates/userpanel'); ?>
    <?php $this->load->view('templates/menu');  ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Welcome to Private School Profiler!</h1>
            <br>
            <h3>Select starting year</h3>
            <?php echo validation_errors(); ?>
            <!--<form action="" method="post"> -->
            <?php echo form_open('Suser'); ?>
            <div class="form-group has-feedback">
                <input type="number" name="grade_year" class="ion-information-circled" placeholder="2017">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-flat">Continue</button>
                <a class="btn btn-danger" href=<?php echo base_url()."Logout"?>>Logout</a>

            </div>
        </section>
        <section class="content">
        <div id="body">
            <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

            <p>If you would like to edit this page you'll find it located at:</p>
            <code>application/views/welcome_message.php</code>

            <p>The corresponding controller for this page is found at:</p>
            <code>application/controllers/Welcome.php</code>

            <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
        </div>

        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>