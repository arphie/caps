$(document).ready(function(){

    var now = new Date(),
    minDate = now.toISOString().substring(0,10);

    $('#pickdate').prop('max', minDate);

    $(".finishedprodbutton a").click(function(e){
        e.preventDefault();
        $(".onfproductcount").hide("fast");
        $('.categoryfinallist li').removeClass('active');
        $(this).parents('li').addClass('active');
        $onlink = $(this).attr('href');
        $(".confirmbutton").attr('href', $onlink);
        $(".dprodcat").text($(this).parents('li').find('.finishedprodname').text());
        $(".onfproductcount").show("slow");
    });

    $('.addorder').click(function(e){ // to add order units
        e.preventDefault();

        $(".ontounit.baseunit").clone().appendTo(".thelistoforders");
        var dcountercount = parseInt($(".sxcounter").attr('data-count')) + 1;
        $(".sxcounter").attr('data-count', dcountercount);

        $(".thelistoforders > .ontounit").removeClass("ontounit").addClass('item'+ dcountercount).find('.orderunittitle').text('Order Unit ' + dcountercount);
        $(".item" + dcountercount + " .orderplaceunit").attr({'id' : 'orderunit' + dcountercount, 'data-ordernum' : dcountercount}).removeClass('orderplaceunit');
        $(".item"+ dcountercount).attr('data-ordernumberx', dcountercount);
        $(".item"+ dcountercount +" .onremarks textarea").attr('name', 'orderdata['+dcountercount+'][remarks]');

        console.log(dcountercount);

    });

    // BOF Modal Buttons

    $('.getmaterialid').click(function(e){ // action for "USE MATERIAL"
        e.preventDefault();
        console.log($(this).attr('data-materialid'));

        $(this).parents(".onmodalcontents").find('.onstep1').addClass('onstephide').next().removeClass('onstephide');
        $(this).parents(".modalbase").find('.mdtostep1').removeClass('active').addClass('done').next().addClass('active');

        $('.modsuperinformation .dmaterialtype').val($(this).attr('data-materialid'));


        $('.modsuperinformation .pmaterialname').val($(this).parents('.gradeX').find('.materialcolor').text());
        $('.modsuperinformation .pmaterialsize').val($(this).parents('.gradeX').find('.materialsize').text());
        // console.log($(this).parents('.gradeX').find('.materialcolor').text());
    });

    $(".dmodalnav .modprev").click(function(e){ // action for "Previous" button on modal
        e.preventDefault();
        $(this).parents(".onmodalcontents").find('.onstep1').removeClass('onstephide').next().addClass('onstephide');
        $(this).parents(".modalbase").find('.mdtostep1').addClass('active').removeClass('done').next().removeClass('active');
    });

    $('.modprodopt').on('change', function(){ // action for change of product dropdown
        // console.log($(this).val());
        var dselectedpart = $(this).val();
        if (dselectedpart != "") {
            $(".addoptioninner").show("slow");
        } else {
            $(".addoptioninner").hide("slow");
        }

        $('.modsuperinformation .dproducttype').val(dselectedpart);
        $('.modsuperinformation .pproductname').val($(this).find('option:selected').text());
        // console.log($(this).find('option:selected').text());


    });

    // BOF Placing Order
    $('.placeordernow').click(function(e){
        e.preventDefault();
        console.log("here");
        swal({
            title: "Are You Sure?",
            text: "Please confirm if you want to Proceed with the Transaction?",
            type: "warning",
            showCancelButton: true
        },function(isConfirm){
            if (isConfirm) {
                $('#placeorder').submit();
            }
        });


    });
    // EOF Placing Order

    $("#select_sku_opt").change(function(){
        console.log($(this).find('option:selected').attr('data-color'));

        $("#sku_prodname").val($(this).find('option:selected').attr('data-name'));
        $("#sku_prodcolor").val($(this).find('option:selected').attr('data-color'));
        $("#sku_prodsize").val($(this).find('option:selected').attr('data-size'));
    });


    // BOF save my profile detials
    $('.tosavemyprofile').click(function(e){
        e.preventDefault();

        swal({
            title: "Are You Sure?",
            text: "Please confirm if you want to update your Personal Details",
            type: "warning",
            showCancelButton: true
        },function(isConfirm){
            if (isConfirm) {
                $("#myprofiledetails").submit();
            }
        });
    });
    // EOF save my profile details

    $("#editrawdetails").click(function(e){
        e.preventDefault();

        console.log("here");
        $('.skuselectonedit').show('fast').find(".font-dark").removeClass("font-dark").addClass("has-info");
        $(".fullrawspecs").find(".font-dark").removeClass("font-dark").addClass("has-info").find("input, textarea, select").removeAttr('disabled');
        $(this).hide();
        $('#dsaverawdata').show();
    });

    $('#dsaverawdata').click(function(){
        $('#editrawform').submit();
    });

    $(".supaccord li .dtitle").click(function(e){
        e.preventDefault();
        if($(this).hasClass('open')){
            $(this).next().hide('slow');
            $(this).removeClass('open');
        } else {
            $("ul.supaccord li .dcontent").hide('slow');
            $("ul.supaccord li .dtitle").removeClass('open');
            $(this).addClass('open');
            $(this).next().show('slow');
        }

    });

    $("#submitdefaultdiscount").click(function(e){
        e.preventDefault();
        $("#default_discount_form").submit();
    });

    $("#plclientname").on('change', function(){
        // console.log($(this).find(':selected').attr('data-discount'));

        $("#clientsku").val($(this).find(':selected').attr('data-sku'));
        $("#clientaddress").val($(this).find(':selected').attr('data-address'));
        $("#ddiscount").val($(this).find(':selected').attr('data-discount'));

        $(this).attr('readonly', true);
    });

    $("#placeholderdneworder").click(function(e){
        e.preventDefault();

        var ordercounter = parseInt($("#orderplaceholder").attr('data-counter')) + 1;
        $("#orderplaceholder").attr('data-counter', ordercounter);

        $(".origcopybase").clone().removeClass('hideme').addClass('orderitemgen').removeClass('origcopybase').attr({'id' : 'orderitem_'+ordercounter, 'data-ordernum' : ordercounter}).appendTo(".listofordes");
        
        $("#orderitem_"+ordercounter).find('#productprofile').attr('name', 'ord['+ordercounter+'][profile]');
        $("#orderitem_"+ordercounter).find('#colorofitem').attr('name', 'ord['+ordercounter+'][color]');
        $("#orderitem_"+ordercounter).find('#getsizeofprofile').attr('name', 'ord['+ordercounter+'][size]');
        $("#orderitem_"+ordercounter).find('#superdupertotal').attr('name', 'ord['+ordercounter+'][finaltotal]');

    });


    var numItems = $('.dynawidth').length;
    console.log(numItems);

    var lendthoftitle = (100 * 2) + 90;
    var lengthofitems = parseInt(numItems) * 85;

    $(".tableplaceholder table").css('width', (lendthoftitle + lengthofitems)+'px' );

    $('.opinactive').click(function(e){
        e.preventDefault();
        // console.log($(this).attr('href'));
        $link = $(this).attr('href');
        swal({
            title: "Are You Sure?",
            text: "Please confirm if you want to Open this Coil",
            type: "warning",
            showCancelButton: true
        },function(isConfirm){
            if (isConfirm) {
                 window.location.href = $link;
            } else {
                e.preventDefault();
            }
        });


    });

    $(".coilopenme").click(function(e){
        console.log($(this).attr('data-oxval'));
        var gettab = $(this).attr('data-oxval');
        $(this).parents('.coilpconts').find('.active').removeClass('active');
        $(this).addClass('active');
        $('.ontotabs > div').hide('slow');
        $('.ontotabs > .'+gettab).show('slow');

        $('.totmw').find('.xopen').removeClass('xopen');
        $('.totmw > div').hide('slow');
        $('.totmw > .'+gettab).show('slow');

        $('.totlm').find('.xopen').removeClass('xopen');
        $('.totlm > div').hide('slow');
        $('.totlm > .'+gettab).show('slow');
    });

    $(".opencoilsclick").click(function(){
        $('.coildetailsbox').find('.active').removeClass('active');
        $('.coildetailsbox').find('.xopenll').addClass('active');

        $('.coildetailsbox').find('.ontotabs > div').hide('slow');
        $('.coildetailsbox').find('.ontotabs > .opopen').show('slow');

        $('.coildetailsbox').find('.totmw').find('.xopen').removeClass('xopen');
        $('.coildetailsbox').find('.totmw > div').hide('slow');
        $('.coildetailsbox').find('.totmw > .opopen').show('slow');

        $('.coildetailsbox').find('.totlm').find('.xopen').removeClass('xopen');
        $('.coildetailsbox').find('.totlm > div').hide('slow');
        $('.coildetailsbox').find('.totlm > .opopen').show('slow');
    });

    $(".availablecoilclick").click(function(){
        $('.coildetailsbox').find('.active').removeClass('active');
        $('.coildetailsbox').find('.xavailll').addClass('active');

        $('.coildetailsbox').find('.ontotabs > div').hide('slow');
        $('.coildetailsbox').find('.ontotabs > .opavailable').show('slow');

        $('.coildetailsbox').find('.totmw').find('.xopen').removeClass('xopen');
        $('.coildetailsbox').find('.totmw > div').hide('slow');
        $('.coildetailsbox').find('.totmw > .opavailable').show('slow');

        $('.coildetailsbox').find('.totlm').find('.xopen').removeClass('xopen');
        $('.coildetailsbox').find('.totlm > div').hide('slow');
        $('.coildetailsbox').find('.totlm > .opavailable').show('slow');
    });


    $(".gettotlm").text($('#gettotlm').val());
    $(".gettotnw").text($('#gettotnw').val());

    $(".clickbutcritical, .critcoilclick").click(function(){
        $(".listofmath > div").hide('slow');
        $(".listofmath .crit").show('slow');
    });

    $(".clickbutwarning, .lowcoilclick").click(function(){
        $(".listofmath > div").hide('slow');
        $(".listofmath .warn").show('slow');
    });

    $(".clickbutall").click(function(){
        $(".listofmath > div").hide('slow');
        $(".listofmath .all").show('slow');
    });

    $(".itemmanus .manuitem").click(function(){
        if ($(this).parents(".itemmanus").hasClass('openme')) {
            $(this).parents(".itemmanus").removeClass('openme').find(".innermanus").hide('slow');
        } else {
            $(".itemmanus").removeClass('openme').find(".innermanus").hide('slow');
            $(this).parents(".itemmanus").addClass('openme').find(".innermanus").show('slow');
        }
    });

    $('.confcloseship').click(function(e){
        e.preventDefault();
        $link = $(this).attr('href');
        swal({
            title: "Are You Sure?",
            text: "Please confirm if you want to Complete the shipment",
            type: "warning",
            showCancelButton: true,
            dangerMode: true,
        },function(isConfirm){
            if (isConfirm) {
                window.location.href = $link;
            } else {
                e.preventDefault();
            }
        });
    });

    $('.disabme').click(function(e){
        e.preventDefault();
        $link = $(this).attr('href');
        swal({
            title: "Are You Sure?",
            text: "Please confirm if you want to Disable User",
            type: "warning",
            showCancelButton: true,
            dangerMode: true,
        },function(isConfirm){
            if (isConfirm) {
                window.location.href = $link;
            } else {
                e.preventDefault();
            }
        });
    });

    $('.ensabme').click(function(e){
        e.preventDefault();
        $link = $(this).attr('href');
        swal({
            title: "Are You Sure?",
            text: "Please confirm if you want to Enable User",
            type: "warning",
            showCancelButton: true,
            dangerMode: true,
        },function(isConfirm){
            if (isConfirm) {
                window.location.href = $link;
            } else {
                e.preventDefault();
            }
        });
    });

    $('ul.dproflists li .titlebb').click(function(e){
        if ($(this).parent().hasClass('isopened')) {
            $(this).parent().removeClass('isopened');
            $(this).parent().find('.inneritems').hide('fast');
        } else {
            $(this).parent().addClass('isopened');
            $(this).parent().find('.inneritems').show('fast');
        }

    });

});

