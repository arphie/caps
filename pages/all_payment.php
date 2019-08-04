<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Approved Packing List
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
                        <a href="<?php echo $baseline; ?>/index.php?page=all_payment&view=paid" class="btn default btn-sm">
                            <i class="fa fa-user-plus icon-black"></i> View Paid Packing list </a>
                    </div>
                </div>
                
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th style="width: 60px;"> ID </th>
                                <th> Client Name </th>
                                <th> Total</th>
                                <th> Balance</th>
                                <th> Status</th>
                                <th style="width: 200px;"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_GET['view']) && $_GET['view'] == "paid") {
                                    $toview = $client::viewPaidPackinglist();
                                } else {
                                    $toview = $client::getallpackinglisttoPay();
                                }
                            
                                foreach ($toview as $key => $value) {
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
                                        <td>Php <?php echo number_format($value['order_total'],2,".",","); ?></td>
                                        <td>Php <?php echo number_format($value['ord_balance'],2,".",","); ?></td>
                                        <td><?php echo ($value['isstatus'] == "1" ? "Paid" : "Pending"); ?></td>
                                        <td>
                                            <?php if (isset($_GET['view']) && $_GET['view'] == "paid") { ?>
                                                <a href="<?php echo $baseline; ?>/index.php?page=view_payment&pid=<?php echo $value['order_id']; ?>&view=paid" class="btn blue">View Details</a>
                                            <?php } else { ?>
                                                <a href="<?php echo $baseline; ?>/index.php?page=view_payment&pid=<?php echo $value['order_id']; ?>" class="btn blue">Checkout</a>
                                            <?php } ?>
                                            
                                            <!-- <a href="<?php echo $baseline; ?>/index.php?page=view_jo&pid=<?php echo $value['order_id']; ?>" class="btn red-sunglo">Create JO</a> -->
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
