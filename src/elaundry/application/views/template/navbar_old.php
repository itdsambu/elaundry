<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" class="img-circle" src="<?php echo base_url();?>assets/layouts/layout/img/avatar3_small.jpg" />
                <span class="username username-hide-on-mobile"> Nick </span>
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="<?php echo base_url('User_login/ubahPassword')?>">
                        <i class="icon-lock"></i> Ubah Password </a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="<?php echo base_url('Welcome/log_history')?>">
                        <i class="icon-user"></i> Log Online </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Welcome/logout') ?>">
                        <i class="icon-key"></i> Log Out </a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>