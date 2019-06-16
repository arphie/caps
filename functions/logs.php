<?php

	class logs
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

		public static function getlogsbyid($id)
		{
			$listofdata = [];

			if ($result=mysqli_query(self::connectme(),"select * from log where log_by = ".$id)){
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
	}
?>