
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
		<?php
			$shipdata = $shipment::getshipmentdata($_GET['id']);
            $listofsupplier = $supplier::getsupplierdata();
		?>    	
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Edit Shipping
                   <!--  <small>--- --- -- ---</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
         <!--    <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li> -->
                <span class="active"><?php echo $shipdata['ship_reference']; ?></span>
            </li>
        </ul>
        <div class="">
        	<div class="innershipment">
                <?php if (isset($_GET['edited']) && $_GET['edited'] == '1'): ?>
                    <div class="alert alert-success"><strong>Success!</strong> Shipping Successfully Updated. </div>
                <?php endif ?>
        		<form method="post" action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input has-info">
                                <input type="date" class="form-control" id="form_control_1" name="seta" placeholder="Info state" value="<?php echo $shipdata['ship_date']; ?>">
                                <label for="form_control_1">Shipping ETA Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" id="form_control_1" name="shipsupplier" required>
                                    <option value="">Select Supplier</option>
                                    <?php
                                        foreach ($listofsupplier as $key => $value) {
                                            ?>
                                                <option value="<?php echo $value['sup_id']; ?>" <?php echo ($shipdata['ship_supplier'] == $value['sup_id'] ? 'selected="selected"' : ''); ?>><?php echo $value['sup_name']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <label for="form_control_1">Supplier</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="form_control_1" name="refid" placeholder="Info state" value="<?php echo $shipdata['ship_reference']; ?>">
                                <label for="form_control_1">Refference id</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-info">
                                <textarea class="form-control" rows="16" placeholder="Enter more text" name="shipmanifest"><?php echo $shipdata['ship_manifest']; ?></textarea>
                                <label for="form_control_1">Shipment Manifest</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" name="totalshiplm" value="<?php echo $shipdata['ship_total_lm']; ?>">
                                <label for="form_control_1">Total Shipment Linear Meter</label>
                                <!-- <span class="help-block">Some help goes here...</span> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" name="totalshipnw" value="<?php echo $shipdata['ship_total_nw']; ?>">
                                <label for="form_control_1">Total Shipment Kilogram</label>
                                <!-- <span class="help-block">Some help goes here...</span> -->
                            </div>
                        </div>
                        <br class="clear">
                        <div class="col-md-12">
                            <div class="form-actions noborder">
                                <input type="hidden" name="shipid" value="<?php echo $_GET['id']; ?>">
                                <input type="submit" name="submit" value="Edit" class="btn blue">
                                <a href="<?php echo $baseline; ?>/index.php?page=shipment" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>      
                </form>
        	</div>       	
        </div>
    </div>
</div>