<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
    	<?php

    		if(isset($_GET['set'])){
    			$rawproducts::setstatus($_GET['set'], $_GET['id']);
    		}

    		$mypartia = $rawproducts::getoneproduct($_GET['id']);
    		$myproduct = $mypartia[0];
    		// print_r($myproduct);

            $productdetails = $metaData::getskudetails($myproduct['prod_sku']);
            $listofsupplier = $supplier::getsupplierdata();
    	?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
               <!--  <h1><?php echo $productdetails['sku_name']; ?>
                    <small>[<?php echo ($myproduct['prod_status'] == 3 ? "Close" : ($myproduct['prod_status'] == 2 ? "Open" : ($myproduct['prod_status'] == 1 ? "Available" : ""))); ?>] <?php echo $myproduct['prod_coil_number']; ?></small>
                </h1> -->
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
          <!--   <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Products</span>
            </li> -->
        </ul>
        <div class="">
        	<div class="row">
            	<form action="" method="post" id="editrawform">
                 <div class="col-md-6">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Coil Material Details  </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <?php $listofsku = $metaData::getallskudata(); ?>
                                <div class="col-md-12 skuselectonedit">
                                    <div class="form-group form-md-line-input font-dark">
                                        <select class="form-control" id="select_sku_opt" name="prodsku" required>
                                            <option value="">Select Product SKU</option>
                                            <?php
                                                foreach ($listofsku as $key => $value) {
                                                    ?>
                                                        <option value="<?php echo $value['sku_id']; ?>" data-color="<?php echo $metaData::getspecificmetavalue($value['sku_color']); ?>" data-size="<?php echo $metaData::getspecificmetavalue($value['sku_size']); ?>" data-name="<?php echo $value['sku_name']; ?>" data-desc="" <?php echo ($myproduct['prod_sku'] == $value['sku_id'] ? "selected" : ""); ?>><?php echo $value['sku_unique']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <label for="select_sku_opt">Product SKU</label>
                                    </div>
                                </div>
                                <br class="clear">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input font-dark">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodname" value="<?php echo $productdetails['sku_name']; ?>" disabled>
                                        <label for="form_control_1">Product Name</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <div class="form-group form-md-line-input font-dark">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodname" value="<?php echo $metaData::getspecificmetavalue($productdetails['sku_color']); ?>" disabled>
                                        <label for="form_control_1">Product Color</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <div class="form-group form-md-line-input font-dark">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $myproduct['prod_base_lm']; ?>" disabled>
                                            <span class="help-block">Some help goes here...</span>
                                            <span class="input-group-addon">meters</span>
                                            <label for="form_control_1">Initial Linear Meter</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input font-dark">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodname" value="<?php echo $productdetails['sku_unique']; ?>" disabled>
                                        <label for="form_control_1">SKU ID</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <div class="form-group form-md-line-input font-dark">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodname" value="<?php echo $metaData::getspecificmetavalue($productdetails['sku_size']); ?>" disabled>
                                        <label for="form_control_1">Product Size</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <div class="form-group form-md-line-input font-dark">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $myproduct['prod_base_nw']; ?>" disabled="">
                                            <span class="help-block">Some help goes here...</span>
                                            <span class="input-group-addon">kg</span>
                                            <label for="form_control_1">Initial Net Weight</label>
                                        </div>
                                    </div>
                                </div>
                                <br class="clear">
                            </div>
                            
                            <div class="form-group form-md-line-input font-dark">
                                <textarea class="form-control" rows="4" placeholder="Enter more text" name="proddesc" disabled><?php echo $productdetails['sku_desc']; ?></textarea>
                                <label for="form_control_1">Product Description</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-group btn-group btn-group-justified" style="<?php echo ($userinformationdata['user_access'] == 1 ? 'display:block;' : 'display: none;') ?>">
                        <!-- <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $_GET['id']; ?>&set=3" class="btn red <?php echo ($myproduct['prod_status'] == 3 ? '' : 'btn-outline'); ?>" <?php echo ($myproduct['prod_status'] == 3 ? 'disabled' : ''); ?>> Close </a> -->
                        <?php if ($myproduct['prod_status'] == 3): ?>
                            <a href="#" class="btn red " <?php echo ($myproduct['prod_status'] == 3 ? 'disabled' : ''); ?>> Closed </a>
                        <?php else: ?>
                            <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $_GET['id']; ?>&set=2" class="btn blue <?php echo ($myproduct['prod_status'] == 2 ? 'opactive' : 'btn-outline opinactive'); ?>" <?php echo ($myproduct['prod_status'] == 2 ? 'disabled' : ''); ?>> Open </a>
                        <?php endif ?>
                        
                        <!-- <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $_GET['id']; ?>&set=1" class="btn green <?php echo ($myproduct['prod_status'] == 1 ? '' : 'btn-outline'); ?>" <?php echo ($myproduct['prod_status'] == 1 ? 'disabled' : ''); ?>> Available </a> -->
                        <a href="#" class="btn green <?php echo ($myproduct['prod_status'] == 1 ? '' : 'btn-outline'); ?>" disabled> Available </a>
                    </div>
                    <br>
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Coil Remaining (kg / m) </div>
                        </div>
                        <div class="portlet-body fullrawspecs">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input font-dark">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $myproduct['prod_nw']; ?>" name="bkilogram" disabled="">
                                            <span class="help-block">Some help goes here...</span>
                                            <span class="input-group-addon">kg</span>
                                            <label for="form_control_1">Product Net Weight</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input font-dark">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $myproduct['prod_lm']; ?>" name="linearmeter" disabled>
                                            <span class="help-block">Some help goes here...</span>
                                            <span class="input-group-addon">meters</span>
                                            <label for="form_control_1">Product Linear Meter</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input font-dark">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodcoilnum" value="<?php echo $myproduct['prod_coil_number']; ?>" disabled>
                                        <label for="form_control_1">Product Coil Number</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <!-- <div class="form-group form-md-line-input font-dark">
                                        <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodcoilnum" value="<?php echo $supplier::getsuppliernamebyid($myproduct['prod_supplier']); ?>" disabled>
                                        <label for="form_control_1">Product Supplier</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div> -->
                                    <div class="form-group form-md-line-input font-dark">
                                        <select class="form-control" id="form_control_1" name="prodsupplier" disabled>
                                            <option value="">Product Supplier</option>
                                            <?php
                                                foreach ($listofsupplier as $key => $value) {
                                                    
                                                    // if($value['sup_id'] == $myproduct['prod_supplier']):
                                                        ?>
                                                            <option value="<?php echo $value['sup_id']; ?>" <?php echo ($myproduct['prod_supplier'] == $value['sup_id'] ? "selected" : ""); ?> ><?php echo $value['sup_name']; ?></option>
                                                        <?php
                                                    // endif;
                                                }
                                            ?>
                                        </select>
                                        <label for="form_control_1">Supplier</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input font-dark">
                                        <textarea class="form-control" rows="4" placeholder="Enter more text" name="proddesc" disabled><?php echo $myproduct['prod_remarks']; ?></textarea>
                                        <label for="form_control_1">Product Description</label>
                                    </div>
                                    <div class="form-group form-md-line-input font-dark">
                                        <select class="form-control" id="form_control_1" name="prod_ship" disabled>
                                            <option value=""></option>
                                            <?php foreach ($shipment::getallarrived() as $key => $value) { ?>
                                                    <option value="<?php echo $value['ship_id']; ?>" <?php echo ($myproduct['prod_ship'] == $value['ship_id'] ? 'selected' : "" ); ?>><?php echo $value['ship_arriv_refid']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="form_control_1">Shippment Source</label>
                                    </div>
                                </div>

                                <br class="clear">
                            </div>
                            
                            
                        </div>
                    </div>
                </div>   
                <input type="hidden" name="prodid" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="prodstatus" value="<?php echo $myproduct['prod_status']; ?>">
                </form>
                <br style="clear:both;">
                <?php if ($userinformationdata['user_access'] == 1): ?>
                    <div class="form-actions noborder">
                        <button type="button" class="btn btn-primary" id="editrawdetails">Edit</button>
                        <button type="button" class="btn btn-primary" id="dsaverawdata">Save</button>
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Back to list</a>
                    </div>
                <?php endif ?>
            	
            </div>
            <div style="margin: 20px 0;">&nbsp;</div>
            <div class="trackingbase">
                <div class="trackinner">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Coil Tracking </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width: 200px;"> Manufacture ID </th>
                                        <th> Date </th>
                                        <th > Profile </th>
                                        <th> Orders </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($rawproducts::trackingmanufacture($_GET['id']) as $key => $value) {
                                            ?>

                                            <tr class="odd gradeX">

                                               <td><?php echo $value['defvalue']['man_id']; ?></td>
                                               <td><?php echo $value['defvalue']['man_date']; ?></td>
                                               <td><?php echo $value['defvalue']['man_profile']; ?></td>
                                               <td>
                                                    <?php foreach ($value['man_det_unser'] as $mdukey => $mduvalue) { ?>
                                                        <?php if (!empty($mduvalue['orderval'])): ?>
                                                            <div class="mandetitem">
                                                                <div class="mandetinner">
                                                                    <?php $totalbase = 0 ?>
                                                                    <?php foreach ($mduvalue['orderval'] as $key => $value) { ?>
                                                                        <?php $totalbase += $value['itemnp'] * $value['itemnl']; ?>
                                                                        <li class="list-group-item list-group-item-info">
                                                                            <strong><?php echo $value['itemnp']; ?> pc(s)</strong> x <strong><?php echo $value['itemnl']; ?> m</strong>
                                                                            <span class="badge badge-danger"> <?php echo $value['itemnp'] * $value['itemnl']; ?> m</span>
                                                                        </li>
                                                                        
                                                                    <?php } ?>
                                                                    <li class="list-group-item list-group-item-info"> Total Length:
                                                                        <span class="badge badge-danger"><?php echo $totalbase; ?>m </span>
                                                                    </li>
                                                                    <div class="num-len-remarks">
                                                                        <div class="alert alert-info">
                                                                            <strong>Document No. :</strong>
                                                                            <p><?php echo $mduvalue['remarks']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                        
                                                    <?php } ?>
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
    </div>
</div>