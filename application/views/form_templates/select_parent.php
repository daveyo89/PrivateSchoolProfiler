<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">
        <?php echo form_open_multipart('select_parent');?>
        <form role="form" name="edit_form" id="regForm" action="<?php echo 'suser/edit_parent'?>">
            <h1 class="bg-light-blue left-side">Edit parent:</h1>

            <div class="form-group">
                <label class="col-form-label-sm"> Please select a parent:   </label><br>
                <select class="select2-container" name="edit_parent_id">
                    <option name="edit_parent_id" value=""></option><br>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php
                    foreach ($parent_info as $item) {
                        ?>
                        <option name="edit_parent_id" value="<?php echo $item->pid?>"> <?php echo ucfirst($item->pfname . " " . $item->plname)?><br>
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