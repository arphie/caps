
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
            $shipdata = $shipment::getshipmentdata($_GET['id']);
            $coilspership = $shipment::getcoilspership($_GET['id']);

            if (isset($_GET['todo'])) {
                $shipment::toclose($_GET['id']);
            }
        ?>      
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Shipping Arrived
                 <!--    <small>--- --- -- ---</small> -->
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
                <span class="active"><?php echo $shipdata['ship_reference']; ?></span>
            </li> -->
        </ul>
        <div class="">
            <div class="innershipment">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Arrival Details </div>
                                <div class="actions">
                                    <?php if ($shipdata['ship_iscomplete'] != '1'): ?>
                                        <a href="<?php echo $baseline; ?>/index.php?page=shipment_report&action=arrive_details&id=<?php echo $_GET['id']; ?>&todo=close" class="btn btn-default btn-sm confcloseship">
                                            <i class="fa fa-check"></i> Shipment Completed  </a>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form method="post" action="">
                                     <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-info">
                                            <input type="date" class="form-control" id="form_control_1" value="<?php echo $shipdata['ship_arriv_date']; ?>">
                                            <label for="form_control_1">Arrival Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-info">
                                            <input type="text" class="form-control" id="form_control_1" value="<?php echo $shipdata['ship_arriv_refid']; ?>">
                                            <label for="form_control_1">Arrival Reference id</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-info">
                                            <div class="input-group">
                                                <!-- <span class="input-group-addon">$</span> -->
                                                <input type="text" class="form-control" value="<?php echo $shipdata['ship_arriv_tlm']; ?>">
                                                <!-- <span class="help-block">Some help goes here...</span> -->
                                                <span class="input-group-addon">m</span>
                                                <label for="form_control_1">Arrival Total Line Meter</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-info">
                                            <div class="input-group">
                                                <!-- <span class="input-group-addon">$</span> -->
                                                <input type="text" class="form-control" value="<?php echo $shipdata['ship_arriv_tnw']; ?>">
                                                <!-- <span class="help-block">Some help goes here...</span> -->
                                                <span class="input-group-addon">kg</span>
                                                <label for="form_control_1">Arrival Total Kilogram</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input has-info">
                                            <textarea class="form-control" rows="19" placeholder="Enter more text"><?php echo $shipdata['ship_arriv_manifest']; ?></textarea>
                                            <label for="form_control_1">Arrival Manifest</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="form-actions noborder">
                                            <input type="hidden" name="shipid" value="<?php echo $_GET['id']; ?>">
                                            <input type="submit" name="submit" value="Submit" class="btn blue">
                                            <a href="<?php echo $baseline; ?>/index.php?page=shipment" class="btn default">Cancel</a>
                                        </div>
                                    </div> -->
                                </form>
                                <br class="clear">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> </div>
                                <div class="actions">
                                    <div class="btn btn-default btn-sm"><strong>Total LM:</strong> <span class="gettotlm">&nbsp;</span> m</div>
                                    <div class="btn btn-default btn-sm"><strong>Total NW:</strong> <span class="gettotnw">&nbsp;</span> kg</div>
                                </div>
                            </div>
                            <div class="portlet-body" style="height: 635px;overflow: auto;">
                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-hover table-light">
                                        <thead>
                                            <tr class="uppercase">
                                                <th> # </th>
                                                <th> Coil # </th>
                                                <th> LM </th>
                                                <th> NW </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totalLM = 0;
                                            $totalNW = 0;
                                            foreach ($coilspership as $key => $value) {
                                                $totalLM += $value['prod_base_lm'];
                                                $totalNW += $value['prod_base_nw'];
                                            ?>
                                                <tr>
                                                    <td> <?php echo $value['prod_id']; ?> </td>
                                                    <td> <?php echo $value['prod_coil_number']; ?> </td>
                                                    <td> <?php echo number_format((float) $value['prod_base_lm'], 2, '.', ','); ?> </td>
                                                    <td> <?php echo number_format((float) $value['prod_base_nw'], 2, '.', ','); ?> </td>
                                                    <td>
                                                        <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $value['prod_id']; ?>" class="btn btn-icon-only green"><i class="fa fa-send"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div>
                                        <input type="hidden" id="gettotlm" value="<?php echo number_format((float) $totalLM, 2, '.', ','); ?>">
                                        <input type="hidden" id="gettotnw" value="<?php echo number_format((float) $totalNW, 2, '.', ','); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                </div>
            </div>          
        </div>
    </div>
</div>