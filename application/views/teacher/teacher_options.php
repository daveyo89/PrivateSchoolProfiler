<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
    <?php $this->load->view('templates/head'); ?>

    <title>PrivateSchoolProfiler | Options</title>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('templates/userpanel'); ?>
    <?php $this->load->view('templates/menu'); ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <?php $this->load->view('templates/options_button') ?>

        <?php echo form_open('Teacher'); ?>
        <label class="label-default"> Select starting year
            <input type="text" style="max-width: 15%; height: auto" name="grade_year" class="ion-information-circled"
                   value="<?php echo $def_year;?>" placeholder="">
            <button type="submit" class="btn btn-primary btn-flat">Continue</button>
        </label>
        </form>

        <div class="full-width" style="text-align: center">
            <div class="grid pull-left list-group">
                <a><?php echo $self_data[0]['firstname'] . " " . $self_data[0]['lastname'] ?></a>
                <a><?php echo $self_data[0]['email'] ?></a>
                <img class="image" style="width: auto;max-width: 650px; max-height: 500px; height: auto"
                     src="<?php echo base_url() . "assets/uploads/images/" . $this->session->userdata('role') . "s/" . $this->session->userdata('picture_path') ?>"/>
            </div>
            <div class="grid pull-right list-group">
                <a><?php echo $self_data[0]['group_name'] ?></a>
                <a><?php echo $self_data[0]['sgrade'] ?></a>
                <img class="image" style="width: auto;max-width: 650px; max-height: 500px; height: auto" src="<?php echo base_url() . "assets/uploads/images/groups/" . $self_data[0]['group_picture'] ?>"/>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>