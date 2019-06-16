<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
            // if (isset($_POST)) {
            //     $supplier::saveshippingdetails($_POST);
            // }
        ?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add Shipment
                  <!--   <small>Add Shippment on Database</small> -->
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
            <?php
                $listofsupplier = $supplier::getsupplierdata();
            ?>
        	<form method="post" action="">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>&nbsp; </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="date" class="form-control" id="form_control_1" name="shipdate">
                                        <label for="form_control_1">Shipment ETA Date</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input has-info">
                                        <select class="form-control" id="form_control_1" name="shipsupplier" required>
                                            <option value="">Select Supplier</option>
                                            <?php
                                                foreach ($listofsupplier as $key => $value) {
                                                    ?>
                                                        <option value="<?php echo $value['sup_id']; ?>"><?php echo $value['sup_name']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <label for="form_control_1">Supplier</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input has-info">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="xxxxxx - xxxxx - xxxxxx" name="referenceid">
                                        <label for="form_control_1">Reference Number</label>
                                        <!-- <span class="help-block">Some help goes here...</span> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input has-info">
                                        <textarea class="form-control" rows="16" placeholder="Enter more text" name="shipmanifest"></textarea>
                                        <label for="form_control_1">Shipment Details</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <input type="number" class="form-control" id="form_control_1" name="totalshiplm">
                                        <label for="form_control_1">Total Linear Meter</label>
                                        <!-- <span class="help-block">Some help goes here...</span> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <input type="number" class="form-control" id="form_control_1" name="totalshipnw">
                                        <label for="form_control_1">Total Kilogram</label>
                                        <!-- <span class="help-block">Some help goes here...</span> -->
                                    </div>
                                </div>
                                <br class="clear">
                            </div>
                        </div>
                    </div>
                	<div class="form-actions noborder">
                        <input type="submit" name="submit" value="Submit" class="btn blue">
                        <a href="<?php echo $baseline; ?>/index.php?page=shipment" class="btn default">Cancel</a>
                    </div>
            </form>
        </div>
    </div>
</div>