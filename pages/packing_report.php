
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <!-- <div class="page-title">
                <h1>Packing List Report
                </h1>
            </div> -->
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
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Packing List Report</span>
                </div>
                <!-- <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn grey-salsa btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                        <label class="btn grey-salsa btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                    </div>
                </div> -->
            </div>
            <div class="portlet-body">
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr class="uppercase">
                                <th> Id </th>
                                <th> Client </th>
                                <th> Total </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $toview = $client::viewPaidPackinglist();
                            
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
                                        <td><?php echo ($value['isstatus'] == "1" ? "Paid" : "Pending"); ?></td>
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
</div>