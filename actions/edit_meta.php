
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
        	$metaval = $metaData::getmetavalue($_GET['id']);
            $highmetaval = $metaval[0];
        ?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Edit Product Meta
                   <!--  <small>Add Shippment on Database</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <!-- <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Products</span>
            </li> -->
        </ul>
        <div class="">
        	
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="meta_name" value="<?php echo $highmetaval['meta_name']; ?>">
                            <label for="form_control_1">Meta Name</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="meta_value" value="<?php echo $highmetaval['meta_value']; ?>">
                            <label for="form_control_1">Meta Value</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <select class="form-control" id="form_control_1" name="meta_type">
                                <option value=""></option>
                                <option value="color" <?php echo ($highmetaval['meta_type'] == "color" ? 'selected="selected"' : ''); ?>>Color</option>
                                <option value="size" <?php echo ($highmetaval['meta_type'] == "size" ? 'selected="selected"' : ''); ?>>Size</option>
                                <option value="type" <?php echo ($highmetaval['meta_type'] == "type" ? 'selected="selected"' : ''); ?>>Type</option>
                                <option value="category" <?php echo ($highmetaval['meta_type'] == "category" ? 'selected="selected"' : ''); ?>>Category</option>
                            </select>
                            <label for="form_control_1">Meta type</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group form-md-line-input has-info">
                            <textarea class="form-control" rows="12" placeholder="Enter more text" name="meta_desc"><?php echo $highmetaval['meta_desc']; ?></textarea>
                            <label for="form_control_1">Meta Description</label>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                    	<input type="hidden" name="metaid" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>