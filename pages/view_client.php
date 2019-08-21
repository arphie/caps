
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>View Client
                  <!--   <small>Bla Bla bLa</small> -->
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
            <?php $clientinfo = $client::getclientinfobyid($_GET['cid']); ?>
            <!-- <pre>
                <?php print_r($_POST); ?>
            </pre> -->
            <?php
                if (isset($_POST['Submit'])) {
                    $client::addFunds($_POST, $_GET['cid']);
                }
            ?>
            <form action="" method="post">
                <div class="row">                   
                    <div class="col-md-6">
                        
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Client Information </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Client Name" value="<?php echo $clientinfo['client_name']; ?>" readonly="readonly">
                                    <label for="form_control_1">Client Name</label>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Client Name" value="<?php echo $clientinfo['client_sku']; ?>" readonly="readonly">
                                    <label for="form_control_1">Client SKU</label>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Client Address" value="<?php echo $clientinfo['client_address']; ?>" readonly="readonly">
                                    <label for="form_control_1">Client Address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $profilelist = array('Barcelona Rib','Barcelona Curve','Florence Corrugated','Monaco Tile','Millazo Tile','Ceiling Cladding','Wall Cladding','Spandrell Rib','Spandrell Corr','Steel Decking','Plainsheet Special Cut');
                    ?>
                    <div class="col-md-6">
                        <?php if(isset($_GET['mode']) && $_GET['mode'] == "add_money"): ?>
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Add Funds </div>
                                    <div class="actions">
                                        <a href="<?php echo $baseline; ?>/index.php?page=view_client&cid=<?php echo $_GET['cid']; ?>" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> Discount </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="innerform">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" class="form-control" name="clamount" id="clamount" placeholder="Enter Amount">
                                            <label for="clamount">Amount</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input has-info">
                                                    <select class="form-control" name="paymenttype" id="paymenttype">
                                                        <option value="">Select Payment Type</option>
                                                        <option value="advance">Advance Payment</option>
                                                        <option value="adjustment">Adjustment</option>
                                                    </select>
                                                    <label for="paymenttype">Payment type</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input has-info">
                                                    <select class="form-control" name="modepayment" id="modepayment">
                                                        <option value="">Select Mode of Payment</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="card">Card</option>
                                                        <option value="check">Check</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                    <label for="modepayment">Mode of Payment</label>
                                                </div>
                                            </div>
                                            <br class="clear">
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <textarea class="form-control" rows="3" name="remarks" placeholder="Enter Remarks"></textarea>
                                            <label for="form_control_1">Remarks</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Profiles </div>
                                    <div class="actions">
                                        <a href="<?php echo $baseline; ?>/index.php?page=view_client&cid=<?php echo $_GET['cid']; ?>&mode=add_money" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> Accounts </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="supaccord">
                                        <?php foreach ($client::getprofiles() as $profkey => $profvalue) { ?>
                                            <li>
                                                <div class="dtitle"><?php echo $profvalue['prof_name']; ?></div>
                                                <div class="dsidecontent">
                                                    <input type="radio" name="dselprofile" value="<?php echo $profvalue['prof_id']; ?>">
                                                </div>
                                            </li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <br class="clear">
                    <div class="col-md-12">
                        <div class="daccounts">
                            <div class="dinneraccounts">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Accounts Information</div>
                                        <!-- <div class="actions">
                                            <a href="javascript:;" class="btn btn-default btn-sm">
                                                <i class="fa fa-pencil"></i> Edit </a>
                                            <a href="javascript:;" class="btn btn-default btn-sm">
                                                <i class="fa fa-plus"></i> Add </a>
                                        </div> -->
                                    </div>
                                    <div class="portlet-body">
                                        <div class="inner-body">
                                            <?php
                                                $onsound = $client::getAccounts($_GET['cid']);
                                            ?>
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-comments"></i>Contextual Rows </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-scrollable">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> Ammount </th>
                                                                    <th> Balance </th>
                                                                    <th> From </th>
                                                                    <th> Used in </th>
                                                                    <th> Remarks </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($onsound as $key => $value) { ?>
                                                                    <tr class="">
                                                                        <td>₱<?php echo number_format($value['amount'], 2, '.', ','); ?> </td>
                                                                        <td>₱<?php echo number_format($value['abalance'], 2, '.', ','); ?> </td>
                                                                        <td> <?php echo $value['dtype']; ?> </td>
                                                                        <td>
                                                                            <?php if($value['usedin'] != ""): ?>
                                                                            <?php $usedin = unserialize($value['usedin']); ?>
                                                                                <ul>
                                                                                    <?php foreach ($usedin as $usedkey => $usedvalue): ?>
                                                                                        <li><a href="<?php echo $baseline; ?>/index.php?page=view_packinglist&pid=<?php echo $usedvalue; ?>"><?php echo $usedvalue; ?></a></li>
                                                                                    <?php endforeach; ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td> <?php echo $value['premarks']; ?> </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                    <div class="form-actions noborder">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_clients" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>