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

		public static function updateprofile($post)
		{
			// print_r($post);
			$profilename = $post['profname'];

			//filter to show only the sizes
			unset($post['profname']);
			unset($post['Submit']);

			$baseproducts = serialize($post);

			// $sql = "insert into profile (prof_name, prof_base) values ('".$profilename."', '".$baseproducts."')";
			$sql = "update profile set prof_base = '".$baseproducts."' where prof_id = ".$post['pid'];
			// echo $sql;

			mysqli_query(self::connectme(),$sql);

			header("location: ".BASELINK."/index.php?page=view_profiles&id=".$post['pid']);
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
			$totalprice = 0;
			foreach($post['stims'] as $totskey => $totsval){
				foreach($totsval as $totinskey => $totinsval){
					$totalprice += $totinsval['dtotalprice'];
				}
			}

			foreach($post['ord'] as $totsskey => $totssval){
				if ($totssval['ordertype'] == "plainsheet") {
					$totalprice += $totssval['baseprice'];
				}
			}
			$sql = "insert into packinglist (order_client, order_specs, order_total, ord_balance) values ('".$post['clientid']."', '".serialize($post)."', '".$totalprice."', '".$totalprice."')";

			mysqli_query(self::connectme(),$sql);

			header("location: ".BASELINK."/index.php?page=all_packinglist");
		}
		

		public static function savePayment($post)
		{	

			date_default_timezone_set('Asia/Manila');
			$info = "";
			if ($result=mysqli_query(self::connectme(),"select * from packinglist where order_id = ".$post['orderid'])){
				while ($row=mysqli_fetch_assoc($result)) { $info = $row; }
				mysqli_free_result($result);
			}

			// preperation for details
			$details = [];
			$remaining = $info['ord_balance'];
			$payamount = 0;
			
			if($post['pmethod'] == "card"){
				$details['pcardreciept'] = $post['pcardreciept'];
				$details['pcardbank'] = $post['pcardbank'];
				$details['pcardamount'] = $post['pcardamount'];
				$remaining = $info['ord_balance'] - $post['pcardamount'];
				$payamount = $post['pcardamount'];
			} elseif($post['pmethod'] == "cash"){
				$details['pcashreciept'] = $post['pcashreciept'];
				$details['pcashamount'] = $post['pcashamount'];
				$remaining = $info['ord_balance'] - $post['pcashamount'];
				$payamount = $post['pcashamount'];
			} elseif($post['pmethod'] == "check"){
				$details['pcheckreciept'] = $post['pcheckreciept'];
				$details['pcheckbank'] = $post['pcheckbank'];
				$details['pcheckamount'] = $post['pcheckamount'];
				$remaining = $info['ord_balance'] - $post['pcheckamount'];
				$payamount = $post['pcheckamount'];
			} elseif($post['pmethod'] == "others"){
				$details['pothersreciept'] = $details['pothersreciept'];
				$details['pothersamount'] = $post['pothersamount'];
				$details['pothersdesc'] = $post['pothersdesc'];
				$remaining = $info['ord_balance'] - $post['pothersamount'];
				$payamount = $post['pothersamount'];
			} elseif($post['pmethod'] == "account"){
				$accountinfo = $post['paymentammount'];
				// get account details
				$accountinfo = [];
				if ($result=mysqli_query(self::connectme(),"select * from accounts where acid = ".$post['paymentammount'])){
					while ($row=mysqli_fetch_assoc($result)) { $accountinfo = $row; }
					mysqli_free_result($result);
				}
				if($accountinfo['usedin'] == ""){
					$used = [$post['orderid']];
				} else {
					$used = unserialize($accountinfo['usedin']);
					array_push($used, $post['orderid']);
				}
				
				$remaining = $info['ord_balance'] - $accountinfo['abalance'];
				$abalance = $accountinfo['abalance'] - $info['ord_balance'];
				$payamount = ($remaining <= 0 ? $info['ord_balance'] : $remaining);
				if($abalance > 0){
					$sql = "update accounts set abalance = '".abs($abalance)."', usedin = '".serialize($used)."' where acid = ".$accountinfo['acid'];
				} else {
					$sql = "update accounts set abalance = '0', usedin = '".serialize($used)."' where acid = ".$accountinfo['acid'];
				}
				mysqli_query(self::connectme(),$sql);
				
			}


			if($remaining <= 0){
				// totaly paid
				$sql = 'update packinglist set ord_balance = "0", isstatus = "1" where order_id = '.$post['orderid'];
				$sql2 = "insert into payment (order_id, payamount, paytype, pmethod, pdetails, pdate) values ('".$post['orderid']."', '".$payamount."', 'full', '".$post['pmethod']."', '".serialize($details)."', '".date('m/d/Y h:i:s a')."')";
				mysqli_query(self::connectme(),$sql);
				mysqli_query(self::connectme(),$sql2);
				// header("location: ".BASELINK."/index.php?page=all_payment");
			} elseif($remaining > 0){
				// partially paid
				$sql = 'update packinglist set ord_balance = "'.$remaining.'" where order_id = '.$post['orderid'];
				$sql2 = "insert into payment (order_id, payamount, paytype, pmethod, pdetails, pdate) values ('".$post['orderid']."', '".$payamount."', 'partial', '".$post['pmethod']."', '".serialize($details)."', '".date('m/d/Y h:i:s a')."')";
				mysqli_query(self::connectme(),$sql);
				mysqli_query(self::connectme(),$sql2);
				// header("location: ".BASELINK."/index.php?page=view_payment");
			}
		}

		public static function getPayments($orderid)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from payment where order_id = ".$orderid)){
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

		public static function addFunds($post, $id)
		{
			date_default_timezone_set('Asia/Manila');
			$sql = "insert into accounts (clientid, amount, abalance, dtype, dmode, premarks, ddate, usedin) values ('".$id."', '".$post['clamount']."', '".$post['clamount']."', '".$post['paymenttype']."', '".$post['modepayment']."', '".$post['remarks']."', '".date('m/d/Y h:i:s a')."', '')";
			mysqli_query(self::connectme(),$sql);
			// header("location: ".BASELINK."/index.php?page=view_client&cid=".$id."&mode=add_money");
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

		public static function getallpackinglisttoPay()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from packinglist where isstatus != '1'")){
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

		public static function viewPaidPackinglist()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from packinglist where isstatus = '1'")){
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

		public static function toapprove($orderid, $topapprove)
		{
			mysqli_query(self::connectme(), 'update packinglist set order_isapprove = "'.$topapprove.'" where order_id = '.$orderid);
		}

		public static function getAccountInfo($clientid)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from accounts where clientid = '".$clientid."'")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
					// $listofdata = $row;
					// $listofdata = $row['client_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getPaymentReport()
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

		public static function updateadjustment($post, $id)
		{
			// echo 'update packinglist set order_specs = \''.serialize($post).'\' where order_id = '.$id;
			mysqli_query(self::connectme(), 'update packinglist set order_specs = \''.serialize($post).'\' where order_id = '.$id);
		}

		public static function updateAccount($newmoney, $id)
		{
			$ammount = abs($newmoney);
			$qusst =  "insert into accounts (clientid, amount, abalance, dtype, dmode, premarks, ddate, usedin) values ('".$id."', '".$ammount."', '".$ammount."', 'refund', 'refund', 'refundable', '".date('m/d/Y h:i:s a')."', '')";
			mysqli_query(self::connectme(), $qusst);
		}

		public static function getAccounts($client)
		{
			$listofdata = [];
			if ($result=mysqli_query(self::connectme(),"select * from accounts where clientid = ".$client)){
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

		public static function pullprofiles($profileid)
		{	
			$listofdata = "";
			if ($result=mysqli_query(self::connectme(),"select * from profile where prof_id = ".$profileid)){
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

	}
?>
