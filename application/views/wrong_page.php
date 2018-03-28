<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Fail</title>
</head>
<body class="hold-transition skin-red-light sidebar-mini">
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
            <h1 class="login-logo" href="">Wrong url data..</h1>
            <?php ?>
            <div class="full-width" style="text-align: center">
                <a class="btn btn-danger" href="<?php echo base_url() . "home"?>">Back</a>
            </div>
        </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>