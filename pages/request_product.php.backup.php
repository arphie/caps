
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Prodution Report
                   <!--  <small>bla bla bla</small> -->
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
        	<form method="post" action="" id="placeorder">
        		<div class="listofrequest">
        			<div class="requestinner">
        				<div class="rawdetails">
                			<div class="row">
                				<div class="col-md-6">
                					<div class="portlet red-mint box">
		                                <div class="portlet-title">
		                                    <div class="caption">
		                                        <i class="fa fa-cogs"></i>RAW Material </div>
		                                    <div class="actions">
	                                            <a id="" class="btn border-white font-white btn-sm" data-toggle="modal" href="#selectrawmodal"><i class="fa fa-plus icon-black"></i> Add RAW Material</a>
	                                        </div>
		                                </div>
		                                <div class="portlet-body" id="blockui_sample_4_portlet_body">
		                                    <div class="modal fade bs-modal-lg in" id="selectrawmodal" tabindex="-1" role="dialog" aria-hidden="true">
		                                        <div class="modal-dialog modal-lg">
		                                            <div class="modal-content">
		                                                <div class="modal-header bg-red-flamingo bg-font-red-flamingo">
		                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		                                                </div>
		                                                <div class="modal-body">
		                                                	<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
					                                            <thead>
					                                                <tr>
					                                                    <th> Supplier </th>
					                                                    <th> Thickness </th>
					                                                    <th> Color </th>
					                                                    <th> NW </th>
					                                                    <th> LM </th>
					                                                    <th> KG/LM </th>
					                                                    <th> Actions </th>
					                                                </tr>
					                                            </thead>
					                                            <tbody>
					                                                <?php
					                                                    foreach ($finalProduct::getAllRawMaterials() as $key => $value) {
					                                                        $skudetails = $metaData::getskudetails($value['prod_sku']);
					                                                        ?>

					                                                        <tr class="odd gradeX omexlater" data-olmaterialid="<?php echo $value['prod_id']; ?>">
					                                                        	<td><?php echo $supplier::getsuppliernamebyid($value['prod_supplier']); ?></td>
					                                                            <td class="materialsize"><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
					                                                            <td class="materialcolor"><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
					                                                            <td class="materiallm"><?php echo $value['prod_nw']; ?></td>
					                                                            <td class="materiallm"><?php echo $value['prod_lm']; ?></td>
					                                                            <td><?php echo $value['prod_kglm']; ?></td>
					                                                            <td>
					                                                            	<a href="#" class="btn blue btn-block selectmaterialonthis" data-materialid="<?php echo $value['prod_id']; ?>">Use Material</a>
					                                                            	<input type="hidden" id="rawDetails" name="" value='<?php echo json_encode($value); ?>'>
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
		                                    <div class="dmaterialselected">
		                                    	<div class="col-md-6"> 
		                                    		<div class="form-group form-md-line-input">
		                                                <input type="text" class="form-control" id="raw_color" disabled>
		                                                <label for="raw_color">Color</label>
		                                                <span class="help-block">Some help goes here...</span>
		                                            </div>
		                                            <div class="form-group form-md-line-input">
		                                                <input type="text" class="form-control" id="raw_coil_number" disabled>
		                                                <label for="raw_coil_number">Coil Number</label>
		                                                <span class="help-block">Some help goes here...</span>
		                                            </div>
		                                            <div class="form-group form-md-line-input">
		                                                <input type="text" class="form-control" id="raw_nw" disabled>
		                                                <label for="raw_nw">Net Weight Remaining</label>
		                                                <span class="help-block">Some help goes here...</span>
		                                            </div>
		                                    	</div>
		                                    	<div class="col-md-6">
		                                    		<div class="form-group form-md-line-input">
		                                                <input type="text" class="form-control" id="raw_size" disabled>
		                                                <label for="raw_size">Size</label>
		                                                <span class="help-block">Some help goes here...</span>
		                                            </div>
		                                            <div class="form-group form-md-line-input">
		                                                <input type="text" class="form-control" id="raw_sku" disabled>
		                                                <label for="raw_sku">SKU</label>
		                                                <span class="help-block">Some help goes here...</span>
		                                            </div>
		                                            <div class="form-group form-md-line-input">
		                                                <input type="text" class="form-control" id="raw_lm" disabled>
		                                                <label for="raw_lm">Length on Meters Remaining</label>
		                                                <span class="help-block">Some help goes here...</span>
		                                            </div>
		                                    	</div>
		                                    	<br class="clear">
		                                    </div>
		                                    <div class="selectproduct">
		                                    	<div class="form-group form-md-line-input has-info">
	                                                <select class="form-control modprodopt" id="form_control_1">
	                                                    <option value="">Select a Product</option>
	                                                    <?php foreach ($finalProduct::getAllFinishProductCategory() as $key => $value) { ?>
	                                                    	<option value="<?php echo $value["meta_id"]; ?>" data-prodname="<?php echo $value["meta_name"]; ?>"><?php echo $value["meta_name"]; ?></option>
                                                        <?php } ?>
	                                                </select>
	                                                <label for="form_control_1">Product List</label>
	                                            </div>
		                                    </div>
		                                    <div class="imgprev">
		                                    	<img src="<?php echo $baseline; ?>/images/default-image.jpg" style="width: 100%;">
		                                    </div>
		                                </div>
           							</div>
                				</div>
                				<div class="col-md-6">
                					<div class="portlet box blue-hoki">
		                                <div class="portlet-title">
		                                    <div class="caption">
		                                        <i class="fa fa-gift"></i>Job Order </div>
		                                    <div class="actions">
		                                        <a href="javascript:;" class="btn btn-default btn-sm addorder"><i class="fa fa-plus"></i> Add Order Unit</a>
		                                    </div>
		                                </div>
		                                <div class="portlet-body sxcounter" data-count="0">
		                                    	<div class="ontounit baseunit" data-ordernumberx="">
		                                    		<div class="portlet box red">
		                                                <div class="portlet-title">
		                                                    <div class="caption">
		                                                        <i class="fa fa-gift"></i>
		                                                        <div class="orderunittitle">Order Unit</div>
		                                                    </div>
		                                                    <div class="actions">
		                                                        <a class="btn border-white font-white btn-sm addproductorder orderplaceunit" data-toggle="modal" href="#"><i class="fa fa-plus icon-black"></i> Product Order</a>
		                                                        <a href="javascript:;" class="btn border-white font-white btn-sm addproductorder"><i class="fa fa-plus icon-black"></i> Remarks</a>
		                                                    </div>
		                                                   
		                                                </div>
		                                                <div class="portlet-body ordercountainer" data-orderunitcounter="0">
		                                                	<!-- this is the content -->
		                                                	<table class="produnit table table-hover table-light bg-white bg-font-white">
		                                                		<thead class="uppercase">
		                                                			<tr>
			                                                			<th># of piece</th>
			                                                			<th>length / piece</th>
			                                                			<th>total length</th>
			                                                			<th>&nbsp;</th>
			                                                		</tr>
		                                                		</thead>
		                                                		<tbody></tbody>
		                                                	</table>
		                                                </div>
		                                                
		                                            </div>
		                                            
		                                    	</div>

		                                    	<div class="thelistoforders">
		                                    	</div>
		                                    	<div class="forwardallorder">
	                                            	<button type="button" class="btn blue-hoki btn-outline sbold uppercase placeordernow">Confirm Order</button>
	                                            </div>
		                                    	<div class="modal fade bs-modal-lg in" id="basicmodal" role="basic" aria-hidden="true" data-fororderunit="">
			                                        <div class="modal-dialog modal-lg">
			                                            <div class="modal-content">
			                                                <div class="modal-header">
			                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			                                                    <!-- <h4 class="modal-title onmodaltitle">Modal Title</h4> -->
			                                                </div>
			                                                <div class="modal-body">
				                                                <div class="modal-inner modalbase">
				                                                	<div class="onmodalheader mt-element-step">
				                                                		 <div class="row step-no-background">
														                    <div class="col-md-6 mt-step-col mdtostep1 active">
														                        <div class="mt-step-number bg-white font-grey">1</div>
														                        <div class="mt-step-title uppercase font-grey-cascade">RAW MATERIAL</div>
														                        <div class="mt-step-content font-grey-cascade">Select from available materials</div>
														                    </div>
														                    <div class="col-md-6 mt-step-col mdtostep2">
														                        <div class="mt-step-number bg-white font-grey">2</div>
														                        <div class="mt-step-title uppercase font-grey-cascade">Select Product</div>
														                        <div class="mt-step-content font-grey-cascade">Select a type of Product you want</div>
														                    </div>
														                </div>
				                                                	</div>
				                                                	<div class="onmodalcontents">
				                                                		<div class="onmodalinnerconts">
				                                                			<div class="onstep1">
				                                                				<div class="stp1inner">
				                                                					<div class="portlet light bordered" id="blockui_sample_1_portlet_body">
														                                <div class="portlet-title">
														                                    <div class="caption">
														                                        <i class="icon-bubble font-green-sharp"></i>
														                                        <span class="caption-subject font-green-sharp sbold">Choose form a wide variety of available RAW material</span>
														                                    </div>
														                                </div>
														                                <div class="portlet-body">
														                                    <div class="ontopoption">
														                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
														                                            <thead>
														                                                <tr>
														                                                    <th> Supplier </th>
														                                                    <th> Thickness </th>
														                                                    <th> Color </th>
														                                                    <th> NW </th>
														                                                    <th> LM </th>
														                                                    <th> KG/LM </th>
														                                                    <th> Actions </th>
														                                                </tr>
														                                            </thead>
														                                            <tbody>
														                                                <?php
														                                                    foreach ($finalProduct::getAllRawMaterials() as $key => $value) {
														                                                        
														                                                        ?>

														                                                        <tr class="odd gradeX" data-olmaterialid="<?php echo $value['prod_id']; ?>">
														                                                        	<td><?php echo $supplier::getsuppliernamebyid($value['prod_supplier']); ?></td>
														                                                            <td class="materialsize"><?php echo $value['prod_size']; ?></td>
														                                                            <td class="materialcolor"><?php echo $value['prod_color']; ?></td>
														                                                            <td class="materiallm"><?php echo $value['prod_nw']; ?></td>
														                                                            <td class="materiallm"><?php echo $value['prod_lm']; ?></td>
														                                                            <td><?php echo $value['prod_kglm']; ?></td>
														                                                            <td><a href="#" class="btn blue btn-block getmaterialid" data-materialid="<?php echo $value['prod_id']; ?>">Use Material</a></td>
														                                                        </tr>

														                                                        <?php
														                                                    }
														                                                ?>
														                                                
														                                            </tbody>
														                                        </table>
														                                    </div>
														                                    <!-- <div class="onnextpast">
														                                        <div class="col-md-6 text-left">&nbsp;</div>
														                                        <div class="col-md-6 text-right">
														                                            <a href="javascript:;" class="btn btn-outline sbold blue-madison" id="blockui_sample_1_2">Next Step</a>
														                                        </div>
														                                        <br class="clear">
														                                    </div> -->
														                                </div>
														                            </div>
				                                                				</div>
				                                                			</div>
				                                                			<div class="onstep2 onstephide">
				                                                				<div class="onstep2inner">
				                                                					<div class="row">
															                            <div class="col-md-12">
															                                <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
															                                    <div class="portlet-title">
															                                        <div class="caption">
															                                            <i class="icon-bubble font-green-sharp"></i>
															                                            <span class="caption-subject font-green-sharp sbold">Select a type of product you want to make</span>
															                                        </div>
															                                    </div>
															                                    <div class="portlet-body">
															                                        <div class="row" style="margin-bottom: 25px;">
															                                            <div class="col-md-6">
															                                                <div class="inner-part-left">
															                                                    <img src="<?php echo $baseline; ?>/images/default-image.jpg">
															                                                    <div class="inner-button-left onfproductcount" style="margin-top:15px;">
															                                                        <div class="dprodcat"></div>
															                                                        <div class="onxseparator">X</div>
															                                                        <div class="oninputfield">
															                                                            <input type="text" name="prodcount">
															                                                        </div>
															                                                        <a class="btn default red-stripe confirmbutton" href="#">CONFIRM PRODUCT</a>
															                                                    </div>
															                                                </div>
															                                            </div>
															                                            <div class="col-md-6">
															                                                <div class="inner-part-right">

															                                                	<div class="form-group form-md-line-input has-info">
																	                                                <select class="form-control modprodopt" id="form_control_1">
																	                                                    <option value="">Select a Product</option>
																	                                                    <?php foreach ($finalProduct::getAllFinishProductCategory() as $key => $value) { ?>
																	                                                    	<option value="<?php echo $value["meta_id"]; ?>" data-prodname="<?php echo $value["meta_name"]; ?>"><?php echo $value["meta_name"]; ?></option>
																                                                        <?php } ?>
																	                                                </select>
																	                                                <label for="form_control_1">Product List</label>
																	                                            </div>

																	                                            <div class="dadditionaloption">
																	                                            	<div class="addoptioninner hideopts">
																	                                            		<div class="form-group form-md-line-input">
																			                                                <input type="number" class="form-control onprodpieces" id="form_control_1" placeholder="Enter your name">
																			                                                <label for="form_control_1">Pieces</label>
																			                                                <span class="help-block">Some help goes here...</span>
																			                                            </div>
																			                                            <div class="form-group form-md-line-input">
																			                                                <input type="number" class="form-control onprodlength" id="form_control_1" placeholder="Enter your name">
																			                                                <label for="form_control_1">Length</label>
																			                                                <span class="help-block">Some help goes here...</span>
																			                                            </div>
																			                                            <div class="ontoconfirm">
																			                                            	<button type="button" class="btn blue-hoki btn-outline sbold uppercase modconfirmproduct">Confirm Order</button>
																			                                            </div>
																	                                            	</div>
																	                                            </div>
															                                                </div>
															                                            </div>
															                                            <br class="clear">
															                                        </div>
															                                    </div>
															                                </div>
															                            </div>
															                        </div>
				                                                				</div>
				                                                				<div class="dmodalnav">
				                                                					<a href="#" class="btn blue btn-outline modprev">Previous Step</a>
				                                                				</div>
				                                                			</div>
				                                                			<div class="modsuperinformation">
				                                                				<input type="hidden" name="dmaterialtype" class="dmaterialtype">
				                                                				<input type="hidden" name="dproducttype" class="dproducttype">

				                                                				<input type="hidden" name="pmaterialname" class="pmaterialname">
				                                                				<input type="hidden" name="pmaterialsize" class="pmaterialsize">

				                                                				<input type="hidden" name="pproductname" class="pproductname">

				                                                			</div>
				                                                		</div>
				                                                	</div>
				                                                </div>
				                                            </div>
			                                            </div>
			                                            <!-- /.modal-content -->
			                                        </div>
			                                        <!-- /.modal-dialog -->
			                                    </div>
		                                </div>
		                            </div>
                				</div>
                				<br class="clear">
                			</div>
                		</div>
        				
                        </div>
        			</div>
        		</div>
        	</form>
        </div>
    </div>
</div>