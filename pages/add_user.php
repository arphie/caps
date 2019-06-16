
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add User
                    <!-- <small>Bla Bla bLa</small> -->
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
            </li> -->
           <!--  <li>
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
                                    <i class="fa fa-gift"></i> </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Enter your Username" name="xnusername">
                                    <label for="form_control_1">User Name</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="password" class="form-control" placeholder="Enter your Password" name="xnpassword">
                                    <label for="form_control_1">User Password</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <select class="form-control" name="xnprev">
                                        <option value="">Select Privilege</option>
                                        <option value="1">Supervisor</option>
                                        <option value="2">Inventory Staff</option>
                                        <option value="3">Sales Staff</option>
                                    </select>
                                    <label for="form_control_1">Privilege</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> </div>
                                <div class="actions">
                                    <a href="javascript:;" class="btn btn-default btn-sm">
                                        <i class="fa fa-pencil"></i> Edit </a>
                                    <a href="javascript:;" class="btn btn-default btn-sm">
                                        <i class="fa fa-plus"></i> Add </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                 <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Enter your Display Name" name="xndisplayname">
                                    <label for="form_control_1">Display Name</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Enter your First Name" name="xnfname">
                                    <label for="form_control_1">User First Name</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Enter your Last Name" name="xnlname">
                                    <label for="form_control_1">User Last Name</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                            </div>
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