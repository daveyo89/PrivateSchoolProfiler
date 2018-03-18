<!--<form action="" method="post"> -->

<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('edit_child/do_upload');?>
        <form role="form" name="edit_selected_form" id="regForm" action="<?php echo 'suser/edit_child'?>" method="post">
            <div class="form-group has-feedback">
                <input name="firstname" type="text" class="form-control" placeholder="<?php echo $selected_child[0]['firstname']?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="lastname" type="text" class="form-control" placeholder="<?php echo $selected_child[0]['lastname']?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="reg_email" type="email" class="form-control" placeholder="<?php echo $selected_child[0]['email']?>">
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
                <input name="reg_deleted" type="number" class="form-control" placeholder="<?php echo $selected_child[0]['deleted']?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label class="label-default"> Current Profile Picture
                    <a><img class="profile-user-img" src="<?php echo base_url() . "assets/uploads/images/parents/" . $selected_child[0]['picture_path']?>"></a>
                </label>
                <input name="picture" type="file" class="form-control" placeholder="<?php echo $selected_child[0]['picture_path']?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group">
                <label class="col-form-label-sm"> Child's name: <?php echo $selected_child[0]['cfn'] . $selected_child[0]['cfl']?></label>
                <br>
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
