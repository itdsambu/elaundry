<?php $total = $this->M_menuSidebar->total(); ?>

<div class="page-header">
    <div class="page-header-top">
        <div class="container-fluid">
            <div class="page-logo text-center">
                <a href="<?= site_url()?>">
                    <img src="<?= site_url()?>assets/layouts/layout3/img/new_logo.png" alt="logo" class="logo-default">
                </a>
            </div>
            <a href="javascript:;" class="menu-toggler"></a>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <?php if ( $this->session->userdata('user_id') == 'nanda') { ?>
                                <img alt="" class="img-circle" src="<?= site_url()?>assets/layouts/layout3/img/nanda.jpeg">
                                <?php
                            } else { ?>
                                <img alt="" class="img-circle" src="<?= site_url()?>assets/layouts/layout3/img/avatar14.png">
                                <?php
                            } ?>
                            <span class="username username-hide-mobile"><?php echo $this->session->userdata('user_name') ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a data-toggle="modal" href="<?php echo base_url('User_login/ubahPassword') ?>">
                                <!-- <a data-toggle="modal" href="#basic"> -->
                                    <i class="icon-key"></i> Change Password
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Welcome/log_history') ?>">
                                    <i class="icon-rocket"></i> Log Online 
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?php echo base_url('Welcome/logout') ?>">
                                    <i class="icon-power"></i> Log Out 
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-header-menu">
        <div class="container-fluid">
            <div class="hor-menu">
                <ul class="nav navbar-nav">
                    <!-- <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active"> -->
                    <li aria-haspopup="true" <?php if (isset($Titel)) { if('Home' == trim($Titel)) echo 'class="menu-dropdown classic-menu-dropdown active"'; } ?>>
                        <a href="<?= site_url()?>">
                            <i class="icon-home"></i> Dashboard
                            <span class="arrow"></span>
                        </a>
                    </li>
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
                </ul>
            </div>
        </div>
    </div>
</div>
