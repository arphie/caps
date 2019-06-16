<?php
	/**
	 * FInal Product Functions
	 */
	class finalProduct
	{
		public static function connectme()
		{
			$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			} else {
				// echo "sapul";
				return $con;
			}
		}

		public static function getAllRawMaterials()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from products where prod_status = 2")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getAllFinishProductCategory()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_type = 'category' ")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function saveManufacture($post)
		{
			// echo "<pre>";
			// 	print_r($post);
			// echo "</pre>";

			$totallen = 0;

			foreach ($post['orderdata'] as $key => $value) {
				foreach ($value['orderval'] as $innerkey => $innervalue) {
					$totallen = $totallen + ($innervalue['itemnp'] * $innervalue['itemnl']);
				}
			}

			$totalkg = $totallen * $post['kglm'];

			mysqli_query(self::connectme(),"update products set prod_nw = '". ($post['basenw'] - $totalkg) ."', prod_lm = '".($post['baselm'] - $totallen)."' where prod_id = ".$post['raw_id']);

			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from products where prod_id = ".$post['raw_id'])){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					$listofdata = $row;
				}
				// Free result set
				mysqli_free_result($result);
			}

			if ($listofdata['prod_lm'] <= 2) { // less than 2 meters
				mysqli_query(self::connectme(),"update products set prod_status = '3' where prod_id = ".$post['raw_id']);
			}

			// mysqli_query(self::connectme(),"update products set prod_status = '1' where prod_id = ".$post['raw_id']);


			// print_r("insert into manufacture (man_rawid, man_date, man_profile, man_details) values ('".$post['raw_id']."', '".date("Y-m-d h:i:sa")."', '".$post['prod_profile']."', '".serialize($post['orderdata'])."')");
			mysqli_query(self::connectme(),"insert into manufacture (man_rawid, man_date, man_profile, man_details) values ('".$post['raw_id']."', '".$post['postingdate']."', '".$post['prod_profile']."', '".serialize($post['orderdata'])."')");
			// mysqli_query(self::connectme(),"insert into manufacture (man_client, man_date, man_ordernum, man_details) values ('".$post['modclientname']."', '".$post['moddate']."', '".$post['modordernum']."', '".json_encode($post['modorder'])."')");

			$addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'add_manufacture', '".$post['prodcoilnum']."')";

			mysqli_query(self::connectme(),$addlogs);

			header("location: ".BASELINK."/index.php?page=final_product");
		}

		public static function getmaterials()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from manufacture")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getkglm($id)
		{
			//get sku
			$kglm = "";
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_id = '".$id."' ")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($skudata, $row);
					$kglm = $row['prod_kglm'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $kglm;
		}

		public static function getmanudataforcast($size, $color)
		{
			// get sku by size and color
			$listofdata = "";
			if ($result=mysqli_query(self::connectme(),"select * from prodsku where sku_color = '".$color."' and sku_size = '".$size."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					$listofdata = $row;
					// array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$listofcoils = [];
			// foreach ($lastofmonths as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$listofdata['sku_id']."'")){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofcoils, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
			// }

			$lastofmonths = [];
			array_push($lastofmonths, date('Y-m'));
			for ($i = 1; $i < 7; $i++) {
				array_push($lastofmonths, date('Y-m', strtotime("-$i month")));
			}

			$fmonts = [];
			for ($i = 1; $i < 6; $i++) {
				array_push($fmonts, date('Y-m', strtotime("+$i month")));
			}

			$wholeyear = array_merge(array_reverse($lastofmonths), $fmonts);

			// 	// get manufactured as per coil
			$listofmanus = [];
			foreach ($listofcoils as $key => $value) {
				$partlist = [];
				foreach ($wholeyear as $monhkey => $monhvalue) {
					if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = '".$value['prod_id']."' and man_date like '%".$monhvalue."%' ")){
						// // Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
						{
							// print_r($row);
							// $listofdata = $row;
							array_push($listofmanus, $row);
						}
						// Free result set
						mysqli_free_result($result);
					}
				}
			}

			//filter
			$listofinforbase = [];
			foreach ($wholeyear as $key => $value) {

				$myDateTime = DateTime::createFromFormat('Y-m', $value);
                $newMonth = $myDateTime->format('F');
                $newYear = $myDateTime->format('Y');

				$partisto['xdate'] = $value;
				$partisto['month'] =  $newMonth;
				$partisto['details'] = [];
				$partisto['ispredict'] = "no";
				$partisto['iscurrent'] = (date('Y-F') == $newYear."-".$newMonth) ? "yes" : "no";
				$partisto['total'] = 0;
				foreach ($listofmanus as $manufkey => $manufvalue) {
					if( strpos( $manufvalue['man_date'], $value ) !== false) {
						if (!empty(unserialize($manufvalue['man_details']))) {
							foreach (unserialize($manufvalue['man_details']) as $detskey => $detsvalue) {

								if (!empty($detsvalue['orderval'])) {
									foreach ($detsvalue['orderval'] as $overvalskey => $overvalsvalue) {
										$partisto['total'] += $overvalsvalue['itemnp'] * $overvalsvalue['itemnl'];
									}
								}
								
							}
						}
					    // array_push($partisto['details'], unserialize($manufvalue['man_details']));
					}
				}
				array_push($listofinforbase, $partisto);
			}

			$nexttweemonths = [];
			for ($i = 1; $i < 4; $i++) {
				array_push($nexttweemonths, date('Y-m', strtotime("+$i month")));
			}

			$lastthreemonths = [];
			array_push($lastthreemonths, date('Y-m'));
			for ($i = 1; $i < 3; $i++) {
				array_push($lastthreemonths, date('Y-m', strtotime("-$i month")));
			}

			// prediction
			$totalformonts = 0;
			foreach ($lastthreemonths as $key => $value) {
				foreach ($listofinforbase as $pmkey => $pmvalue) {
					if ($pmvalue['xdate'] == $value) {
						$totalformonts += $pmvalue['total'];
					}
				}
			}

			$finallist = [];
			$counter = 0;
			foreach ($listofinforbase as $pmkey => $pmvalue) {
				if (in_array($pmvalue['xdate'], $nexttweemonths)) {
					$prts['xdate'] = $pmvalue['xdate'];
					$prts['month'] = $pmvalue['month'];
					$prts['details'] = $pmvalue['details'];
					$prts['ispredict'] = 'yes';
					$prts['total'] = ($counter == 0 ? ($totalformonts / 2) : ( $counter == 1 ? ($totalformonts / 3) : ($totalformonts / 4)));
					// $prts['total'] = "-";

					array_push($finallist, $prts);
					$counter++;
				} else {
					array_push($finallist, $pmvalue);
				}
			}
			

		

			return $finallist;
		}

		public static function getmanudataforcastforraw($size, $color, $year)
		{
			// get sku by size and color
			$listofdata = "";
			if ($result=mysqli_query(self::connectme(),"select * from prodsku where sku_color = '".$color."' and sku_size = '".$size."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					$listofdata = $row;
					// array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			// get coils as per skuid
			$listofcoils = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$listofdata['sku_id']."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofcoils, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			// get manufactured as per coil
			$listofmanus = [];
			foreach ($listofcoils as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = '".$value['prod_id']."'")){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						// $listofdata = $row;
						array_push($listofmanus, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			// filter as per month
			$sortedaspermanu = [];
			for ($i=1; $i < 13; $i++) { 
				$arayplaceholder = [];
				$totalnum = 0;
				$totalkg = 0;
				foreach ($listofmanus as $basekey => $basevalue) {
					if (\strpos($basevalue['man_date'], $year."-".sprintf("%02d", $i)) !== false) {
						$kglmofmanu = self::getkglm($basevalue['man_rawid']);
						array_push($arayplaceholder, $basevalue);
						foreach (unserialize($basevalue['man_details']) as $getdatakey => $getdatavalue) {
							if (array_key_exists('orderval', $getdatavalue)) {
								foreach ($getdatavalue['orderval'] as $getordervalkey => $getordervalvalue) {
									$totalnum += $getordervalvalue['itemnp'] * $getordervalvalue['itemnl'];
									$totalkg += $kglmofmanu * ($getordervalvalue['itemnp'] * $getordervalvalue['itemnl']);
								}
							}
						}
					}
				}
				$sortedaspermanu[$i]['totallm'] = $totalnum ;
				$sortedaspermanu[$i]['totalkg'] = $totalkg ;
			}

			

			return $sortedaspermanu;
		}

		public static function getmanufacture()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from manufacture")){
				while ($row=mysqli_fetch_assoc($result))
				{
					array_push($listofdata, $row);
				}
				mysqli_free_result($result);
			}

			$finalinfo = [];
			foreach ($listofdata as $key => $value) {
				$basedata['man_id'] = $value['man_id'];
				$basedata['man_rawid'] = $value['man_rawid'];
				$basedata['man_date'] = $value['man_date'];
				$basedata['man_profile'] = $value['man_profile'];
				$basedata['man_details'] = unserialize($value['man_details']);
				array_push($finalinfo, $basedata);
			}

			return $finalinfo;
		}

		public static function getrawprediction($size="", $color="", $year="")
		{
			$manufactured_data = self::getmanufacture();
			
			return $manufactured_data;
		}

		public static function getprediction()
		{
			$listofmonths = [];
			array_push($listofmonths, date('Y-m'));
			for ($i = 1; $i < 3; $i++) {
				array_push($listofmonths, date('Y-m', strtotime("-$i month")));
			}

			$listofmanus = [];
			foreach ($listofmonths as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_date like '%".$value."%'")){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						$row['manudetails'] = unserialize($row['man_details']);
						array_push($listofmanus, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			$listoftotal = 0;
			foreach ($listofmanus as $totkey => $totvalue) {
				$totallinekg = 0;
				$kglm = self::getkglm($totvalue['man_rawid']);

				foreach ($totvalue['manudetails'] as $basekey => $basevalue) {
					if (isset($basevalue['orderval'])) {
						foreach ($basevalue['orderval'] as $obrkey => $obrvalue) {
							$totallinekg += ($obrvalue['itemnp'] * $obrvalue['itemnl']) * $kglm;
						}
						
					}
				}
				$listoftotal += $totallinekg;
			}

			$listplusmonth = [];
			for ($i = 1; $i < 4; $i++) {
				$bss['pred'] = $listoftotal / ($i == 1 ? 2 : ($i == 2 ? 3 : 4));
				$bss['fmonth'] = date('F Y', strtotime("+$i month"));
				array_push($listplusmonth,$bss);
			}
			
			return $listplusmonth;
		}

	}
?>