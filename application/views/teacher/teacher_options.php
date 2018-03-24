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
                    <a class="dropdown-item" href="<?php echo current_url() . "/teachers" . "/" . $grade ?>">Members</a>
                    <a class="dropdown-item"
                       href="<?php echo current_url() . "/evals" . "/" . $grade ?>">Evaluations</a>
                    <a class="dropdown-item"
                       href="<?php echo current_url() . "/comments" . "/" . $grade ?>">Comments</a>
                    <a class="dropdown-item" href="<?php echo current_url() . "/progress_reports" . "/" . $grade ?>">Progress
                        Reports</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-orange" href="<?php echo current_url() . "/add_eval" . "/" . $grade ?>">Add
                        Evaluation</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-teal-gradient"
                       href="<?php echo current_url() . "/add_teacher" . "/" . $grade ?>">Add Teacher</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-light-blue"
                       href="<?php echo current_url() . "/edit_member" . "/" . $grade ?>">Edit Teacher</a>
                </div>
            </div>
            <div class="full-width" style="text-align: center">
                <a class="btn btn-danger" href="<?php echo base_url() ?>">Back</a>
            </div>

            </form>
        </section>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>