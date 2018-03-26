<!--<form action="" method="post"> -->

<div class="register-box-body">
    <div class="register-box-body">
        <p class="login-box-msg">Edit Report</p>
        <?php
        echo validation_errors();?>
        <?php
        var_dump($report_teachers); foreach ($report_teachers as $report) {?>
        <br>
        <div class="">
            <form role="form" name="edit_report_form" action="<?php echo 'teacher/edit_report/'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Report of <?php echo "School year of ".$report['grade'] . " quarter: " . $report['quarter'] ?></label>
                    <textarea name="edit_report_form" class="form-control document-text" rows="10" placeholder="Enter ..."><?php echo $report['progress_post']?></textarea>
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
