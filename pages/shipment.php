<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <!-- <h1>All Shipment Schedule
                    <small>List of All shipment schedule</small>
                </h1> -->
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
        	
        	<div class="portlet light bordered">
		        <div class="portlet-body">
		            <div class="table-toolbar">
		                <div class="row">
		                    <div class="col-md-6">
		                    	<?php if ($userinformationdata['user_access'] == 1): ?>
			                        <div class="btn-group">
			                        	<a href="<?php echo $baseline; ?>/index.php?page=add_shippment" class="btn sbold green">Add New Shipment <i class="fa fa-plus"></i></a>
			                        </div>
		                        <?php endif ?>
		                    </div>
		                </div>
		            </div>


		            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
		                <thead>
		                    <tr>
		                        <th style="width:120px;">&nbsp;</th>
		                        <th> Estimated Time of Arrival </th>
		                        <th> Supplier </th>
		                        <th> Reference Number </th>
		                        <th> Total LM </th>
		                        <th> Total NW </th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php if (!empty($shipment::getallupcomming())): ?>
		                		<?php foreach ($shipment::getallupcomming() as $key => $value) { ?>
		                			<tr class="odd gradeX">
				                        <td>
				                        	<?php if ($userinformationdata['user_access'] == 1): ?>
				                        		<a href="<?php echo $baseline; ?>/index.php?page=shipment&action=shipment_arrived&id=<?php echo $value['ship_id']; ?>" class="btn btn-icon-only green" title="Arrived"><i class="fa fa-ship"></i></a>
				                        		<a href="<?php echo $baseline; ?>/index.php?page=shipment&action=shipment_edit&id=<?php echo $value['ship_id']; ?>" class="btn btn-icon-only blue" title="Edit"><i class="fa fa-pencil"></i></a>
				                        	<?php endif ?>
				                        </td>
				                        <td><?php echo $value['ship_date']; ?></td>
				                        <td><?php echo $supplier::getsuppliernamebyid($value['ship_supplier']); ?></td>
				                        <td><?php echo $value['ship_reference']; ?></td>
				                        <td><?php echo $value['ship_total_lm']; ?></td>
				                        <td><?php echo $value['ship_total_nw']; ?></td>
				                    </tr>
		                		<?php } ?>
		                	<?php endif ?>
		                	
		                </tbody>
		            </table>
		        </div>
		    </div>
        </div>
    </div>
</div>