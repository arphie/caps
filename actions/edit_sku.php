
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Edit Product SKU
                   <!--  <small>Add Product SKU on Database</small>
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
        	<?php
                $metadata = $metaData::getskudetails(@$_GET['id']);

                $listofsizes = $metaData::getmetavalues('size');
                $listofcolor = $metaData::getmetavalues('color');
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your SKU ID" name="skuid" value="<?php echo $metadata['sku_unique']; ?>" required>
                            <label for="form_control_1">SKU ID</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <select class="form-control" id="form_control_1" name="skusize" required>
                                <option value="">Select Size</option>
                                <?php
                                    foreach ($listofsizes as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value['meta_id']; ?>" <?php echo ($value['meta_id'] == $metadata['sku_size'] ? 'selected="selected"' : ''); ?>><?php echo $value['meta_value']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <label for="form_control_1">Product Thickness</label>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <select class="form-control" id="form_control_1" name="skucolor" required>
                                <option value="">Select Color</option>
                                <?php
                                    foreach ($listofcolor as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value['meta_id']; ?>" <?php echo ($value['meta_id'] == $metadata['sku_color'] ? 'selected="selected"' : ''); ?>><?php echo $value['meta_value']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <label for="form_control_1">Product Color</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your Product Name" name="skuprodname" value="<?php echo $metadata['sku_name']; ?>" required>
                            <label for="form_control_1">Product Name</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <textarea class="form-control" rows="6" placeholder="Enter more text" name="skuproddesc"><?php echo $metadata['sku_desc']; ?></textarea>
                            <label for="form_control_1">Product Description</label>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <input type="hidden" name="skunumid" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_sku" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>