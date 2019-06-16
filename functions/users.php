<?php
	/**
	 * 
	 */
	class users
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

		public static function saveUser($post)
		{
            $sql = "insert into users (user_name, user_access, user_loginname, user_pass, user_lname, user_fname) values ('".$post['xnusername']."','".$post['xnprev']."','".$post['xndisplayname']."','".md5($post['xnpassword'])."', '".$post['xnfname']."', '".$post['xnlname']."')";

            mysqli_query(self::connectme(),$sql);

			header("location: ".BASELINK."/index.php?page=all_users");
		}

		public static function getAllUsers()
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from users")){
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

		public static function getUserbyID($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from users where user_id = ".$id)){
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

		public static function updateProfile($post)
		{
			$sql = "update users set user_lname = '".$post['user_lname']."', user_fname = '".$post['user_fname']."', user_loginname = '".$post['user_loginname']."' where user_id = ". $post['userid'];

			mysqli_query(self::connectme(),$sql);

			if ($post['edittype'] == "user") {
				header("location: ".BASELINK."/index.php?page=profile&id=".$post['userid']);
			} else {
				header("location: ".BASELINK."/index.php?page=profile");
			}
			
		}


		// BOF authentication functions

		public static function loginUser($post)
		{
			// declaration of variables
			$listofusers = [];
			$islogin = 'false';

			// get all users
			if ($result=mysqli_query(self::connectme(),"select * from users where is_active = '1'")){ while ($row=mysqli_fetch_assoc($result))
			{ array_push($listofusers, $row); } mysqli_free_result($result); }

			// compare the users
			foreach ($listofusers as $key => $value) {
				if ($_POST['username'] == $value['user_name'] && md5($_POST['password']) == $value['user_pass']) {
					$islogin = 'true';
					$_SESSION['userid'] = $value['user_id'];
					break;
				}
			}

			return $islogin;
		}

		public static function logout()
		{
			unset($_SESSION["userid"]);
			header("location: ".BASELINK."/login.php");
		}

		public static function disable($id)
		{
			$sql = "update users set is_active = '0' where user_id = ". $id;

			mysqli_query(self::connectme(),$sql);
			header("location: ".BASELINK."/index.php?page=all_users");
		}

		public static function enable($id)
		{
			$sql = "update users set is_active = '1' where user_id = ". $id;

			mysqli_query(self::connectme(),$sql);
			header("location: ".BASELINK."/index.php?page=all_users");
		}

		// EOF authentication functions
	}
?>