$(document).on('click', '.addremarks', function(e){ // action for add product order button
    e.preventDefault();
    $(this).parents(".baseunit").find(".onremarks").show('slow');
});

$(document).on('click', '.editplacement', function(e){
    $(this).hide('slow');
    $(this).parents(".baseactionss").find('.saveplacement').show('slow');

    $(this).parents(".baseunit").find(".xbasecount input").attr('type', 'text');

});

$(document).on('click', '.saveplacement', function(e){

    var totalorderitem = 0;
    $(this).parents(".baseunit").find(".xbasecount").each(function(){
        var numpiece = $(this).find('.xxnp').val();
        var numlinem = $(this).find('.xxlm').val();

        $(this).find(".npbse").text(numpiece);
        $(this).find(".lmbse").text(numlinem);
        $(this).find(".totlst").text((parseFloat(numlinem) * parseFloat(numpiece)).toFixed(2));
        totalorderitem = parseFloat(totalorderitem) + (parseFloat(numlinem) * parseFloat(numpiece));

    });

    var plustobaselm = $(this).parents(".baseunit").find(".totalbalue").text().replace('m', '');
    $("#final_raw_lm").val( parseFloat($("#final_raw_lm").val()) + parseFloat(plustobaselm));

    $(this).parents(".baseunit").find(".totalbalue").text(totalorderitem.toFixed(2) + "m");
    $("#final_raw_lm").val( (parseFloat($("#final_raw_lm").val()) - parseFloat(plustobaselm)).toFixed(2));


    $(this).parents(".baseactionss").find('.saveplacement').hide('slow');
    $(this).parents(".baseactionss").find('.editplacement').show('slow');
    $(this).parents(".baseunit").find(".xbasecount input").attr('type', 'hidden');
});

