<?php
	/**
	 * 
	 */
	class supplier
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

		public static function savesupllier($post)
		{
			// echo "insert into supplier (sup_name, sup_desc, sup_meta) values ('".$_POST['supname']."', '".$_POST['supdesc']."', '".json_encode($_POST)."')";
			mysqli_query(self::connectme(),"insert into supplier (sup_name, sup_desc, sup_meta) values ('".$post['supname']."', '".$post['supdesc']."', '".json_encode($post)."')");
		}

		public static function getsuppliername()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from supplier")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row['sup_name']);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getsupplierdata()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from supplier")){
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

		public static function getsuppliernamebyid($supplierid)
		{
			$listofdata = '';

			if ($result=mysqli_query(self::connectme(),"select * from supplier where sup_id = ".$supplierid)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row['sup_name']);
					$listofdata = $row['sup_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getsupplierdatabyid($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from supplier where sup_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row['sup_name']);
					$listofdata = $row;
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function updatesupplier($post)
		{
			$meta = $post;
			unset($meta['Submit']);
			unset($meta['supid']);
			mysqli_query(self::connectme(),"update supplier set sup_name = '".$post['supname']."', sup_desc = '".$post['supdesc']."', sup_meta = '".json_encode($meta)."' where sup_id = ".$post['supid']);
			header("location: ".BASELINK."/index.php?page=all_supplier");
		}

		public static function saveshippingdetails($post)
		{
			mysqli_query(self::connectme(),"insert into shipment (ship_date, ship_manifest, ship_supplier) values ('".@$post['shipdate']."', '".@$post['shipmanifest']."', '".@$post['shipsupplier']."')");
		}	
	}
?>