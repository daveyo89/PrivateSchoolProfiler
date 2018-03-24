<!--<form action="" method="post"> -->
<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Register a new child</p>

        <?php echo validation_errors(); ?>

        <form role="form" name="register_parent_form" action="<?php echo 'suser/add_child'?>" method="post"  enctype="multipart/form-data">
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
            <label>Select Parent
            <div class="form-group">
                <select class="select2-container" name="parent_id">
                    <?php
                    foreach ($parents as $parent) {
                        ?>
                        <option name="parent_id" value="<?php echo $parent->pid?>"> <?php echo ucfirst($parent->pfname . " " . $parent->plname)?></option><br>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php } ?>
                </select>
            </div>
            </label>

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
