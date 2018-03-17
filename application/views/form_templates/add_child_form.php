<!--<form action="" method="post"> -->
<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Register a new child</p>

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('add_child/do_upload');?>
        <form role="form" name="register_parent_form" action="<?php echo 'suser/add_child'?>" method="post">
            <div class="form-group has-feedback">
                <input name="firstname" type="text" class="form-control" placeholder="First Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="lastname" type="text" class="form-control" placeholder="Last Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label>Date of Birth</label>
                <input name="date_of_birth" type="date" class="form-control" placeholder="Date Of Birth">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label>Picture</label>
                <input name="picture" type="file" class="form-control" placeholder="Image">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_grade" type="number" class="form-control" placeholder="Starting year">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <label>Select Class</label>
            <div class="form-group">
                <select class="select2-container" name="reg_group_id">
                <?php
                foreach ($groups as $group) {
                    ?>
                    <option name="reg_group_id" value="<?php echo $group->id?>"> <?php echo ucfirst($group->group_name)?><br>
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
                    <button name="send" type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.form-box -->
</div>