<div class="page-sidebar-wrapper">
    
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?php echo (isset($_GET['page']) ? '' : 'active open') ?>">
                <a href="<?php echo $baseline; ?>/index.php" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <!-- <span class="arrow open"></span> -->
                </a>
            </li>
           <!--  <li class="heading">
                <h3 class="uppercase">Inside Davao EG</h3>
            </li> -->
            <li class="nav-item <?php echo (isset($_GET['page']) && ($_GET['page'] == 'raw_material' || $_GET['page'] == 'inventory_report' || $_GET['page'] == 'report_sales_inventory') ? 'active open' : '') ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-dropbox"></i>
                    <span class="title">Inventory</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'raw_material' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="nav-link ">
                            <i class="fa fa-tasks"></i>
                            <span class="title">Coil Masterlist</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'inventory_report' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=inventory_report" class="nav-link ">
                            <i class="fa fa-area-chart"></i>
                            <span class="title">Inventory Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'report_sales_inventory' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=report_sales_inventory" class="nav-link ">
                            <i class="fa fa-send"></i>
                            <span class="title">Generate Report</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo (isset($_GET['page']) && ($_GET['page'] == 'final_product') ? 'active open' : '') ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">Manufacturing</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                   <li class="nav-item  <?php echo (isset($_GET['page']) && $_GET['page'] == 'final_product' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=final_product" class="nav-link ">
                            <i class="fa fa-tags"></i>
                            <span class="title">Production Details</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item  ">
                        <a href="#" class="nav-link ">
                            <i class="icon-basket"></i>
                            <span class="title">Product Reports</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Shipment</h3>
            </li>
            <li class="nav-item <?php echo (isset($_GET['page']) && ($_GET['page'] == 'shipment' || $_GET['page'] == 'shipment_report') ? 'active open' : '') ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-ship"></i>
                    <span class="title">Material Shipment</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  <?php echo (isset($_GET['page']) && $_GET['page'] == 'shipment' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=shipment" class="nav-link ">
                            <i class="fa fa-clock-o"></i>
                            <span class="title">Schedule</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo (isset($_GET['page']) && $_GET['page'] == 'shipment_report' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=shipment_report" class="nav-link ">
                            <i class="fa fa-info-circle"></i>
                            <span class="title">Reports</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php if ($userinformationdata['user_access'] == 1): ?>
            <li class="heading">
                <h3 class="uppercase">Settings</h3>
            </li>
            
            <li class="nav-item  <?php echo (isset($_GET['page']) && ($_GET['page'] == 'all_meta' || $_GET['page'] == 'all_sku' || $_GET['page'] == 'all_supplier') ? 'active open' : '') ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Options</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  <?php echo (isset($_GET['page']) && $_GET['page'] == 'all_meta' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_meta" class="nav-link ">
                            <i class="fa fa-share-alt"></i>
                            <span class="title">MetaData</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo (isset($_GET['page']) && $_GET['page'] == 'all_sku' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_sku" class="nav-link ">
                            <i class="fa fa-key"></i>
                            <span class="title">SKU Masterlist</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo (isset($_GET['page']) && $_GET['page'] == 'all_supplier' ? 'active open' : '') ?>">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_supplier" class="nav-link ">
                            <i class="fa fa-truck"></i>
                            <span class="title">Suppliers</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item  ">
                        <a href="<?php echo $baseline; ?>/index.php?page=add_profile" class="nav-link ">
                            <i class="icon-basket"></i>
                            <span class="title">Profiles</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <?php endif; ?>
            <li class="heading">
                <h3 class="uppercase">People</h3>
            </li>
            <li class="nav-item  <?php echo (isset($_GET['page']) && ($_GET['page'] == 'all_users') ? 'active open' : '') ?>">
                <?php if ($userinformationdata['user_access'] == 1): ?>
                    <a href="<?php echo $baseline; ?>/index.php?page=all_users" class="nav-link ">
                        <i class="fa fa-users"></i>
                        <span class="title">Users</span>
                    </a>
                <?php else: ?>
                    <a href="<?php echo $baseline; ?>/index.php?page=profile&id=<?php echo $userinformationdata['user_id']; ?>" class="nav-link ">
                        <i class="fa fa-users"></i>
                        <span class="title">Users</span>
                    </a>
                <?php endif; ?>
                
            </li>
            <li class="heading">
                <h3 class="uppercase">Customer Management</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">Discounts</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_clients" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Clients</span>
                        </a>
                    </li>
                   <!--  <li class="nav-item  ">
                        <a href="<?php echo $baseline; ?>/index.php?page=add_default_discount" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Default Discounts</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo $baseline; ?>/index.php?page=all_profiles" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Profiles</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Ordering Management</h3>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo $baseline; ?>/index.php?page=all_packinglist" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Packing List</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>