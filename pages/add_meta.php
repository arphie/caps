
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
            // save product
            if (isset($_POST) && !empty($_POST)) {
                $metaData::savameta($_POST);
                // print_r($_POST);
            }
        ?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add Product Meta
                    <!-- <small>Add Shippment on Database</small> -->
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
        	
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="meta_name">
                            <label for="form_control_1">Meta Name</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your value" name="meta_value">
                            <label for="form_control_1">Meta Value</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <select class="form-control selectmetatype" id="form_control_1" name="meta_type">
                                <option value=""></option>
                                <option value="hardware">Hardware</option>
                                <option value="bended">Bended</option>
                                <option value="color">Color</option>
                                <option value="size">Size</option>
                                <option value="type">Type</option>
                                <option value="category">Category</option>
                            </select>
                            <label for="form_control_1">Meta type</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info metadescfield">
                            <textarea class="form-control" rows="10" placeholder="Enter more text" name="meta_desc"></textarea>
                            <label for="form_control_1">Meta Description</label>
                        </div>
                        <div class="form-group form-md-line-input has-info uploadfield" style="display: none;">
                            <input type="file" class="form-control" id="form_control_1" placeholder="Enter your name" name="meta_image">
                            <label for="form_control_1">Add Image</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                    </div>
                    <br class="clear">
                    <div class="form-actions noborder">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>