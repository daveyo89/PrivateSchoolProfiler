<!--<form action="" method="post"> -->
<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Register a new parent</p>

        <?php echo validation_errors(); ?>

        <form role="form" name="register_parent_form" action="<?php echo 'suser/add_parent'?>" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input name="firstname" type="text" class="form-control" placeholder="First Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="lastname" type="text" class="form-control" placeholder="Last Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_email" type="email" class="form-control" placeholder="Email">
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
                <input name="date_of_birth" type="date" class="form-control" placeholder="Date Of Birth">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
