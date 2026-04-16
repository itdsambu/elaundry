<?php
// $date = date('Y-m-d');
$total = $this->M_menuSidebar->total();
?>
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <div class="page-logo text-center">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>assets/layouts/layout3/img/new_logo.png" alt="logo" class="logo-default">
                </a>
            </div>
            <!-- END LOGO -->
            <a href="javascript:;" class="menu-toggler"></a>
        </div>
    </div>
    <!-- END HEADER TOP -->

    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container-fluid">
            <div class="hor-menu">
                <ul class="nav navbar-nav">

                    <!-- Dashboar/ Menu Home -->
                    <li aria-haspopup="true" class="classic-menu-dropdown">
                        <a href="<?php echo base_url(); ?>">
                            <i class="icon-home"></i> Dashboard
                            <span class="arrow"></span>
                        </a>
                    </li>

                    <!-- Level 1 -->
                    <?php foreach ($_getMenu1 as $row1) :
                        if ($row1->MenuID == 200 && $total != 0 && $this->session->userdata('group_user') == 2) {
                            echo "<li aria-haspopup='true' class='menu-dropdown classic-menu-dropdown'>";
                            echo "<a href='javascript:;'>";
                            echo $row1->MenuIcon . " " . $row1->MenuLabel;
                            echo "<span class='arrow'></span>";
                            echo "<span class='badge badge-danger'>" . $total . "</span>";
                            echo "</a>";
                            echo "<ul class='dropdown-menu pull-left'>";
                        } else {
                            echo "<li aria-haspopup='true' class='menu-dropdown classic-menu-dropdown'>";
                            echo "<a href='javascript:;'>";
                            echo $row1->MenuIcon . " " . $row1->MenuLabel;
                            echo "<span class='arrow'></span>";
                            echo "</a>";
                            echo "<ul class='dropdown-menu pull-left'>";
                        }

                        // Level 2
                        foreach ($_getMenu2 as $row2) :
                            if ($row2->MenuHeader === $row1->MenuID) :
                                if ($row2->MenuLink == '#') {
                                    echo "<li aria-haspopup='true' class='dropdown-submenu'>";
                                    echo "<a href='javascript:;'> " . $row2->MenuLabel;
                                    echo "<span class='arrow'></span>";
                                } else {
                                    echo "<li aria-haspopup='true' class=''>";
                                    echo "<a href='" . site_url($row2->MenuLink) . "'> " . $row2->MenuLabel;
                                }
                                echo "</a>";
                                echo "<ul class='dropdown-menu pull-left'>";
                                echo "<li aria-haspopup='true' class=''>";

                                // Level 3
                                foreach ($_getMenu3 as $row3) :
                                    if ($row3->MenuHeader === $row2->MenuID) :
                                        if ($row3->MenuID == '242' && $total != 0 && $this->session->userdata('group_user') == 2) {
                                            echo "<li aria-haspopup='true' class='nav-link nav-toggle'>";
                                            echo "<a href='" . site_url($row3->MenuLink) . "'>" . $row3->MenuLabel . " <span class='badge badge-danger'>" . $total . "</span></a>";
                                        } else {
                                            echo "<li aria-haspopup='true' class='nav-link nav-toggle'>";
                                            echo "<a href='" . site_url($row3->MenuLink) . "'>" . $row3->MenuLabel . "</a>";
                                        }
                                    endif;
                                endforeach;

                                echo "</li>";
                                echo "</ul>";
                                echo "</li>";
                            endif;
                        endforeach;

                        echo "</ul>";
                        echo "</li>";
                    endforeach; ?>

                    <!-- Menu User -->
                    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                        <a href="javascript:;">
                            <i class="icon-user"></i> <?php echo $this->session->userdata('user_name') ?>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li aria-haspopup="true" class="">
                                <a href="<?php echo base_url('User_login/ubahPassword') ?>">
                                    <!-- <i class="icon-lock"></i> --> Ubah Password
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Welcome/log_history') ?>">
                                    <!-- <i class="icon-graph"></i> --> Log Online
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Welcome/logout') ?>">
                                    <!-- <i class="icon-logout"></i> --> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->