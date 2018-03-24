<div class="register-box-body">
            <div class="register-box-body">
                <form role="form" name="edit_form" id="regForm" action="<?php echo 'edit_member'?>" method="post">
                    <h1 class="bg-light-blue left-side">Edit child:</h1>

                    <div class="form-group">
                        <label class="col-form-label-sm"> Please select a Child:   </label><br>
                        <select class="select2-container" name="edit_child_id">
                            <option name="edit_child_id" value=""></option><br>
                            <?php
                            foreach ($child_info as $item) {
                                ?>
                                <option name="edit_child_id" value="<?php echo $item->id?>"> <?php echo ucfirst($item->firstname . " " . $item->lastname)?><br>
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