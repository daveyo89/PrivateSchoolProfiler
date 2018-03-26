<!--<form action="" method="post"> -->

<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Edit Evaluation</p>
        <?php
        echo validation_errors();?>
        <?php foreach ($eval_teachers as $eval) {?>
        <br>
        <div class="">
            <form role="form" name="edit_eval_form" action="<?php echo 'suser/edit_eval/'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Evaluation</label>
                    <textarea name="edit_eval_form" class="form-control" rows="3" placeholder="Enter ..."><?php echo $eval['teacher_eval']?></textarea>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Eval Id</label>
                    <input type="text" name="edit_eval_id" class="small-box" value="<?php echo $eval['id']?>"/>
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
