
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php
            $tostep = (isset($_GET['step']) ? $_GET['step'] : 1);
        ?>
        <div class="innersteps mt-element-step">
                <div class="row step-no-background">
                    <div class="col-md-4 mt-step-col <?php echo ($tostep == 1 ? 'active' : ''); ?>">
                        <div class="mt-step-number bg-white font-grey">1</div>
                        <div class="mt-step-title uppercase font-grey-cascade">RAW MATERIAL</div>
                        <div class="mt-step-content font-grey-cascade">Select from available materials</div>
                    </div>
                    <div class="col-md-4 mt-step-col <?php echo ($tostep == 2 ? 'active' : ''); ?>">
                        <div class="mt-step-number bg-white font-grey">2</div>
                        <div class="mt-step-title uppercase font-grey-cascade">Select Product</div>
                        <div class="mt-step-content font-grey-cascade">Select a type of Product you want</div>
                    </div>
                    <div class="col-md-4 mt-step-col <?php echo ($tostep == 3 ? 'active' : ''); ?>">
                        <div class="mt-step-number bg-white font-grey">3</div>
                        <div class="mt-step-title uppercase font-grey-cascade">Deploy</div>
                        <div class="mt-step-content font-grey-cascade">Go for Production!</div>
                    </div>
                </div>
            </div>
        <!-- <div class="page-head">
            <div class="page-title">
                <h1>Add Product
                    <small>Add Finished Product on Database</small>
                </h1>
            </div>
        </div> -->
       <!--  <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Products</span>
            </li>
        </ul> -->
        <div class="">

            

            <!-- step 1 -->
            <div class="row step1 ontosteps <?php echo ($tostep == 1 ? 'ontostepsshow' : ''); ?>">
                <div class="innerstep">
                    <!-- ask for RAW Material that will be used -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp sbold">Choose form a wide variety of available RAW material</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- <pre>
                                        <?php
                                        print_r($finalProduct::getAllRawMaterials());
                                    ?>
                                    </pre> -->
                                    <div class="ontopoption">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th style="width: 150px;"> Status </th>
                                                    <th > Supplier </th>
                                                    <th> Thickness </th>
                                                    <th> Color </th>
                                                    <th> Coil Number </th>
                                                    <!-- <th> NW </th>
                                                    <th> LM </th>
                                                    <th> KG/LM </th> -->
                                                    
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($finalProduct::getAllRawMaterials() as $key => $value) {
                                                        
                                                        ?>

                                                        <tr class="odd gradeX">
                                                            <td><?php echo ($value['prod_status'] == 3 ? "Close" : ($value['prod_status'] == 2 ? "Open" : ($value['prod_status'] == 1 ? "Available" : ""))); ?></td>
                                                            <td><?php echo $value['prod_supplier']; ?></td>
                                                            <td><?php echo $value['prod_size']; ?></td>
                                                            <td><?php echo $value['prod_color']; ?></td>
                                                            <td><?php echo $value['prod_coil_number']; ?></td>
                                                           <!--  <td><?php echo $value['prod_nw']; ?></td>
                                                            <td><?php echo $value['prod_lm']; ?></td>
                                                            <td>
                                                                <?php
                                                                    echo number_format($value['prod_nw']/$value['prod_lm'],3);
                                                                ?>
                                                            </td> -->
                                                            
                                                            <td><a href="<?php echo $baseline; ?>/index.php?page=add_finished_products&rawid=<?php echo $value['prod_id']; ?>&step=2" class="btn blue btn-block">Use Material</a></td>
                                                        </tr>

                                                        <?php
                                                    }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="onnextpast">
                                        <div class="col-md-6 text-left">&nbsp;</div>
                                        <div class="col-md-6 text-right">
                                            <a href="javascript:;" class="btn btn-outline sbold blue-madison" id="blockui_sample_1_2">Next Step</a>
                                        </div>
                                        <br class="clear">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
                <!-- step 2 -->
                <div class="row step2 ontosteps <?php echo ($tostep == 2 ? 'ontostepsshow' : ''); ?>">
                    <div class="innerstep">
                        <!-- pick a final product template -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-bubble font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp sbold">Select a type of product you want to make</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row" style="margin-bottom: 25px;">
                                            <div class="col-md-6">
                                                <div class="inner-part-left">
                                                    <img src="<?php echo $baseline; ?>/images/default-image.jpg">
                                                    <div class="inner-button-left onfproductcount" style="margin-top:15px;">
                                                        <div class="dprodcat"></div>
                                                        <div class="onxseparator">X</div>
                                                        <div class="oninputfield">
                                                            <input type="text" name="prodcount">
                                                        </div>
                                                        <a class="btn default red-stripe confirmbutton" href="#">CONFIRM PRODUCT</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="inner-part-right">
                                                    <ul class="categoryfinallist">
                                                        <?php foreach ($finalProduct::getAllFinishProductCategory() as $key => $value) { ?>

                                                            <li>
                                                                <div class="finishedprodbutton">
                                                                    <a class="btn btn-outline dark" href="<?php echo $baseline; ?>/index.php?page=add_finished_products&rawid=<?php echo $_GET['rawid']; ?>&catid=<?php echo $value["meta_id"]; ?>&step=3">View Product</a>
                                                                </div>
                                                                <div class="finishedprodname"><?php echo $value["meta_name"]; ?></div>
                                                            </li>

                                                        <?php } ?>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <br class="clear">
                                        </div>
                                        <div class="onnextpast">
                                            <div class="col-md-6 text-left">
                                                <a href="javascript:;" class="btn btn-outline sbold blue-madison" id="blockui_sample_1_2">Previous Step</a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="javascript:;" class="btn btn-outline sbold blue-madison" id="blockui_sample_1_2">Next Step</a>
                                            </div>
                                            <br class="clear">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- step 3 -->
                <div class="row step3 ontosteps <?php echo ($tostep == 3 ? 'ontostepsshow' : ''); ?>">
                    <div class="innerstep">
                        <!-- generate a production job order  -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-bubble font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp sbold">Push to Production</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="inner-production">
                                            <div class="productsummary">
                                                <div class="col-md-6">
                                                    <div class="inner-part-left">
                                                        <pre>
                                                            <?php print_r($rawproducts::getoneproduct($_GET['rawid'])); ?>
                                                            <?php print_r($metaData::getmetavalue($_GET['cairo_matrix_transform_distance(matrix, dx, dy)'])); ?>
                                                        </pre>
                                                        <ul class="categoryfinallist">
                                                            <li>list of data </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="inner-part-right">
                                                        <img src="<?php echo $baseline; ?>/images/default-image.jpg">
                                                    </div>
                                                </div>
                                                <br class="clear">
                                            </div>
                                        </div>
                                        <div class="onnextpast" style="margin-top: 15px;">
                                            <div class="col-md-6 text-left">
                                                <a href="javascript:;" class="btn btn-outline sbold blue-madison" id="blockui_sample_1_2">Previous Step</a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="javascript:;" class="btn btn-outline sbold blue-madison" id="blockui_sample_1_2">Push to Production</a>
                                            </div>
                                            <br class="clear">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>