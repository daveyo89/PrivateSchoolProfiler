<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Listings</title>
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
        </section>
        <div id="body">
            <h1 class="login-logo" href="">SUCCESS</h1>
            <div class="full-width" style="text-align: center">
                <a class="btn btn-success" href="<?php print(base_url() . "Suser/add_teacher")?>">Add another</a><br><br>
                <a class="btn btn-danger" href="<?php echo base_url() . "Suser"?>">Back</a>
            </div>
        </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>