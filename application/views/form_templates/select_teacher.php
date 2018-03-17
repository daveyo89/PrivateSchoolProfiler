<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('select_teacher');?>
        <form role="form" name="edit_form" id="regForm" action="<?php echo 'suser/edit_teacher'?>">
            <h1 class="bg-light-blue left-side">Edit teacher:</h1>

            <div class="form-group">
                <select class="select2-container" name="edit_teacher_id">
                    <option name="edit_teacher_id" value=""></option><br>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php
                    foreach ($teacher_info as $item) {
                    ?>
                    <option name="edit_teacher_id" value="<?php echo $item->tid?>"> <?php echo ucfirst($item->firstname . " " . $item->lastname)?><br>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </option>
                        <?php } ?>
                </select>
            </div>
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    </div>
                </div>
                <div class="btn">
                    <button name="send" type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">Go</button>
                </div>

        </form>