<!-- include functions  -->
<?php include 'function.php'; ?>
<?php
    // authentication blocker
    if (!isset($_SESSION['userid'])) {
        header("location: ".BASELINK."/login.php");
        exit;
    }
?>
<!-- include header part -->
<?php include 'header.php'; ?>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php include 'sidebar.php'; ?>
            
            <!-- END SIDEBAR -->

            <?php if ((isset($_GET['page']) && $_GET['page'] != '') || isset($_GET['action']) && $_GET['action'] != '' ): ?>
                <?php include("functions/routes.php"); ?>
            <?php else: ?>
                <?php include 'content.php'; ?>
            <?php endif; ?>
            <!-- BEGIN CONTENT -->

            
            
            <!-- END CONTENT -->
        <!-- END QUICK SIDEBAR -->
        </div>
<?php include 'footer.php'; ?>