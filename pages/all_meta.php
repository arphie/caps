<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Meta Data Masterlist
                    <!-- <small>List of All Meta Data</small> -->
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
		                        <div class="btn-group">
		                        	<a href="<?php echo $baseline; ?>/index.php?page=add_meta" class="btn sbold green">Add New <i class="fa fa-plus"></i></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
		                <thead>
		                    <tr>
		                    	<th style="width:120px;"> Actions </th>
		                    	<th> ID </th>
		                        <th> Name </th>
		                        <!-- <th> Discription </th> -->
		                        <th> Type </th>
		                        <th> Value </th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php
		                		foreach ($metaData::getAllMetaData() as $key => $value) {
		                			?>

		                			<tr class="odd gradeX">
		                				<td>
		                					<a href="<?php echo $baseline; ?>/index.php?page=all_meta&action=edit_meta&id=<?php echo $value['meta_id']; ?>" class="btn blue"><i class="fa fa-edit"></i></a>
		                				</td>
				                        <td><?php echo $value['meta_id']; ?></td>
				                        <td><?php echo $value['meta_name']; ?></td>
				                        <!-- <td><?php echo $value['meta_desc']; ?></td> -->
				                        <td><?php echo $value['meta_type']; ?></td>
				                        <td><?php echo $value['meta_value']; ?></td>
				                        
				                        
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