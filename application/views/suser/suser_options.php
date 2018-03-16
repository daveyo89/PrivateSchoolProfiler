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
    <?php $this->load->view('templates/menu'); ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Teachers
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo current_url()."/teachers/". $grade?>">Members</a>
                    <a class="dropdown-item" href="<?php echo current_url()."/evals" ."/" . $grade?>">Evaluations</a>
                    <a class="dropdown-item" href="<?php echo current_url()."/comments" ."/" . $grade?>">Comments</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Another link</a>
                </div>
            </div>
            <a class="btn btn-danger" href="<?php echo base_url()?>">Back</a>
            <div id="body">
                <a class="btn btn-primary" href="<?php echo current_url()."/teachers/".$grade?>">Teachers</a>
                <a class="btn btn-primary" href="<?php echo current_url()."/parents/".$grade?>">Parents</a>
                <a class="btn btn-primary" href="<?php echo current_url()."/suser/".$grade?>">Admins</a>
                <a class="btn btn-primary" href="<?php echo current_url()."/children/".$grade?>">Children</a>
            </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>