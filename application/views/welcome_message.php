<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Log in</title>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('templates/userpanel'); ?>
    <?php $this->load->view('templates/menu'); ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Welcome to CodeIgniter!</h1>
            <a href=<?php echo base_url()."Logout"?>>Logout</a>
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


</body>
</html>