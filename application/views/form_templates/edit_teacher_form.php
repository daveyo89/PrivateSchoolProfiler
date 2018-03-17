<!--<form action="" method="post"> -->

<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('edit_teacher/do_upload');?>
        <form role="form" name="edit_selected_form" id="regForm" action="<?php echo 'suser/edit_teacher'?>" method="post">
            <div class="form-group has-feedback">
                <input name="firstname" type="text" class="form-control" placeholder="<?php echo $selected_teacher[0]['firstname']?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="lastname" type="text" class="form-control" placeholder="<?php echo $selected_teacher[0]['lastname']?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_email" type="email" class="form-control" placeholder="<?php echo $selected_teacher[0]['email']?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_passconf" type="password" class="form-control" placeholder="Confirm password">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label>(1) Inactive  |  (2)Active</label>
                <input name="reg_deleted" type="number" class="form-control" placeholder="<?php echo $selected_teacher[0]['deleted']?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input value="" name="date_of_birth" type="text" class="form-control" placeholder="<?php echo date('Y-m-d',strtotime($selected_teacher[0]['dob']))?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input value="" name="edit_grade" type="text" class="form-control" placeholder="<?php echo $selected_teacher[0]['grade']?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="picture" type="file" class="form-control" placeholder="<?php echo $selected_teacher[0]['picture_path']?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group">
                <label class="col-form-label-sm"> Current class: <?php echo $selected_teacher[0]['group_name']?></label>
                <br>
                <select class="select2-container" name="schoolgroup_id">
                    <option name="schoolgroup_id"> <?php echo ucfirst($selected_teacher[0]['group_name'])?><br>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php
                    foreach ($groups as $group) {
                    ?>
                    <option name="schoolgroup_id" value="<?php echo $group->id?>"> <?php echo ucfirst($group->group_name)?><br>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php } ?>
                </select>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    </div>
                </div>
                <div class="col-xs-4">
                    <button name="send" type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">Accept</button>
                </div>
            </div>

        </form>
    </div>
    <!-- /.form-box -->
</div>