$(document).on('click', '.removeitem', function(e){ // action for add product order button
    e.preventDefault();

    var gettotal = $(this).parents(".orderitemx").find(".totallenx").val();
    var drawlength = $("#final_raw_lm").val();
    var drawnw = $("#final_raw_nw").val();
    var drawkglm = $("#dkglm").val();

    $("#final_raw_lm").val(parseFloat(drawlength) + parseFloat(gettotal));
    $("#final_raw_nw").val(parseFloat(drawnw) + (parseFloat(drawkglm) * parseFloat(gettotal)));
    // console.log(parseFloat(drawnw) + (parseFloat(drawkglm) * parseFloat(gettotal)));

    $(this).parents(".orderitemx").remove();
});

$(document).on('change', '#productprofile', function(){
    // console.log($(this).find(':selected').attr('data-baseprod'));

    var dtextofprofile = $(this).find(':selected').text();


    $(this).parents(".dprofileselector").find("#dbaseprice").val($(this).find(':selected').attr('data-baseprod'));
    $(this).parents(".dprofileselector").find("#dbaseprofile").val(dtextofprofile.replace(/\s/g, '').toLowerCase());

    $(this).attr('readonly', true);
});

$(document).on({
    blur: function() {
        if ($(this).is('[readonly]')) {

        } else {
            console.log('out');
               var pieces = $(this).val();
               var baseprice = $(this).parents(".orderitem").find('#baseprice').val();
               // var basediscount = $(this).parents(".orderitem").find('#dispcount').val();
               var length = $(this).parents(".orderitem").find('#dolenth').val();

               // var pricepermeter = baseprice * (basediscount / 100);
               //
               // var totalgower = length * pieces;
               // var totalprice = totalgower * baseprice;
               //  var supertotal = totalprice - (totalprice * (basediscount / 100));
               //
               // console.log(totalprice * (basediscount / 100));

               supertotal = (pieces * length) * baseprice;

               $(this).parents(".orderitem").find('#dtotalprice').val(supertotal);

               console.log(supertotal);



               var ordertotalsuper = parseInt($(this).parents(".doragebolt").find("#superdupertotal").val());
               $(this).parents(".doragebolt").find("#superdupertotal").val(ordertotalsuper + supertotal);

               // $(this).attr('readonly', true);
        }

    }
}, '#length');






