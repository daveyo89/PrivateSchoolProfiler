<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>SP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PrivateSchool</b>Profiler</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

        <img src="<?php echo base_url()?>assets/uploads/website/logo.jpg" class="logo float-left" style="width: auto">

        <li class="dropdown user user-menu float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img  style="width: auto; max-height: 60px" src="<?php if($this->session->userdata('picture_path') != null) echo base_url() . "assets/uploads/images/".$this->session->userdata('role')."s/". $this->session->userdata('picture_path'); ?>" class="profile-user-img" alt="User Image">
                <span class="hidden-xs"><?php if(isset($fullname))print($fullname); ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="dropdown-toggle" style="text-align: center;">
                    <div class="btn">
                        <a href="<?php print(base_url('index.php/logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>

        <!-- Sidebar toggle button-->
    </nav>


</header>