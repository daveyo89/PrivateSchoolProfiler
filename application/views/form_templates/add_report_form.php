<!--<form action="" method="post"> -->

<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Add new Report</p>
        <?php echo validation_errors();?>
        <form role="form" name="add_report_form" action="<?php echo 'add_report'?>" method="post">
            <div class="form-group">
                <label>Comment</label>
                <textarea name="teacher_report" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label> Select Child
                    <select name="report_child_id">
                        <?php
                        foreach ($report_children as $item) { ?>
                            <option value="<?php echo (int)$item['id']?>">
                                <?php
                                echo $item['firstname'] . " " . ucfirst($item['lastname'])?>
                            </option>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div class="form-group">
                <label> Select Quarter
                    <select name="report_quarter">
                        <option></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
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
