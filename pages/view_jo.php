<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="">
            <?php
                $packingdata = $client::packing($_GET['pid']);
                $specs = unserialize($packingdata['order_specs']);
                // $profile = $packingdata['dbaseprofile'];
                $clientid = $specs['clientid'];
                unset($specs['profileitem']);
                unset($specs['dbaseprice']);
                unset($specs['dbaseprofile']);
                unset($specs['colorofitem']);
                unset($specs['dclient']);
                unset($specs['Submit']);
            ?>
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-microphone font-green"></i>
                                <span class="caption-subject bold font-green uppercase"> Job Order</span>
                                <!-- <span class="caption-helper">user timeline</span> -->
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" class="printpl">
                                                <i class="i"></i> Print Job Order</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="<?php echo $baseline; ?>/index.php?page=view_packinglist&pid=<?php echo $_GET['pid']; ?>">View Packing list</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body printable">
                            <div class="timeline">
                            <?php foreach ($specs['ord'] as $orderitemkey => $orderitemvalue) { ?>
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <div class="timeline-icon">
                                                    <i class="icon-paper-clip font-red-intense"></i>
                                                </div>
                                            </div>
                                            <div class="timeline-body">
                                                <div class="timeline-body-arrow"> </div>
                                                <div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption">
                                                        <span class="timeline-body-alerttitle font-green-haze">Order <?php echo $orderitemkey; ?></span>
                                                        <span class="timeline-body-time font-grey-cascade">Order for <?php echo $orderitemvalue['ordertype']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="timeline-body-content">
                                                    <div class="innercontent">
                                                        <div class="table-scrollable">
                                                            <table class="table table-hover table-light">
                                                                <tbody>
                                                                    <?php if($orderitemvalue['ordertype'] == "plainsheet"): ?>
                                                                        <tr>
                                                                            <td><strong>Pieces</strong></td>
                                                                            <td><?php echo $specs['ord'][$orderitemkey]["basepieces"]; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Color</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["colorofitem"]); ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Size</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["getsizeofprofile"]); ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Total Price</strong></td>
                                                                            <td><?php echo $specs['ord'][$orderitemkey]["baseprice"]; ?> </td>
                                                                        </tr>
                                                                    <?php elseif($orderitemvalue['ordertype'] == "hardware"): ?>
                                                                    <?php elseif($orderitemvalue['ordertype'] == "other"): ?>
                                                                    <?php elseif($orderitemvalue['ordertype'] == "bended"): ?>
                                                                        <tr>
                                                                            <td><strong>Pieces</strong></td>
                                                                            <td><?php echo $specs['ord'][$orderitemkey]["basepieces"]; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Color</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["colorofitem"]); ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Size</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["getsizeofprofile"]); ?> </td>
                                                                        </tr>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <td><strong>Profile</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["profile"]); ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Color</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["color"]); ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Size</strong></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($specs['ord'][$orderitemkey]["size"]); ?> </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
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
                                                                    <?php foreach($specs['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                                        <?php $total += $isvalsor['dtotalprice']; ?>
                                                                        <tr>
                                                                            <td><?php echo $inorderkey; ?></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($isvalsor["hardwareparts"]); ?> </td>
                                                                            <td>₱ <?php echo $isvalsor['baseprice']; ?> </td>
                                                                            <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                                        </tr>
                                                                    <?php } ?>
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
                                                                    <?php foreach($specs['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                                        <?php $total += $isvalsor['dtotalprice']; ?>
                                                                        <tr>
                                                                            <td><?php echo $inorderkey; ?></td>
                                                                            <td><?php echo $metaData::getspecificmetavalue($isvalsor["bendedto"]); ?> </td>
                                                                            <td>₱ <?php echo $isvalsor['baseprice']; ?> </td>
                                                                            <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                                        </tr>
                                                                    <?php } ?>
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
                                                                    <?php foreach($specs['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
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
                                                                    <?php foreach($specs['stims'][$orderitemkey] as $inorderkey => $isvalsor) { ?>
                                                                        <?php $total += $isvalsor['dtotalprice']; ?>
                                                                        <tr>
                                                                            <td><?php echo $inorderkey; ?></td>
                                                                            <td><?php echo $isvalsor["dolenth"]; ?>m </td>
                                                                            <td><?php echo $isvalsor['length']; ?> </td>
                                                                            <td>₱ <?php echo $isvalsor['baseprice']; ?> </td>
                                                                            <td>₱ <?php echo number_format($isvalsor['dtotalprice'],2,".",","); ?> </td>
                                                                        </tr>
                                                                    <?php } ?>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br class="clear">
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
<script>
    $( document ).ready(function() {
        $(".printpl").click(function(e){
            e.preventDefault();
            // window.print();

            $.print(".printable"); 
        });
    });
    
</script>