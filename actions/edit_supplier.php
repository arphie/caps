
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
            $supdata = $supplier::getsupplierdatabyid($_GET['id']);
            $supmeta = json_decode($supdata['sup_meta']);
        ?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Edit Supplier
                  <!--   <small>Add Supplier on Database</small> -->
                </h1>
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
        	
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="supname" value="<?php echo $supmeta->supname; ?>">
                            <label for="form_control_1">Supplier Name</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="supphone" value="<?php echo $supmeta->supphone; ?>">
                            <label for="form_control_1">Supplier Phone</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="supaddress" value="<?php echo $supmeta->supaddress; ?>">
                            <label for="form_control_1">Supplier Address</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name" name="supemail" value="<?php echo $supmeta->supemail; ?>">
                            <label for="form_control_1">Supplier Email Address</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-info">
                            <textarea class="form-control" rows="15" placeholder="Enter more text" name="supdesc"><?php echo $supmeta->supdesc; ?></textarea>
                            <label for="form_control_1">Supplier Description</label>
                        </div>
                    </div>
                    <br style="clear:both;">
                    <div class="form-actions noborder">
                        <input type="hidden" name="supid" value="<?php echo $supdata['sup_id']; ?>">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>