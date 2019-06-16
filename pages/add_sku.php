
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add Product SKU
                    <!-- <small>Add Product SKU on Database</small> -->
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
        <?php
            // save product
            if (isset($_POST) && !empty($_POST)) {

                $goodtogo = true;

                if ($metaData::ifskuexist($_POST['skuid'])) {
                   $goodtogo = false;
                   ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> SKU id already exist
                    </div>
                   <?php
                }

                if ($metaData::ifcombiexist($_POST['skusize'], $_POST['skucolor'])) {
                    $goodtogo = false;
                   ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Size and Color Combination Already Exist
                    </div>
                   <?php
                }

                if ($goodtogo) {
                    $metaData::saveSku($_POST);
                    ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> SKU Added.
                        </div>
                    <?php
                }

                



                // $metaData::saveSku($_POST);
            }
        ?>
        <div class="">
        	<?php
                $listofsizes = $metaData::getmetavalues('size');
                $listofcolor = $metaData::getmetavalues('color');
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your SKU ID" name="skuid" required>
                            <label for="form_control_1">SKU ID</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <select class="form-control" id="form_control_1" name="skusize" required>
                                <option value="">Select Thickness</option>
                                <?php
                                    foreach ($listofsizes as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value['meta_id']; ?>"><?php echo $value['meta_value']; ?></option>
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
                                            <option value="<?php echo $value['meta_id']; ?>"><?php echo $value['meta_value']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <label for="form_control_1">Product Color</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your Product Name" name="skuprodname" required>
                            <label for="form_control_1">Product Name</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <textarea class="form-control" rows="6" placeholder="Enter more Description" name="skuproddesc"></textarea>
                            <label for="form_control_1">Product Description</label>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>