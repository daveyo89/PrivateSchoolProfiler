<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Listings</title>
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
        </section>
        <div id="body">
            <a class="btn btn-danger" href="<?php echo base_url() . "Suser"?>">Back</a>

            <?php if (isset($parent_list)) {
                $this->load->view('form_templates/search_form'); ?>
                <table class="table table-bordered table-info" style="width: 100%;">
                    <tr class="table table-primary">
                        <th>Parent Name</th>
                        <th>Email</th>
                        <th>Parent Picture</th>
                        <th>Children Names</th>
                        <th>Children Classes</th>
                    </tr>
                    <?php foreach ($parent_list as $item) {
                        if (!isset($item->papp)){$item->papp = "crop.jpg";}
                        if (!isset($item->chpp)){$item->chpp = "crop.jpg";}
                        if (!isset($item->sgpp)){$item->sgpp = "nophoto.png";}
                        ?>
                        <tr class="table-secondary">
                            <td><?php echo $item->paf . " " . $item->pal;?></td>
                            <td><?php echo $item->email;?></td>
                            <td><img class="profile-user-img" src="<?php echo "/assets/uploads/images/parents/" . $item->papp;?>"></td>
                            <td><?php echo $item->pchild;?></td>
                            <td><?php echo $item->gcsgn;?></td>
                        </tr>
                    <?php } ?>

                </table>

            <?php } ?>

        </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

</body>
</html>