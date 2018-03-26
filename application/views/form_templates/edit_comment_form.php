<!--<form action="" method="post"> -->

<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Edit Comment</p>
        <?php
        echo validation_errors();?>
        <?php var_dump($comment_teachers);
        foreach ($comment_teachers as $comment) {?>
        <br>
        <div class="">
            <form role="form" name="edit_comment_form" action="<?php echo 'teacher/edit_comment/'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Comment</label>
                    <textarea name="edit_comment_form" class="form-control" rows="3" placeholder="Enter ..."><?php echo $comment['teacher_comment']?></textarea>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
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
            <?php } ?>
        </div>
    </div>
    <!-- /.form-box -->
</div>
