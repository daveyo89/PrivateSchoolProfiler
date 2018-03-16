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
                <a class="btn btn-danger" href="<?php echo base_url() . "Suser"?>">Back</a>

                <?php if (isset($teacher_list)) {
                    $this->load->view('form_templates/search_form');
                    ?>
                    <table class="table table-bordered table-info" style="width: 100%;">
                        <tr class="table table-primary">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Picture</th>
                            <th>Class Name</th>
                            <th>Class Picture</th>
                        </tr>
                        <?php foreach ($teacher_list as $item) {
                            if (!isset($item->picture_path)){$item->picture_path = "crop.jpg";}
                            if (!isset($item->group_picture)){$item->group_picture = "nophoto.png";}
                            ?>
                        <tr class="table-secondary">
                            <td><?php echo $item->firstname;?></td>
                            <td><?php echo $item->lastname;?></td>
                            <td><?php echo $item->email;?></td>
                            <td><?php echo $item->dob;?></td>
                            <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/teachers/" . $item->picture_path;?>"></td>
                            <td><?php echo $item->group_name;?></td>
                            <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/groups/" . $item->group_picture;?>"></td>
                        </tr>
                        <?php } ?>

                    </table>

                <?php } ?>

                <?php if(isset($teacher_eval)) {
                    $this->load->view('form_templates/search_form');
                    ?>
                    <table class="table table-bordered table-info" style="width: 100%;">
                        <tr class="table table-primary">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Picture</th>
                            <th>Evaluation</th>
                            <th>Eval Created</th>
                        </tr>
                        <?php foreach ($teacher_eval as $item) {
                            if (!isset($item->picture_path)){$item->picture_path = "crop.jpg";}
                            if (!isset($item->group_picture)){$item->group_picture = "nophoto.png";}
                            ?>
                            <tr class="table-secondary">
                                <td><?php echo $item->firstname;?></td>
                                <td><?php echo $item->lastname;?></td>
                                <td><?php echo $item->email;?></td>
                                <td><?php echo date('Y-m-d',strtotime($item->dob));?></td>
                                <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/teachers/" . $item->picture_path;?>"></td>
                                <td><?php echo $item->teacher_eval;?></td>
                                <td><?php echo date('Y-m-d H:m',strtotime($item->crd_eval));?></td>
                            </tr>
                        <?php } ?>

                    </table>

                <?php } ?>

                <?php if(isset($comments)) {
                    $this->load->view('form_templates/search_form');
                    ?>
                    <table class="table table-bordered table-info" style="width: 100%;">
                        <tr class="table table-primary">
                            <th>Full Name</th>
                            <th>Comment</th>
                            <th>Picture</th>
                            <th>Child Name</th>
                            <th>Comment created on</th>
                            <th>Class</th>

                        </tr>
                        <?php foreach ($comments as $item) {
                            if (!isset($item->pcp)){$item->pcp = "crop.jpg";}
                            if (!isset($item->sggp)){$item->sggp = "nophoto.png";}
                            ?>
                            <tr class="table-secondary">
                                <td><?php echo $item->fn . " " . $item->ln;?></td>
                                <td><?php echo $item->tcc;?></td>
                                <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/teachers/" . $item->pcp;?>"></td>
                                <td><?php echo $item->cfn . " " . $item->cln;?></td>
                                <td><?php echo date('Y-m-d H:m',strtotime($item->crd_cm));?></td>
                                <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/groups/" . $item->sggp;?>"></td>
                            </tr>
                        <?php } ?>

                    </table>

                <?php } ?>

                <?php if(isset($progress_posts)) {
                    $this->load->view('form_templates/search_form');
                    ?>
                    <table class="table table-bordered table-info" style="width: 100%;">
                        <tr class="table table-primary">
                            <th>Full Name</th>
                            <th>Picture</th>
                            <th>Progress Report</th>
                            <th>Created on</th>
                            <th>Last Updated on</th>
                            <th>Child Name</th>
                            <th>Child Picture</th>
                            <th>Class</th>
                            <th>Class Picture</th>
                            <th> # </th>
                        </tr>
                        <?php foreach ($progress_posts as $item) {
                            if (!isset($item->tcp)){$item->tcp = "crop.jpg";}
                            if (!isset($item->sgp)){$item->sgp = "nophoto.png";}
                            if (!isset($item->cpp)){$item->cpp = "unknown.png";}
                            ?>
                            <tr class="table-secondary">
                                <td><?php echo $item->tfn . " " . $item->tln;?></td>
                                <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/teachers/" . $item->tcp;?>"></td>
                                <td><?php echo substr($item->ppp,'0', 200);?></td>
                                <td><?php echo date('Y-m-d H:m',strtotime($item->crd_pp));?></td>
                                <td><?php echo date('Y-m-d H:m:s',strtotime($item->updated));?></td>
                                <td><?php echo $item->cfn . " " . $item->cln;?></td>
                                <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/children/" . $item->cpp;?>"></td>
                                <td><?php echo $item->sgn;?></td>
                                <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/groups/" . $item->sgp;?>"></td>
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