<?php
	/**
	 * Shipment Management
	 */
	class shipment
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

		public static function saveshipment($post)
		{
            $sql = "insert into shipment (ship_date, ship_manifest, ship_supplier, ship_reference, ship_total_lm, ship_total_nw) values ('".$post['shipdate']."', '".$post['shipmanifest']."', '".$post['shipsupplier']."', '".$post['referenceid']."', '".$post['totalshiplm']."', '".$post['totalshipnw']."')";

            mysqli_query(self::connectme(),$sql);

            $addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'add_ship', '".$post['referenceid']."')";
			mysqli_query(self::connectme(),$addlogs);

            header("location: ".BASELINK."/index.php?page=shipment");
		}

		public static function getallupcomming()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from shipment where ship_status = 1")){
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

		public static function getallarrived()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from shipment where ship_status = 2 and ship_iscomplete = 0")){
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

		public static function getcompleted()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from shipment where ship_status = 2 and ship_iscomplete = 1")){
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

		public static function getforshipmentdrop()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from shipment where ship_status = 2 and ship_iscomplete = 0")){
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

		public static function getshipmentdata($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from shipment where ship_id = ".$id)){
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

			return $listofdata;
		}

		public static function updateshipdata($post)
		{

            $sql = "update shipment set ship_date = '".$post['seta']."', ship_manifest = '".$post['shipmanifest']."', ship_supplier = '".$post['shipsupplier']."', ship_reference = '".$post['refid']."', ship_total_lm = '".$post['totalshiplm']."', ship_total_nw = '".$post['totalshipnw']."' where ship_id = ".$post['shipid'];

            mysqli_query(self::connectme(),$sql);

            $addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'edit_ship', '".$post['shipid']."')";
			mysqli_query(self::connectme(),$addlogs);

            header("location: ".BASELINK."/index.php?page=shipment&action=shipment_edit&edited=1&id=".$post['shipid']);
		}

		public static function addarrival($post)
		{

			$sql = "update shipment set ship_arriv_date = '".$post['arriv_date']."', ship_arriv_refid = '".$post['arriv_reference']."', ship_arriv_tlm = '".$post['arriv_tlm']."', ship_arriv_tnw = '".$post['arriv_tnw']."', ship_arriv_manifest = '".$post['arriv_manifest']."', ship_status = '2' where ship_id = ".$post['shipid'];
			mysqli_query(self::connectme(),$sql);

			$addlogs = "insert into log (log_by, log_date, log_type, log_for_id) values ('".$_SESSION['userid']."', '".date('Y-m-d H:i:s')."', 'arrival_ship', '".$post['shipid']."')";
			mysqli_query(self::connectme(),$addlogs);

            header("location: ".BASELINK."/index.php?page=shipment");
		}

		public static function getcoilspership($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from products where prod_ship = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// $listofdata = $row;
					array_push($listofdata, $row);
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function toclose($id)
		{
			$sql = "update shipment set ship_iscomplete = '1' where ship_id = ".$id;
            mysqli_query(self::connectme(),$sql);
		}
	}
?>