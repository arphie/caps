<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Users Masterlist
                    <!-- <small>List of All Users</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
           <!--  <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Products</span>
            </li> -->
        </ul>
        <div class="">
            <div class="portlet solid white">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>List of Users </div>
                    <div class="actions">
                        <a href="<?php echo $baseline; ?>/index.php?page=add_user" class="btn default btn-sm">
                            <i class="fa fa-user-plus icon-black"></i> Add New User </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th style="width: 150px;"> Status </th>
                                <th> User ID </th>
                                <!-- <th > Usernmae </th> -->
                                <th> Display </th>
                                <th> Full Name</th>
                                <th> Privilege </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($users::getAllUsers() as $key => $value) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo ($value['is_active'] == 1 ? 'Active' : 'Inactive'); ?></td>
                                        <td><?php echo $value['user_id']; ?></td>
                                        <!-- <td><?php echo $value['user_name']; ?></td> -->
                                        <td><?php echo $value['user_loginname']; ?></td>
                                        <td><?php echo $value['user_lname']; ?>, <?php echo $value['user_fname']; ?></td>
                                        <td><?php echo ($value['user_access'] == "1" ? "Supervisor" : ($value['user_access'] == "2" ? "Inventory Staff" : "Sales Staff")); ?></td>
                                        <td>
                                            <a href="<?php echo $baseline; ?>/index.php?page=profile&id=<?php echo $value['user_id']; ?>" class="btn btn-icon-only yellow" title="See More"><i class="fa fa-search"></i></a>
                                            <?php if ($value['is_active'] == 1): ?>
                                                <a href="<?php echo $baseline; ?>/index.php?page=all_users&id=<?php echo $value['user_id']; ?>&todo=disable" class="btn btn-icon-only red disabme" title="Disable User"><i class="fa fa-ban"></i></a>
                                            <?php else: ?>
                                                <a href="<?php echo $baseline; ?>/index.php?page=all_users&id=<?php echo $value['user_id']; ?>&todo=enable" class="btn btn-icon-only green ensabme" title="Enable User"><i class="fa fa-check"></i></a>
                                            <?php endif ?>
                                            
                                        </td>
                                    </tr>

                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>