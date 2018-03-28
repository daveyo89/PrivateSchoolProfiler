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
        <section class="content-header">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Options
                </button>
                <div class="dropdown-menu">
                </div>
                <a class="btn btn-danger" href="<?php echo base_url() ?>">Back</a>
            </div>
        </section>
        <section class="content">
            <div class="content">
                <?php if (isset($child_info['progress_post'])) {
                foreach ($child_info as $item) { ?>
                    <div class="container">
                    <?php echo $item['progress_post'];
                    echo "<br>";
                    echo " updated: ".$item['updated'];
                    echo "<br>";
                    echo " Q: " . $item['quarter'];
                    ?></div>
<br>
               <?php }}
               else {
                    echo "<h3>No reports to show</h3>";
               }
                ?>
            </div>
        </section>
    </div>

</div>
<?php $this->load->view('templates/footer'); ?>

</body>
</html>