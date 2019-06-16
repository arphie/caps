
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add Client
                  <!--   <small>Bla Bla bLa</small> -->
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
                        
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Client Information </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Client Name" name="clientname">
                                    <label for="form_control_1">Client Name</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Client Name" name="clientsku">
                                    <label for="form_control_1">Client SKU</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Client Address" name="clientaddress">
                                    <label for="form_control_1">Client Address</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $profilelist = array('Barcelona Rib','Barcelona Curve','Florence Corrugated','Monaco Tile','Millazo Tile','Ceiling Cladding','Wall Cladding','Spandrell Rib','Spandrell Corr','Steel Decking','Plainsheet Special Cut');
                    ?>
                    <div class="col-md-6">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Profiles </div>
                            </div>
                            <div class="portlet-body">
                                <ul class="supaccord">
                                    <?php foreach ($client::getprofiles() as $profkey => $profvalue) { ?>
                                        <li>
                                            <div class="dtitle"><?php echo $profvalue['prof_name']; ?></div>
                                            <div class="dsidecontent">
                                                <input type="radio" name="dselprofile" value="<?php echo $profvalue['prof_id']; ?>">
                                            </div>
                                        </li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                    <div class="form-actions noborder">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_clients" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>