$(document).on('click', '.selectmaterialonthis', function(e){
    e.preventDefault();

    var listofdata = $.parseJSON($(this).next().val());
    var contclass = 'material'+listofdata.prod_id;
    var getopenblock = $(".origlistbart .origmart").clone().addClass(contclass);

    var issize = $(this).parents('.materialparent').find('.materialsize').text();
    var iszolor = $(this).parents('.materialparent').find('.materialcolor').text();

    console.log(listofdata);
    $("#selectrawmodal").modal('hide');
    swal({
        title: "Are You Sure?",
        text: "Are you sure you want to use this coil?",
        type: "info",
        showCancelButton: true
    },function(isConfirm){
        if (isConfirm) {


            $(".materiallist").append(getopenblock);
            $("."+contclass + " .rawtitle").text(listofdata.prod_coil_number);
            $("."+contclass + " #raw_color").val(iszolor);
            $("."+contclass + " #raw_size").val(issize);
            $("."+contclass + " #raw_coil_number").val(listofdata.prod_coil_number);
            $("."+contclass + " #raw_sku").val(listofdata.prod_sku);
            $("."+contclass + " #raw_nw").val(listofdata.prod_nw);
            $("."+contclass + " #raw_lm").val(listofdata.prod_lm);

            var getrawnw = parseInt($(".finalcomponents #final_raw_nw").val());
            var getrawlm = parseInt($(".finalcomponents #final_raw_lm").val());

            $(".finalcomponents #final_raw_nw").val(getrawnw + parseFloat(listofdata.prod_nw));
            $(".finalcomponents #final_raw_lm").val(getrawlm + parseFloat(listofdata.prod_lm));

            $(".finalcomponents #basenw").val(getrawnw + parseFloat(listofdata.prod_nw));
            $(".finalcomponents #baselm").val(getrawlm + parseFloat(listofdata.prod_lm));


            $(this).parents('.materialparent').hide();


            // $('.addorder').show('slow');
            $(".modprodopt").prop("disabled", false);

            $(".hideonselectraw").hide('slow');

            $(".finalcomponents #kglm").val(listofdata.prod_kglm);
            $(".finalcomponents #raw_id").val(listofdata.prod_id);
        }
    });

});

