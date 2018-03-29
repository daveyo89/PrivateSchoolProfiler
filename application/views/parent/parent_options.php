<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
    <?php $this->load->view('templates/head'); ?>

    <title>PrivateSchoolProfiler | Options</title>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('templates/userpanel'); ?>
    <?php $this->load->view('templates/menu'); ?>
    </section>
    </aside>

    <div class="content-wrapper">
        <section class="container">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Options
                </button>
                <div class="dropdown-menu">
                </div>
                <a class="btn btn-danger" href="<?php echo base_url() ?>">Back</a>
            </div>


        <?php echo form_open('Parents') ; ?>
        <label class="label-default"> Select starting year
            <select class="select2-container" name="grade_year">
                <option name="grade_year"></option>
                <?php foreach ($all_grades as $item) { ?>
                    <option name="grade_year" value="<?php echo $item['grade']?>"><?php echo $item['grade']?></option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary btn-flat">Continue</button>
        </label>
        </form>
            <?php if (isset($self_data) && sizeof($self_data) > 0) {?>
        <div class="col-md-9" style="resize: both; text-align: center">
            <div class="grid pull-left list-group">
                <a><?php echo $self_data[0]['firstname'] . " " . $self_data[0]['lastname'] ?></a>
                <a><?php echo $self_data[0]['email'] ?></a>
                <img class="image" style="width: auto;max-width: 65%; max-height: 500px; height: auto"
                     src="<?php echo base_url() . "assets/uploads/images/" . $this->session->userdata('role') . "s/" . $this->session->userdata('picture_path') ?>"/>
            </div>
            <div class="grid " style="max-width: 100%; width: 100%; text-align: center">
                <h3>
                    Children:
                </h3>
                <ul class="list-group" style="text-align: center">
                    <li class="list-group-item"><?php foreach ($self_data as $data) {
                        ?> <a class="name" style="background-color: #3DA0DB; padding-left: 10px" href="<?php echo base_url() .
                            "Parents/my_child/".$data['cid'] ?>"> <?php echo $data['cfname'] . " " . $data['clname']; }?></a>
                        <br>
                    </li>
                </ul>

            </div>

            <div class="grid list-group" style="text-align: center; align-content: ">
                <a><?php echo $self_data[0]['group_name'] ?></a>
                <a><?php echo $self_data[0]['sgrade'] ?></a>
                <a><?php echo $self_data[0]['class_teachers'] ?></a>
                <img class="image" style="width: 100%;max-width: 65%; max-height: 600px; height: auto" src="<?php echo base_url() . "assets/uploads/images/groups/" . $self_data[0]['group_picture'] ?>"/>
            </div>
        </div>
            <?php } else { echo "<h2>No children to show!</h2>"; }?>
        </section>
    </div>

</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>