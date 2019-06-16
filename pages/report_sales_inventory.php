<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
               <!--  <h1>Sales Inventory Report
                    <small>List of Supplier</small>
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
        		<div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-red"> Figures are in Kilograms </i>
                        <!-- <span class="caption-subject font-red sbold uppercase">Light Table 1</span> -->
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided">
                        	<?php if ($userinformationdata['user_access'] != 3): ?>
                        		<a href="<?php echo $baseline; ?>/excell.php?table=report_sales_inventory&dform=<?php echo @$_GET['dform']; ?>&dto=<?php echo @$_GET['dto']; ?>" class="btn btn-transparent red btn-outline btn-circle btn-sm active">Export to Excel</a>
                        	<?php endif ?>
                        </div>
                    </div>
                </div>
		        <div class="portlet-body">
		            <div class="opt-drop">
		            	<form action="" method="get">
		            		<div class="col-md-5">
			            		<div class="form-group form-md-line-input has-info">
		                            <input type="date" class="form-control" id="form_control_1" value="<?php echo @$_GET['dform']; ?>" name="dform" placeholder="Success state" max="<?php echo date("Y-m-j"); ?>">
		                            <label for="form_control_1">Date From</label>
		                        </div>
			            	</div>
			            	<div class="col-md-5">
			            		<div class="form-group form-md-line-input has-info">
		                            <input type="date" class="form-control" id="form_control_1" value="<?php echo @$_GET['dto']; ?>" name="dto" placeholder="Success state" max="<?php echo date("Y-m-j"); ?>">
		                            <label for="form_control_1">Date To</label>
		                        </div>
			            	</div>
			            	<div class="col-md-2">
			            		<input type="hidden" name="page" value="report_sales_inventory">
			            		<input type="submit" name="subs" value="Generate" class="btn blue">
			            	</div>
			            	<br class="clear">
		            	</form>
		            </div>
		            <div class="dlist">
		            	<div class="tableplaceholder">
		            		<table class="table table-striped table-hover">
	                            <thead>
	                                <tr>
	                                    <th style="width:115px;font-size: 11px;display: inline-block;"> Size </th>
	                                    <th style="width:115px;font-size: 11px;display: inline-block;"> Color </th>
	                                    <?php foreach ($rawproducts::getprofiles() as $key => $value) { ?>
		                                    <th class="dynawidth" style="text-align:center;width:81px;font-size: 11px;display: inline-block;"><?php echo $value['meta_name']; ?></th>
		                                <?php } ?>
		                                <th style="text-align:center;width:90px;font-size: 11px;display: inline-block;">Total</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php foreach ($rawproducts::generatesalesreport(@$_GET['dform'], @$_GET['dto']) as $key => $value) { ?>
	                            		<?php $skudetails = $metaData::getskudetails($value['skuid']); ?>
	                            		<tr>
		                                    <td style="width:115px;font-size: 11px;display: inline-block;"> <?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?> </td>
		                                    <td style="width:115px;font-size: 11px;display: inline-block;"> <?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?> </td>
		                                    <?php $totalprod = 0; ?>
		                                    <?php foreach ($value['profimix'] as $profimixkey => $profimixvalue) { ?>
		                                    	<?php $totalprod += $profimixvalue['totalvals']['totalnw']; ?>
		                                    	<td style="text-align:center;width:81px;font-size: 11px;display: inline-block;">
		                                    		<?php if ($profimixvalue['totalvals']['totalnw'] != 0): ?><strong><?php endif ?>
		                                    			<?php echo number_format((float) $profimixvalue['totalvals']['totalnw'], 2, '.', ','); ?>
		                                    		<?php if ($profimixvalue['totalvals']['totalnw'] != 0): ?></strong><?php endif ?>
		                                    	</td>
		                                    <?php } ?>
		                                    <td style="text-align:center;width:81px;font-size: 11px;display: inline-block;">
		                                    	<?php if ($totalprod != 0): ?><strong><?php endif ?>
		                                    		<?php echo number_format((float) $totalprod, 2, '.', ','); ?>
		                                    	<?php if ($totalprod != 0): ?></strong><?php endif ?>
		                                    </td>
		                                    <!-- <td>
		                                        <span class="label label-sm label-success"> Approved </span>
		                                    </td> -->
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