<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 1279px;">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>User Profile | Account
                   <!--  <small>user account page</small> -->
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
           <!--  <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">User</span>
            </li> -->
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->

        <?php
            if (isset($_GET['id']) && $_GET['id'] != "") {
                $profiledata = $users::getUserbyID($_GET['id']);
            } else {
                $profiledata = $users::getUserbyID($_SESSION['userid']);
            }
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <!-- PORTLET MAIN -->
                    <div class="portlet light profile-sidebar-portlet bordered">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="/caps/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> <?php echo $profiledata['user_lname']; ?> <?php echo $profiledata['user_fname']; ?> </div>
                            <div class="profile-usertitle-job"><?php echo ($profiledata['user_access'] == "1" ? "Supervisor" : ($profiledata['user_access'] == "2" ? "Inventory Staff" : "Sales Staff")); ?> </div>
                        </div>
                        
                    </div>
                    <!-- END PORTLET MAIN -->
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Personal Account</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#profile" data-toggle="tab">Personal Info</a>
                                        </li>
                                        <li>
                                            <a href="#logs" data-toggle="tab">User Logs</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body" style="height: 400px;overflow: auto;">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile">
                                            <form id="myprofiledetails" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" name="user_lname" value="<?php echo $profiledata['user_lname']; ?>" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" name="user_fname" value="<?php echo $profiledata['user_fname']; ?>" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Display Name</label>
                                                    <input type="text" name="user_loginname" value="<?php echo $profiledata['user_loginname']; ?>" class="form-control"> </div>
                                                <div class="margiv-top-10">
                                                    <input type="hidden" name="userid" value="<?php echo $profiledata['user_id']; ?>">
                                                    <input type="hidden" name="edittype" value="<?php echo (isset($_GET['id']) && $_GET['id'] != "" ? 'user' : 'myprofile'); ?>">
                                                    <a href="#" class="btn green tosavemyprofile"> Save Changes </a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="logs">
                                            <table class="table table-hover table-light">
                                                <thead>
                                                    <tr class="uppercase">
                                                        <th> # </th>
                                                        <th> Log Date </th>
                                                        <th> Log Type </th>
                                                        <!-- <th> &nbsp; </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($logs::getlogsbyid($_GET['id']))): ?>
                                                        <?php foreach ($logs::getlogsbyid($_GET['id']) as $key => $value) { ?>
                                                            <tr>
                                                                <td> <?php echo $value['log_id']; ?> </td>
                                                                <td> <?php echo $value['log_date']; ?> </td>
                                                                <td> <?php echo $value['log_type']; ?> </td>
                                                                <!-- <td>
                                                                    <span class="label label-sm label-success"> Approved </span>
                                                                </td> -->
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>