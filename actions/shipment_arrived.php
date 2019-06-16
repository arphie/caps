
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
		<?php
			$shipdata = $shipment::getshipmentdata($_GET['id']);
		?>    	
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Shipping Arrived
                    <!-- <small>--- --- -- ---</small> -->
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
            </li> -->
            <li>
                <span class="active"><?php echo $shipdata['ship_reference']; ?></span>
            </li>
        </ul>
        <div class="">
        	<div class="innershipment">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Shipping Details </div>

                            </div>
                            <div class="portlet-body">
                                <div class="col-md-6">
			        				<div class="form-group form-md-line-input has-info">
			                            <input type="text" class="form-control" id="form_control_1" placeholder="Info state" value="<?php echo $shipdata['ship_date']; ?>" disabled>
			                            <label for="form_control_1">Shipping ETA</label>
			                        </div>
			        			</div>
			        			<div class="col-md-6">
			        				<div class="form-group form-md-line-input has-info">
			                            <input type="text" class="form-control" id="form_control_1" placeholder="Info state" value="<?php echo $supplier::getsuppliernamebyid($shipdata['ship_supplier']); ?>" disabled>
			                            <label for="form_control_1">Supplier</label>
			                        </div>
			        			</div>
			        			<div class="col-md-12">
			        				<div class="form-group form-md-line-input has-info">
			                            <input type="text" class="form-control" id="form_control_1" placeholder="Info state" value="<?php echo $shipdata['ship_reference']; ?>" disabled>
			                            <label for="form_control_1">Shipping Reference id</label>
			                        </div>
			        			</div>
			        			<div class="col-md-6">
			        				<div class="form-group form-md-line-input has-info">
			                            <div class="input-group">
			                                <!-- <span class="input-group-addon">$</span> -->
			                                <input type="text" class="form-control" value="<?php echo $shipdata['ship_total_lm']; ?>" disabled>
			                                <!-- <span class="help-block">Some help goes here...</span> -->
			                                <span class="input-group-addon">m</span>
			                                <label for="form_control_1">Shipping Total Line Meter</label>
			                            </div>
			                        </div>
			        			</div>
			        			<div class="col-md-6">
			        				<div class="form-group form-md-line-input has-info">
			                            <div class="input-group">
			                                <!-- <span class="input-group-addon">$</span> -->
			                                <input type="text" class="form-control" value="<?php echo $shipdata['ship_total_nw']; ?>" disabled>
			                                <!-- <span class="help-block">Some help goes here...</span> -->
			                                <span class="input-group-addon">kg</span>
			                                <label for="form_control_1">Shipping Total Kilogram</label>
			                            </div>
			                        </div>
			        			</div>
			        			<div class="col-md-12">
			        				<div class="form-group form-md-line-input has-info">
			                            <textarea class="form-control" rows="16" placeholder="Enter more text" name="shipmanifest" disabled><?php echo $shipdata['ship_manifest']; ?></textarea>
			                            <label for="form_control_1">Shipment Manifest</label>
			                        </div>
			        			</div>
			        			<br class="clear">
                            </div>
                        </div>
                        
        			</div>
        			<div class="col-md-6">
        				<div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Arrival Details </div>
                            </div>
                            <div class="portlet-body">
                            	<form method="post" action="">
                            		 <div class="col-md-6">
				        				<div class="form-group form-md-line-input has-info">
				                            <input type="date" id="pickdate" class="form-control" id="form_control_1" name="arriv_date">
				                            <label for="form_control_1">Arrival Date</label>
				                        </div>
				        			</div>
				        			<div class="col-md-6">
				        				<div class="form-group form-md-line-input has-info">
				                            <input type="text" class="form-control" id="form_control_1" name="arriv_reference">
				                            <label for="form_control_1">Arrival Reference ID</label>
				                        </div>
				        			</div>
			        				<div class="col-md-6">
				        				<div class="form-group form-md-line-input has-info">
				                            <div class="input-group">
				                                <!-- <span class="input-group-addon">$</span> -->
				                                <input type="text" class="form-control" name="arriv_tlm">
				                                <!-- <span class="help-block">Some help goes here...</span> -->
				                                <span class="input-group-addon">m</span>
				                                <label for="form_control_1">Arrival Total Line Meter</label>
				                            </div>
				                        </div>
				        			</div>
				        			<div class="col-md-6">
				        				<div class="form-group form-md-line-input has-info">
				                            <div class="input-group">
				                                <!-- <span class="input-group-addon">$</span> -->
				                                <input type="text" class="form-control" name="arriv_tnw">
				                                <!-- <span class="help-block">Some help goes here...</span> -->
				                                <span class="input-group-addon">kg</span>
				                                <label for="form_control_1">Arrival Total Kilogram</label>
				                            </div>
				                        </div>
				        			</div>
			        				<div class="col-md-12">
				        				<div class="form-group form-md-line-input has-info">
				                            <textarea class="form-control" rows="19" placeholder="Enter more text" name="arriv_manifest"></textarea>
				                            <label for="form_control_1">Arrival Manifest</label>
				                        </div>
				        			</div>
				        			<div class="col-md-12">
			                            <div class="form-actions noborder">
			                                <input type="hidden" name="shipid" value="<?php echo $_GET['id']; ?>">
			                                <input type="submit" name="submit" value="Submit" class="btn blue">
			                                <a href="<?php echo $baseline; ?>/index.php?page=shipment" class="btn default">Cancel</a>
			                            </div>
			                        </div>
                            	</form>
			        			<br class="clear">
                            </div>
                        </div>
        			</div>
        			<br class="clear">
        		</div>
        	</div>       	
        </div>
    </div>
</div>