<!--<form action="" method="post"> -->
<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Register a new class</p>

        <?php echo validation_errors(); ?>

        <form role="form" name="register_group_form" action="<?php echo 'suser/add_group'?>" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input name="group_name" type="text" class="form-control" placeholder="Class Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_grade" type="number" class="form-control" placeholder="Starting year">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="picture" type="file" class="form-control" placeholder="Image">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
