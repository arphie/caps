<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Suppliers
                  <!--   <small>List of Supplier</small> -->
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
		        <div class="portlet-body">
		            <div class="table-toolbar">
		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="btn-group">
		                        	<a href="<?php echo $baseline; ?>/index.php?page=add_supplier" class="btn sbold green">Add New <i class="fa fa-plus"></i></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
		                <thead>
		                    <tr>
		                    	<th style="width:80px;"> Actions </th>
		                        <th> Name </th>
		                        <th> Email </th>
		                        <th> Address </th>
		                        <th> Phone </th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php
		                		foreach ($supplier::getsupplierdata() as $key => $value) {
		                			$dsuppdata = json_decode($value['sup_meta']);
		                			?>

		                			<tr class="odd gradeX">
		                				<td>
		                					<a href="<?php echo $baseline; ?>/index.php?page=all_supplier&action=edit_supplier&id=<?php echo $value['sup_id']; ?>" class="btn blue"><i class="fa fa-edit"></i></a>
		                				</td>
				                        <td><?php echo $dsuppdata->supname; ?></td>
				                        <td><?php echo $dsuppdata->supemail; ?></td>
				                        <td><?php echo $dsuppdata->supaddress; ?></td>
				                        <td><?php echo $dsuppdata->supphone; ?></td>
				                        
				                        
				                    </tr>

		                			<?php
		                		}
		                	?>
		                    
		                </tbody>
		            </table>
		        </div>
		    </div>
        </div>
    </div>
</div>