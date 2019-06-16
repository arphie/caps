<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Shipment Report
                   <!--  <small>List of All shipment schedule</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <!-- <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Products</span>
            </li> -->
        </ul>
        <div class="">
        	
        	<div class="portlet light bordered">
        		<div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-ship"></i><?php echo (isset($_GET['rep']) && $_GET['rep'] == 'arrived' ? 'Arrived' : 'Upcomming') ?> </div>
                    <div class="actions">
                        <a href="<?php echo $baseline; ?>/index.php?page=shipment_report&rep=upcomming" class="btn btn-default btn-sm">
                            <i class="fa fa-ship"></i> Upcoming </a>
                        <a href="<?php echo $baseline; ?>/index.php?page=shipment_report&rep=arrived" class="btn btn-default btn-sm">
                            <i class="fa fa-ship"></i> Arrived </a>
                        <a href="<?php echo $baseline; ?>/index.php?page=shipment_report&rep=complete" class="btn btn-default btn-sm">
                            <i class="fa fa-ship"></i> Completed </a>
                    </div>
                </div>
		        <div class="portlet-body">
		        	<?php if(isset($_GET['rep']) && $_GET['rep'] == 'arrived'): ?>
		        		<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
			                <thead>
			                    <tr>
			                        <th style="width:50px;">&nbsp;</th>
			                        <th> Date</th>
			                        <!-- <th> Supplier </th> -->
			                        <th> Refference Number</th>
			                        <th> TLM </th>
			                        <th> TNW </th>
			                        <th style="width:250px;">Manifest</th>
			                    </tr>
			                </thead>
			                <tbody>
		                		<?php if (!empty($shipment::getallarrived())): ?>
			                		<?php foreach ($shipment::getallarrived() as $key => $value) { ?>
			                			<tr class="odd gradeX">
					                        <!-- <td><?php echo $value['ship_id']; ?></td> -->
					                        <td>
					                        	<a href="<?php echo $baseline; ?>/index.php?page=shipment_report&action=arrive_details&id=<?php echo $value['ship_id']; ?>" class="btn btn-icon-only green" title="view details"><i class="fa fa-search"></i></a>
					                        </td>
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship ETA: </strong><br> <?php echo $value['ship_date']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival Date: </strong><br> <?php echo $value['ship_arriv_date']; ?>
                                        		</div>
					                        </td>
					                        <!-- <td><?php echo $supplier::getsuppliernamebyid($value['ship_supplier']); ?></td> -->
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship Reference: </strong><br> <?php echo $value['ship_reference']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival Reference: </strong><br> <?php echo $value['ship_arriv_refid']; ?>
                                        		</div>
					                        </td>
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship TLM: </strong><br> <?php echo $value['ship_total_lm']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival TLM: </strong><br> <?php echo $value['ship_total_lm']; ?>
                                        		</div>
					                        </td>
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship TNW: </strong><br> <?php echo $value['ship_total_nw']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival TNW: </strong><br> <?php echo $value['ship_arriv_tnw']; ?>
                                        		</div>
					                        </td>
					                        <td>
					                        	<div class="note note-success">
			                                        <h4 class="block">Ship Manifest</h4>
			                                        <p><?php echo $value['ship_manifest']; ?></p>
			                                    </div>
			                                    <div class="note note-info">
			                                        <h4 class="block">Arrival Manifest</h4>
			                                        <p><?php echo $value['ship_arriv_manifest']; ?></p>
			                                    </div>
					                        </td>
					                    </tr>
			                		<?php } ?>
			                	<?php endif ?>
			                </tbody>
		            	</table>
		            <?php elseif(isset($_GET['rep']) && $_GET['rep'] == 'complete'): ?>
		            	<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
			                <thead>
			                    <tr>
			                        <th style="width:50px;">&nbsp;</th>
			                        <th> Date</th>
			                        <!-- <th> Supplier </th> -->
			                        <th> Refference ID </th>
			                        <th> TLM </th>
			                        <th> TNW </th>
			                        <th style="width:250px;">Manifest</th>
			                    </tr>
			                </thead>
			                <tbody>
		                		<?php if (!empty($shipment::getcompleted())): ?>
			                		<?php foreach ($shipment::getcompleted() as $key => $value) { ?>
			                			<tr class="odd gradeX">
					                        <!-- <td><?php echo $value['ship_id']; ?></td> -->
					                        <td>
					                        	<a href="<?php echo $baseline; ?>/index.php?page=shipment_report&action=arrive_details&id=<?php echo $value['ship_id']; ?>" class="btn btn-icon-only green" title="view details"><i class="fa fa-search"></i></a>
					                        </td>
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship ETA: </strong><br> <?php echo $value['ship_date']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival Date: </strong><br> <?php echo $value['ship_arriv_date']; ?>
                                        		</div>
					                        </td>
					                        <!-- <td><?php echo $supplier::getsuppliernamebyid($value['ship_supplier']); ?></td> -->
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship Reference: </strong><br> <?php echo $value['ship_reference']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival Reference: </strong><br> <?php echo $value['ship_arriv_refid']; ?>
                                        		</div>
					                        </td>
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship TLM: </strong><br> <?php echo $value['ship_total_lm']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival TLM: </strong><br> <?php echo $value['ship_total_lm']; ?>
                                        		</div>
					                        </td>
					                        <td>
					                        	<div class="alert alert-success">
                                        			<strong>Ship TNW: </strong><br> <?php echo $value['ship_total_nw']; ?>
                                        		</div>
					                        	<div class="alert alert-info">
                                        			<strong>Arrival TNW: </strong><br> <?php echo $value['ship_arriv_tnw']; ?>
                                        		</div>
					                        </td>
					                        <td>
					                        	<div class="note note-success">
			                                        <h4 class="block">Ship Manifest</h4>
			                                        <p><?php echo $value['ship_manifest']; ?></p>
			                                    </div>
			                                    <div class="note note-info">
			                                        <h4 class="block">Arrival Manifest</h4>
			                                        <p><?php echo $value['ship_arriv_manifest']; ?></p>
			                                    </div>
					                        </td>
					                    </tr>
			                		<?php } ?>
			                	<?php endif ?>
			                </tbody>
		            	</table>
	        		<?php else: ?>
	        			<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
			                <thead>
			                    <tr>
			                        <th style="width:120px;">&nbsp;</th>
			                        <th> ETA </th>
			                        <th> Supplier </th>
			                        <th> Refference ID </th>
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
                	<?php endif; ?>
		        </div>
		    </div>
        </div>
    </div>
</div>