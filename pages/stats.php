<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php

            $skuinfo = $metaData::getskudetails($_GET['sku']);

            $numofopen = count($stats::getcoilsbysku('open', $_GET['sku']));
            $numofavailable = count($stats::getcoilsbysku('available', $_GET['sku']));
            $totalcoils = $numofopen + $numofavailable;
            if ($totalcoils == 0) {
                $percopen = 0;
                $percavail = 0;
            } else {
                $percopen = ($numofopen / $totalcoils) * 100;
                $percavail = ($numofavailable / $totalcoils) * 100;
            }


            $kglms = $stats::getremainingkglm($_GET['sku']);
            if ($kglms['baselm'] == 0) {
                $lmperc = 0;
                $percusedlm = 0;
            } else {
                $lmperc = ($kglms['remaininglm']/$kglms['baselm']) * 100;
                $percusedlm = (($kglms['baselm'] - $kglms['remaininglm'])/$kglms['baselm']) * 100;
            }
            


            $getmanu = $stats::getmanupersku($_GET['sku']);

            $getproduct = $stats::gerproducts($_GET['sku']);

            $listofprofiles = $stats::sortperprofile($getmanu);

            $forcast = $stats::forcasting($_GET['sku']);

        ?>
        <div class="">
        	<div class="row">
                <div class="col-sm-6">
                    <div class="col-md-6">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="<?php echo $numofopen; ?>"><?php echo $numofopen; ?></span>
                                        <small class="font-green-sharp"></small>
                                    </h3>
                                    <small>Open Coils</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-pie-chart"></i>
                                </div>
                            </div>
                            <div class="progress-info">
                                <div class="progress">
                                    <span style="width: <?php echo $percopen; ?>%;" class="progress-bar progress-bar-success green-sharp">
                                        <span class="sr-only"><?php echo $percopen; ?>%</span>
                                    </span>
                                </div>
                                <div class="status">
                                    <!-- <div class="status-title"> progress </div> -->
                                    <div class="status-number"> <?php echo number_format((float) $percopen, 2, '.', ''); ?>% of <?php echo $totalcoils; ?> coils</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="<?php echo $numofavailable; ?>"><?php echo $numofavailable; ?></span>
                                    </h3>
                                    <small>Available Coils</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-pie-chart"></i>
                                </div>
                            </div>
                            <div class="progress-info">
                                <div class="progress">
                                    <span style="width: <?php echo $percavail; ?>%;" class="progress-bar progress-bar-success red-haze">
                                        <span class="sr-only"><?php echo $percavail; ?>% change</span>
                                    </span>
                                </div>
                                <div class="status">
                                    <!-- <div class="status-title"> change </div> -->
                                    <div class="status-number"> <?php echo number_format((float) $percavail, 2, '.', ''); ?>% of <?php echo $totalcoils; ?> coils </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-blue-sharp">
                                        <span data-counter="counterup" data-value="<?php echo number_format((float) $kglms['remaininglm'], 2, '.', ','); ?>"><?php echo number_format((float) $kglms['remaininglm'], 2, '.', ','); ?></span>
                                    </h3>
                                    <small>Remaining LM</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>
                            <div class="progress-info">
                                <div class="progress">
                                    <span style="width: <?php echo $lmperc; ?>%;" class="progress-bar progress-bar-success blue-sharp">
                                        <span class="sr-only"><?php echo $lmperc; ?>% grow</span>
                                    </span>
                                </div>
                                <div class="status">
                                    <!-- <div class="status-title"> grow </div> -->
                                    <div class="status-number"> <?php echo number_format((float) $lmperc, 2, '.', ''); ?>% out of <?php echo $kglms['baselm']; ?>m</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-purple-soft">
                                        <span data-counter="counterup" data-value="<?php echo number_format((float) $kglms['remainingkg'], 2, '.', ','); ?>"><?php echo number_format((float) $kglms['remainingkg'], 2, '.', ','); ?></span>
                                    </h3>
                                    <small>Remaining NW</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>
                            <div class="progress-info">
                                <div class="progress">
                                    <span style="width: <?php echo $lmperc; ?>%;" class="progress-bar progress-bar-success purple-soft">
                                        <span class="sr-only"><?php echo $lmperc; ?>% change</span>
                                    </span>
                                </div>
                                <div class="status">
                                    <!-- <div class="status-title"> change </div> -->
                                    <div class="status-number"> <?php echo number_format((float) $lmperc, 2, '.', ''); ?>% out of <?php echo $kglms['basekg']; ?>kg</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>SKU Information</strong>
                            <!-- <span class="badge badge-default"> <?php echo $skuinfo['sku_unique']; ?> </span> -->
                        </li>
                        <li class="list-group-item"> SKU ID
                            <span class="badge badge-default"> <?php echo $skuinfo['sku_unique']; ?> </span>
                        </li>
                        <li class="list-group-item"> Color
                            <span class="badge badge-default"> <?php echo $metaData::getspecificmetavalue($skuinfo['sku_color']); ?> </span>
                        </li>
                        <li class="list-group-item"> size
                            <span class="badge badge-default"> <?php echo $metaData::getspecificmetavalue($skuinfo['sku_size']); ?> </span>
                        </li>
                    </ul>
                    <div class="col-md-6">
                        <div class="easy-pie-chart">
                            <div class="number visits" data-percent="<?php echo $lmperc; ?>">
                                <span><?php echo number_format((float) $lmperc, 2, '.', ''); ?></span>% <canvas height="75" width="75"></canvas></div>
                            <div class="title">Available Product</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="easy-pie-chart">
                            <div class="number bounce" data-percent="<?php echo number_format((float) $percusedlm, 2, '.', ''); ?>">
                                <span><?php echo number_format((float) $percusedlm, 2, '.', ''); ?></span>% <canvas height="75" width="75"></canvas></div>
                            <div class="title">Used Product</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $count = 0;
                foreach (array_reverse($forcast) as $key => $value) {
                    if ($count >= 3) {
                        $myDateTime = DateTime::createFromFormat('Y-m', $value['ddate']);
                        $newDateString = $myDateTime->format('M Y');
                    ?>
                    <div class="col-md-4">
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Projection Forecast in meters</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle"><?php echo $newDateString; ?></span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format((float) $value['istotal'], 2, '.', ','); ?>"><?php echo number_format((float) $value['istotal'], 2, '.', ','); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } $count++; } ?>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Manufacture</div>
                            <!-- <div class="actions">
                                <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a>
                                <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus"></i> Add </a>
                            </div> -->
                        </div>
                        <div class="portlet-body">
                            <?php
                                $totalmanlms = 0;
                                foreach ($listofprofiles as $key => $value) {
                                    $totalmanlms += $value['totalss'];
                                }
                            ?>
                            <?php foreach ($listofprofiles as $key => $value) { ?>
                                <div class="col-md-6 itemmanus">
                                    <div class="manuitem">
                                        <h5><?php echo $value['meta_name']; ?></h5>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo ($value['totalss'] / $totalmanlms) * 100; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($value['totalss'] / $totalmanlms) * 100; ?>%">
                                                <span style="color: #000;"> <?php echo number_format((float) ($value['totalss'] / $totalmanlms) * 100, 2, '.', ''); ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="innermanus">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th> # </th>
                                                    <th> Date </th>
                                                    <th> Profile </th>
                                                    <th> LM </th>
                                                    <!-- <th> Status </th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $totallms = 0; ?>
                                                <?php foreach ($value['manus'] as $xmanskey => $xmansvalue) {
                                                        $myDateTime = DateTime::createFromFormat('Y-m-d', $xmansvalue['man_date']);
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $xmansvalue['man_id']; ?> </td>
                                                        <td> <?php echo $myDateTime->format('M. d, Y');; ?> </td>
                                                        <td> <?php echo $metaData::getprofilename($xmansvalue['man_profile']); ?> </td>
                                                        <td> <?php echo $xmansvalue['totallm']; ?>m </td>
                                                    </tr>
                                                <?php $totallms += $xmansvalue['totallm']; } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th style="text-align:right;"><strong>Total LM</strong></th>
                                                    <th><strong><?php echo $totallms; ?>m</strong></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>
                            <br class="clear">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Product info </div>
                            <!-- <div class="actions">
                                <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a>
                                <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus"></i> Add </a>
                            </div> -->
                        </div>
                        <div class="portlet-body" style="height: 480px;overflow: auto;">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> Status </th>
                                        <th> Coil # </th>
                                        <th> KG/LM </th>
                                        <th> &nbsp; </th>
                                        <!-- <th> Username </th>
                                        <th> Status </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getproduct as $key => $value) { ?>
                                        <tr>
                                            <td> <?php echo($value['prod_status'] == '1' ? '<div class="btn btn-icon-only blue" title="Available"><i class="fa fa-check-circle-o"></i></div>' : ($value['prod_status'] == '2' ? '<div class="btn btn-icon-only green" title="Open"><i class="fa fa-dropbox"></i></div>' : '<div class="btn btn-icon-only red" title="Close"><i class="fa fa-cube"></i></div>')); ?> </td>
                                            <td> <?php echo $value['prod_coil_number']; ?> </td>
                                            <td> <?php echo number_format((float) $value['prod_nw'], 2, '.', ''); ?>/<?php echo number_format((float) $value['prod_lm'], 2, '.', ''); ?> </td>
                                            <td> 
                                                <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $value['prod_id']; ?>" target="_blank" title="View Product" class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-send"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="calnwow" class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar-check-o"></i>Monthly Transactions </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn btn-sm green" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-calendar-plus-o"></i> Select Year
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <?php
                                            $starting_year = date('Y', strtotime('-10 year'));
                                            $current_year = date('Y');
                                             for($starting_year; $starting_year <= $current_year; $starting_year++) {
                                                 ?>
                                                 <li>
                                                    <a href="<?php echo $baseline; ?>/index.php?page=stats&sku=<?php echo $_GET['sku'] ?>&year=<?php echo $starting_year; ?>#calnwow"><i class="fa fa-mail-reply"></i> <?php echo $starting_year; ?> </a>
                                                </li>
                                                 <?php
                                             }               
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="ismonths">
                                <?php foreach ($stats::montlymanu($_GET['sku'], @$_GET['year']) as $key => $value) { ?>
                                    <?php
                                        $myDateTime = DateTime::createFromFormat('Y-m', $value['ismonth']);
                                        $monthname = $myDateTime->format('F Y');
                                        $numofmanus = count($value['manus']);
                                    ?>
                                    <div class="col-sm-3" style="margin-bottom: 10px;">
                                        <a class="dashboard-stat dashboard-stat-v2 <?php echo ($numofmanus > 0 ? 'blue-hoki' : 'grey'); ?>" data-toggle="modal" <?php echo ($numofmanus > 0 ? 'href="#m'.$myDateTime->format('F').@$_GET['year'].'"' : '' ); ?>>
                                            <div class="visual">
                                                <i class="fa fa-trophy"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="<?php echo $numofmanus; ?>"><?php echo $numofmanus; ?></span>
                                                </div>
                                                <div class="desc small"> <h5 style="margin:0;">Transactions for</h5> </div>
                                                <div class="desc"> <?php echo $monthname; ?> </div>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="m<?php echo $myDateTime->format('F'); ?><?php echo @$_GET['year']; ?>" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title"><?php echo $myDateTime->format('F Y') ?></h4>
                                                    </div>
                                                    <div class="modal-body" style="height: 400px;overflow: auto;">
                                                        <table class="table table-hover table-light">
                                                            <thead>
                                                                <tr class="uppercase">
                                                                    <th> Date </th>
                                                                    <th> Coil Number </th>
                                                                    <th> Profile </th>
                                                                    <th> Total LM </th>
                                                                    <th> Total NW </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $stotallm = 0;
                                                                    $stotalnw = 0;
                                                                foreach ($value['manus'] as $manukey => $manuvalue) { ?>
                                                                    <?php
                                                                    
                                                                    $rawiddata = $rawproducts::getoneproduct($manuvalue['man_rawid']); ?>
                                                                    <tr>
                                                                        <td> <?php echo $manuvalue['man_date']; ?> </td>
                                                                        <td><?php echo $rawiddata[0]['prod_coil_number']; ?></td>
                                                                        <td> <?php echo $metaData::getspecificmetavalue($manuvalue['man_profile']); ?> </td>
                                                                        <td> <?php echo $manuvalue['totallm']; ?>m </td>
                                                                        <td> <?php echo number_format((float) $manuvalue['totallm'] * $rawiddata[0]['prod_kglm'], 2, '.', ''); ?>kg </td>
                                                                    </tr>
                                                                <?php $stotallm+= $manuvalue['totallm'];
                                                                $stotalnw+= $manuvalue['totallm'] * $rawiddata[0]['prod_kglm']; } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th><?php echo $stotallm; ?>m</th>
                                                                    <th><?php echo number_format((float) $stotalnw, 2, '.', ''); ?>kg</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                <?php } ?>
                                <br class="clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>