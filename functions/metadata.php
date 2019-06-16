<?php
	/**
	 * 
	 */
	class metaData
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

		public static function savameta($post)
		{
			// echo "<pre>";
			// 	print_r($_POST);
			// echo "</pre>";
			// echo "<pre>";
			// 	print_r($_FILES);
			// echo "</pre>";

			// $target_dir = "uploads/";
			// $target_file = $target_dir . basename($_FILES["meta_image"]["name"]);
			// $uploadOk = 1;
			// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// // Check if image file is a actual image or fake image
			// if(isset($_POST["submit"])) {
			//     $check = getimagesize($_FILES["meta_image"]["tmp_name"]);
			//     if($check !== false) {
			//         echo "File is an image - " . $check["mime"] . ".";
			//         $uploadOk = 1;
			//     } else {
			//         echo "File is not an image.";
			//         $uploadOk = 0;
			//     }
			// }
			// // Check if file already exists
			// if (file_exists($target_file)) {
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }
			// // Check file size
			// if ($_FILES["meta_image"]["size"] > 500000) {
			//     echo "Sorry, your file is too large.";
			//     $uploadOk = 0;
			// }
			// // Allow certain file formats
			// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			// && $imageFileType != "gif" ) {
			//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			//     $uploadOk = 0;
			// }
			// // Check if $uploadOk is set to 0 by an error
			// if ($uploadOk == 0) {
			//     echo "Sorry, your file was not uploaded.";
			// // if everything is ok, try to upload file
			// } else {
			//     if (move_uploaded_file($_FILES["meta_image"]["tmp_name"], $target_file)) {
			//         echo "The file ". basename( $_FILES["meta_image"]["name"]). " has been uploaded.";
			//     } else {
			//         echo "Sorry, there was an error uploading your file.";
			//     }
			// }

			

			// echo "insert into productmeta (meta_name, meta_desc, meta_type, meta_value) values ('".$_POST['meta_name']."', '".$_POST['meta_desc']."', '".$_POST['meta_type']."', '".$_POST['meta_value']."')";

			mysqli_query(self::connectme(),"insert into productmeta (meta_name, meta_desc, meta_type, meta_value) values ('".$_POST['meta_name']."', '".$_POST['meta_desc']."', '".$_POST['meta_type']."', '".$_POST['meta_value']."')");
		}

		public static function updatesku($post)
		{
	
			mysqli_query(self::connectme(),"update prodsku set sku_unique = '".$post['skuid']."', sku_color = '".$post['skucolor']."', sku_size = '".$post['skusize']."', sku_desc = '".$post['skuproddesc']."', sku_name = '".$post['skuprodname']."' where sku_id = '".$post['skunumid']."'");
			header("location: ".BASELINK."/index.php?page=all_sku");


		}

		public static function getAllMetaData()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from productmeta ")){
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

		public static function getprofilename($id)
		{
			$listofdata = '';

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row['']);
					$listofdata = $row['meta_name'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function getmetavalues($type)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_type = '".$type."' ")){
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

		public static function getmetavalue($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_id = '".$id."' ")){
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

		public static function updatemeta($post)
		{
			mysqli_query(self::connectme(),"update productmeta set meta_name = '".$post['meta_name']."', meta_desc = '".$post['meta_desc']."', meta_type = '".$post['meta_type']."', meta_value = '".$post['meta_value']."' where meta_id = '".$post['metaid']."'");
			header("location: ".BASELINK."/index.php?page=all_meta");
		}

		public static function getallskudata()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from prodsku")){
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

		public static function getskudetails($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from prodsku where sku_id = ".$id)){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row);
					$listofdata = $row;
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		
		public static function saveSku($post)
		{
            mysqli_query(self::connectme(),"insert into prodsku (sku_unique, sku_color, sku_size, sku_desc, sku_name) values ('".$post['skuid']."', '".$post['skucolor']."', '".$post['skusize']."', '".$post['skuproddesc']."', '".$post['skuprodname']."')");
		}

		public static function getspecificmetavalue($id)
		{
			$listofdata = "";

			if ($result=mysqli_query(self::connectme(),"select * from productmeta where meta_id = '".$id."' ")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					// array_push($listofdata, $row);
					$listofdata = $row['meta_value'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			return $listofdata;
		}

		public static function ifskuexist($skuname)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from prodsku where sku_unique = '".$skuname."' ")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
					// $listofdata = $row['meta_value'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			if (!empty($listofdata)) {
				return true;
			} else {
				return false;
			}

			// return $listofdata;
		}

		public static function ifcombiexist($size, $color)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from prodsku where sku_size = '".$size."' and sku_color = '".$color."' ")){
				// // Fetch one and one row
				while ($row=mysqli_fetch_assoc($result))
				{
					// print_r($row);
					array_push($listofdata, $row);
					// $listofdata = $row['meta_value'];
				}
				// Free result set
				mysqli_free_result($result);
			}

			if (!empty($listofdata)) {
				return true;
			} else {
				return false;
			}
		}

	}
?>