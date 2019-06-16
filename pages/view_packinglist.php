<?php
    if(isset($_GET['isapprove'])){
        $toapprove = $_GET['isapprove'];
        $orderdata = $_GET['pid'];
        $client::toapprove($orderdata, $toapprove);
    }
?>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="">
            <?php
                $packingdata = $client::packing($_GET['pid']);
                $specs = unserialize($packingdata['order_specs']);
                $profile = $packingdata['dbaseprofile'];
                $clientid = $specs['clientid'];
                unset($specs['profileitem']);
                unset($specs['dbaseprice']);
                unset($specs['dbaseprofile']);
                unset($specs['colorofitem']);
                unset($specs['dclient']);
                unset($specs['Submit']);
            ?>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="portlet light profile-sidebar-portlet ">
                        <div class="innerprofile">
                            <?php $clientdata = $client::getclientinfobyid($clientid); ?>
                            <!-- <pre>
                                <?php print_r($clientdata); ?>
                            </pre> -->

                        </div>
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> <?php echo $clientdata['client_name']; ?> </div>
                            <div class="profile-usertitle-job"> <?php echo $clientdata['client_address']; ?> </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <a href="<?php echo $baseline; ?>/index.php?page=view_packinglist&pid=<?php echo $_GET['pid']; ?>&isapprove=1" class="btn btn-circle green btn-sm">Approve</a>
                            <a href="<?php echo $baseline; ?>/index.php?page=view_packinglist&pid=<?php echo $_GET['pid']; ?>&isapprove=2" class="btn btn-circle green btn-sm">Disapprove</a>
                            <a href="<?php echo $baseline; ?>/index.php?page=view_jo&pid=<?php echo $_GET['pid']; ?>" class="btn btn-circle red btn-sm">Print & Create JO</a>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <?php
                            $totalorders = 0;
                            $totalprice = 0;
                            foreach($specs['stims'] as $totskey => $totsval){
                                foreach($totsval as $totinskey => $totinsval){
                                    $totalprice += $totinsval['dtotalprice'];
                                }
                            }
                        ?>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> ₱ <?php echo number_format($totalprice,2,".",","); ?> </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> <?php echo count($specs['stims']); ?> Orders </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-microphone font-green"></i>
                                <span class="caption-subject bold font-green uppercase"> Packing List</span>
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
                                                <i class="i"></i> Print Packing List</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="<?php echo $baseline; ?>/index.php?page=view_jo&pid=<?php echo $_GET['pid']; ?>">View Job Orber</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body printable">
                            <div class="timeline">
                                <?php foreach ($specs['stims'] as $orderitemkey => $orderitemvalue) { ?>
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
                                                    <span class="timeline-body-time font-grey-cascade">Order for Panels</span>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content">
                                                <div class="innercontent">
                                                    <div class="table-scrollable">
                                                        <table class="table table-hover table-light">
                                                            <tbody>
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
                                                            </tbody>
                                                        </table>
                                                    </div>
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
                                                            <?php foreach($orderitemvalue as $inorderkey => $isvalsor) { ?>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
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