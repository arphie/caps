
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Default Client
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
           <!--  <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Products</span>
            </li> -->
        </ul>
        <?php
            $listofdiscount = unserialize($client::getdefaultdiscount());
        ?>
        <div class="">
            <form action="" method="post" id="default_discount_form">
                <div class="row">
                    <div class="col-md-12">
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
                                            <div class="dcontent">
                                                <div class="option-content">
                                                    <!-- <ul>
                                                        <li>
                                                            <div class="onsizetitle">Size</div>
                                                            <div class="onsizevalue">Discount (%)</div>
                                                        </li> -->
                                                        <?php $allsize = $metaData::getmetavalues('size'); ?>
                                                        <?php foreach ($allsize as $sizekey => $sizevalue) { ?>
                                                        <?php $formname = "discount_". $sizevalue['meta_id'] ."_". strtolower(str_replace(' ', '', $profvalue['prof_name'])); ?>
                                                            <div class="col-md-2">
                                                                <div class="form-group form-md-line-input listofdiscount">
                                                                    <div class="input-group">
                                                                        <!-- <span class="input-group-addon">$</span> -->
                                                                        <input type="number" class="form-control font-white" name="<?php echo $formname; ?>" value="<?php echo ($listofdiscount[$formname] != "" ? $listofdiscount[$formname] : 0); ?>">
                                                                        <!-- <span class="help-block">Some help goes here...</span> -->
                                                                        <span class="input-group-addon font-white">%</span>
                                                                        <label for="form_control_1 bg-font-white"><?php echo $sizevalue['meta_name']; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <!-- </ul> -->
                                                    
                                                    <br class="clear">
                                                </div>
                                            </div>
                                        </li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                    <div class="form-actions noborder">
                        <!-- <input type="submit" class="btn blue" name="Submit"> -->
                        <a href="#" id="submitdefaultdiscount" class="btn blue">Submit</a>
                        <a href="<?php echo $baseline; ?>/index.php?page=all_clients" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>