<?php
	/**
	 * 
	 */
	class stats
	{
		public static function connectme()
		{
			$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			} else {
				return $con;
			}			
		}

		public static function getcoilsbysku($status, $sku)
		{
			$listofdata = [];
			if ($status == 'open') {
				$sql = "select * from products where prod_status = '2' and prod_sku = '".$sku."' order by prod_id DESC";
			} else {
				$sql = "select * from products where prod_status = '1' and prod_sku = '".$sku."' order by prod_id DESC";
			}

			if ($result=mysqli_query(self::connectme(),$sql)){
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

		public static function getremainingkglm($sku)
		{
			$listofdata = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$sku."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$findata['basekg'] = 0;
			$findata['baselm'] = 0;
			$findata['remainingkg'] = 0;
			$findata['remaininglm'] = 0;

			foreach ($listofdata as $key => $value) {
				$findata['basekg'] += $value['prod_base_nw'];
				$findata['baselm'] += $value['prod_base_lm'];
				$findata['remainingkg'] += $value['prod_nw'];
				$findata['remaininglm'] += $value['prod_lm'];
			}

			return $findata;
		}

		public static function getmanupersku($sku)
		{
			$listofproducts = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$sku."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofproducts, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$listofmanu = [];
			foreach ($listofproducts as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = '".$value['prod_id']."'")){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						$totallm = 0;
						$details = $row;
						$details['man_details'] = unserialize($row['man_details']);
						foreach ($details['man_details'] as $mnkey => $mnvalue) {
							if (isset($mnvalue['orderval'])) {
								foreach ($mnvalue['orderval'] as $ovrkey => $ovrvalue) {
									$totallm += $ovrvalue['itemnp'] * $ovrvalue['itemnl'];
								}
							}
						}
						$details['totallm'] = $totallm;
						array_push($listofmanu, $details);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			return $listofmanu;
		}

		public static function gerproducts($sku)
		{
			$listofproducts = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$sku."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofproducts, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofproducts;
		}

		public static function sortperprofile($data)
		{
			$listofproducts = [];
			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_type = 'category'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofproducts, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$sorfasprofile = [];
			foreach ($listofproducts as $key => $value) {
				$infodata = $value;
				$infodata['manus'] = [];
				$infodata['totalss'] = 0;
				foreach ($data as $datakey => $datavalue) {
					if ($value['meta_id'] == $datavalue['man_profile']) {
						$infodata['totalss'] += $datavalue['totallm'];
						array_push($infodata['manus'], $datavalue);
					}
				}
				array_push($sorfasprofile, $infodata);
			}

			return $sorfasprofile;
		}

		public static function forcasting($sku)
		{
			$listofproducts = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$sku."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofproducts, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$currentdate = [];
			for ($i = 3; $i > 0; $i--) {
				array_push($currentdate, date('Y-m', strtotime("+$i month")));
			}
			array_push($currentdate, date('Y-m'));
			for ($i = 1; $i < 3; $i++) {
				array_push($currentdate, date('Y-m', strtotime("-$i month")));
			}

			$listofmanu = [];
			foreach ($listofproducts as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = '".$value['prod_id']."'")){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						$totallm = 0;
						$details = $row;
						$details['man_details'] = unserialize($row['man_details']);
						foreach ($details['man_details'] as $mnkey => $mnvalue) {
							if (isset($mnvalue['orderval'])) {
								foreach ($mnvalue['orderval'] as $ovrkey => $ovrvalue) {
									$totallm += $ovrvalue['itemnp'] * $ovrvalue['itemnl'];
								}
							}
						}
						$details['totallm'] = $totallm;
						array_push($listofmanu, $details);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			$listofmanuperdate = [];
			foreach ($currentdate as $key => $value) {
				$istodate['ddate'] = $value;
				$istodate['ifdata'] = [];
				$istodate['istotal'] = 0;
				foreach ($listofmanu as $manuskey => $manusvalue) {
					if (strpos($manusvalue['man_date'], $value) !== false) {
						$istodate['istotal'] += $manusvalue['totallm'];
					    // array_push($istodate['ifdata'],$manusvalue);
					}
				}
				$listofmanuperdate[$value] = $istodate;
			}
			array_reverse($listofmanuperdate);

			$pastmonths = [];
			array_push($pastmonths, date('Y-m'));
			for ($i = 1; $i < 3; $i++) {
				array_push($pastmonths, date('Y-m', strtotime("-$i month")));
			}

			// forcasting algo! time-series algo
			$currentdate = date('Y-m', strtotime("+1 month"));
			$basetotal = 0;
			for ($i=0; $i < 3; $i++) { // loop for target date 
				$xcurtab = date('Y-m', strtotime("+$i months", strtotime($currentdate))); // targeted date
				$valtoal = 0;
				for ($n=1; $n < 4; $n++) { // loop for 3 months previous from target
					$istodate = date('Y-m', strtotime("-$n months", strtotime($xcurtab))); // get year-month form targeted
					$valtoal += $listofmanuperdate[$istodate]['istotal']; // data prepared.
				}
				$listofmanuperdate[$xcurtab]['istotal'] = ($valtoal / 3);
			}
			// end of time series algo


			return $listofmanuperdate;
		}

		public static function montlymanu($sku, $year="")
		{
			if ($year == "") {
				$year = date('Y');
			}
			$listofproducts = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = '".$sku."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofproducts, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$listofmanu = [];
			foreach ($listofproducts as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = '".$value['prod_id']."' and man_date like '%".$year."%'")){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						$totallm = 0;
						$details = $row;
						$details['man_details'] = unserialize($row['man_details']);
						foreach ($details['man_details'] as $mnkey => $mnvalue) {
							if (isset($mnvalue['orderval'])) {
								foreach ($mnvalue['orderval'] as $ovrkey => $ovrvalue) {
									$totallm += $ovrvalue['itemnp'] * $ovrvalue['itemnl'];
								}
							}
						}
						$details['totallm'] = $totallm;
						array_push($listofmanu, $details);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			$listofmonths = [];
			for ($i=1; $i < 13; $i++) { 
				array_push($listofmonths, $year."-".sprintf("%02d", $i));
			}

			$lisrofmanuspermonth = [];
			foreach ($listofmonths as $key => $value) {
				$listobase['ismonth'] = $value;
				$listobase['manus'] = [];
				foreach ($listofmanu as $manukey => $manuvalue) {
					if (strpos($manuvalue['man_date'], $value) !== false) {
					    array_push($listobase['manus'], $manuvalue);
					}
				}
				array_push($lisrofmanuspermonth, $listobase);
			}

			return $lisrofmanuspermonth;
		}


	}
?>