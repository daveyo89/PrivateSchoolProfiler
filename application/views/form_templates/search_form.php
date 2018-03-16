<?php echo validation_errors(); ?>
<!--<form action="" method="post"> -->
<?php echo form_open(current_url()); ?>
<div class="form-group has-feedback">
    <input type="text" name="search" class="ion-information-circled" placeholder="Give firstname...">
    <input type="text" name="quarter" class="ion-information-circled" placeholder="Give quarter">
    <input type="text" name="group_name_search" class="ion-information-circled" placeholder="Give exact groupname">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="col-xs-4">
    <button type="submit" class="btn btn-primary btn-flat">Continue</button>
