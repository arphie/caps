<?php include "function.php"; ?>
<?php
	$filename = (isset($_GET["table"]) && $_GET["table"] == "report_sales_inventory" ? "report_sales_inventory.xls" : (isset($_GET["table"]) && $_GET["table"] == "inventory_report" ? "inventory_report.xls" : (isset($_GET["table"]) && $_GET["table"] == "final_product" ? "final_product.xls" : "filename.xls")));
	header('Content-type: application/excel');
	
	header('Content-Disposition: attachment; filename='.$filename);

	$data = "<html xmlns:x=\"urn:schemas-microsoft-com:office:excel\">
	<head>
	    <!--[if gte mso 9]>
	    <xml>
	        <x:ExcelWorkbook>
	            <x:ExcelWorksheets>
	                <x:ExcelWorksheet>
	                    <x:Name>".(isset($_GET["table"]) && $_GET["table"] == "report_sales_inventory" ? "Report Sales Inventory" : "Sheet 1")."</x:Name>
	                    <x:WorksheetOptions>
	                        <x:Print>
	                            <x:ValidPrinterInfo/>
	                        </x:Print>
	                    </x:WorksheetOptions>
	                </x:ExcelWorksheet>
	            </x:ExcelWorksheets>
	        </x:ExcelWorkbook>
	    </xml>
	    <![endif]-->
	</head>

	<body>";

	if (isset($_GET["table"]) && $_GET["table"] == "report_sales_inventory") {
		$data .= "<table class=\"table table-striped table-hover\">";
		$data .= "	<thead>";
		$data .= "		<tr>";
		$data .= "			<th> Size </th>";
		$data .= "			<th> Color </th>";
							foreach ($rawproducts::getprofiles() as $profkey => $profvalue) {
								$data .= "<th class=\"dynawidth\">".$profvalue["meta_name"]."</th>";
			                }
		$data .= "			<th>Total</th>";
		$data .= "		</tr>";
		$data .= "	</thead>";
		$data .= "	<tbody>";
		            foreach ($rawproducts::generatesalesreport(@$_GET["dform"], @$_GET["dto"]) as $key => $value) {
		            	$skudetails = $metaData::getskudetails($value["skuid"]);
		$data .= "		<tr>";
		$data .= "			<td> ".$metaData::getspecificmetavalue($skudetails["sku_size"])." </td>";
		$data .= "			<td> ".$metaData::getspecificmetavalue($skudetails["sku_color"])." </td>";
			                $totalprod = 0;
					foreach ($value["profimix"] as $profimixkey => $profimixvalue) {
						$totalprod += $profimixvalue["totalvals"]["totalnw"];
		$data .= "			<td>";
		$data .= ($profimixvalue["totalvals"]["totalnw"] != 0 ? "<strong>" : "");
		$data .=  ($profimixvalue["totalvals"]["totalnw"] == 0 ? "0" : $profimixvalue["totalvals"]["totalnw"]);
		$data .=  ($profimixvalue["totalvals"]["totalnw"] != 0 ? "</strong>" : "");
		$data .= "			</td>";
			        }
		$data .= "			<td>";
		$data .=  ($totalprod != 0 ? "<strong>" : "");
		$data .=  ($totalprod == 0 ? "0" : $totalprod);
		$data .=  ($totalprod != 0 ? "</strong>" : "");
		$data .= "			</td>";
		$data .= "		</tr>";
		 			}
		$data .= "	</tbody>";
		$data .= "</table>";
	} elseif(isset($_GET["table"]) && $_GET["table"] == "inventory_report"){
		$data .= "<table>";
        $data .= "    <thead>";
        $data .= "        <tr>";
        $data .= "        	<th> # of Coils </th>";
        $data .= "        	<th> Thickness </th>";
        $data .= "            <th> Color </th>";
        $data .= "            <th> KG's </th>";
        $data .= "            <th> LM's </th>";
        $data .= "            <th> Status </th>";
        $data .= "        </tr>";
        $data .= "    </thead>";
        $data .= "    <tbody>";
            	$totalkg = 0;
        		$totallm = 0;
            	if (isset($_GET['size'])) {
            		foreach ($rawproducts::getproductsfromsku($_GET['size']) as $key => $value) {
            			$totalkg += $value['totalnw'];
            			$totallm += $value['totallm'];
        $data .= "        		<tr>";
	    $data .= "            		<td>". $value['num_coils'] ."</td>";
	    $data .= "            		<td>". $metaData::getspecificmetavalue($value['sku_size']) ."</td>";
	    $data .= "            		<td>". $metaData::getspecificmetavalue($value['sku_color']) ."</td>";
	    $data .= "            		<td>". $value['totalnw'] ."</td>";
	    $data .= "            		<td>". $value['totallm'] ."</td>";
	    $data .= "            		<td>". ($value['num_coils'] == 0 ? '<div class="btn red">NO STOCKS</div>' : ($value['num_coils'] > 0 && $value['num_coils'] < 3 ? '<div id="pulsate-regular" class="btn blue">CRITICAL</div>' : '<div class="btn green">GOOD FOR PRODUCTION</div>')) ."</td>";
	    $data .= "            	</tr>";
                	}
            	}
        $data .= "<tr>";	
        $data .= "	<td>Total KG</td>";	
        $data .= "	<td>".$totalkg."</td>";	
        $data .= "	<td>Total LM</td>";	
        $data .= "	<td>".$totallm."</td>";	
        $data .= "	<td></td>";	
        $data .= "	<td></td>";	
        $data .= "</tr>";	
        $data .= "    </tbody>";
        $data .= "</table>";
	} elseif(isset($_GET["table"]) && $_GET["table"] == "final_product"){ //
		$data .= "<table>";
        $data .= "    <thead>";
        $data .= "        <tr>";
        $data .= "            <th> ID </th>";
        $data .= "            <th> Date </th>";
        $data .= "            <th> Coil Number </th>";
        $data .= "            <th> Size </th>";
        $data .= "            <th> Color </th>";
        $data .= "            <th> Profile </th>";
        $data .= "            <th> TLM </th>";
        $data .= "            <th> TKG </th>";
        $data .= "            <th > Remarks </th>";
        $data .= "        </tr>";
        $data .= "    </thead>";
        $data .= "    <tbody>";
                foreach ($finalProduct::getrawprediction(@$_GET['size'],@$_GET['color'],@$_GET['year']) as $key => $value) { 
                    $rawiddata = $rawproducts::getoneproduct($value['man_rawid']);
                    $prodsku = $metaData::getskudetails($rawiddata[0]['prod_sku']);
                	foreach ($value['man_details'] as $mdukey => $mduvalue) {
        $data .= "       <tr>";
        $data .= "           <td>". $value['man_id'] ."</td>";
        $data .= "           <td>". $value['man_date'] ."</td>";
        $data .= "           <td>". $rawiddata[0]['prod_coil_number'] ."</td>";
        $data .= "           <td>". $metaData::getspecificmetavalue($prodsku['sku_size']) ."</td>";
        $data .= "           <td>". $metaData::getspecificmetavalue($prodsku['sku_color']) ."</td>";
        $data .= "           <td>". $metaData::getspecificmetavalue($value['man_profile']) ."</td>";
        $data .= "           <td>";
        if (empty($mduvalue['orderval'])) {
        	$totallm = 0;
        	foreach ($mduvalue['orderval'] as $ordvlkey => $ordvlvalue) {
        		$totallm = $ordvlvalue['itemnp'] * $ordvlvalue['itemnl'];
        	}
        }
        $data .= $totallm;

        $data .="</td>";
        $data .= "           <td>";
        if (empty($mduvalue['orderval'])) {
        	$totalnw = 0;
        	foreach ($mduvalue['orderval'] as $ordvlkey => $ordvlvalue) {
        		$totalnw = ($ordvlvalue['itemnp'] * $ordvlvalue['itemnl']) * $rawiddata[0]['prod_kglm'];
        	}
        }
        $data .= number_format((float) $totalnw, 2, '.', ',');
        $data .= "</td>";
        $data .= "           <td>". (!empty($mduvalue['orderval']) ? $mduvalue['remarks'] : "") ."</td>";
        $data .= "       </tr>";
	                }
	            }
        $data .= "    </tbody>";
        $data .= "</table>";
	} else {
		$data .= "<table><tr><td>Cell 1</td><td>Cell 2</td></tr></table>";
	}

	$data .= "</body></html>";

	echo $data;
?>