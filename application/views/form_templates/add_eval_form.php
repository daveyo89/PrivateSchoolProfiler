<!--<form action="" method="post"> -->
<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Add new Evaluation</p>
        <?php echo validation_errors();?>
        <form role="form" name="add_eval_form" action="<?php echo 'suser/add_eval'?>" method="post">
            <div class="form-group">
                <label>Evaluation</label>
                <textarea name="teacher_eval" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label> Select Teacher
                    <select name="eval_teacher_id">
                        <?php foreach ($eval_teachers as $item) { ?>
                            <option value="<?php echo $item->tid?>">
                                <?php
                                 echo $item->tid . " " . ucfirst($item->firstname)?>
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
