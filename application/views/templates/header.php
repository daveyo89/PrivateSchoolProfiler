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
        <img src="<?php echo base_url()?>assets/uploads/website/logo.jpg" class="logo" style="width: auto">

        <li class="dropdown user user-menu right-side">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php if(isset($picture))print($picture); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php if(isset($fullname))print($fullname); ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-footer">

                    <div class="pull-left">
                        <a href="<?php print(base_url('index.php/logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>

        <!-- Sidebar toggle button-->
    </nav>


</header>