<div class="register-box-body">
    <div class="register-box-body">
        <form role="form" name="edit_form" id="regForm" action="<?php echo 'suser/edit_member'?>" method="post">
            <h1 class="bg-light-blue left-side">Edit member:</h1>

            <div class="form-group">
                <label class="col-form-label-sm"> Please select a member type:
                    <br>
                    <select class="select2-container" name="chosen">
                        <option name="chosen" value=""></option>
                        <option name="chosen" value="teacher">Teacher</option>
                        <option name="chosen" value="parent">Parent</option>
                        <option name="chosen" value="child">Child</option>
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