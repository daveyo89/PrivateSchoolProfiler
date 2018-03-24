<!--<form action="" method="post"> -->
<div class="register-box-body">
    <div class="register-box-body">

        <?php echo validation_errors();
        ;?>
        <form role="form" name="edit_selected_form" id="regForm" action="<?php echo 'suser/edit_member'?>" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input name="group_name" type="text" class="form-control" placeholder="<?php echo $selected_group[0]['group_name']?>">
            </div>
            <div class="form-group has-feedback">
                <label class="label-default"> Current Class Picture
                    <a><img class="profile-user-img" src="<?php echo base_url() . "assets/uploads/images/groups/" . $selected_group[0]['group_picture']?>"></a>
                </label>
                <input name="group_picture" type="file" class="form-control" placeholder="<?php echo $selected_group[0]['group_picture']?>">
            </div>
            <div class="form-group has-feedback">
                <input name="edit_grade" type="number" class="form-control" placeholder="Starting year">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
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
