<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
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
        <section class="content">

            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Teachers
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url() . "Suser/teachers" . "/" . $grade ?>">Members</a>
                    <a class="dropdown-item"
                       href="<?php echo base_url() . "Suser/evals" . "/" . $grade ?>">Evaluations</a>
                    <a class="dropdown-item"
                       href="<?php echo base_url() . "Suser/comments" . "/" . $grade ?>">Comments</a>
                    <a class="dropdown-item" href="<?php echo base_url() . "Suser/progress_reports" . "/" . $grade ?>">Progress
                        Reports</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-orange" href="<?php echo base_url() . "Suser/add_eval" . "/" . $grade ?>">Add
                        Evaluation</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-teal-gradient"
                       href="<?php echo base_url() . "Suser/add_teacher" . "/" . $grade ?>">Add Teacher</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-light-blue"
                       href="<?php echo base_url() . "Suser/edit_member" . "/" . $grade ?>">Edit Teacher</a>
                </div>
            </div>
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Parents
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo current_url() . "/parents/" . $grade ?>">Parents</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-purple"
                       href="<?php echo current_url() . "/add_parent" . "/" . $grade ?>">Add Parent</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-purple-gradient"
                       href="<?php echo current_url() . "/edit_member" . "/" . $grade;  ?>">Edit Parent</a>
                </div>
            </div>

            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Children
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo current_url() . "/children/" . $grade ?>">Children</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-olive" href="<?php echo current_url() . "/add_child" . "/" . $grade ?>">Add
                        Child</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-olive-active"
                       href="<?php echo current_url() . "/edit_member" . "/" . $grade; ?>">Edit Child</a>
                </div>
            </div>

            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Classes
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo current_url() . "/groups/" . $grade ?>">Classes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-maroon-gradient" href="<?php echo current_url() . "/add_group" . "/" . $grade ?>">Add
                        Class</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-maroon-active"
                       href="<?php echo current_url() . "/edit_member" . "/" . $grade; ?>">Edit Class</a>
                </div>
            </div>

            <div class="full-width" style="text-align: center">
                <a class="btn btn-danger" href="<?php echo base_url() ?>">Back</a>
            </div>
            <?php echo form_open('Suser'); ?>
            <label class="label-default"> Select starting year
                <input type="text" name="grade_year" class="ion-information-circled"
                       value="<?php echo $def_year;?>" placeholder="">
                <button type="submit" class="btn btn-primary btn-flat">Continue</button>
            </label>
            </form>
            <label class="label-default bg-transparent">Currently selected year:
                <h9><?php echo $grade?></h9>
            </label>

        </section>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>