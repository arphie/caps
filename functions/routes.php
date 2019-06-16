<?php  
	$ispage = (isset($_GET['page']) ? $_GET['page'] : "");
	$isaction = (isset($_GET['action']) ? $_GET['action'] : "");
	if ($isaction != "") {
		if (file_exists('actions/'.$isaction.'.php')) {
			include ('actions/'.$isaction.'.php');
		} else {
			echo '404 page not found';
		}
	} else {
		if (file_exists('pages/'.$ispage.'.php')) {
			include ('pages/'.$ispage.'.php');
		} else {
			echo '404 page not found';
		}
	}
	
	// if ($ispage == 'add_supplier') {
		
	// }
	
?>