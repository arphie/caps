<?php
	/**
	 * this class is for handling CRUD for products
	 */
	class products
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


		public static function coil_details($type="")
		{
			$listofdata = [];
			$count = 0;
			if ($type == 'open') {
				$sql = "select * from products where prod_status = '2' order by prod_id DESC";
			} elseif($type == 'close'){
				$sql = "select * from products where prod_status = '3' order by prod_id DESC";
			} elseif($type == 'available'){
				$sql = "select * from products where prod_status = '1' order by prod_id DESC";
			} else {
				$sql = "select * from products order by prod_id DESC";
			}

			if ($result=mysqli_query(self::connectme(),$sql)){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofdata, $row);
						// if ($count == 5) {
						// 	break;
						// }
						// $count++;
					}
					// Free result set
					mysqli_free_result($result);
				}
			

			return $listofdata;
		}

		public static function coil_summary($sku_size_id)
		{
			if ($sku_size_id == 'all') {
				$sql = "select * from prodsku";
			} elseif($sku_size_id == 'all'){

			} else {
				$sql = "select * from prodsku where sku_size = ".$sku_size_id;
			}

			$listofdata = [];
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

			$lofprods = [];
			foreach ($listofdata as $key => $value) {
				$partsku = [];
				$partsku['sku_id'] = $value['sku_id'];
				$partsku['sku_color'] = $value['sku_color'];
				$partsku['sku_size'] = $value['sku_size'];
				$listofprods = [];
				if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = ".$value['sku_id'])){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofprods, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}

				$totallm = 0;
				$totalnw = 0;

				foreach ($listofprods as $key => $value) {
					$totallm += $value['prod_lm'];
					$totalnw += $value['prod_nw'];
				}
				$partsku['totallm'] = $totallm;
				$partsku['totalnw'] = $totalnw;
				$partsku['num_coils'] = count($listofprods);
				// if (count($listofprods) > 0) {
					array_push($lofprods, $partsku);
				// }
				

			}

			return $lofprods;
		}

		public static function coil_summary_crit_warn($filt)
		{
			$sql = "select * from prodsku";

			$listofdata = [];
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

			$lofprods = [];
			foreach ($listofdata as $key => $value) {
				$partsku = [];
				$partsku['sku_id'] = $value['sku_id'];
				$partsku['sku_color'] = $value['sku_color'];
				$partsku['sku_size'] = $value['sku_size'];
				$listofprods = [];
				if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = ".$value['sku_id'])){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofprods, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}

				$totallm = 0;
				$totalnw = 0;

				foreach ($listofprods as $key => $value) {
					$totallm += $value['prod_lm'];
					$totalnw += $value['prod_nw'];
				}
				$partsku['totallm'] = $totallm;
				$partsku['totalnw'] = $totalnw;
				$partsku['num_coils'] = count($listofprods);
				if ($filt == 'crit') {
					if (count($listofprods) <= 2) {
						array_push($lofprods, $partsku);
					}
				}
				if ($filt == 'warn') {
					if (count($listofprods) > 2 && count($listofprods) <= 5) {
						array_push($lofprods, $partsku);
					}
				}
				

			}

			return $lofprods;
		}

		public static function gettotallm($type="")
		{
			$count = 0;
			if ($type == 'open') {
				$sql = "select * from products where prod_status = '2' order by prod_id DESC";
			} elseif($type == 'close'){
				$sql = "select * from products where prod_status = '3' order by prod_id DESC";
			} elseif($type == 'available'){
				$sql = "select * from products where prod_status = '1' order by prod_id DESC";
			} else {
				$sql = "select * from products order by prod_id DESC";
			}

			$totallm = 0;

			if ($result=mysqli_query(self::connectme(),$sql)){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						// array_push($listofdata, $row);
						// if ($count == 5) {
						// 	break;
						// }
						// $count++;
						$totallm += $row['prod_lm'];
					}
					// Free result set
					mysqli_free_result($result);
				}
			

			return $totallm;
		}

		public static function gettotalnw($type="")
		{
			$count = 0;
			if ($type == 'open') {
				$sql = "select * from products where prod_status = '2' order by prod_id DESC";
			} elseif($type == 'close'){
				$sql = "select * from products where prod_status = '3' order by prod_id DESC";
			} elseif($type == 'available'){
				$sql = "select * from products where prod_status = '1' order by prod_id DESC";
			} else {
				$sql = "select * from products order by prod_id DESC";
			}

			$totallm = 0;

			if ($result=mysqli_query(self::connectme(),$sql)){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						// array_push($listofdata, $row);
						// if ($count == 5) {
						// 	break;
						// }
						// $count++;
						$totallm += $row['prod_nw'];
					}
					// Free result set
					mysqli_free_result($result);
				}
			

			return $totallm;
		}

		public static function getupship()
		{
			$listofdata = [];
			$sql = 'select * from shipment where ship_status = 1';
			if ($result=mysqli_query(self::connectme(),$sql)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			usort($listofdata, function($a, $b) {
			  return new DateTime($a['ship_date']) <=> new DateTime($b['ship_date']);
			});

			$getlsitofdata = [];
			foreach ($listofdata as $key => $value) {
				if (!in_array($value['ship_date'], $getlsitofdata)) {
					array_push($getlsitofdata, $value['ship_date']);
				}
			}

			$sortedinfo = [];
			foreach ($getlsitofdata as $key => $value) {
				$innerinfo = [];
				$innerinfo['basedate'] = $value;
				$innerinfo['details'] = [];
				foreach ($listofdata as $innerkey => $innervalue) {
					if ($value == $innervalue['ship_date']) {
						array_push($innerinfo['details'], $innervalue);
					}
				}
				array_push($sortedinfo, $innerinfo);
			}




			

			return $sortedinfo;
		}

		public static function getnumofcoils($status)
		{
			$listofdata = [];
			if ($status == 'open') {
				$sql = "select * from products where prod_status = '2' order by prod_id DESC";
			} else {
				$sql = "select * from products where prod_status = '1' order by prod_id DESC";
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
			

			return count($listofdata);
		}


		public static function getcoilsummarybysize()
		{
			$getsizes = "select * from productmeta where meta_type = 'size'";
			$listofsizes = [];
			if ($result=mysqli_query(self::connectme(),$getsizes)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofsizes, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$listofskus = [];
			foreach ($listofsizes as $key => $value) {
				$listofinfo = $value;
				$listofinfo['allsku'] = [];
				$getskus = "select * from prodsku where sku_size = '".$value['meta_id']."'";
				if ($result=mysqli_query(self::connectme(),$getskus)){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofinfo['allsku'], $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
				array_push($listofskus, $listofinfo);
			}
			

			return $listofskus;
		}

		public static function getcoilsummarybycolor()
		{
			$getsizes = "select * from productmeta where meta_type = 'color'";
			$listofsizes = [];
			if ($result=mysqli_query(self::connectme(),$getsizes)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofsizes, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$listofskus = [];
			foreach ($listofsizes as $key => $value) {
				$listofinfo = $value;
				$listofinfo['allsku'] = [];
				$getskus = "select * from prodsku where sku_color = '".$value['meta_id']."'";
				if ($result=mysqli_query(self::connectme(),$getskus)){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofinfo['allsku'], $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
				array_push($listofskus, $listofinfo);
			}
			

			return $listofskus;
		}

		public static function getproductpersku($sku)
		{
			$listofproducts = [];
			$getproducts = "select * from products where prod_sku = '".$sku."' and prod_status = '2' order by prod_id DESC";
			if ($result=mysqli_query(self::connectme(),$getproducts)){
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

		public static function getmanufacurespersku($sku)
		 {
		 	$listofproducts = [];
			$getproducts = "select * from products where prod_sku = '".$sku."'";
			if ($result=mysqli_query(self::connectme(),$getproducts)){
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
				$getmanus = "select * from manufacture where man_rawid = '".$value['prod_id']."'";
				if ($result=mysqli_query(self::connectme(),$getmanus)){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($listofmanu, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			return $listofmanu;
		 } 

		 public static function gettotallmpermanu($data)
		 {
		 	$total = 0;
		 	foreach ($data as $key => $value) {
		 		$total += $value['totallm'];
		 	}
		 	return $total;
		 }

		public static function getnamufacturedbysku($sku)
		{
			
			$listofmanu = self::getmanufacurespersku($sku);

			$profiles = [];
			$getprofiles = "select * from productmeta where meta_type = 'category'";
			if ($result=mysqli_query(self::connectme(),$getprofiles)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($profiles, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			$finaliist = [];
			foreach ($profiles as $profilekey => $profilevalue) {
				$listerprofile = $profilevalue;
				$listerprofile['manus'] = [];
				$listerprofile['totallm'] = 0;
				foreach ($listofmanu as $prodkey => $prodvalue) {
					$manudata = $prodvalue;
					// $manudata['detailed'] = unserialize($prodvalue['man_details']);
					$manudata['totallm'] = 0;
					foreach (unserialize($prodvalue['man_details']) as $dkey => $dvalue) {
						if (isset($dvalue['orderval'])) {
							foreach ($dvalue['orderval'] as $ddkey => $ddvalue) {
								// foreach ($ddvalue as $dddkey => $dddvalue) {
									
								// }
								$manudata['totallm'] += $ddvalue['itemnp'] * $ddvalue['itemnl'];
								# code...
							}
						}
					}

					if ($prodvalue['man_profile'] == $profilevalue['meta_id']) {
						$listerprofile['totallm'] += $manudata['totallm'];
						array_push($listerprofile['manus'], $manudata);
					}
					
				}
				array_push($finaliist, $listerprofile);
			}

			return $finaliist;
		}

	}
?>