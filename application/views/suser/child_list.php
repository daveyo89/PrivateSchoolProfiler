<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Listings</title>
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
            <a class="btn btn-danger" href="<?php echo base_url() . "Suser"?>">Back</a>

            <?php if (isset($child_list)) {
                $this->load->view('form_templates/search_form'); ?>
                <table class="table table-bordered table-info" style="width: 100%;">
                    <tr class="table table-primary">
                        <th>Full Name</th>
                        <th>Picture</th>
                        <th>Date of Birth</th>
                        <th>Current Grade</th>
                        <th>Class Name</th>
                        <th>Class Picture</th>
                    </tr>
                    <?php foreach ($child_list as $item) {
                        if (!isset($item->picture_path)){$item->picture_path = "crop.jpg";}
                        if (!isset($item->picture_path)){$item->picture_path = "crop.jpg";}
                        if (!isset($item->group_picture)){$item->group_picture = "nophoto.png";}
                        ?>
                        <tr class="table-secondary">
                            <td><?php echo $item->firstname . " " . $item->lastname;?></td>
                            <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/children/" . $item->picture_path;?>"></td>
                            <td><?php echo $item->dob;?></td>
                            <td><?php echo $item->grade;?></td>
                            <td><?php echo $item->group_name;?></td>
                            <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/groups/" . $item->group_picture;?>"></td>
                        </tr>
                    <?php } ?>

                </table>

            <?php } ?>

        </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>