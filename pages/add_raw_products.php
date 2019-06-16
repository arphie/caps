
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add RAW Product
                   <!--  <small>Add Raw Product on Database</small> -->
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

            <?php
                $listofsizes = $metaData::getmetavalues('size');
                $listofcolor = $metaData::getmetavalues('color');
                $listofsku = $metaData::getallskudata();
                $listofsupplier = $supplier::getsupplierdata();
                // print_r($listofsizes);
            ?>
        	<form action="" method="post">
            <div class="row">
            	<div class="col-md-6">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Material SKU </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" id="select_sku_opt" name="prodsku" required>
                                    <option value="">Select Product SKU</option>
                                    <?php
                                        foreach ($listofsku as $key => $value) {
                                            ?>
                                                <option value="<?php echo $value['sku_id']; ?>" data-color="<?php echo $metaData::getspecificmetavalue($value['sku_color']); ?>" data-size="<?php echo $metaData::getspecificmetavalue($value['sku_size']); ?>" data-name="<?php echo $value['sku_name']; ?>" data-desc=""><?php echo $value['sku_unique']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <label for="select_sku_opt">Product SKU</label>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="sku_prodname" placeholder="Enter your name" disabled>
                                <label for="sku_prodname">Product Name</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="sku_prodcolor" placeholder="Enter your name" disabled>
                                <label for="sku_prodcolor">Product Color</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="sku_prodsize" placeholder="Enter your name" disabled>
                                <label for="sku_prodsize">Product Size</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" id="form_control_1" name="prod_ship">
                                    <option value=""></option>
                                    <?php foreach ($shipment::getforshipmentdrop() as $key => $value) { ?>
                                            <option value="<?php echo $value['ship_id']; ?>"><?php echo $value['ship_arriv_refid']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="form_control_1">Shippment Source</label>
                            </div>
                        </div>
                    </div>
            	</div>
            	<div class="col-md-6">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Material Specs </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodnw" required>
                                <label for="form_control_1">Product Net Weight</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodlm" required>
                                <label for="form_control_1">Product Linear Meter</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="prodcoilnum" required>
                                <label for="form_control_1">Product Coil Number</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" id="form_control_1" name="prodsupplier" required>
                                    <option value="">Select Supplier</option>
                                    <?php
                                        foreach ($listofsupplier as $key => $value) {
                                            ?>
                                                <option value="<?php echo $value['sup_id']; ?>"><?php echo $value['sup_name']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <label for="form_control_1">Supplier</label>
                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <input type="date" class="form-control" id="form_control_1" placeholder="" max="<?php echo date("Y-m-j"); ?>" name="proddate" value="" required>
                                <label for="form_control_1">Date of Arrival</label>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                        </div>
                    </div>
            	</div>
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Remarks </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-group form-md-line-input has-info">
                                <textarea class="form-control" name="prodremarks" rows="5" placeholder="Enter more text"></textarea>
                                <!-- <label for="form_control_1">Remarks</label> -->
                            </div>
                        </div>
                    </div>
                </div>
                <br style="clear:both;">
            	<div class="form-actions noborder">
                    <input type="submit" class="btn blue" name="Submit">
                    <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Cancel</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>