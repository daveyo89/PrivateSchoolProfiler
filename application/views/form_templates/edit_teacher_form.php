<!--<form action="" method="post"> -->

<?php echo form_open(current_url()); ?>
<div class="register-box-body">
    <div class="register-box-body">

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('edit_teacher/do_upload');?>
        <form role="form" name="edit_form" id="regForm" action="<?php echo 'suser/edit_teacher'?>">

        </form>
    </div>
    <!-- /.form-box -->
</div>
