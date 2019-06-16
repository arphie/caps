<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>All Packing List
                <!--     <small>List of All Users</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
          <!--   <li>
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
                        <i class="fa fa-user"></i>List of Packing List </div>
                    <div class="actions">
                        <a href="<?php echo $baseline; ?>/index.php?page=add_packinglist" class="btn default btn-sm">
                            <i class="fa fa-user-plus icon-black"></i> Add New Packing List </a>
                    </div>
                </div>
                
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th style="width: 60px;"> ID </th>
                                <th> Client Name </th>
                                <th> Total</th>
                                <th style="width: 200px;"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                foreach ($client::getallpackinglist() as $key => $value) {
                                    $orderinfo = unserialize($value['order_specs']);
                                    $totalmon = 0;
                                    foreach($orderinfo['stims'] as $orkeyb => $orvalb){
                                        foreach($orvalb as $stiminkey => $stiminval){
                                            $totalmon += $stiminval['dtotalprice'];
                                        }
                                    }
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value['order_id']; ?></td>
                                        <td><?php echo $client::getclientbyid($value['order_client']); ?></td>
                                        <td>Php <?php echo number_format($totalmon,2,".",","); ?></td>
                                        <td>
                                            <a href="<?php echo $baseline; ?>/index.php?page=view_packinglist&pid=<?php echo $value['order_id']; ?>" class="btn blue">View More</a>
                                            <a href="<?php echo $baseline; ?>/index.php?page=view_jo&pid=<?php echo $value['order_id']; ?>" class="btn red-sunglo">Create JO</a>
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
