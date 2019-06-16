<?php include 'function.php'; ?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Davao EG Metal Forming Corp.</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo $baseline; ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $baseline; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $baseline; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo $baseline; ?>/assets/pages/css/login-2.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <!-- <div class="logo">
            <a href="index.html">
                <img src="<?php echo $baseline; ?>/assets/pages/img/logo-big-white.png" style="height: 17px;" alt="" /> </a>
        </div> -->
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
        	<?php
        		$dlogin = "";
        		if (isset($_POST) && !empty($_POST)) {
        			$dlogin = $users::loginUser($_POST);
        		}
        	?>
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="" method="post">
                <div class="form-title">
                    <span class="form-title">Welcome.</span>
                    <span class="form-subtitle">Please login.</span>
                </div>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn red btn-block uppercase">Login</button>
                </div>
                <div class="form-actions">
                    <!-- <div class="pull-left">
                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                            <input type="checkbox" name="remember" value="1" /> Remember me
                            <span></span>
                        </label>
                    </div> -->
                    <div class="pull-right forget-password-block">
                        <!-- <a href="#" id="frgotpass" class="frgotpass">Forgot Password?</a> -->
                    </div>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> 2018 © Davao EG Metal Forming, Corporation. </div>
        <!-- END LOGIN -->
        <!--[if lt IE 9]>
<script src="<?php echo $baseline; ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo $baseline; ?>/assets/global/plugins/excanvas.min.js"></script> 
<script src="<?php echo $baseline; ?>/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo $baseline; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $baseline; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo $baseline; ?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?php echo $baseline; ?>/assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo $baseline; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $baseline; ?>/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });

                $("#frgotpass").click(function(e){
                	e.preventDefault();
                	swal("Opps!", "Please Contact the Management for password resets", "info");
                });
                // $(location).attr('href', '/caps/index.php' );
                // window.location('/caps/index.php');

                <?php if ($dlogin == 'false') { ?>
                	swal({
                		title: "Opps!",
                		text: "Username and Password did not match.",
                		type: "error"
                	},function(){

                	});
                <?php } elseif($dlogin == 'true'){ ?>
                	swal({
                		title: "Confirmed!",
                		text: "Credentials Accepted!",
                		type: "success"
                	},function(){
                		$(location).attr('href', '/caps/index.php');
                	});
                <?php } ?>
            })
        </script>
    </body>

</html>