
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
            // save product
            if (isset($_POST) && !empty($_POST)) {
                $supplier::savesupllier($_POST);
                // print_r($_POST);
            }
        ?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add Supplier
                    <!-- <small>Add Supplier on Database</small> -->
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
        	
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your Name" name="supname">
                            <label for="form_control_1">Supplier Name</label>
                            <!-- <span class="help-block">Some help goes here...</span> -->
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your Phone" name="supphone">
                            <label for="form_control_1">Supplier Phone</label>
                           <!--  <span class="help-block">Some help goes here...</span> -->
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your Address" name="supaddress">
                            <label for="form_control_1">Supplier Address</label>
                           <!--  <span class="help-block">Some help goes here...</span> -->
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your Email Address" name="supemail">
                            <label for="form_control_1">Supplier Email Address</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <textarea class="form-control" rows="15" placeholder="Enter more Description" name="supdesc"></textarea>
                            <label for="form_control_1">Supplier Description</label>
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