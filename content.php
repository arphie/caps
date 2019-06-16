<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    
                    <!-- END PAGE BREADCRUMB -->
                    <?php

                        // 4 coulumns 
                        $numofopen = $products::getnumofcoils('open');
                        $numofavailable = $products::getnumofcoils('available');
                        $totalnumber = $numofopen + $numofavailable;

                        $openpercent = ($numofopen / $totalnumber) * 100;
                        $availpercent = ($numofavailable / $totalnumber) * 100;

                        // coils info
                        $totalcritcoils = $products::coil_summary_crit_warn('crit');
                        $totalwarncoils = $products::coil_summary_crit_warn('warn');
                        $allcoillist = $products::coil_summary('all');

                        $critpercent = (count($totalcritcoils) / count($allcoillist)) * 100;
                        $warnpercent = (count($totalwarncoils) / count($allcoillist)) * 100;


                        //size summary
                        $sizesummary = $products::getcoilsummarybysize();
                        $colorsummary = $products::getcoilsummarybycolor();

                    ?>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 bordered opencoilsclick topstats">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                    <span data-counter="counterup" data-value="<?php echo $numofopen; ?>"><?php echo $numofopen; ?></span>
                                                    <!-- <small class="font-green-sharp">$</small> -->
                                                </h3>
                                                <small>Open Coils</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: <?php echo $openpercent; ?>%;" class="progress-bar progress-bar-success green-sharp">
                                                    <span class="sr-only"><?php echo $openpercent; ?>% progress</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <!-- <div class="status-title"> Open Coils </div> -->
                                                <div class="status-number">( <?php echo number_format((float) $openpercent, 2, '.', ''); ?>% ) of <?php echo $totalnumber; ?> coils</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 bordered availablecoilclick topstats">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-blue-sharp">
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
                                                <span style="width: <?php echo $availpercent; ?>%;" class="progress-bar progress-bar-success blue-sharp">
                                                    <span class="sr-only"><?php echo $availpercent; ?>% grow</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <!-- <div class="status-title"> Open Coils </div> -->
                                                <div class="status-number">( <?php echo number_format((float) $availpercent, 2, '.', ''); ?>% ) of <?php echo $totalnumber; ?> coils</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 bordered critcoilclick topstats">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <span data-counter="counterup" data-value="<?php echo count($totalcritcoils); ?>"><?php echo count($totalcritcoils); ?></span>
                                                </h3>
                                                <small>Critical / No Stock</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-layers"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: <?php echo $critpercent; ?>%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only"><?php echo $critpercent; ?>% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <!-- <div class="status-title"> change </div> -->
                                                <div class="status-number">( <?php echo number_format((float) $critpercent, 2, '.', ''); ?>% ) of <?php echo count($allcoillist); ?> combinations</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 bordered lowcoilclick topstats">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="<?php echo count($totalwarncoils); ?>"><?php echo count($totalwarncoils); ?></span>
                                                </h3>
                                                <small>Low Coil Supply</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-layers"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: <?php echo $warnpercent; ?>%;" class="progress-bar progress-bar-success purple-soft">
                                                    <span class="sr-only"><?php echo $warnpercent; ?>% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <!-- <div class="status-title"> change </div> -->
                                                <div class="status-number">( <?php echo number_format((float) $warnpercent, 2, '.', ''); ?>% ) of <?php echo count($allcoillist); ?> combinations</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered coildetailsbox">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Coil Details</span>
                                        <!-- <span class="caption-helper">weekly stats...</span> -->
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided coilpconts" data-toggle="buttons">
                                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm coilopenme xopenll" data-oxval="opopen">
                                                <input type="radio" name="options" class="toggle" id="option1">Open</label>
                                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm coilopenme" data-oxval="opclose">
                                                <input type="radio" name="options" class="toggle" id="option2">Close</label>
                                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm coilopenme xavailll" data-oxval="opavailable">
                                                <input type="radio" name="options" class="toggle" id="option2">Available</label>
                                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm coilopenme active" data-oxval="opall">
                                                <input type="radio" name="options" class="toggle" id="option2">All</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row number-stats margin-bottom-30">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-left">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <!-- <div id="sparkline_bar"></div> -->
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> Total Net Weight</div>
                                                    <div class="number totmw">
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotalnw('open'), 2, '.', ','); ?>" class="opopen"><?php echo number_format((float) $products::gettotalnw('open'), 2, '.', ','); ?></div>
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotalnw('close'), 2, '.', ','); ?>" class="opclose"><?php echo number_format((float) $products::gettotalnw('close'), 2, '.', ','); ?></div>
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotalnw('available'), 2, '.', ','); ?>" class="opavailable"><?php echo number_format((float) $products::gettotalnw('available'), 2, '.', ','); ?></div>
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotalnw(), 2, '.', ','); ?>" class="opall xopen"><?php echo number_format((float) $products::gettotalnw(), 2, '.', ','); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-right">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <!-- <div id="sparkline_bar2"></div> -->
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> Total Linear Meter </div>
                                                    <div class="number totlm"> 
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotallm(), 2, '.', ','); ?>" class="opopen"><?php echo number_format((float) $products::gettotallm('open'), 2, '.', ','); ?></div>
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotallm(), 2, '.', ','); ?>" class="opclose"><?php echo number_format((float) $products::gettotallm('close'), 2, '.', ','); ?></div>
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotallm(), 2, '.', ','); ?>" class="opavailable"><?php echo number_format((float) $products::gettotallm('available'), 2, '.', ','); ?></div>
                                                        <div data-counter="counterup" data-value="<?php echo number_format((float) $products::gettotallm(), 2, '.', ','); ?>" class="opall xopen"><?php echo number_format((float) $products::gettotallm(), 2, '.', ','); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <div class="ontotabs coildetails">
                                            <div class="opopen">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr class="uppercase">
                                                            <!-- <th> Status </th> -->
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> NW / LM </th>
                                                            <th> Coil Number </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        foreach ($products::coil_details('open') as $key => $value) {
                                                            $skudetails = $metaData::getskudetails($value['prod_sku']);
                                                            ?>

                                                            <tr class="odd gradeX">
                                                                <!-- <td><?php echo ($value['prod_status'] == 3 ? '<span class="badge badge-danger">Closed</span>' : ($value['prod_status'] == 2 ? '<span class="badge badge-success">Open</span>' : ($value['prod_status'] == 1 ? '<span class="badge badge-error">Available</span>' : ""))); ?></td> -->
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
                                                                 <td><?php echo number_format((float)$value['prod_nw'], 2, '.', ','); ?> / <?php echo number_format((float)$value['prod_lm'], 2, '.', ','); ?></td>
                                                                 <td><?php echo $value['prod_coil_number']; ?></td>
                                                                
                                                                
                                                                
                                                            </tr>

                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </table>
                                            </div>
                                            <div class="opclose">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr class="uppercase">
                                                            <!-- <th> Status </th> -->
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> NW / LM </th>
                                                            <th> Coil Number </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        foreach ($products::coil_details('close') as $key => $value) {
                                                            $skudetails = $metaData::getskudetails($value['prod_sku']);
                                                            ?>

                                                            <tr class="odd gradeX">
                                                                <!-- <td><?php echo ($value['prod_status'] == 3 ? '<span class="badge badge-danger">Closed</span>' : ($value['prod_status'] == 2 ? '<span class="badge badge-success">Open</span>' : ($value['prod_status'] == 1 ? '<span class="badge badge-error">Available</span>' : ""))); ?></td> -->
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
                                                                 <td><?php echo number_format((float)$value['prod_nw'], 2, '.', ','); ?> / <?php echo number_format((float)$value['prod_lm'], 2, '.', ','); ?></td>
                                                                 <td><?php echo $value['prod_coil_number']; ?></td>
                                                                
                                                                
                                                                
                                                            </tr>

                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </table>
                                            </div>
                                            <div class="opavailable">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr class="uppercase">
                                                            <!-- <th> Status </th> -->
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> NW / LM </th>
                                                            <th> Coil Number </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        foreach ($products::coil_details('available') as $key => $value) {
                                                            $skudetails = $metaData::getskudetails($value['prod_sku']);
                                                            ?>

                                                            <tr class="odd gradeX">
                                                                <!-- <td><?php echo ($value['prod_status'] == 3 ? '<span class="badge badge-danger">Closed</span>' : ($value['prod_status'] == 2 ? '<span class="badge badge-success">Open</span>' : ($value['prod_status'] == 1 ? '<span class="badge badge-error">Available</span>' : ""))); ?></td> -->
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
                                                                 <td><?php echo number_format((float)$value['prod_nw'], 2, '.', ','); ?> / <?php echo number_format((float)$value['prod_lm'], 2, '.', ','); ?></td>
                                                                 <td><?php echo $value['prod_coil_number']; ?></td>
                                                                
                                                                
                                                                
                                                            </tr>

                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </table>
                                            </div>
                                            <div class="opall active">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr class="uppercase">
                                                            <!-- <th> Status </th> -->
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> NW / LM </th>
                                                            <th> Coil Number </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        foreach ($products::coil_details() as $key => $value) {
                                                            $skudetails = $metaData::getskudetails($value['prod_sku']);
                                                            ?>

                                                            <tr class="odd gradeX">
                                                                <!-- <td><?php echo ($value['prod_status'] == 3 ? '<span class="badge badge-danger">Closed</span>' : ($value['prod_status'] == 2 ? '<span class="badge badge-success">Open</span>' : ($value['prod_status'] == 1 ? '<span class="badge badge-error">Available</span>' : ""))); ?></td> -->
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_color']); ?></td>
                                                                 <td><?php echo $metaData::getspecificmetavalue($skudetails['sku_size']); ?></td>
                                                                 <td><?php echo number_format((float)$value['prod_nw'], 2, '.', ','); ?> / <?php echo number_format((float)$value['prod_lm'], 2, '.', ','); ?></td>
                                                                 <td><?php echo $value['prod_coil_number']; ?></td>
                                                                
                                                                
                                                                
                                                            </tr>

                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Coil Summary</span>
                                        <!-- <span class="caption-helper">Total Coil Summary</span> -->
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided">
                                            <a href="#" title="Critical" class="clickbutcritical btn btn-icon-only red"><i class="fa fa-bolt"></i></a>
                                            <a href="#" title="Warning" class="clickbutwarning btn btn-icon-only yellow"><i class="fa fa-exclamation"></i></a>
                                            <a href="#" title="All" class="clickbutall btn btn-icon-only blue"><i class="fa fa-level-up"></i></a>
                                            <a href="<?php echo $baseline; ?>/index.php?page=raw_material" class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm">Go to Masterlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="listofmath">
                                        <div class="crit">
                                            <div class="table-scrollable table-scrollable-borderless baseinfocoilsummary">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th> &nbsp; </th>
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> KG's </th>
                                                            <th> LM's </th>
                                                            <th style="width:;">Coils </th>
                                                            <!-- <th> Status </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $totalkg = 0;
                                                            $totallm = 0;
                                                            $count = 0;
                                                        ?>
                                                            
                                                            <?php foreach ($totalcritcoils as $key => $value) { ?>
                                                                <?php
                                                                    $totalkg += $value['totalnw'];
                                                                    $totallm += $value['totallm'];
                                                                ?>
                                                                <tr class="odd gradeX <?php echo ($value['num_coils'] == '0' ? 'warnme' : ''); ?>">
                                                                    <td>
                                                                        <div class="clickbutcritical btn btn-icon-only red"><i class="fa fa-bolt"></i></div>
                                                                    </td>
                                                                    <td><?php echo $metaData::getspecificmetavalue($value['sku_color']); ?></td>
                                                                    <td><?php echo $metaData::getspecificmetavalue($value['sku_size']); ?></td>
                                                                    <td><?php echo number_format((float)$value['totalnw'], 2, '.', ','); ?></td>
                                                                    <td><?php echo number_format((float)$value['totallm'], 2, '.', ','); ?></td>
                                                                    <td style="text-align:center;"><?php echo $value['num_coils']; ?></td>
                                                                    <!-- <td><?php echo ($value['num_coils'] == 0 ? '<div class="btn red">NO STOCKS</div>' : ($value['num_coils'] > 0 && $value['num_coils'] < 3 ? '<div id="pulsate-regular" class="btn blue">CRITICAL</div>' : '<div class="btn green">GOOD FOR PRODUCTION</div>')); ?></td> -->
                                                                </tr>
                                                            <?php
                                                            // if ($count > 7) {
                                                            //     break;
                                                            // }
                                                            $count++;
                                                        } ?>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="warn">
                                            <div class="table-scrollable table-scrollable-borderless baseinfocoilsummary">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;</th>
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> KG's </th>
                                                            <th> LM's </th>
                                                            <th style="width:;">Coils </th>
                                                            <!-- <th> Status </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $totalkg = 0;
                                                            $totallm = 0;
                                                            $count = 0;
                                                        ?>
                                                            
                                                            <?php foreach ($totalwarncoils as $key => $value) { ?>
                                                                <?php
                                                                    $totalkg += $value['totalnw'];
                                                                    $totallm += $value['totallm'];
                                                                ?>
                                                                <tr class="odd gradeX ">
                                                                    <td>
                                                                        <div class="clickbutcritical btn btn-icon-only yellow"><i class="fa fa-exclamation"></i></div>
                                                                    </td>
                                                                    <td><?php echo $metaData::getspecificmetavalue($value['sku_color']); ?></td>
                                                                    <td><?php echo $metaData::getspecificmetavalue($value['sku_size']); ?></td>
                                                                    <td><?php echo number_format((float)$value['totalnw'], 2, '.', ','); ?></td>
                                                                    <td><?php echo number_format((float)$value['totallm'], 2, '.', ','); ?></td>
                                                                    <td style="text-align:center;"><?php echo $value['num_coils']; ?></td>
                                                                    <!-- <td><?php echo ($value['num_coils'] == 0 ? '<div class="btn red">NO STOCKS</div>' : ($value['num_coils'] > 0 && $value['num_coils'] < 3 ? '<div id="pulsate-regular" class="btn blue">CRITICAL</div>' : '<div class="btn green">GOOD FOR PRODUCTION</div>')); ?></td> -->
                                                                </tr>
                                                            <?php
                                                            // if ($count > 7) {
                                                            //     break;
                                                            // }
                                                            $count++;
                                                        } ?>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="all active">
                                            <div class="table-scrollable table-scrollable-borderless baseinfocoilsummary">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr>
                                                            <th> Color </th>
                                                            <th> Thickness </th>
                                                            <th> KG's </th>
                                                            <th> LM's </th>
                                                            <th style="width:;">Coils </th>
                                                            <!-- <th> Status </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $totalkg = 0;
                                                            $totallm = 0;
                                                            $count = 0;
                                                        ?>
                                                            
                                                            <?php foreach ($allcoillist as $key => $value) { ?>
                                                                <?php
                                                                    $totalkg += $value['totalnw'];
                                                                    $totallm += $value['totallm'];
                                                                ?>
                                                                <tr class="odd gradeX <?php echo ($value['num_coils'] <= '2' ? 'warnme' : ($value['num_coils'] > '2' && $value['num_coils'] <= '5' ? 'yellowme' : '' )); ?>">
                                                                    <td><?php echo $metaData::getspecificmetavalue($value['sku_color']); ?></td>
                                                                    <td><?php echo $metaData::getspecificmetavalue($value['sku_size']); ?></td>
                                                                    <td><?php echo number_format((float)$value['totalnw'], 2, '.', ','); ?></td>
                                                                    <td><?php echo number_format((float)$value['totallm'], 2, '.', ','); ?></td>
                                                                    <td style="text-align:center;"><?php echo $value['num_coils']; ?></td>
                                                                    <!-- <td><?php echo ($value['num_coils'] == 0 ? '<div class="btn red">NO STOCKS</div>' : ($value['num_coils'] > 0 && $value['num_coils'] < 3 ? '<div id="pulsate-regular" class="btn blue">CRITICAL</div>' : '<div class="btn green">GOOD FOR PRODUCTION</div>')); ?></td> -->
                                                                </tr>
                                                            <?php
                                                            // if ($count > 7) {
                                                            //     break;
                                                            // }
                                                            $count++;
                                                        } ?>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">SUMMARY BY THICKNESS</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li>
                                            <a href="#portlet_comments_1" data-toggle="tab"> Inventory </a>
                                        </li>
                                        <li class="active">
                                            <a href="#portlet_comments_2" data-toggle="tab"> Manufactured </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="portlet_comments_1">
                                           <div class="maxsizecontainer">
                                               <div class="portlet-body">
                                                    <div class="mt-element-list">
                                                        <div class="mt-list-container list-simple ext-1 group">
                                                            <?php foreach ($sizesummary as $key => $value) { ?>
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#invisize<?php echo $value['meta_id'];?>" aria-expanded="false">
                                                                    <div class="list-toggle <?php echo count($value['allsku']) > 0 ? 'bg-blue-dark bg-font-blue-dark' : 'bg-blue-oleo bg-font-blue-oleo'?>"> <?php echo $value['meta_name']; ?>
                                                                        <span class="badge badge-default pull-right bg-white font-green bold"><?php echo count($value['allsku']); ?></span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="invisize<?php echo $value['meta_id'];?>" aria-expanded="true" style="">
                                                                    <?php if (!empty($value['allsku'])): ?>
                                                                        <ul>
                                                                            <?php foreach ($value['allsku'] as $skukey => $skuvalue) { ?>
                                                                                <?php
                                                                                    $productpersku = $products::getproductpersku($skuvalue['sku_id']);
                                                                                ?>
                                                                                <li class="mt-list-item" style="padding:0;">
                                                                                    <div class="panel panel-default" style="margin: 0;">
                                                                                        <div class="panel-heading">
                                                                                            <span class="badge badge-danger"> <?php echo count($productpersku); ?> </span>
                                                                                            <?php echo $skuvalue['sku_unique']; ?> [<?php echo $metaData::getspecificmetavalue($skuvalue['sku_color']); ?>]
                                                                                        </div>
                                                                                        <?php if (count($productpersku) > 0): ?>
                                                                                            <div class="panel-body text-right">
                                                                                                <a href="<?php echo $baseline; ?>/index.php?page=stats&sku=<?php echo $skuvalue['sku_id']; ?>" target="_blank" class="btn blue"> Go to Status
                                                                                                    <i class="fa fa-angle-right"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <table class="table table-hover table-light">
                                                                                                <thead>
                                                                                                    <tr class="uppercase">
                                                                                                        <th> Coil ID </th>
                                                                                                        <th> Coil No. </th>
                                                                                                        <th> KG/LM </th>
                                                                                                        <th> &nbsp; </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php foreach ($productpersku as $prodkey => $prodvalue) { ?>
                                                                                                        <tr>
                                                                                                            <td> <?php echo $prodvalue['prod_id']; ?> </td>
                                                                                                            <td> <?php echo $prodvalue['prod_coil_number']; ?> </td>
                                                                                                            <td> <?php echo number_format((float) $prodvalue['prod_nw'], 2, '.', ','); ?>/<?php echo number_format((float) $prodvalue['prod_lm'], 2, '.', ','); ?> </td>
                                                                                                            <td>
                                                                                                                <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $prodvalue['prod_id']; ?>" target="_blank" title="View Product" class="btn btn-icon-only green">
                                                                                                                    <i class="fa fa-send"></i>
                                                                                                                </a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    <?php } ?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        <?php else: ?>
                                                                                            <div class="panel-body" style="text-align: center;">No Products for this color</div>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    <?php else: ?>
                                                                        <div class="alert alert-info" style="margin:0;">
                                                                            <strong>No SKU has been created yet</strong>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="tab-pane active" id="portlet_comments_2">
                                            <div class="maxsizecontainer">
                                               <div class="portlet-body">
                                                    <div class="mt-element-list">
                                                        <div class="mt-list-container list-simple ext-1 group">
                                                            <?php foreach ($sizesummary as $key => $value) { ?>
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#manusize<?php echo $value['meta_id'];?>" aria-expanded="false">
                                                                    <div class="list-toggle <?php echo count($value['allsku']) > 0 ? 'bg-dark bg-font-dark' : 'bg-blue-oleo bg-font-blue-oleo'?>"> <?php echo $value['meta_name']; ?>
                                                                        <span class="badge badge-default pull-right bg-white font-green bold"><?php echo count($value['allsku']); ?></span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="manusize<?php echo $value['meta_id'];?>" aria-expanded="true" style="">
                                                                    <?php if (!empty($value['allsku'])): ?>
                                                                        <ul>
                                                                            <?php foreach ($value['allsku'] as $skukey => $skuvalue) { ?>
                                                                                <?php
                                                                                    $manufdata = $products::getmanufacurespersku($skuvalue['sku_id']);
                                                                                ?>
                                                                                <li class="mt-list-item" style="padding:0;">
                                                                                    <div class="panel panel-default" style="margin: 0;">
                                                                                        <div class="panel-heading">
                                                                                            <span class="badge badge-danger"> <?php echo count($manufdata); ?> </span>
                                                                                            <?php echo $skuvalue['sku_unique']; ?> [<?php echo $metaData::getspecificmetavalue($skuvalue['sku_color']); ?>]
                                                                                        </div>
                                                                                        <?php if (count($manufdata) > 0): ?>
                                                                                            <div class="panel-body text-right">
                                                                                                <a href="<?php echo $baseline; ?>/index.php?page=stats&sku=<?php echo $skuvalue['sku_id']; ?>" target="_blank" class="btn blue"> Go to Status
                                                                                                    <i class="fa fa-angle-right"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <?php
                                                                                                    $manuinfo = $products::getnamufacturedbysku($skuvalue['sku_id']);
                                                                                                    $totalmanu = $products::gettotallmpermanu($manuinfo);
                                                                                                ?>
                                                                                            <div class="panel-body" data-totalmanu = "<?php echo $totalmanu; ?>">
                                                                                                
                                                                                                <?php foreach ($manuinfo as $key => $value) { ?>
                                                                                                    <?php $dpercent = ($value['totallm']/$totalmanu) * 100; ?>
                                                                                                    <div>
                                                                                                        <h5><?php echo $value['meta_name']; ?> <span class="small"><?php echo $value['totallm']; ?>m out of <?php echo $totalmanu; ?>m</span></h5>
                                                                                                        <div class="progress progress-striped active">
                                                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo number_format((float) $dpercent, 2, '.', ''); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float) $dpercent, 2, '.', ''); ?>%">
                                                                                                                <span style="color: black;display: inline-block;"> <?php echo number_format((float) $dpercent, 2, '.', ''); ?>% </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="panel-body" style="text-align: center;">No Products for this color</div>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    <?php else: ?>
                                                                        <div class="alert alert-info" style="margin:0;">
                                                                            <strong>No SKU has been created yet</strong>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Summary by Color</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#color_tab_1" data-toggle="tab"> Inventory </a>
                                        </li>
                                        <li >
                                            <a href="#color_tab_2" data-toggle="tab"> Manufactured </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content active">
                                        <div class="tab-pane active" id="color_tab_1">
                                           <div class="maxsizecontainer">
                                               <div class="portlet-body">
                                                    <div class="mt-element-list">
                                                        <div class="mt-list-container list-simple ext-1 group">
                                                            <?php foreach ($colorsummary as $key => $value) { ?>
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#invisize<?php echo $value['meta_id'];?>" aria-expanded="false">
                                                                    <div class="list-toggle <?php echo count($value['allsku']) > 0 ? 'bg-blue-dark bg-font-blue-dark' : 'bg-blue-oleo bg-font-blue-oleo'?>"> <?php echo $value['meta_name']; ?>
                                                                        <span class="badge badge-default pull-right bg-white font-green bold"><?php echo count($value['allsku']); ?></span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="invisize<?php echo $value['meta_id'];?>" aria-expanded="true" style="">
                                                                    <?php if (!empty($value['allsku'])): ?>
                                                                        <ul>
                                                                            <?php foreach ($value['allsku'] as $skukey => $skuvalue) { ?>
                                                                                <?php
                                                                                    $productpersku = $products::getproductpersku($skuvalue['sku_id']);
                                                                                ?>
                                                                                <li class="mt-list-item" style="padding:0;">
                                                                                    <div class="panel panel-default" style="margin: 0;">
                                                                                        <div class="panel-heading">
                                                                                            <span class="badge badge-danger"> <?php echo count($productpersku); ?> </span>
                                                                                            <?php echo $skuvalue['sku_unique']; ?> [<?php echo $metaData::getspecificmetavalue($skuvalue['sku_size']); ?>]
                                                                                        </div>
                                                                                        <?php if (count($productpersku) > 0): ?>
                                                                                            <div class="panel-body text-right">
                                                                                                <a href="<?php echo $baseline; ?>/index.php?page=stats&sku=<?php echo $skuvalue['sku_id']; ?>" target="_blank" class="btn blue"> Go to Status
                                                                                                    <i class="fa fa-angle-right"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <table class="table table-hover table-light">
                                                                                            <thead>
                                                                                                <tr class="uppercase">
                                                                                                    <th> Coil ID </th>
                                                                                                    <th> Coil No. </th>
                                                                                                    <th> KG/LM </th>
                                                                                                    <th> &nbsp; </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($productpersku as $prodkey => $prodvalue) { ?>
                                                                                                    <tr>
                                                                                                        <td> <?php echo $prodvalue['prod_id']; ?> </td>
                                                                                                        <td> <?php echo $prodvalue['prod_coil_number']; ?> </td>
                                                                                                        <td> <?php echo number_format((float) $prodvalue['prod_nw'], 2, '.', ','); ?>/<?php echo number_format((float) $prodvalue['prod_lm'], 2, '.', ','); ?> </td>
                                                                                                        <td>
                                                                                                            <a href="<?php echo $baseline; ?>/index.php?page=raw_material&action=raw_manipulate&id=<?php echo $prodvalue['prod_id']; ?>" target="_blank" title="View Product" class="btn btn-icon-only green">
                                                                                                                <i class="fa fa-send"></i>
                                                                                                            </a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                <?php } ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <?php else: ?>
                                                                                            <div class="panel-body" style="text-align: center;">No Products for this size</div>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    <?php else: ?>
                                                                        <div class="alert alert-info" style="margin:0;">
                                                                            <strong>No SKU has been created yet</strong>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="tab-pane" id="color_tab_2">
                                            <div class="maxsizecontainer">
                                               <div class="portlet-body">
                                                    <div class="mt-element-list">
                                                        <div class="mt-list-container list-simple ext-1 group">
                                                            <?php foreach ($colorsummary as $key => $value) { ?>
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#manusize<?php echo $value['meta_id'];?>" aria-expanded="false">
                                                                    <div class="list-toggle <?php echo count($value['allsku']) > 0 ? 'bg-dark bg-font-dark' : 'bg-blue-oleo bg-font-blue-oleo'?>"> <?php echo $value['meta_name']; ?>
                                                                        <span class="badge badge-default pull-right bg-white font-green bold"><?php echo count($value['allsku']); ?></span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="manusize<?php echo $value['meta_id'];?>" aria-expanded="true" style="">
                                                                    <?php if (!empty($value['allsku'])): ?>
                                                                        <ul>
                                                                            <?php foreach ($value['allsku'] as $skukey => $skuvalue) { ?>
                                                                                <?php
                                                                                    $manufdata = $products::getmanufacurespersku($skuvalue['sku_id']);
                                                                                ?>
                                                                                <li class="mt-list-item" style="padding:0;">
                                                                                    <div class="panel panel-default" style="margin: 0;">
                                                                                        <div class="panel-heading">
                                                                                            <span class="badge badge-danger"> <?php echo count($manufdata); ?> </span>
                                                                                            <?php echo $skuvalue['sku_unique']; ?> [<?php echo $metaData::getspecificmetavalue($skuvalue['sku_size']); ?>]
                                                                                        </div>
                                                                                        <?php if (count($manufdata) > 0): ?>
                                                                                            <div class="panel-body text-right">
                                                                                                <a href="<?php echo $baseline; ?>/index.php?page=stats&sku=<?php echo $skuvalue['sku_id']; ?>" target="_blank" class="btn blue"> Go to Status
                                                                                                    <i class="fa fa-angle-right"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <?php
                                                                                                    $manuinfo = $products::getnamufacturedbysku($skuvalue['sku_id']);
                                                                                                    $totalmanu = $products::gettotallmpermanu($manuinfo);
                                                                                                ?>
                                                                                            <div class="panel-body" data-totalmanu = "<?php echo $totalmanu; ?>">
                                                                                                
                                                                                                <?php foreach ($manuinfo as $key => $value) { ?>
                                                                                                    <?php $dpercent = ($value['totallm']/$totalmanu) * 100; ?>
                                                                                                    <div>
                                                                                                        <h5><?php echo $value['meta_name']; ?> <span class="small"><?php echo $value['totallm']; ?>m out of <?php echo $totalmanu; ?>m</span></h5>
                                                                                                        <div class="progress progress-striped active">
                                                                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo number_format((float) $dpercent, 2, '.', ''); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float) $dpercent, 2, '.', ''); ?>%">
                                                                                                                <span style="color: black;display: inline-block;"> <?php echo number_format((float) $dpercent, 2, '.', ''); ?>% </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="panel-body" style="text-align: center;">No Products for this size</div>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    <?php else: ?>
                                                                        <div class="alert alert-info" style="margin:0;">
                                                                            <strong>No SKU has been created yet</strong>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php } ?>
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
                    <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-directions font-green hide"></i>
                                        <span class="caption-subject bold font-dark uppercase "> Shipment Details</span>
                                        <span class="caption-helper"> Schedule and Timeline</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <?php $getupship = $products::getupship(); ?>
                                    <?php if (!empty($getupship)): ?>
                                        <div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="100">
                                            <div class="timeline">
                                                <div class="events-wrapper">
                                                    <div class="events">
                                                        <ol>
                                                            <?php foreach ($getupship as $key => $value) {
                                                                $myDateTime = DateTime::createFromFormat('Y-m-d', $value['basedate']);
                                                                $newDateString = $myDateTime->format('d/m/Y');

                                                                $getMonth = $myDateTime->format('M');
                                                                $getDay = $myDateTime->format('j');
                                                                $getYear = $myDateTime->format('Y');
                                                                ?>
                                                                <li>
                                                                    <a href="#0" data-date="<?php echo $newDateString; ?>" class="border-after-red bg-after-red<?php echo ($key == 0 ? ' selected' : ''); ?>"><?php echo $getDay; ?> <?php echo $getMonth; ?></a>
                                                                </li>
                                                            <?php } ?>
                                                        </ol>
                                                        <span class="filling-line bg-red" aria-hidden="true"></span>
                                                    </div>
                                                    <!-- .events -->
                                                </div>
                                                <!-- .events-wrapper -->
                                                <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                                    <li>
                                                        <a href="#0" class="prev inactive btn btn-outline red md-skip">
                                                            <i class="fa fa-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#0" class="next btn btn-outline red md-skip">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- .cd-timeline-navigation -->
                                            </div>
                                            <!-- .timeline -->
                                            <div class="events-content">
                                                <ol>
                                                    <?php foreach ($getupship as $subkey => $subvalue) {
                                                        $myDateTime = DateTime::createFromFormat('Y-m-d', $subvalue['basedate']);
                                                        $newDateString = $myDateTime->format('d/m/Y');

                                                        $getMonth = $myDateTime->format('F');
                                                        $getDay = $myDateTime->format('j');
                                                        $getYear = $myDateTime->format('Y');
                                                    ?>
                                                    <li class="<?php echo ($subkey == 0 ? 'selected' : ''); ?>" data-date="<?php echo $newDateString; ?>">
                                                        <?php foreach ($subvalue['details'] as $key => $value) { ?>
                                                            <div class="mt-title">
                                                                <h2 class="mt-content-title">From: <?php echo $supplier::getsuppliernamebyid($value['ship_supplier']); ?></h2>
                                                            </div>
                                                            <div class="mt-author">
                                                               <!--  <div class="mt-avatar">
                                                                    <img src="<?php echo $baseline; ?>/assets/pages/media/users/avatar80_3.jpg" />
                                                                </div> -->
                                                                <div class="mt-author-name">
                                                                     <a href="javascript:;" class="font-blue-madison">Estimated Time Arrival</a>
                                                                </div>
                                                                <div class="mt-author-datetime font-grey-mint"><?php echo $getDay; ?> <?php echo $getMonth; ?> <?php echo $getYear; ?></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="mt-content border-grey-steel">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="alert alert-success">
                                                                            <strong>Expected Total LM: </strong> <?php echo $value['ship_total_lm']; ?> m
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="alert alert-success">
                                                                            <strong>Expected Total NW: </strong> <?php echo $value['ship_total_nw']; ?> kg
                                                                        </div>
                                                                    </div>
                                                                    <br class="clear">
                                                                </div>
                                                                <p><?php echo $value['ship_manifest']; ?> </p>
                                                                <div class="btn btn-circle red btn-outline">Reference #: <span class="copyme"><?php echo $value['ship_reference']; ?></span></div>
                                                            </div>
                                                        <?php } ?>
                                                    </li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                            <!-- .events-content -->
                                        </div>
                                    <?php else: ?>
                                        <div style="text-align:center;">
                                            No Shippment yet
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>