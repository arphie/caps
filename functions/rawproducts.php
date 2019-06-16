<?php
	/**
	 * Raw Product Functions
	 */
	class rawProducts
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

		public static function saveproduct($post)
		{

			$sql = "insert into products (prod_supplier, prod_coil_number, prod_sku, prod_nw, prod_lm, prod_base_nw, prod_base_lm, prod_kglm, prod_remarks, prod_arrival, prod_datecreated, prod_ship) values (";
			$sql .= "'".$post['prodsupplier']."',";
			$sql .= "'".$post['prodcoilnum']."',";
			$sql .= "'".$post['prodsku']."',";
			$sql .= "'".$post['prodnw']."',";
			$sql .= "'".$post['prodlm']."',";
			$sql .= "'".$post['prodnw']."',";
			$sql .= "'".$post['prodlm']."',";
			$sql .= "'".number_format($_POST['prodnw']/$_POST['prodlm'],3)."',";
			$sql .= "'".$post['prodremarks']."',";
			$sql .= "'".$post['proddate']."',";
			$sql .= "'".date('Y-m-d')."',";
			$sql .= "'".$post['prod_ship']."'";
			$sql .= ")";

			// echo $sql;

			mysqli_query(self::connectme(),$sql);

			// add logs
			$addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'add_product', '".$post['prodcoilnum']."')";

			mysqli_query(self::connectme(),$addlogs);

			header("location: ".BASELINK."/index.php?page=raw_material");
		}

		public static function getallproducts()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from products")){
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

		public static function getoneproduct($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from products where prod_id = ".$id)){
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

		public static function setstatus($set, $id)
		{	
			// echo "update products set prod_status = '".$set."' where prod_id = ".$id;
			if ($set == 2 ) {
				mysqli_query(self::connectme(),"update products set prod_status = '".$set."', prod_date_opened = '".date('Y-m-d H:i:s')."' where prod_id = ".$id);
			} else {
				mysqli_query(self::connectme(),"update products set prod_status = '".$set."' where prod_id = ".$id);
			}

			$addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'open_product', '".$id."')";
			mysqli_query(self::connectme(),$addlogs);
			
		}

		public static function getproductsfromsku($sku_size_id)
		{
			if ($sku_size_id == 'all') {
				$sql = "select * from prodsku";
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

				array_push($lofprods, $partsku);

			}

			return $lofprods;
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

		public static function allprofasperbar($sku, $color, $month, $year)
		{	
			//get sku
			$skudata = "";
			if ($result=mysqli_query(self::connectme(),"select * from prodsku where sku_color = '".$color."' and sku_size = '".$sku."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($skudata, $row);
					$skudata = $row['sku_id'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			// get product as per sku
			$listofdata = [];
			if ($result=mysqli_query(self::connectme(),"select * from products where prod_sku = ".$skudata)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			//get all profiles
			$listofprofiles = [];

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_type = 'category' ")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofprofiles, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			//get all manufactured data by raw id and date
			$allmanu = [];
			foreach ($listofdata as $key => $value) {
				if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = ".$value['prod_id']." and man_date like '%".$year."-".sprintf("%02d", $month)."%'" )){
					// // Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
					{
						// print_r($row);
						array_push($allmanu, $row);
					}
					// Free result set
					mysqli_free_result($result);
				}
			}

			//get total number as per profile
			$allset = [];
			foreach ($listofprofiles as $key => $value) {
				$partialspace['metaname'] = $value['meta_name'];
				$curid = $value['meta_id'];
				$datatotallm = 0;
				$datatotalnw = 0;
				foreach ($allmanu as $datakey => $datavalue) {
					if ($datavalue['man_profile'] == $curid) {
						$kglmofmanu = self::getkglm($datavalue['man_rawid']);
						$listonto = unserialize($datavalue['man_details']);
						foreach ($listonto as $getvalkey => $getvalvalue) {
							if (!empty($getvalvalue['orderval'])) {
								foreach ($getvalvalue['orderval'] as $targetkey => $targetvalue) {
									// echo "<pre>";
									// print_r($getvalvalue['orderval']);
									// echo "</pre>";
									$datatotallm += $targetvalue['itemnp'] * $targetvalue['itemnl'];
									$datatotalnw += $kglmofmanu * ($targetvalue['itemnp'] * $targetvalue['itemnl']);
								}
							}
						}
					}
				}
				$partialspace['totallm'] = $datatotallm;
				$partialspace['totalnw'] = $datatotalnw;
				array_push($allset, $partialspace);
			}




			return $allset;
		}

		public static function salesondase($profile, $year, $dproducts)
		{
			// echo $_GET['profile'];
			$lisrofproducts = [];
			foreach ($dproducts as $key => $value) {
				if ($value['man_profile'] == $profile) {
					array_push($lisrofproducts, $value);
				}
			}

			$yearsort = [];
			//sort as per year
			foreach ($lisrofproducts as $yearkey => $yearvalue) {
				if (\strpos($yearvalue['man_date'], $year) !== false) {
					array_push($yearsort, $yearvalue);
				}
			}

			$aspermonth = [];
			for ($i=1; $i < 13; $i++) { 
				// echo $_GET['year']."-".sprintf("%02d", $i);
				$partialholder = [];
				foreach ($yearsort as $monthkey => $monthvalue) {
					if (\strpos($monthvalue['man_date'], $year."-".sprintf("%02d", $i)) !== false) {
						array_push($partialholder, $monthvalue);
						// $aspermonth[$i] = $aspermonth[$i] + $monthvalue;
					}
				}
				$aspermonth[$i] = $partialholder;
			}

			//sort as per length
			$lenpermonth = [];
			for ($i=1; $i < 13; $i++) { 
				$total = 0;
				if (!empty($aspermonth[$i])) {
					$lenpermonth[$i] = 1;
					foreach ($aspermonth[$i] as $key => $value) {
						foreach (unserialize($value['man_details']) as $keygetar => $valuegetar) {
							if (!empty($valuegetar['orderval'])) {
								foreach ($valuegetar['orderval'] as $keylen => $valuelen) {
									$total += $valuelen['itemnp'] * $valuelen['itemnl'];
								}
							}
						}
					}
				} else {
					$lenpermonth[$i] = 0;
				}
				$lenpermonth[$i] = $total;

			}

			return $lenpermonth;
		}

		public static function getallsku()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from prodsku")){
				while ($row=mysqli_fetch_assoc($result))
				{
					array_push($listofdata, $row);
				}
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getprofiles()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_type = 'category'")){
				while ($row=mysqli_fetch_assoc($result))
				{
					array_push($listofdata, $row);
				}
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getskubyprodid($prodid)
		{
			$listofdata = "";

			if ($result=mysqli_query(self::connectme(),"select * from products where prod_id = '".$prodid."'")){
				while ($row=mysqli_fetch_assoc($result))
				{
					$listofdata = $row['prod_sku'];
					// array_push($listofdata, $row);
				}
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function gettotallm($details, $rawid)
		{
			$expls = unserialize($details);

			$totallen = 0;
			foreach ($expls as $key => $value) {
				if (isset($value['orderval'])) {
					foreach ($value['orderval'] as $innerkey => $innervalue) {
						$totallen += $innervalue['itemnp'] * $innervalue['itemnl'];
					}
				}
			}

			return $totallen;
		}

		public static function gettotalnw($details, $rawid)
		{
			$getkglm = "";

			if ($result=mysqli_query(self::connectme(),"select * from products where prod_id = '".$rawid."'")){
				while ($row=mysqli_fetch_assoc($result))
				{
					$getkglm = $row['prod_kglm'];
				}
				mysqli_free_result($result);
			}

			$expls = unserialize($details);

			$totallen = 0;
			foreach ($expls as $key => $value) {
				if (isset($value['orderval'])) {
					foreach ($value['orderval'] as $innerkey => $innervalue) {
						$totallen += $getkglm * ($innervalue['itemnp'] * $innervalue['itemnl']);
					}
				}
			}

			

			return $totallen;
		}


		public static function generatesalesreport($from, $to)
		{

			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from manufacture")){
				while ($row=mysqli_fetch_assoc($result))
				{
					array_push($listofdata, $row);
				}
				mysqli_free_result($result);
			}

			$filtreddata = [];

			// get difference of date
			$earlier = new DateTime($from);
			$later = new DateTime($to);

			$diff = $later->diff($earlier)->format("%a");

			for ($i=0; $i <= $diff ; $i++) { 
				// echo $earlier->format('Y-m-d')."<br />";
				foreach ($listofdata as $key => $value) {
					if (\strpos($value['man_date'], $earlier->format('Y-m-d')) !== false) {
					    array_push($filtreddata, $listofdata[$key]);
					}
				}
				$earlier->modify('+1 day');
			}

			foreach ($filtreddata as $key => $value) {
				$filtreddata[$key]['man_sku'] = self::getskubyprodid($value['man_rawid']);
			}

			$listofprofiles = self::getprofiles();
			$allskus = self::getallsku();

			$sortpersku = [];
			foreach ( $allskus as $key => $value) {
				$innersku = [];
				$innersku['skuid'] = $value['sku_id'];
				$innersku['valuesx'] = [];
				foreach ($filtreddata as $getskkey => $getskvalue) {
					if ($value['sku_id'] == $getskvalue['man_sku']) {
						array_push($innersku['valuesx'], $getskvalue);
					}
				}
				array_push($sortpersku, $innersku);
			}

			//sort as per profile
			$sortedprofiles = [];
			foreach ($sortpersku as $key => $value) {
				$listofarray['skuid'] = $value['skuid'];
				// $listofarray['valuesx'] = $value['valuesx'];
				$listofarray['profimix'] = [];
				foreach ($listofprofiles as $profkey => $profvalue) {
					$lxps = [];
					$lxps['profileid'] = $profvalue['meta_id'];
					$lxps['profilename'] = $profvalue['meta_name'];
					$lxps['totalvals']['totallm'] = 0;
					$lxps['totalvals']['totalnw'] = 0;
					foreach ($value['valuesx'] as $dvalkey => $dvalvalue) {
						$innsrd = [];
						if ($profvalue['meta_id'] == $dvalvalue['man_profile']) {
							// array_push($lxps['totalvals'], $dvalvalue);
							$lxps['totalvals']['totallm'] += self::gettotallm($dvalvalue['man_details'], $dvalvalue['man_rawid']);
							$lxps['totalvals']['totalnw'] += self::gettotalnw($dvalvalue['man_details'], $dvalvalue['man_rawid']);
						}
					}
					array_push($listofarray['profimix'], $lxps);
				}
				
				array_push($sortedprofiles, $listofarray);
			}
			


			return $sortedprofiles;
		}

		public static function trackingmanufacture($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from manufacture where man_rawid = ".$id)){
				while ($row=mysqli_fetch_assoc($result))
				{
					array_push($listofdata, $row);
				}
				mysqli_free_result($result);
			}

			$listoffinaldata = [];
			foreach ($listofdata as $key => $value) {
				$detaileddata = [];
				$detaileddata['defvalue'] = $value;
				$detaileddata['man_det_unser'] = unserialize($value['man_details']);

				array_push($listoffinaldata, $detaileddata);
			}

			return $listoffinaldata;
		}

		public static function updateproduct($post)
		{	
			
            if ($post['prodstatus'] == '1') {
            	mysqli_query(self::connectme(),"update products set prod_nw = '".$post['bkilogram']."', prod_base_nw = '".$post['bkilogram']."', prod_lm = '".$post['linearmeter']."', prod_base_lm = '".$post['linearmeter']."', prod_sku = '".$post['prodsku']."', prod_coil_number = '".$post['prodcoilnum']."', prod_supplier = '".$post['prodsupplier']."', prod_ship = '".$post['prod_ship']."'  where prod_id = ".$post['prodid']);
            } else {
            	mysqli_query(self::connectme(),"update products set prod_sku = '".$post['prodsku']."', prod_coil_number = '".$post['prodcoilnum']."', prod_supplier = '".$post['prodsupplier']."', prod_ship = '".$post['prod_ship']."'  where prod_id = ".$post['prodid']);
            }

            $addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'edit_product', '".$post['prodid']."')";
			mysqli_query(self::connectme(),$addlogs);

            header("location: ".BASELINK."/index.php?page=raw_material&action=raw_manipulate&id=".$post['prodid']);
		}

		
	}
?>