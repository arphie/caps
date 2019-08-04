-<?php
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
                // $profile = $packingdata['dbaseprofile'];
                $clientid = $packingdata['order_client'];
                $ord_balance = $packingdata['ord_balance'];
                unset($specs['profileitem']);
                unset($specs['dbaseprice']);
                unset($specs['dbaseprofile']);
                unset($specs['colorofitem']);
                unset($specs['dclient']);
                unset($specs['Submit']);
            ?>
            <?php
                if (isset($_POST['dsubsdd'])) {
                    unset($_POST['dsubsdd']);
                    $specs['ajsinfo'] = $_POST;
                    $client::updateadjustment($specs, $packingdata['order_id']);

                    // header("location: ".BASELINK."/index.php?page=all_payment");
                }
            ?>
            <div class="col-md-12">
                <?php
                    if (isset($_POST['payorder'])) {    
                        $client::savePayment($_POST);
                        
                    }
                ?>
                <div class="col-md-4">
                    <div class="portlet light profile-sidebar-portlet ">
                        
                        <div class="innerprofile">
                            <?php $clientdata = $client::getclientinfobyid($clientid); ?>
                            <?php $payemntinfo = $client::getPayments($_GET['pid']); ?>
                            <!-- <pre>
                                <?php print_r($clientid); ?>
                            </pre> -->

                        </div>
                        <!-- SIDEBAR USERPIC -->
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> <?php echo $clientdata['client_name']; ?> </div>
                            <div class="profile-usertitle-job"> <?php echo $clientdata['client_address']; ?> </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <a href="#" class="btn btn-circle green btn-sm confirmpayment">Pay Order</a>
                            
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <?php
                            $totalorders = 0;
                            $totalprice = 0;
                            $totalammount = 0;
                            foreach($specs['stims'] as $totskey => $totsval){
                                foreach($totsval as $totinskey => $totinsval){
                                    $totalprice += $totinsval['dtotalprice'];
                                }
                            }

                            foreach($specs['ord'] as $totsskey => $totssval){
                                if ($totssval['ordertype'] == "plainsheet") {
                                    $totalprice += $totssval['baseprice'];
                                }
                            }
                        ?>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> <?php echo count($specs['ord']); ?> Orders </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> ₱ <?php echo number_format($ord_balance,2,".",","); ?> </a>
                                        <?php if(!empty($payemntinfo)): ?>
                                            <ul>
                                                <?php foreach($payemntinfo as $key => $svalue): ?>
                                                    <li>
                                                        <div><?php echo $svalue['payamount']; ?> thru <?php echo $svalue['pmethod']; ?></div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- END MENU -->
                    </div>
                    <?php if(@$_GET['view'] != "paid"): ?>
                    <div class="portlet light profile-sidebar-portlet ">
                        <div class="addpayment" style="padding:0 15px 5px;">
                                
                                    <div class="form-group form-md-line-input has-info" style="margin-bottom:5px;">
                                        <select class="form-control" id="paymentmethon" name="pmethod">
                                            <option value="">Select Payment Method</option>
                                            <option value="cash">Cash</option>
                                            <option value="card">Card</option>
                                            <option value="check">Check</option>
                                            <option value="account">Account</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <label for="paymentmethon">Payment Method</label>
                                    </div>
                                
                                <div class="pcash actionbase hideme">
                                    <div class="inneroff">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcashreciept" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Reciept Number</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcashamount" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Amount</label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="pcard actionbase hideme">
                                    <div class="inneroff">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcardreciept" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Reciept Number</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcardbank" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Bank Name</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcardamount" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Amount</label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="pcheck actionbase hideme">
                                    <div class="inneroff">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcheckreciept" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Reciept Number</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcheckbank" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Bank Name</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pcheckamount" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Amount</label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="paccount actionbase hideme">
                                    <div class="inneroff">
                                    <?php $accounts = $client::getAccountInfo($clientid); ?>
                                    <ul style="padding: 0;">
                                        <?php foreach($accounts as $key => $value): ?>
                                            <li style="list-style:none;"><input type="radio" name="paymentammount" value="<?php echo $value['acid']; ?>" style="margin-right:10px;">₱ <?php echo number_format($value['abalance'],2,".",","); ?> (from <?php echo ($value['dtype'] == "advance" ? "Advance Payment" : $value['dtype']); ?>)</li>
                                        <?php endforeach; ?>
                                    </ul>
                                    </div>
                                </div> 
                                <div class="pothers actionbase hideme">
                                    <div class="inneroff">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pothersreciept" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Reciept Number</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="pothersamount" value="" class="form-control" placeholder="">
                                            <label for="form_control_1">Amount</label>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <textarea class="form-control" id="pothersdesc" rows="3" placeholder="Enter more text" name="pothersdesc"></textarea>
                                            <label for="form_control_1">Fee Description</label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-actions actionbase hideme submitbase">
                                    <input type="hidden" value="<?php echo $_GET['pid']; ?>" name="orderid">
                                    <button type="submit" class="btn blue" name="payorder">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-8">
                    <form action="" method="post">
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-microphone font-green"></i>
                                <span class="caption-subject bold font-green uppercase">(Total: ₱ <?php echo number_format($totalprice,2,".",","); ?>)</span>
                                <!-- <span class="caption-helper">user timeline</span> -->
                            </div>
                            <div class="actions" style="margin-left:10px;">
                                <div class="btn-group">
                                <?php if(@$_GET['todo'] == 'adjust'): ?>
                                    <input type="submit" class="btn green-haze btn-outline btn-circle btn-sm" name="dsubsdd" id="">
                                <?php endif; ?>
                                    <!-- <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;"> Submit </a> -->
                                </div>
                            </div>
                            <?php if(isset($_GET['view']) && $_GET['view'] == 'paid'): ?>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="<?php echo $baseline; ?>/index.php?page=view_payment&pid=<?php echo $_GET['pid']; ?>&view=paid&todo=adjust">
                                                    <i class="i"></i> Adjust Packing List</a>
                                            </li>
                                            <!-- <li class="divider"> </li>
                                            <li>
                                                <a href="<?php echo $baseline; ?>/index.php?page=view_jo&pid=<?php echo $_GET['pid']; ?>">View Job Orber</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="portlet-body printable">
                            <div class="timeline">
                                <?php foreach ($specs['ord'] as $orderitemkey => $orderitemvalue) { ?>
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <div class="timeline-icon">
                                                    <i class="icon-social-dropbox font-red-intense"></i>
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
                                                        <?php if(@$_GET['todo'] == 'adjust'): ?>
                                                            <div class="dadjustpart">
                                                                <div class="dadjinner">
                                                                    <div class="form-group form-md-line-input">
                                                                        <textarea class="form-control" rows="3" placeholder="Adjustment Details" name="ajd[<?php echo $orderitemkey; ?>][adjnote]"><?php echo $specs['ajsinfo']['ajd'][$orderitemkey]['adjnote']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <input type="text" class="form-control" id="form_control_1" placeholder="New Total" name="ajd[<?php echo $orderitemkey; ?>][adjtotal]" value="<?php echo $specs['ajsinfo']['ajd'][$orderitemkey]['adjtotal']; ?>">
                                                                    </div>
                                                                </div>
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
                    </form>
                </div>

            </div>
            <br class="clear">
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
<script>
    $( document ).ready(function() {

        $(".confirmpayment").click(function(e){
            e.preventDefault();
            console.log("herer");
        });
        $(".printpl").click(function(e){
            e.preventDefault();
            // window.print();

            $.print(".printable"); 
        });

        $('#paymentmethon').on('change', function() {
            var istype = $(this).val();
            console.log(istype);

            $(this).parents(".addpayment").find(".actionbase").hide(function(){
                $(this).addClass('hideme')
            });

            if(istype != ""){
                $(this).parents(".addpayment").find(".p"+istype).show(function(){
                    $(this).removeClass("hideme");
                });
                $(this).parents(".addpayment").find(".submitbase").show(function(){
                    $(this).removeClass("hideme");
                });
            }
        });
    });
    
</script>