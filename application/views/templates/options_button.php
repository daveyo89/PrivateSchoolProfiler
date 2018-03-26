<section class="content">
    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Options
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo base_url() . "Teacher/my_class" . "/" .$this->session->userdata('my_class_id'); ?>">Class</a>
            <a class="dropdown-item"
               href="<?php echo base_url() . "Teacher/my_evals" . "/" . $this->session->userdata('my_id')?>">Evaluations</a>
            <a class="dropdown-item"
               href="<?php echo base_url() . "Teacher/my_comments" . "/" . $this->session->userdata('my_id') ?>">Comments</a>
            <a class="dropdown-item" href="<?php echo base_url() . "Teacher/my_progress_reports" . "/" . $this->session->userdata('my_id') ?>">Progress
                Reports</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item bg-orange" href="<?php echo base_url() . "Teacher/add_report" . "/" ?>">Add
                Progress Report</a>
        </div>
        <a class="btn btn-danger" href="<?php echo base_url() ?>">Back</a>
    </div>
</section>