$(document).on('change', '.modprodopt', function(e){
    e.preventDefault();

    if ($(this).children("option:selected").val() != "") {
        $(".addorder").show('slow');
    } else {
        $(".addorder").hide('slow');
    }
});

$(document).on('click', '.addbuttonbase a', function(e){
    e.preventDefault();

    var numpiece = $(this).parents('.orderdatabase').find('#num_of_piece').val();
    var numlenth = $(this).parents('.orderdatabase').find('#len_of_cut').val();

    $(".orderontolist ul").append('<li class="actualorder"><div class="np">'+numpiece+'<input type="hidden" id="np" value="'+numpiece+'"></div><div class="nl">'+numlenth+'<input type="hidden" id="nl" value="'+numlenth+'"></div></li>');

    $(this).parents('.orderdatabase').find('#num_of_piece').val('');
    $(this).parents('.orderdatabase').find('#len_of_cut').val('');

    $(this).parents(".plusdetails").find(".ontoconfirm").show('slow');

});

$(document).on('click', '.modconfirmproduct', function(e){
    e.preventDefault();

    var doderfor = $(this).parents('#basicmodal').attr('data-fororderunit');


    var listoforder = [{}];

    $($(this).parents('.plusdetails').find('.orderontolist ul li.actualorder')).each(function( index ) {
        console.log($(this).find("#np").val());

        var ontobase = [{'np': $(this).find("#np").val(), 'nl': $(this).find("#nl").val()}];

        listoforder.push(ontobase);

    });

    var totallm = 0;
    var alllist = '';
     var counter = 0;
    $.each(listoforder, function( index, value ) {
      // console.log( index + ": " + value['np'] );

        if(!$.isEmptyObject(value)){
            counter = counter + 1;
            var appme = '<tr class="xbasecount">';
            appme += '<td class="nptos"><span class="npbse">'+value['0'].np+'</span> pcs <input type="hidden" class="xxnp" name="orderdata['+doderfor+'][orderval]['+counter+'][itemnp]" value="'+value['0'].np+'"></td>';
            appme += '<td class="lmtos"><span class="lmbse">'+value['0'].nl+'</span>m <input type="hidden" class="xxlm" name="orderdata['+doderfor+'][orderval]['+counter+'][itemnl]" value="'+value['0'].nl+'"></td>';
            appme += '<td class="totxx"><span class="totlst">'+(parseFloat(value['0'].np) * parseFloat(value['0'].nl)).toFixed(2)+'</span>m</td>';
            appme += '</tr>';

            alllist += appme;
            totallm = totallm + parseFloat((parseFloat(value['0'].np) * parseFloat(value['0'].nl)).toFixed(2));

        }
    });

    if( parseFloat($(".finalcomponents #final_raw_lm").val()) >= totallm ){
        $('.item'+doderfor+" .ordercountainer table tbody").append(alllist);
        $('.item'+doderfor+" .totallm .totalbalue").text((totallm).toFixed(2) + "m");


        $(".finalcomponents #final_raw_lm").val((parseFloat($(".finalcomponents #final_raw_lm").val()) - totallm).toFixed(2));
        $(".finalcomponents #final_raw_nw").val((parseFloat($(".finalcomponents #final_raw_nw").val()) - (totallm * parseFloat($('.finalcomponents #kglm').val()))).toFixed(2));

        $('.item'+doderfor+" .addproductorder").hide('slow');

        $(".forwardallorder").show('slow');


    } else {
        swal({
            title: "Not Enough Length remaining!",
            text: "there is not enough material in the coil!",
            type: "error"
        }, function(){

        });
    }





    $("#basicmodal").find('.orderontolist ul li.actualorder').remove();
    $("#basicmodal").modal('hide');






});



$(document).on('click', '.thelistoforders .baseunit .addproductorder', function(e){ // action for add product order button
    e.preventDefault();

    // console.log($(this).attr('data-ordernum'));

    var forordernumber = $(this).attr('data-ordernum');


    $("#basicmodal .onmodaltitle").text($(this).attr('id'));
    $("#basicmodal .onmodaltitle").text('Add Order for Unit ' + forordernumber);
    $("#basicmodal .modalbase").attr('data-fororder', forordernumber);

    var foroderunit = $(this).parents(".baseunit").attr('data-ordernumberx');
    $("#basicmodal").attr('data-fororderunit', foroderunit);
    $("#basicmodal").modal('show');
});
