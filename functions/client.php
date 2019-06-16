<?php
	/**
	 *
	 */
	class client
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

		public static function savedefaultdiscount($post)
		{
            $discounts = serialize($post);
            $sql = "update client set client_discount = '".$discounts."' where client_id = 1";
            mysqli_query(self::connectme(),$sql);

            header("location: ".BASELINK."/index.php?page=all_clients");
		}

		public static function getdefaultdiscount()
		{
			$listofdata = "";

			if ($result=mysqli_query(self::connectme(),"select * from client where client_id = 1")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					$listofdata = $row['client_discount'];
					// array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function saveprofiles($post)
		{
			// print_r($post);
			$profilename = $post['profname'];

			//filter to show only the sizes
			unset($post['profname']);
			unset($post['Submit']);

			$baseproducts = serialize($post);

			$sql = "insert into profile (prof_name, prof_base) values ('".$profilename."', '".$baseproducts."')";

			// echo $sql;

			mysqli_query(self::connectme(),$sql);

			header("location: ".BASELINK."/index.php?page=all_profiles");
		}

		public static function getprofiles()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from profile")){
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

		public static function getclient()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from client where client_id != 1")){
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

		public static function saveclient($post)
		{
			print_r($_POST);
			$clientname = $post['clientname'];
			$clientsku = $post['clientsku'];
			$clientaddress = $post['clientaddress'];
			$clienttype = $post['dselprofile'];

			$sql = "insert into client (client_name, client_sku, client_address, client_discount) values ('".$clientname."', '".$clientsku."', '".$clientaddress."', '".$clienttype."')";

			mysqli_query(self::connectme(),$sql);

			header("location: ".BASELINK."/index.php?page=all_clients");
		}

		public static function savepacking($post)
		{
			$sql = "insert into packinglist (order_client, order_specs, order_total) values ('".$post['clientid']."', '".serialize($post)."', '".$post['superdupertotal']."')";

			mysqli_query(self::connectme(),$sql);

			header("location: ".BASELINK."/index.php?page=all_packinglist");
		}

		public static function getallpackinglist()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from packinglist")){
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

		public static function getclientbyid($id)
		{
			$listofdata = "";

			if ($result=mysqli_query(self::connectme(),"select * from client where client_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row);
					$listofdata = $row['client_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getclientinfobyid($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from client where client_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row);
					$listofdata = $row;
					// $listofdata = $row['client_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getclienttype($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from profile where prof_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row);
					$listofdata = $row;
					// $listofdata = $row['client_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		//packing list
		public static function packing($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from packinglist where order_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row);
					$listofdata = $row;
					// $listofdata = $row['client_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public function toapprove($orderid, $topapprove)
		{
			mysqli_query(self::connectme(), 'update packinglist set order_isapprove = "'.$topapprove.'" where order_id = '.$orderid);
		}
	}
?>
