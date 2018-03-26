<!--<form action="" method="post"> -->

<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Add new Comment</p>
        <?php echo validation_errors();?>
        <form role="form" name="add_comment_form" action="<?php echo 'add_comment'?>" method="post">
            <div class="form-group">
                <label>Comment</label>
                <textarea name="teacher_comment" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label> Select Child
                    <select name="comment_child_id">
                        <?php
                        foreach ($comment_children as $item) { ?>
                            <option value="<?php echo (int)$item['id']?>">
                                <?php
                                echo $item['firstname'] . " " . ucfirst($item['lastname'])?>
                            </option>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    </div>
                </div>
                <div class="col-xs-4">
                    <button name="send" type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.form-box -->
</div>
