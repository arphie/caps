
<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
         <?php
            $clientinfo = $client::getclientinfobyid($_GET['clientid']);
            $clientypeinfo = $client::getclienttype($clientinfo['client_discount']);
            $datadiscount = unserialize($clientypeinfo['prof_base']);

            $distojson = json_encode($datadiscount);

            $clients = $client::getclient();
        ?>
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Add Packing List
                   <!--  <small>Bla Bla bLa</small> -->
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
        <div class="">

                <div class="row onwaygetclientdisocunt">
                    <div class="col-md-4">
                        <form action="" method="get">
                        <div class="portlet box blue-hoki">

                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Client Information </div>
                            </div>

                                <div class="portlet-body">
                                    <div class="form-group form-md-line-input has-info">
                                        <select class="form-control" id="plclientname" name="clientid">
                                            <option value=""></option>
                                            <?php foreach ($clients as $key => $value) { ?>
                                                <option value="<?php echo $value['client_id']; ?>" data-discount='<?php echo json_encode(unserialize($value['client_discount'])); ?>' data-sku="<?php echo $value['client_sku']; ?>" data-address="<?php echo $value['client_address']; ?>"><?php echo $value['client_name']; ?></option>
                                            <?php } ?>
                                            <!-- <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option> -->
                                        </select>
                                        <label for="plclientname">Client Information</label>
                                    </div>
                                    <div class="form-group form-md-line-input font-black">
                                        <input type="text" class="form-control" placeholder="Client Name" id="clientsku" value="<?php echo @$clientinfo['client_sku']; ?>" disabled>
                                        <label for="form_control_1">Client SKU</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <div class="form-group form-md-line-input font-black">
                                        <input type="text" class="form-control" placeholder="Client Address" id="clientaddress" value="<?php echo @$clientinfo['client_address']; ?>" disabled>
                                        <label for="form_control_1">Client Address</label>
                                        <span class="help-block">Some help goes here...</span>
                                    </div>
                                    <input type="hidden" id="ispage" name="page" value='<?php echo $_GET['page']; ?>'>
                                    <input type="hidden" id="isdisdata" name="isdisdata" value="">
                                    <input type="submit" name="selected_client" value="Select Client">
                                </div>

                        </div>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <form action="" method="post">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <!-- <div class="caption">
                                    <i class="fa fa-gift"></i>Orders </div> -->
                                <div class="actions">
                                    <a href="javascript:;" id="placeholderdneworder" class="btn btn-default btn-sm">
                                        <i class="fa fa-cart-plus"></i> Add New Panel </a>
                                    <a href="javascript:;" id="" class="btn btn-default btn-sm">
                                        <i class="fa fa-cart-plus"></i> Add New Bended </a>
                                    <a href="javascript:;" id="" class="btn btn-default btn-sm">
                                        <i class="fa fa-cart-plus"></i> Add New Hardware </a>
                                    <a href="javascript:;" id="" class="btn btn-default btn-sm">
                                        <i class="fa fa-cart-plus"></i> Other Charges </a>
                                   <!--  <a href="javascript:;" class="btn btn-default btn-sm">
                                        <i class="fa fa-plus"></i> Add </a> -->
                                </div>
                            </div>
                            <div id="orderplaceholder" class="portlet-body" data-counter="0">
                                <?php $getprofiles = $metaData::getmetavalues('category'); ?>
                                <?php $getcolor = $metaData::getmetavalues('color'); ?>
                                <div class="hideme origcopybase getonloader" data-itemcounter="0">
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i> Order </div>
                                        </div>
                                        <div class="portlet-body doragebolt">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-info dprofileselector">
                                                    <select class="form-control" id="productprofile" name="profileitem">
                                                        <option value=""></option>
                                                        <?php foreach ($getprofiles as $key => $value) { ?>
                                                            <option value="<?php echo $value['meta_id']; ?>" data-baseprod='<?php echo $value['meta_id']; ?>'><?php echo $value['meta_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="productprofile">Profiles</label>
                                                    <input type="hidden" id="dbaseprice" name="dbaseprice">
                                                    <input type="hidden" id="dbaseprofile" name="dbaseprofile">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-info">
                                                    <select class="form-control" id="colorofitem" name="colorofitem">
                                                        <option value=""></option>
                                                        <?php foreach ($getcolor as $key => $value) { ?>
                                                            <option value="<?php echo $value['meta_id']; ?>"><?php echo $value['meta_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="colorofitem">Color</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <?php $getsizes = $metaData::getmetavalues('size'); ?>
                                                <div class="form-group form-md-line-input has-info">
                                                    <select class="form-control" id="getsizeofprofile" name="ordersize">
                                                        <option value=""></option>
                                                        <?php foreach ($getsizes as $key => $value) { ?>
                                                            <option value="<?php echo $value['meta_id']; ?>"><?php echo $value['meta_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="getsizeofprofile">Sizes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" id="superdupertotal" name="superdupertotal" value="0" class="form-control" id="form_control_1" placeholder="" readonly="readonly">
                                                    <label for="form_control_1">Total Order</label>
                                                    <!-- <span class="help-block">Some help goes here...</span> -->
                                                </div>
                                            </div>
                                            <br class="clear">
                                            <div id="addorderitems">
                                                <div class="hideme originalitems orderitem">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-md-line-input">
                                                            <input type="number" id="dolenth" value="0" class="form-control" id="form_control_1" placeholder="" step=".01">
                                                            <label for="form_control_1">Length</label>
                                                            <!-- <span class="help-block">Some help goes here...</span> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-md-line-input">
                                                            <input type="number" id="length" value="0" class="form-control" id="form_control_1" placeholder="" step=".01">
                                                            <label for="form_control_1">Pieces</label>
                                                            <!-- <span class="help-block">Some help goes here...</span> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-md-line-input">
                                                            <input type="text" id="baseprice" value="0" class="form-control" id="form_control_1" placeholder="" readonly="readonly">
                                                            <label for="form_control_1">Price</label>
                                                            <!-- <span class="help-block">Some help goes here...</span> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-md-line-input">
                                                            <input type="text" id="dtotalprice" class="form-control getparttotal" id="form_control_1" placeholder="" readonly="readonly">
                                                            <label for="form_control_1">Total</label>
                                                            <!-- <span class="help-block">Some help goes here...</span> -->
                                                        </div>
                                                    </div>
                                                    <br class="clear">
                                                </div>
                                                <a href="#" class="btn blue-hoki btn-outline sbold uppercase" id="addnewrow">Add Order Specifications</a>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="packingitems" data-countspecs="0"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listofordes"></div>
                            </div>

                        </div>
                    </div>
                    <br class="clear">
                    <div class="form-actions noborder">
                        <input type="hidden" name="clientid" value="<?php echo @$_GET['clientid']; ?>">
                        <input type="submit" class="btn blue" name="Submit">
                        <a href="<?php echo $baseline; ?>/index.php?page=all_clients" class="btn default">Cancel</a>
                    </div>
                    </form>
                </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var dprofile = ""; // add profiles
        var dsize = ""; // add sizes

        var dinformation = <?php echo $distojson; ?>;

        $('#productprofile').on('change', function() {
          console.log( "th8sdf");
        });

        $('.listofordes').on('change', '#productprofile', function (e) {
            dprofile = this.value;
        });

        $('.listofordes').on('change', '#getsizeofprofile', function (e) {
            dsize = this.value;
            $ddiscount = "";
            var vitem = "baseprice_"+dprofile+"_"+dsize;
            $.each( dinformation, function( key, value ) {
                if (vitem == key) {
                    $ddiscount = value;
                    return false;
                }
            });


            // $(this).parents('.orderitem').find('#baseprice').val($ddiscount);
        });
        
    });

    $(document).on('click', '.orderitemgen #addnewrow', function(e){
            e.preventDefault();
            var dinformation = <?php echo $distojson; ?>;
            console.log(dinformation);
            var dprofile = $(this).parents('.doragebolt').find('#productprofile').val();
            var dsize = $(this).parents('.doragebolt').find('#getsizeofprofile').val();

            

            if (dprofile != "" && dsize != "") {
                var ddiscount = 0;
                var vitem = "baseprice_"+dprofile+"_"+dsize; // initialize key
                $.each( dinformation, function( key, value ) {
                    if (vitem == key) {
                        ddiscount = value;
                        return false;
                    }
                });

                console.log(vitem);
                console.log(ddiscount);

                var packingcount = parseInt($(this).parents('.orderitemgen').find(".packingitems").attr('data-countspecs')) + 1;
                $(this).parents('.orderitemgen').find(".packingitems").attr('data-countspecs', packingcount);

                // var doriginalfields = $(this).parents("#addorderitems").find(".originalitems").clone().removeClass('hideme').removeClass('originalitems').attr('id', 'orderspecs_'+packingcount).appendTo($(this).parents(".portlet-body").find(".packingitems"));
                $(this).parents("#addorderitems").find(".originalitems").clone().removeClass('hideme').removeClass('originalitems').attr('id', 'orderspecs_'+packingcount).appendTo($(this).parents(".doragebolt").find(".packingitems"));
                var ordercount = $(this).parents(".getonloader").attr('data-ordernum');

                $(this).parents(".doragebolt").find("#orderspecs_"+packingcount+" #getsizeofprofile").attr('name', 'stims['+ordercount+']['+packingcount+'][getsizeofprofile]');
                $(this).parents(".doragebolt").find("#orderspecs_"+packingcount+" #dolenth").attr('name', 'stims['+ordercount+']['+packingcount+'][dolenth]');
                $(this).parents(".doragebolt").find("#orderspecs_"+packingcount+" #length").attr('name', 'stims['+ordercount+']['+packingcount+'][length]');
                $(this).parents(".doragebolt").find("#orderspecs_"+packingcount+" #baseprice").attr('name', 'stims['+ordercount+']['+packingcount+'][baseprice]').val(ddiscount);
                $(this).parents(".doragebolt").find("#orderspecs_"+packingcount+" #dtotalprice").attr('name', 'stims['+ordercount+']['+packingcount+'][dtotalprice]');

            } else {
                console.log('no selection was selected');
            }

            
        });
</script>
