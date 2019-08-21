
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top: 0;">
        <?php
            $dprofile = $client::pullprofiles($_GET['id']);
            $profinfo = unserialize($dprofile['prof_base']);
        ?>
        <!-- <pre>
            <?php print_r($profinfo); ?>
        </pre> -->
        <div class="">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Profiles Details</div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-group form-md-line-input has-info">
                                    <input type="text" class="form-control" placeholder="Add Customer Type" name="profname" value="<?php echo $dprofile['prof_name']; ?>">
                                    <label for="form_control_1">Customer Type</label>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                                <div class="size-holder">
                                    <div class="dmainprofiles">
                                        <?php $allcats = $metaData::getmetavalues('category'); ?>
                                        <ul class="dproflists">
                                            <?php foreach ($allcats as $categskey => $categsvalue) { ?>
                                                <li>
                                                    <div class="titlebb"><?php echo $categsvalue['meta_name']; ?></div>
                                                    <div class="inneritems">
                                                        <?php $allsize = $metaData::getmetavalues('size'); ?>
                                                        <?php foreach ($allsize as $sizekey => $sizevalue) { ?>
                                                            <div class="col-md-4">
                                                                <div class="form-group form-md-line-input listofbaseprice">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">Php</span>
                                                                        <?php
                                                                            $basevals = "baseprice_".$categsvalue['meta_id']."_".$sizevalue['meta_id'];
                                                                            $defvalues = $profinfo[$basevals];
                                                                        ?>
                                                                        <input type="text" class="form-control" name="baseprice_<?php echo $categsvalue['meta_id']; ?>_<?php echo $sizevalue['meta_id']; ?>" value="<?php echo $defvalues; ?>">
                                                                        <!-- <span class="help-block">Some help goes here...</span> -->
                                                                        <!-- <span class="input-group-addon">%</span> -->
                                                                        <label for="form_control_1"><?php echo $sizevalue['meta_name']; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <br class="clear">
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <br class="clear">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                    <div class="form-actions noborder">
                        <input type="hidden" class="btn blue" name="pid" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
