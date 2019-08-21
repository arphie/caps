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
                                        <?php foreach($details['ord'] as $orderitemkey => $orderitemvalue): ?>
                                        <?php if($orderitemvalue['ordertype'] == "hardware"): ?>
                                            <div class="table-scrollable">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th> Pieces </th>
                                                            <th> Type </th>
                                                            <th> Price </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    <?php if(isset($details['stims'][$orderitemkey])): ?>
                                                        <?php foreach($details['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                            <?php $total += $isvalsor['dtotalprice']; ?>
                                                            <tr>
                                                                <td><?php echo $inorderkey; ?></td>
                                                                <td><?php echo $metaData::getspecificmetavalue($isvalsor["hardwareparts"]); ?> </td>
                                                                <td>₱ <?php echo $isvalsor['baseprice']; ?> </td>
                                                                <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th> &nbsp; </th>
                                                            <th> &nbsp; </th>
                                                            <th> Total </th>
                                                            <th> ₱ <?php echo number_format($total,2,".",","); ?> </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        <?php elseif($orderitemvalue['ordertype'] == "bended"): ?>
                                            <div class="table-scrollable">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th> Pieces </th>
                                                            <th> Bended to </th>
                                                            <th> Price </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    <?php if(isset($details['stims'][$orderitemkey])): ?>
                                                    <?php foreach($details['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                        <?php $total += $isvalsor['dtotalprice']; ?>
                                                        <tr>
                                                            <td><?php echo $inorderkey; ?></td>
                                                            <td><?php echo $metaData::getspecificmetavalue($isvalsor["bendedto"]); ?> </td>
                                                            <td>₱ <?php echo $isvalsor['baseprice']; ?> </td>
                                                            <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th> &nbsp; </th>
                                                            <th> &nbsp; </th>
                                                            <th> Total </th>
                                                            <th> ₱ <?php echo number_format($total,2,".",","); ?> </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        <?php elseif($orderitemvalue['ordertype'] == "other"): ?>
                                            <div class="table-scrollable">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th> Description </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    <?php if(isset($details['stims'][$orderitemkey])): ?>
                                                    <?php foreach($details['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                        <?php $total += $isvalsor['dtotalprice']; ?>
                                                        <tr>
                                                            <td>
                                                                <div class="dothermessage">
                                                                    <?php echo $isvalsor["otherfees"]; ?> 
                                                                </div>
                                                            </td>
                                                            <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th> Total </th>
                                                            <th> ₱ <?php echo number_format($total,2,".",","); ?> </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        <?php elseif($orderitemvalue['ordertype'] == "panel"): ?>
                                            <div class="table-scrollable">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th> Length </th>
                                                            <th> Pieces </th>
                                                            <th> Price </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    
                                                    <?php if(isset($details['stims'][$orderitemkey])): ?>
                                                        <?php foreach($details['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                            <?php $total += $isvalsor['dtotalprice']; ?>
                                                            <tr>
                                                                <td><?php echo $inorderkey; ?></td>
                                                                <td><?php echo $isvalsor["dolenth"]; ?>m </td>
                                                                <td><?php echo $isvalsor['length']; ?> </td>
                                                                <td>₱ <?php echo $isvalsor['baseprice']; ?> </td>
                                                                <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th> &nbsp; </th>
                                                            <th> &nbsp; </th>
                                                            <th> &nbsp; </th>
                                                            <th> Total </th>
                                                            <th> ₱ <?php echo number_format($total,2,".",","); ?> </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(@$_GET['todo'] == 'adjust'): ?>
                                            <div class="dadjustpart">
                                                <div class="dadjinner">
                                                    <div class="form-group form-md-line-input">
                                                        <textarea class="form-control" rows="3" placeholder="Adjustment Details" name="ajd[<?php echo $orderitemkey; ?>][adjnote]"><?php echo @$details['ajsinfo']['ajd'][$orderitemkey]['adjnote']; ?></textarea>
                                                    </div>
                                                    <div class="form-group form-md-line-input">
                                                        <input type="text" class="form-control" id="form_control_1" placeholder="New Total" name="ajd[<?php echo $orderitemkey; ?>][adjtotal]" value="<?php echo @$details['ajsinfo']['ajd'][$orderitemkey]['adjtotal']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(isset($details['ajsinfo'])): ?>
                                            <?php $infoitem = $details['ajsinfo']['ajd'][$orderitemkey]; ?>
                                            <?php if($infoitem['adjtotal'] != ""): ?>
                                                <ul>
                                                    <li>
                                                        <div class="ajlabel notelabel">Total:</div>
                                                        <div class="ajitem noteitem"><?php echo $infoitem['adjtotal']; ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="ajlabel notelabel">Remarks:</div>
                                                        <div class="ajitem noteitem"><?php echo $infoitem['adjnote']; ?></div>
                                                    </li>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
