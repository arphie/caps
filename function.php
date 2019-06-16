<?php

	session_start();
	date_default_timezone_set('Asia/Manila');
	
	// DB credentials
	define('DBHOST', 'localhost', true);
	define('DBUSER', 'root', true);
	define('DBPASS', 'root', true);
	define('DBNAME', 'caps', true);
	define('BASELINK', '/caps', true);


	// global variables
	$baseline = '/caps';

	

	// authblocker

	

	// declaire all functions
	include('functions/products.php');
	include('functions/rawproducts.php');
	include('functions/metadata.php');
	include('functions/supplier.php');
	include('functions/finishedproducts.php');
	include('functions/users.php');
	include('functions/client.php');
	include('functions/shipment.php');
	include('functions/logs.php');
	include('functions/stats.php');

	

	$products = new products();
	$rawproducts = new rawProducts();
	$metaData = new metaData();
	$supplier = new supplier();
	$finalProduct = new finalProduct();
	$users = new users();
	$client = new client();
	$shipment = new shipment();
	$logs = new logs();
	$stats = new stats();

	$userinformationdata = $users::getUserbyID(@$_SESSION['userid']);

	include('functions/postprocess.php');
?>