<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>All Profiles
                  <!--   <small>List of All Users</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <!-- <li>
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
                        <i class="fa fa-user"></i>List of Profiles </div>
                    <div class="actions">
                        <a href="<?php echo $baseline; ?>/index.php?page=add_profile" class="btn default btn-sm">
                            <i class="fa fa-user-plus icon-black"></i> Add New Profiles </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th style="width: 50px;"> ID </th>
                                <th> Profile </th>
                                <th style="width: 150px;"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $listofprofiles = (empty($client::getprofiles()) ? array() : $client::getprofiles());
                                foreach ($client::getprofiles() as $key => $value) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $value['prof_id']; ?></td>
                                        <td><?php echo $value['prof_name']; ?></td>
                                        <td>
                                            <a href="<?php echo $baseline; ?>/index.php?page=view_profiles&id=<?php echo $value['prof_id']; ?>" class="btn blue btn-block">See More</a>  
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