<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<head>
    <?php $this->load->view('templates/head'); ?>

    <title>PSP | My Reports</title>
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
        <?php $this->load->view('templates/options_button');?>
        <a class="btn btn-warning" href="<?php echo base_url() . "Teacher/add_report"?>">Add Report</a>
        <div class="full-width" style="text-align: center">
            <div class="justify-content-center full-width">
                <table class="table-bordered" style="width: 100%">
                    <thead class="table-primary">My Reports
                    <tr>
                        <th>Created on</th>
                        <th>Child Name</th>
                        <th>Date of Birth</th>
                        <th>Child Age</th>
                        <th>Report</th>
                        <th>Updated on</th>
                        <th>Q</th>
                        <th>Year</th>
                    </tr>
                    </thead>
                    <tbody class="table-secondary">

                    <?php
                    foreach ($dataset as $data) {
                        ?>
                        <tr>
                            <td><?php echo date('Y-m-d : H:m',strtotime($data['crd_pp'])) ?></td>
                            <td><?php echo $data['firstname'] ." " . $data['lastname'] ?></td>
                            <td><?php echo $data['dob']?></td>
                            <td><?php echo $data['age']?></td>
                            <td><textarea style="width: 100%; height: 120px" readonly><?php echo $data['progress_post'] ?></textarea></td>
                            <td><?php echo $data['updated'] ?></td>
                            <td><?php echo $data['quarter'] ?></td>
                            <td><?php echo $data['pgrade'] ?></td>
                            <td><a href="<?php echo base_url() . "Teacher/edit_report/" . $data['id']?>" class="btn-success btn">Edit</a></td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="grid pull-right list-group">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>