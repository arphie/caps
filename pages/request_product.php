
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <!-- <h1>Prodution Report
                    <small>bla bla bla</small>
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
        	<form method="post" action="" id="placeorder">
        		<div class="listofrequest">
        			<div class="requestinner">
        				<div class="rawdetails">
                			<div class="row">
                				<div class="col-md-6">
                					<div class="portlet red-mint box">
		                                <div class="portlet-title">
		                                    <div class="caption">
		                                        <i class="fa fa-cogs"></i>Coil Specification </div>
		                                    <div class="actions">
	                                            <a id="" class="btn border-white font-white btn-sm hideonselectraw" data-toggle="modal" href="#selectrawmodal"><i class="fa fa-plus icon-black"></i> Add RAW Material</a>
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
					                                                	<th> KG/LM </th>
					                                                    <th> Thickness </th>
					                                                    <th> Color </th>
					                                                    <th> NW </th>
					                                                    <th> LM </th>
					                                                    <th> Coil Number </th>
					                                                    <th> Actions </th>
					                                                </tr>
					                                            </thead>
					                                            <tbody>
					                                                <?php
					                                                    foreach ($finalProduct::getAllRawMaterials() as $key => $value) {
					                                                        $skudetails = $metaData::getskudetails($value['prod_sku']);
					                                                        ?>

					                                                        <tr class="odd gradeX omexlater materialparent" data-olmaterialid="<?php echo $value['prod_id']; ?>">
					                                                        	<td class="materialkglm"><?php echo $value['prod_kglm']; ?></td>
					                                                            <td class="materialsize"><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
					                                                            <td class="materialcolor"><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
					                                                            <td class="materialnw"><?php echo $value['prod_nw']; ?></td>
					                                                            <td class="materiallm"><?php echo $value['prod_lm']; ?></td>
					                                                            <td><?php echo $value['prod_coil_number']; ?></td>
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
		                                    <div class="finalcomponents">
		                                    	<div class="row">
		                                    		<div class="col-md-6">
		                                    			<div class="form-group form-md-line-input">
			                                                <div class="input-group">
					                                            <input type="text" id="final_raw_nw" class="form-control" value="0" disabled>
					                                            <span class="help-block">Some help goes here...</span>
					                                            <span class="input-group-addon">kg</span>
					                                            <label for="form_control_1">Net Weight Remaining</label>
					                                        </div>
			                                            </div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group form-md-line-input">
			                                                <div class="input-group">
					                                            <input type="text" id="final_raw_lm" class="form-control" value="0" disabled>
					                                            <span class="help-block">Some help goes here...</span>
					                                            <span class="input-group-addon">meters</span>
					                                            <label for="form_control_1">Length on Meters Remaining</label>
					                                        </div>
			                                            </div>
		                                    		</div>
		                                    		<input type="hidden" name="basenw" id="basenw" value="">
		                                    		<input type="hidden" name="baselm" id="baselm" value="">

		                                    		<input type="hidden" name="kglm" id="kglm" value="">
		                                    		<input type="hidden" name="raw_id" id="raw_id" value="">
		                                    		<br class="clear">
		                                    	</div>
		                                    </div>
		                                    <div class="allrawmaterial">
		                                    	<div class="origlistbart" style="display: none;">
		                                    		<div class="portlet box blue origmart">
						                                <div class="portlet-title">
						                                    <div class="caption"><i class="fa fa-gift"></i> <span class="rawtitle">Portlet</span></div>
						                                </div>
						                                <div class="portlet-body">
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
						                                                <input type="text" class="form-control" id="raw_nw" value="" disabled>
						                                                <label for="raw_nw">Net Weight</label>
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
						                                                <label for="raw_sku">SKU ID</label>
						                                                <span class="help-block">Some help goes here...</span>
						                                            </div>
						                                            <div class="form-group form-md-line-input">
						                                                <input type="text" class="form-control" id="raw_lm" value="" disabled>
						                                                <label for="raw_lm">Length on Meters</label>
						                                                <span class="help-block">Some help goes here...</span>
						                                            </div>
						                                    	</div>
						                                    	<div class="hiddenelemnts">
						                                    		<input type="hidden" id="dkglm" value="3.481">
						                                    	</div>
						                                    	<br class="clear">
						                                    </div>
						                                </div>
						                            </div>
		                                    	</div>
					                            <div class="materiallist"></div>
		                                    </div>
		                                    
		                                    <div class="selectdate">
		                                    	<div class="form-group form-md-line-input has-info">
	                                                <input type="date" class="form-control" name="postingdate" id="pickdate" placeholder="Enter your name">
	                                                <label for="pickdate">Posting Date</label>
	                                                <!-- <span class="help-block">Some help goes here...</span> -->
	                                            </div>
		                                    </div>
		                                    <div class="selectproduct">
		                                    	<div class="form-group form-md-line-input has-info">
	                                                <select class="form-control modprodopt" id="form_control_1" name="prod_profile" disabled="disabled">
	                                                    <option value="">Select Profile</option>
	                                                    <?php foreach ($finalProduct::getAllFinishProductCategory() as $key => $value) { ?>
	                                                    	<option value="<?php echo $value["meta_id"]; ?>" data-prodname="<?php echo $value["meta_name"]; ?>"><?php echo $value["meta_name"]; ?></option>
                                                        <?php } ?>
	                                                </select>
	                                                <label for="form_control_1">Profile Specification</label>
	                                            </div>
		                                    </div>
		                                    <!-- <div class="imgprev">
		                                    	<img src="<?php echo $baseline; ?>/images/default-image.jpg" style="width: 100%;">
		                                    </div> -->
		                                </div>
           							</div>
                				</div>
                				<div class="col-md-6">
                					<div class="portlet box blue">
		                                <div class="portlet-title">
		                                    <div class="caption">
		                                        <i class="fa fa-gift"></i>Job Order </div>
		                                    <div class="actions">
		                                        <a href="javascript:;" class="btn btn-default btn-sm addorder" style="display: none"><i class="fa fa-plus"></i> Add Order Unit</a>
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
		                                                    <div class="actions baseactionss">
		                                                        <a class="btn border-white font-white btn-sm addproductorder orderplaceunit" data-toggle="modal" href="#"><i class="fa fa-plus icon-black"></i> Add Cutting</a>
		                                                        <a href="javascript:;" class="btn border-white font-white btn-sm addremarks"><i class="fa fa-plus icon-black"></i> Document No.</a>
		                                                        <a href="javascript:;" class="btn border-white font-white btn-sm editplacement"><i class="fa fa-plus icon-black"></i> Edit</a>
		                                                        <a href="javascript:;" class="btn border-white font-white btn-sm saveplacement" style="display: none;"><i class="fa fa-plus icon-black"></i> Save</a>
		                                                    </div>
		                                                   
		                                                </div>
		                                                <div class="portlet-body ordercountainer" data-orderunitcounter="0">
		                                                	<div class="onremarks" style="display: none;">
		                                                		<div class="form-group form-md-line-input">
					                                                <textarea class="form-control" rows="3" placeholder="Enter more text"></textarea>
					                                               <!--  <label for="form_control_1">Add Remarks</label> -->
					                                            </div>
		                                                	</div>
		                                                	<!-- this is the content -->
		                                                	<table class="produnit table table-hover table-light bg-white bg-font-white">
		                                                		<thead class="uppercase">
		                                                			<tr>
			                                                			<th>piece/s</th>
			                                                			<th>meters</th>
			                                                			<th>TLM</th>
			                                                			<th>&nbsp;</th>
			                                                		</tr>
		                                                		</thead>
		                                                		<tbody></tbody>
		                                                	</table>
		                                                	<div class="alert alert-info totallm">
                                        						<strong>Total LM:</strong> <span class="totalbalue">0</span>
                                        					</div>
		                                                </div>
		                                                
		                                                
		                                            </div>
		                                            
		                                    	</div>

		                                    	<div class="thelistoforders">
		                                    	</div>
		                                    	<div class="forwardallorder" style="display: none;">
	                                            	<button type="button" class="btn blue-hoki btn-outline sbold uppercase placeordernow">Confirm Order</button>
	                                            </div>
		                                    	<div class="modal fade in" id="basicmodal" role="basic" aria-hidden="true" data-fororderunit="">
			                                        <div class="modal-dialog">
			                                            <div class="modal-content">
			                                                <div class="modal-header bg-red-flamingo">
			                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			                                                    <!-- <h4 class="modal-title onmodaltitle">Modal Title</h4> -->
			                                                </div>
			                                                <div class="modal-body">
				                                                <div class="modal-inner modalbase">


				                                                	<div class="onmodalcontents">
				                                                		<div class="onmodalinnerconts">
				                                                			<div class="plusdetails">
				                                                				<div class="row orderdatabase">
				                                                					<div class="col-md-4">
				                                                						<div class="form-group form-md-line-input">
											                                                <input type="number" class="form-control onprodpieces" id="num_of_piece" placeholder="Enter number">
											                                                <label for="num_of_piece">Number of Pieces</label>
											                                              <!--   <span class="help-block">Some help goes here...</span> -->
											                                            </div>
				                                                					</div>
				                                                					<div class="col-md-4">
				                                                						<div class="form-group form-md-line-input">
											                                                <input type="number" class="form-control onprodlength" id="len_of_cut" placeholder="Enter number">
											                                                <label for="len_of_cut">Length of Cut</label>
											                                             <!--    <span class="help-block">Some help goes here...</span> -->
											                                            </div>
				                                                					</div>
				                                                					<div class="col-md-4 addbuttonbase text-right">
				                                                						<a href="javascript:;" class="btn btn-sm red"> Add Order
					                                                                        <i class="fa fa-plus"></i>
					                                                                    </a>
				                                                					</div>
				                                                				</div>
				                                                				<div class="orderontolist">
				                                                					<ul>
				                                                						<li class="title-line">
				                                                							<div class="np">Number of Pieces</div><div class="nl">Length of Cut</div>
				                                                						</li>
				                                                					</ul>
				                                                				</div>
									                                            <div class="ontoconfirm" style="display: none">
									                                            	<button type="button" class="btn blue-hoki btn-outline sbold uppercase modconfirmproduct">Confirm Order</button>
									                                            </div>
				                                                			</div>
				                                                			<div class="modsuperinformation">
				                                                				<!-- <input type="hidden" name="dmaterialtype" class="dmaterialtype">
				                                                				<input type="hidden" name="dproducttype" class="dproducttype">

				                                                				<input type="hidden" name="pmaterialname" class="pmaterialname">
				                                                				<input type="hidden" name="pmaterialsize" class="pmaterialsize">

				                                                				<input type="hidden" name="pproductname" class="pproductname"> -->

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