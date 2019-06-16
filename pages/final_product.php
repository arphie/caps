<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
             <!--    <h1>All Finished Product
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
        	<div class="portlet light bordered">
		        <div class="portlet-body">
		            <div class="table-toolbar">
		                <div class="row">
		                    <div class="col-md-6">
                                <?php if ($userinformationdata['user_access'] != 3): ?>
    		                        <div class="btn-group">
    		                        	<a href="<?php echo $baseline; ?>/index.php?page=request_product" class="btn sbold green">Production Request <i class="fa fa-plus"></i></a>
    		                        </div>
                                <?php endif ?>
		                    </div>
		                    <div class="col-md-6">
		                        <!-- <div class="btn-group pull-right">
		                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
		                                <i class="fa fa-angle-down"></i>
		                            </button>
		                            <ul class="dropdown-menu pull-right">
		                                <li>
		                                    <a href="javascript:;">
		                                        <i class="fa fa-print"></i> Print </a>
		                                </li>
		                                <li>
		                                    <a href="javascript:;">
		                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
		                                </li>
		                                <li>
		                                    <a href="javascript:;">
		                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
		                                </li>
		                            </ul>
		                        </div> -->
		                    </div>
		                </div>
		            </div>
		            <div class="dmanudata">
		            	<div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Production Summary </div>
                                <ul class="nav nav-tabs">
                                    <li style="display: none;">
                                        <a href="#portlet_tab_3" data-toggle="tab">Chart</a>
                                    </li>
                                    <li class="active">
                                        <a href="#portlet_tab_2" data-toggle="tab">Data</a>
                                    </li>
                                   <!--  <li class="active">
                                        <a href="#portlet_tab_1" data-toggle="tab"> Tab 1 </a>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                   <!--  <div class="tab-pane active" id="portlet_tab_1">
                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                            magna aliquam erat volutpat.ut laoreet dolore magna ut laoreet dolore magna. ut laoreet dolore magna. ut laoreet dolore magna. </p>
                                    </div> -->
                                    <div class="tab-pane active" id="portlet_tab_2">
                                        <?php
                                            $totalitem = 0;
                                            foreach ($finalProduct::getprediction() as $key => $value) { $totalitem += $value['pred']; }
                                        ?>
                                        <!-- <h3>Future Predictions</h3>
                                        <div class="progress progress-striped active">
                                            <?php foreach ($finalProduct::getprediction() as $key => $value) { ?>
                                                <div class="progress-bar progress-bar-<?php echo ($key == 0 ? 'success' : ($key == 1 ? 'info' : 'danger')); ?>" style="width: <?php echo ($value['pred'] * 100) / $totalitem;  ?>%">
                                                    <span class=""> <strong><?php echo $value['pred']; ?>Kg</strong> <?php echo $value['fmonth']; ?> </span>
                                                </div>
                                            <?php } ?>
                                        </div> -->
                                        <div style="margin: 10px 0;">
                                        <?php if ($userinformationdata['user_access'] != 3): ?>
                                            <a href="<?php echo $baseline; ?>/excell.php?table=final_product" class="btn blue btn-sm">Export to Excel</a>
                                        <?php endif ?>
                                    </div>   
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th style="min-width: 50px"> ID </th>
                                                    <th style="min-width: 80px"> Date </th>
                                                    <th> Coil Number </th>
                                                    <th> Size </th>
                                                    <th> Color </th>
                                                    <th> Profile </th>
                                                    <th> TLM </th>
                                                    <th> TKG </th>
                                                    <!-- <th style="width: 80px;"> &nbsp; </th> -->
                                                    <th > Document No. </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //if (isset($_GET['subs'])) { ?>
                                                    <?php foreach ($finalProduct::getrawprediction(@$_GET['size'],@$_GET['color'],@$_GET['year']) as $key => $value) { 
                                                            $rawiddata = $rawproducts::getoneproduct($value['man_rawid']);
                                                            $prodsku = $metaData::getskudetails($rawiddata[0]['prod_sku']);

                                                            // print_r($prodsku);
                                                        ?>
                                                        <?php foreach ($value['man_details'] as $mdukey => $mduvalue) { ?>
                                                            <tr class="odd gradeX">
                                                                <td><?php echo $value['man_id']; ?></td>
                                                                <td><?php echo $value['man_date']; ?></td>
                                                                <td><?php echo $rawiddata[0]['prod_coil_number']; ?></td>
                                                                <td><?php echo $metaData::getspecificmetavalue($prodsku['sku_size']); ?></td>
                                                                <td><?php echo $metaData::getspecificmetavalue($prodsku['sku_color']); ?></td>
                                                                <td><?php echo $metaData::getspecificmetavalue($value['man_profile']); ?></td>
                                                                <!-- <td><?php echo $key; ?></td> -->
                                                                <!-- <td><?php echo $value['totalnw']; ?></td> -->
                                                                <td>
                                                                    <?php if (!empty($mduvalue['orderval'])): ?>
                                                                        <?php $total = 0; ?>
                                                                        <?php foreach ($mduvalue['orderval'] as $oanodrdkey => $oanodrdvalue) {
                                                                            $total += ($oanodrdvalue['itemnp'] * $oanodrdvalue['itemnl']);
                                                                        } ?>
                                                                        <?php echo $total; ?>
                                                                    <?php endif ?>
                                                                    
                                                                        
                                                                    </td>
                                                                <td>
                                                                    <?php if (!empty($mduvalue['orderval'])): ?>
                                                                        <?php $total = 0; ?>
                                                                        <?php foreach ($mduvalue['orderval'] as $oanodrdkey => $oanodrdvalue) {
                                                                            $total += ($oanodrdvalue['itemnp'] * $oanodrdvalue['itemnl']) * $rawiddata[0]['prod_kglm'];
                                                                        } ?>
                                                                        <?php echo number_format((float) $total, 2, '.', ','); ?>
                                                                    <?php endif ?>
                                                                </td>
                                                                <td><?php echo (!empty($mduvalue['orderval']) ? $mduvalue['remarks'] : ""); ?></td>
                                                            </tr>
                                                         <?php } ?>
                                                    <?php } ?>
                                                <?php //} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane " id="portlet_tab_3"  style="display: none;">
                                    	<div class="doptionpart">
                                            <form action="" method="get">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input has-info">
                                                        <select class="form-control" id="changeprofreport" name="size">
                                                            <option value="">Select a Size</option>
                                                            <?php
                                                                foreach ($metaData::getmetavalues('size') as $key => $value) {
                                                                    ?>
                                                                        <option value="<?php echo $value['meta_id']; ?>" <?php echo (isset($_GET['size']) && $_GET['size'] == $value['meta_id'] ? 'selected="selected"' : ""); ?>><?php echo $value['meta_name']; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <label for="changeprofreport">Choose a Size</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
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
                                                <!-- <div class="col-md-2">
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
                                                </div> -->
                                                <!-- <div class="col-md-3">
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
                                                </div> -->
                                                <div class="col-md-4">
                                                    <div class="topsubmit">
                                                        <input type="hidden" name="page" value="final_product">
                                                        <input type="hidden" name="tab" value="loaddata">
                                                        <input type="submit" name="subs" value="Submit" class="btn blue">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <br class="clear">
                                        <div class="onplot">
                                            <div id="manuchart" class="chart" style="height: 400px;"> </div>
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