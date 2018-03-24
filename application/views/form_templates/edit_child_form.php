<!--<form action="" method="post"> -->
<div class="register-box-body">
    <div class="register-box-body">
        <?php echo validation_errors(); ?>
        <form role="form" name="edit_selected_form" id="regForm" action="<?php echo 'suser/edit_member'?>" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input name="firstname" type="text" class="form-control" placeholder="<?php echo $selected_child[0]['firstname']?>">
            </div>
            <div class="form-group has-feedback">
                <input name="lastname" type="text" class="form-control" placeholder="<?php echo $selected_child[0]['lastname']?>">
            </div>
            <div class="form-group has-feedback">
                <label>(1) Inactive  |  (2)Active</label>
                <input name="reg_deleted" type="number" class="form-control" placeholder="<?php echo $selected_child[0]['deleted']?>">
            </div>
            <label class="label-info">Parent's email:
                <div class="form-group has-feedback">
                    <input readonly name="reg_email" type="email" class="form-control" placeholder="<?php echo $selected_child[0]['email']?>">
                </div>
            </label>
            <div class="form-group has-feedback">
                <label class="label-default"> Current Profile Picture
                    <a><img class="profile-user-img" src="<?php echo base_url() . "assets/uploads/images/children/" . $selected_child[0]['picture_path']?>"></a>
                </label>
                <input name="picture" type="file" class="form-control" placeholder="<?php echo $selected_child[0]['picture_path']?>">
            </div>

            <div class="form-group">
                <label class="col-form-label-sm"> Parent's name: <?php echo $selected_child[0]['pfname'] . " " . $selected_child[0]['plname']?></label>
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
