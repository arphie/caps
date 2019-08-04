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
                    <!-- <div class="actions">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_payment&view=paid" class="btn default btn-sm">
                            <i class="fa fa-user-plus icon-black"></i> View Paid Packing list </a>
                    </div> -->
                </div>
                
                <div class="portlet-body">
                    <?php $report = $client::getPaymentReport(); ?>

                    <!-- <pre>
                        <?php print_r($report); ?>
                    </pre> -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Client Profile</th>
                                <th>Total</th>
                                <th>Balance</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($report as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['order_id']; ?></td>
                                    <td><?php echo $value['order_client']; ?></td>
                                    <td><?php echo $value['order_total']; ?></td>
                                    <td><?php echo $value['ord_balance']; ?></td>
                                    <td>
                                        <?php
                                            $details = unserialize($value['order_specs']);
                                        ?>
                                        <pre>
                                            <?php print_r($details); ?>
                                        </pre>
                                        <?php foreach($details['ord'] as $inkey => $inval): ?>
                                            <!-- <div>
                                                Type: <?php echo $inval['ordertype']; ?><br />
                                                Total: <?php echo $inval['ordertype']; ?><br />
                                            </div> -->
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
