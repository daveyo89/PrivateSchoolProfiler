<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<head>
    <?php $this->load->view('templates/head'); ?>

    <title>PSP | My Class</title>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
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
                        <th>Child Name</th>
                        <th>Date of Birth</th>
                        <th>Picture</th>
                        <th>Parent Name</th>
                        <th>Email</th>
                        <th>Parent Picture</th>
                    </tr>
                    </thead>
                    <tbody class="table-secondary">

                    <?php foreach ($class_data as $data) {
                    ?>
                    <tr>
                        <td><a href="<?php echo base_url() ."Teacher/my_child" . "/" . $data['cid']?>"><?php echo $data['cfname'] . " " . $data['clname']?></a></td>
                        <td><?php echo date('Y-m-d',strtotime($data['cdob'])) ?></td>
                        <td><img class="profile-user-img " style="max-height: 80px; width: auto" src="<?php echo base_url() . "assets/uploads/images/children/" . $data['cpp'] ?>"></td>
                        <td><?php echo $data['pfname'] . " " . $data['plname'] ?></td>
                        <td><?php echo $data['pemail'] ?></td>
                        <td><img class="profile-user-img " style="max-height: 80px; width: auto" src="<?php echo base_url() . "assets/uploads/images/parents/" . $data['ppp'] ?>"></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p class="pull-right"><?php echo "Class teachers: " . $class_data[0]['class_teachers']?></p>
            </div>
            <div class="grid pull-right list-group">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>