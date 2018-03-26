<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p><?php if(isset($fullname))print($fullname);?></p>
                <a href="#"><i class="fa fa-circle text-success"></i><?php if(isset($role))print($role);?></a>
            </div>
        </div>
        <!-- search form -->