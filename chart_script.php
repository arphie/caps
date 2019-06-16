<?php

	
	

	if ((isset($_GET['profile']) && $_GET['profile'] != "") && (isset($_GET['year']) && $_GET['year'] != ""))  {
		$dproducts = $finalProduct::getmaterials();
		$listofsales = $rawproducts::salesondase($_GET['profile'],$_GET['year'],$dproducts);

	}

	if ((isset($_GET['page']) && $_GET['page'] == "inventory_report") && (isset($_GET['tab']) && $_GET['tab'] == "consumption") && (isset($_GET['year']) && $_GET['year'] != "") && (isset($_GET['month']) && $_GET['month'] != "") && (isset($_GET['sku']) && $_GET['sku'] != "")) {
		$listofprofs = $rawproducts::allprofasperbar($_GET['sku'],$_GET['color'],$_GET['month'],$_GET['year']);
	}

	if ((isset($_GET['page']) && $_GET['page'] == "final_product") && (isset($_GET['tab']) && $_GET['tab'] == "loaddata")) {
		$listofmanumonth = $finalProduct::getmanudataforcast($_GET['size'],$_GET['color']);
	}

?>
<script type="text/javascript">
	
	var ChartsAmcharts = function() {
	    var initChartSample5 = function() {
	        var chart = AmCharts.makeChart("salesinventory", {
	            "theme": "light",
	            "type": "serial",
	            "startDuration": 2,

	            "fontFamily": 'Open Sans',
	            
	            "color":    '#888',

	            "dataProvider": [
	            <?php if (!empty($listofsales)): ?>
		            <?php foreach ($listofsales as $key => $value) { ?>
		            	{
			                "country": '<?php echo date('F', mktime(0, 0, 0, $key, 10)); ?>',
			                "visits": <?php echo $value; ?>,
			                "color": "#FF6600"
			            },
		            <?php } ?>
		        <?php endif; ?>
	            ],
	            "valueAxes": [{
	                "position": "left",
	                "axisAlpha": 0,
	                "gridAlpha": 0
	            }],
	            "graphs": [{
	                "balloonText": "[[category]]: <b>[[value]]</b>",
	                "colorField": "color",
	                "fillAlphas": 0.85,
	                "lineAlpha": 0.1,
	                "type": "column",
	                "topRadius": 1,
	                "valueField": "visits"
	            }],
	            "depth3D": 40,
	            "angle": 30,
	            "chartCursor": {
	                "categoryBalloonEnabled": false,
	                "cursorAlpha": 0,
	                "zoomable": false
	            },
	            "categoryField": "country",
	            "categoryAxis": {
	                "gridPosition": "start",
	                "axisAlpha": 0,
	                "gridAlpha": 0

	            },
	            "exportConfig": {
	                "menuTop": "20px",
	                "menuRight": "20px",
	                "menuItems": [{
	                    "icon": '/lib/3/images/export.png',
	                    "format": 'png'
	                }]
	            }
	        }, 0);

	        jQuery('.salesinventory_chart_input').off().on('input change', function() {
	            var property = jQuery(this).data('property');
	            var target = chart;
	            chart.startDuration = 0;

	            if (property == 'topRadius') {
	                target = chart.graphs[0];
	            }

	            target[property] = this.value;
	            chart.validateNow();
	        });

	        $('#salesinventory').closest('.portlet').find('.fullscreen').click(function() {
	            chart.invalidateSize();
	        });
	    }

	    var rawconsumption = function() {
	        var chart = AmCharts.makeChart("rawconsumption", {
	            "theme": "light",
	            "type": "serial",
	            "startDuration": 2,

	            "fontFamily": 'Open Sans',
	            
	            "color":    '#888',

	            "dataProvider": [
	            {
	                "country": "January",
	                "visits": 18082,
	                "color": "#FF6600"
	            },{
	                "country": "February",
	                "visits": 10082,
	                "color": "#FF6600"
	            },{
	                "country": "March",
	                "visits": 18002,
	                "color": "#FF6600"
	            },{
	                "country": "April",
	                "visits": 10023,
	                "color": "#333333"
	            },{
	                "country": "May",
	                "visits": 10023,
	                "color": "#333333"
	            },{
	                "country": "June",
	                "visits": 10023,
	                "color": "#333333"
	            },{
	                "country": "July",
	                "visits": 0,
	                "color": "#000000"
	            },{
	                "country": "August",
	                "visits": 0,
	                "color": "#000000"
	            },{
	                "country": "September",
	                "visits": 0,
	                "color": "#000000"
	            },{
	                "country": "October",
	                "visits": 0,
	                "color": "#000000"
	            },{
	                "country": "November",
	                "visits": 0,
	                "color": "#000000"
	            },{
	                "country": "December",
	                "visits": 0,
	                "color": "#000000"
	            }],
	            "valueAxes": [{
	                "position": "left",
	                "axisAlpha": 0,
	                "gridAlpha": 0
	            }],
	            "graphs": [{
	                "balloonText": "[[category]]: <b>[[value]]</b>",
	                "colorField": "color",
	                "fillAlphas": 0.85,
	                "lineAlpha": 0.1,
	                "type": "column",
	                "topRadius": 1,
	                "valueField": "visits"
	            }],
	            "depth3D": 40,
	            "angle": 30,
	            "chartCursor": {
	                "categoryBalloonEnabled": false,
	                "cursorAlpha": 0,
	                "zoomable": false
	            },
	            "categoryField": "country",
	            "categoryAxis": {
	                "gridPosition": "start",
	                "axisAlpha": 0,
	                "gridAlpha": 0

	            },
	            "exportConfig": {
	                "menuTop": "20px",
	                "menuRight": "20px",
	                "menuItems": [{
	                    "icon": '/lib/3/images/export.png',
	                    "format": 'png'
	                }]
	            }
	        }, 0);

	        jQuery('.rawconsumption_chart_input').off().on('input change', function() {
	            var property = jQuery(this).data('property');
	            var target = chart;
	            chart.startDuration = 0;

	            if (property == 'topRadius') {
	                target = chart.graphs[0];
	            }

	            target[property] = this.value;
	            chart.validateNow();
	        });

	        $('#rawconsumption').closest('.portlet').find('.fullscreen').click(function() {
	            chart.invalidateSize();
	        });
	    }

	    var manuchart = function() {
	        var chart = AmCharts.makeChart("manuchart", {
	            "theme": "light",
	            "type": "serial",
	            "startDuration": 2,

	            "fontFamily": 'Open Sans',
	            
	            "color":    '#888',

	            "dataProvider": [
	            <?php if (!empty($listofmanumonth)): ?>
	            	<?php $totalcc = 0; ?>
	            	<?php foreach ($listofmanumonth as $key => $value): ?>
	            		{
			                "country": '<?php echo $value['month']; ?>',
			                "visits": <?php echo $value['total']; ?>,
			                "color": '<?php echo ($value['ispredict'] == 'yes' ? "#0D8ECF" : ( $value['iscurrent'] == 'yes' ? "#e43a45" : "#999999" )) ?>'
			            },
	            	<?php endforeach ?>
	            <?php endif; ?>
	            ],
	            "valueAxes": [{
	                "position": "left",
	                "axisAlpha": 0,
	                "gridAlpha": 0
	            }],
	            "graphs": [{
	                "balloonText": "[[category]]: <b>[[value]]</b>",
	                "colorField": "color",
	                "fillAlphas": 0.85,
	                "lineAlpha": 0.1,
	                "type": "column",
	                "topRadius": 1,
	                "valueField": "visits"
	            }],
	            "depth3D": 40,
	            "angle": 30,
	            "chartCursor": {
	                "categoryBalloonEnabled": false,
	                "cursorAlpha": 0,
	                "zoomable": false
	            },
	            "categoryField": "country",
	            "categoryAxis": {
	                "gridPosition": "start",
	                "axisAlpha": 0,
	                "gridAlpha": 0

	            },
	            "exportConfig": {
	                "menuTop": "20px",
	                "menuRight": "20px",
	                "menuItems": [{
	                    "icon": '/lib/3/images/export.png',
	                    "format": 'png'
	                }]
	            }
	        }, 0);

	        jQuery('.manuchart_chart_input').off().on('input change', function() {
	            var property = jQuery(this).data('property');
	            var target = chart;
	            chart.startDuration = 0;

	            if (property == 'topRadius') {
	                target = chart.graphs[0];
	            }

	            target[property] = this.value;
	            chart.validateNow();
	        });

	        $('#manuchart').closest('.portlet').find('.fullscreen').click(function() {
	            chart.invalidateSize();
	        });
	    }

	    var consumptionchart = function() {
	        var chart = AmCharts.makeChart("consump", {
	            "type": "serial",
	            "theme": "light",


	            "handDrawn": true,
	            "handDrawScatter": 3,
	            "legend": {
	                "useGraphSettings": true,
	                "markerSize": 12,
	                "valueWidth": 0,
	                "verticalGap": 0
	            },
	            "dataProvider": [
	            <?php if (!empty($listofprofs)): ?>
		            <?php foreach ($listofprofs as $key => $value) { ?>
		            	{
			                "year": '<?php echo $value['metaname']; ?>',
			                "income": <?php echo $value['totallm']; ?>,
			            },
		            <?php } ?>
		        <?php endif; ?>
	            ],
	            "valueAxes": [{
	                "minorGridAlpha": 0.08,
	                "minorGridEnabled": true,
	                "position": "top",
	                "axisAlpha": 0
	            }],
	            "startDuration": 1,
	            "graphs": [{
	                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
	                "title": "Consumption",
	                "type": "column",
	                "fillAlphas": 0.8,

	                "valueField": "income"
	            }],
	            "rotate": true,
	            "categoryField": "year",
	            "categoryAxis": {
	                "gridPosition": "start"
	            }
	        });

	        $('#consump').closest('.portlet').find('.fullscreen').click(function() {
	            chart.invalidateSize();
	        });
	    }


	    return {
	        //main function to initiate the module

	        init: function() {

	            initChartSample5();
	            rawconsumption();
	            manuchart();
	            consumptionchart();
	        }

	    };

	}();
	$(document).ready(function() {    
	   ChartsAmcharts.init(); 
	});         
	
</script>