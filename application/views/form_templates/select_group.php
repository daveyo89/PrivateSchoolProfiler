<div class="register-box-body">
    <div class="register-box-body">
        <form role="form" name="edit_form" id="regForm" action="<?php echo 'edit_group'?>" method="post">
            <h1 class="bg-black left-side">Edit Class:</h1>

            <div class="form-group">
                <label class="col-form-label-sm"> Please select a Class:   </label><br>
                <select class="select2-container" name="edit_group_id">
                    <option name="edit_group_id" value=""></option><br>
                    <?php
                    foreach ($group_info as $item) {
                        ?>
                        <option name="edit_group_id" value="<?php echo $item->id?>"> <?php echo ucfirst($item->group_name)?><br>
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