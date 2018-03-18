<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">
        <?php echo form_open_multipart('select_chosen');?>
        <form role="form" name="edit_form" id="regForm" action="<?php echo 'suser/edit_member'?>">
            <h1 class="bg-light-blue left-side">Edit member:</h1>

            <div class="form-group">
                <label class="col-form-label-sm"> Please select a member type:
                    <br>
                    <select class="select2-container" name="chosen">
                        <option name="chosen" value=""></option>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <option name="chosen" value="teacher">Teacher</option>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <option name="chosen" value="parent">Parent</option>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <option name="chosen" value="child">Child</option>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </select>
                </label>
            </div>
            <div class="col-xs-8">
                <div class="checkbox icheck">
                </div>
            </div>
            <div class="btn">
                <button name="send" type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">Go</button>
            </div>

        </form>