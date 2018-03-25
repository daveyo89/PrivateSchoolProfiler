<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<head>
    <?php $this->load->view('templates/head'); ?>

    <title>PSP | My Class</title>
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
        <?php $this->load->view('templates/options_button') ?>
        <div class="full-width" style="text-align: center">
            <div class="justify-content-center full-width">
                <table class="table-bordered" style="width: 100%">
                    <thead class="table-primary">Class Members
                    <tr>
                        <th>Created on</th>
                        <th>Educational Year</th>
                        <th>Evaluation</th>
                        <th>Updated on</th>
                    </tr>
                    </thead>
                    <tbody class="table-secondary">

                    <?php
                    foreach ($eval_data as $data) {
                        ?>
                        <tr>
                            <td><?php echo $data['crd_eval'] ?></td>
                            <td><?php echo $data['eval_grade'] ?></td>
                            <td><textarea style="width: 100%; height: 120px" readonly><?php echo $data['teacher_eval'] ?></textarea></td>
                            <td><?php echo $data['updated'] ?></td>

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