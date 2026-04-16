<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->

        <li class="heading">
            <h3 class="uppercase">Menu</h3>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url();?>" class="nav-link ">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-folder"></i>
                <span class="title">Multi Level Menu</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i> Item 1
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-camera"></i> Sample Link 1</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-bar-chart"></i> Item 3 </a>
                </li>
            </ul>
        </li> -->

        <!-- Level 1 -->
        <?php foreach ($_getMenu1 as $row1):
        echo "<li class='nav-item'>";
        echo "<a href='javascript:;' class='nav-link nav-toggle'>";
        echo $row1->MenuIcon;
        echo "<span class='title'>".$row1->MenuLabel."</span>";
        echo "<span class='arrow'></span>";
        echo "</a>";
        echo "<ul class='sub-menu'>";

        // Level 2
        foreach ($_getMenu2 as $row2):
            if ($row2->MenuHeader === $row1->MenuID):
                echo "<li class='nav-item'>";
                if ($row2->MenuLink == '#') {
                    echo "<a href='javascript:void(0);' class='nav-link nav-toggle'>";
                }else{
                    echo "<a href='".site_url($row2->MenuLink)."' class='nav-link'>";
                }
                echo $row2->MenuIcon;
                echo "<span class='title'>".$row2->MenuLabel."</span>";
                // echo "<span class='arrow'></span>";
                echo "</a>";
                echo "<ul class='sub-menu'>";

                // Level 3
                foreach ($_getMenu3 as $row3):
                    if ($row3->MenuHeader === $row2->MenuID):
                        echo "<li class='nav-item'>";
                        echo "<a href='".site_url($row3->MenuLink)."' class='nav-link'>";
                        echo $row3->MenuIcon;
                        echo "<span class='title'>".$row3->MenuLabel."</span>";
                        echo "</a>";
                        echo "</li>";
                    endif;
                endforeach;
                // #Level 3

                echo "</ul>";
                echo "</li>";
            endif;
        endforeach;

        echo "</ul>";
        echo "</li>";
        endforeach; ?>
        <!-- #Level 1 -->

    </ul>
    <!-- END SIDEBAR MENU -->
</div>