<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Coil Masterlist
                    <!-- <small>List of All Products</small> -->
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
        	<div class="portlet light bordered">
		        <div class="portlet-body">
		            <div class="table-toolbar">
		                <div class="row">
		                    <div class="col-md-6">
		                    	<?php if ($userinformationdata['user_access'] == 1 ): ?>
			                        <div class="btn-group">
			                        	<a href="<?php echo $baseline; ?>/index.php?page=add_raw_products" class="btn sbold green">Add New <i class="fa fa-plus"></i></a>
			                        </div>
		                        <?php endif ?>
		                    </div>
		                </div>
		            </div>
		            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
		                <thead>
		                    <tr>
		                    	<th style="width: 200px;"> &nbsp; </th>
		                    	<th> Status </th>
		                        <th > Supplier </th>
		                        <th> Thickness </th>
		                        <th> Color </th>
		                        <th> Coil Number </th>
		                        <th> NW </th>
		                        <th> LM </th>
		                        <th> KG/LM </th>
		                        
		                        
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php
		                		foreach ($rawproducts::getallproducts() as $key => $value) {
		                			$skudetails = $metaData::getskudetails($value['prod_sku']);
		                			?>

		                			<tr class="odd gradeX">
		                				<td><a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $value['prod_id']; ?>" class="btn blue" title="See More"><i class="fa fa-external-link-square"></i></a></td>
		                				<td><?php echo ($value['prod_status'] == 3 ? '<span class="badge badge-danger">Closed</span>' : ($value['prod_status'] == 2 ? '<span class="badge badge-success">Open</span>' : ($value['prod_status'] == 1 ? '<span class="badge badge-error">Available</span>' : ""))); ?></td>
				                        <td><?php echo $supplier::getsuppliernamebyid($value['prod_supplier']); ?></td>
				                        <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
				                        <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
				                        <td><?php echo $value['prod_coil_number']; ?></td>
				                        <td><?php echo $value['prod_nw']; ?></td>
				                        <td><?php echo $value['prod_lm']; ?></td>
				                        <td>
				                        	<?php
				                        		echo $value['prod_kglm'];
				                        	?>
				                        </td>
				                        
				                        
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