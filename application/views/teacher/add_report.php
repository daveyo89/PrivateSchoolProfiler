<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Reports</title>
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
        </section>
        <div id="body">
            <a class="btn btn-danger" href="<?php echo base_url() . 'teacher/' ;?>">Back</a>
            <a class="btn btn-facebook" href="<?php echo base_url() . 'teacher/my_progress_reports/' . $this->session->userdata('my_id'); ;?>">List</a>

            <?php
            $this->load->view('form_templates/add_report_form'); ?>
        </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>