<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
               <!--  <h1>Inventory Report
                    <small>List of All Products</small>
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
        	<div class="report-part">
        		<div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Inventory Report </div>
                        <ul class="nav nav-tabs">
                            <li class="<?php echo (isset($_GET['tab']) && $_GET['tab'] == 'consumption' ? 'active' : ""); ?>">
                                <a href="#portlet_tab_3" data-toggle="tab" aria-expanded="false">Consumption</a>
                            </li>
                            <li class="<?php echo (isset($_GET['tab']) && $_GET['tab'] == 'coil_summary' ? 'active' : ""); ?>">
                                <a href="#portlet_tab_2" data-toggle="tab" aria-expanded="false">Coil Summary</a>
                            </li>
                            <li class="<?php echo (isset($_GET['tab']) && $_GET['tab'] == 'sales_inventory' ? 'active' : ""); ?>">
                                <a href="#portlet_tab_1" data-toggle="tab" aria-expanded="true">Product Profile Inventory</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'sales_inventory' ? 'active' : ""); ?>" id="portlet_tab_1">

                            	<div class="selectprofbase">
                            		<form action="" method="get">
                            			<div class="col-md-5">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="profile">
		                                            <option value="">Select A Profile</option>
		                                            <?php
		                                            	foreach ($finalProduct::getAllFinishProductCategory() as $key => $value) {
		                                            		?>
		                                            			<option value="<?php echo $value['meta_id']; ?>" <?php echo (isset($_GET['profile']) && $_GET['profile'] == $value['meta_id'] ? 'selected="selected"' : ""); ?>><?php echo $value['meta_name']; ?></option>
		                                            		<?php
		                                            	}
		                                            ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose Profile</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-5">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="year">
		                                            <option value=""></option>
		                                            <?php
		                                            		$onyear = (isset($_GET['year']) && $_GET['year'] != "" ? $_GET['year'] : "");
		                                            		$starting_year  =date('Y', strtotime('-10 year'));
															 $ending_year = date('Y', strtotime('+10 year'));
															 $current_year = date('Y');
															 for($starting_year; $starting_year <= $ending_year; $starting_year++) {
															     echo '<option value="'.$starting_year.'"';
															     if($starting_year == $onyear) {
															            echo ' selected="selected"';
															     }
															     echo ' >'.$starting_year.'</option>';
															 }       
		                                            ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose Year</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-2">
	                            			<div class="topsubmit">
	                            				<input type="hidden" name="page" value="inventory_report">
	                            				<input type="hidden" name="tab" value="sales_inventory">
	                            				<input type="submit" name="subs" value="Submit" class="btn blue">
	                            			</div>
	                            		</div>
                            		</form>
                            	</div>
                            	 <br class="clear">
                                <div class="portlet box red">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i> </div>
                                        <ul class="nav nav-tabs">
                                            <li>
                                                <a href="#salesinvraw" data-toggle="tab"> Data </a>
                                            </li>
                                            <li class="active">
                                                <a href="#salesinvchat" data-toggle="tab"> Chart </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane" id="salesinvraw">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="coilsum">
									                <thead>
									                    <tr>
									                    	<th style="width:120px;"> Month </th>
									                    	<th> Year </th>
									                        <th> Total </th>
									                        <!-- <th> KG's </th>
									                        <th> LM's </th>
									                        <th> Status </th> -->
									                    </tr>
									                </thead>
									                <tbody>
									                	<?php if (isset($_GET['profile'])) { ?>
									                		<?php $dproducts = $finalProduct::getmaterials(); ?>
									                		<?php foreach ($rawproducts::salesondase($_GET['profile'],$_GET['year'],$dproducts) as $key => $value) { ?>
										                		<tr class="odd gradeX">
											                		<td><?php echo date('F', mktime(0, 0, 0, $key, 10)); ?></td>
											                		<td><?php echo $_GET['year']; ?></td>
											                		<td><?php echo $value; ?></td>
											                		<!-- <td><?php echo $value['totalnw']; ?></td>
											                		<td><?php echo $value['totallm']; ?></td>
											                		<td><?php echo ($value['num_coils'] == 0 ? 'NO STOCKS' : ($value['num_coils'] > 0 && $value['num_coils'] < 3 ? 'CRITICAL STOCKS' : '<div class="btn green">GOOD FOR PRODUCTION</div>')); ?></td> -->
											                	</tr>
										                	<?php } ?>
									                	<?php } ?>
									                	
									                    
									                </tbody>
									            </table>
                                            </div>
                                            <div class="tab-pane active" id="salesinvchat">
                                                <div id="salesinventory" class="chart" style="height: 400px;"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            	
                                
                            </div>
                            <div class="tab-pane <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'coil_summary' ? 'active' : ""); ?>" id="portlet_tab_2">

                                <div class="doptionpart">
                                	<form action="" method="get">
                            			<div class="col-md-10">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="size">
		                                            <option value="">Select Thickness</option>
		                                            <option value="all" <?php echo (isset($_GET['size']) && $_GET['size'] == 'all' ? 'selected="selected"' : ''); ?>>Select All</option>
		                                            <?php
		                                            	foreach ($metaData::getmetavalues('size') as $key => $value) {
		                                            		?>
		                                            			<option value="<?php echo $value['meta_id']; ?>" <?php echo (isset($_GET['size']) && $_GET['size'] == $value['meta_id'] ? 'selected="selected"' : ""); ?>><?php echo $value['meta_name']; ?></option>
		                                            		<?php
		                                            	}
		                                            ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose Thickness</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-2">
	                            			<div class="topsubmit">
	                            				<input type="hidden" name="page" value="inventory_report">
	                            				<input type="hidden" name="tab" value="coil_summary">
	                            				<input type="submit" name="subs" value="Submit" class="btn blue">
	                            			</div>
	                            		</div>
	                            		<br class="clear">
                            		</form>
                                </div>
                                <div class="data-coil-summary">
                                	<?php if ($userinformationdata['user_access'] != 3): ?>
	                                	<div style="margin-bottom: 10px;">
	                                		<a href="<?php echo $baseline; ?>/excell.php?table=inventory_report&size=<?php echo @$_GET['size']; ?>&dto=<?php echo @$_GET['dto']; ?>" class="btn blue btn-sm">Export to Excel</a>
	                                	</div>  
                                	<?php endif ?>                              	
                                	<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						                <thead>
						                    <tr>
						                    	<th style="width:120px;"> No. of Coils </th>
						                    	<th> Thickness </th>
						                        <th> Color </th>
						                        <th> KG's </th>
						                        <th> LM's </th>
						                        <th> Status </th>
						                    </tr>
						                </thead>
						                <tbody>
						                	<?php
					                			$totalkg = 0;
					                			$totallm = 0;
					                		?>
						                	<?php if (isset($_GET['size'])) { ?>
						                		
						                		<?php foreach ($rawproducts::getproductsfromsku($_GET['size']) as $key => $value) { ?>
						                			<?php
						                				$totalkg += $value['totalnw'];
						                				$totallm += $value['totallm'];
						                			?>
							                		<tr class="odd gradeX">
								                		<td><?php echo $value['num_coils']; ?></td>
								                		<td><?php echo $metaData::getspecificmetavalue($value['sku_size']); ?></td>
								                		<td><?php echo $metaData::getspecificmetavalue($value['sku_color']); ?></td>
								                		<td><?php echo $value['totalnw']; ?></td>
								                		<td><?php echo $value['totallm']; ?></td>
								                		<td><?php echo ($value['num_coils'] == 0 ? '<div class="btn red">NO STOCKS</div>' : ($value['num_coils'] > 0 && $value['num_coils'] < 3 ? '<div id="pulsate-regular" class="btn blue">CRITICAL</div>' : '<div class="btn green">GOOD FOR PRODUCTION</div>')); ?></td>
								                	</tr>
							                	<?php } ?>
						                	<?php } ?>
						                	
						                    
						                </tbody>
						            </table>
						            <div class="ontobase">
							            <div class="col-md-6">
							            	<div class="list-group-item list-group-item-info"> Total Kilogram
	                                            <span class="badge badge-danger"> <?php echo $totalkg; ?> kg</span>
	                                        </div>
							            </div>
							            <div class="col-md-6">
							            	<div class="list-group-item list-group-item-info"> Total Linear Meter
	                                            <span class="badge badge-danger"> <?php echo $totallm; ?> m</span>
	                                        </div>
							            </div>
							            <br class="clear">
						            </div>
                                </div>
                            </div>
                            <div class="tab-pane <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'consumption' ? 'active' : ""); ?>" id="portlet_tab_3">
                            	<div class="doptionpart">
                                	<form action="" method="get">
                            			<div class="col-md-2">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="sku">
		                                            <option value="">Select Thickness</option>
		                                            <?php
		                                            	foreach ($metaData::getmetavalues('size') as $key => $value) {
		                                            		?>
		                                            			<option value="<?php echo $value['meta_id']; ?>" <?php echo (isset($_GET['sku']) && $_GET['sku'] == $value['meta_id'] ? 'selected="selected"' : ""); ?>><?php echo $value['meta_name']; ?></option>
		                                            		<?php
		                                            	}
		                                            ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose Thickness</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-2">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="color">
		                                            <option value="">Select a Color</option>
		                                            <?php
		                                            	foreach ($metaData::getmetavalues('color') as $key => $value) {
		                                            		?>
		                                            			<option value="<?php echo $value['meta_id']; ?>" <?php echo (isset($_GET['color']) && $_GET['color'] == $value['meta_id'] ? 'selected="selected"' : ""); ?>><?php echo $value['meta_name']; ?></option>
		                                            		<?php
		                                            	}
		                                            ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose a Color</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-2">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="month">
		                                            <option value="">Select a Month</option>
		                                            <?php

													for ($i = 1; $i < 13; $i++) {
														$dateObj   = DateTime::createFromFormat('!m', $i);
														$monthName = $dateObj->format('F');

														echo'<option value="'.$i.'" '.(isset($_GET['month']) && $_GET['month'] == $i ? 'selected="selected"' : "").' >'.$dateObj->format('F') .'</option>';

													} ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose a Month</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-2">
	                            			<div class="form-group form-md-line-input has-info">
		                                        <select class="form-control" id="changeprofreport" name="year">
		                                            <option value="">Select a Year</option>
		                                            <?php
		                                            		$onyear = (isset($_GET['year']) && $_GET['year'] != "" ? $_GET['year'] : "");
		                                            		$starting_year  =date('Y', strtotime('-10 year'));
															 $ending_year = date('Y', strtotime('+10 year'));
															 $current_year = date('Y');
															 for($starting_year; $starting_year <= $ending_year; $starting_year++) {
															     echo '<option value="'.$starting_year.'"';
															     if($starting_year == $onyear) {
															            echo ' selected="selected"';
															     }
															     echo ' >'.$starting_year.'</option>';
															 }       
		                                            ?>
		                                        </select>
		                                        <label for="changeprofreport">Choose a Year</label>
		                                    </div>
	                            		</div>
	                            		<div class="col-md-3">
	                            			<div class="topsubmit">
	                            				<input type="hidden" name="page" value="inventory_report">
	                            				<input type="hidden" name="tab" value="consumption">
	                            				<input type="submit" name="subs" value="Submit" class="btn blue">
	                            			</div>
	                            		</div>
                            		</form>
                                </div>
                                <br class="clear">
                                <div class="portlet box red">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i></div>
                                        <ul class="nav nav-tabs">
                                            <li>
                                                <a href="#consumpraw" data-toggle="tab"> Data </a>
                                            </li>
                                            <li class="active">
                                                <a href="#consumpchart" data-toggle="tab"> Chart </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane" id="consumpraw">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="corpotable">
									                <thead>
									                    <tr>
									                    	<th > Profile </th>
									                        <th style="width:120px;"> Linear meter </th>
									                        <th style="width:120px;"> Kilogram </th>
									                    </tr>
									                </thead>
									                <tbody>
									                	<?php if (isset($_GET['subs'])) { ?>
									                		<?php foreach ($listofprofs = $rawproducts::allprofasperbar($_GET['sku'],$_GET['color'],$_GET['month'],$_GET['year']) as $key => $value) { ?>
										                		<tr class="odd gradeX">
											                		<td><?php echo $value['metaname']; ?></td>
											                		<td><?php echo $value['totallm']; ?></td>
											                		<td><?php echo $value['totalnw']; ?></td>
											                	</tr>
										                	<?php } ?>
									                	<?php } ?>
									                	
									                    
									                </tbody>
									            </table>
                                            </div>
                                            <div class="tab-pane active" id="consumpchart">
                                                <div id="consump" class="chart" style="height: 400px;"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>

        </div>
    </div>
</div>