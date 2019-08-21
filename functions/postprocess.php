<?php
	if (isset($_POST) && !empty($_POST)) { // check if page is firing post

        $dpage = @$_GET['page'];

		if (isset($_GET) && $dpage == 'add_raw_products') { // post for the add raw product
			$rawproducts::saveproduct($_POST);
		}

		if (isset($_GET) && $dpage == 'request_product') {
			unset($_POST['sample_1_length']);
    		unset($_POST['dmaterialtype']);
    		unset($_POST['dproducttype']);
    		unset($_POST['prodcount']);
    		unset($_POST['pmaterialname']);
    		unset($_POST['pmaterialsize']);
    		unset($_POST['pproductname']);

    		$finalProduct::saveManufacture($_POST);
		}

        if (isset($_GET) && $dpage == 'add_user') { // post for the add users
            $users::saveUser($_POST);
        }

        if (isset($_GET) && $dpage == 'profile') {
            $users::updateProfile($_POST);
        }

        if (isset($_GET) && $dpage == 'all_sku') {
            if (@$_GET['action'] == 'edit_sku') {
                // save product
                if (isset($_POST) && !empty($_POST)) {
                    $metaData::updatesku($_POST);
                    // print_r($_POST);
                }
            }
        }

        if (isset($_GET) && $dpage == 'raw_material') {
            // $users::updateProfile($_POST);

            $rawproducts::updateproduct($_POST);

        }

        if(isset($_GET) && $dpage == 'all_meta'){
            if (@$_GET['action'] == 'edit_meta') {
                // save product
                if (isset($_POST) && !empty($_POST)) {
                    $metaData::updatemeta($_POST);
                    // print_r($_POST);
                }
            }
        }

        if(isset($_GET) && $dpage == 'all_supplier'){
            if (@$_GET['action'] == 'edit_supplier') {
                if (isset($_POST) && !empty($_POST)) {
                    $supplier::updatesupplier($_POST);
                    // print_r($_POST);
                }
            }
        }

        if(isset($_GET) && $dpage == 'add_default_discount'){
            $client::savedefaultdiscount($_POST);
        }

        if(isset($_GET) && $dpage == 'add_profile'){
            $client::saveprofiles($_POST);
        }

        if(isset($_GET) && $dpage == 'view_profiles'){
            $client::updateprofile($_POST);
        }

        if(isset($_GET) && $dpage == 'add_client'){
            $client::saveclient($_POST);
        }

        if(isset($_GET) && $dpage == 'add_packinglist'){
            $client::savepacking($_POST);
            
        }

        if(isset($_GET) && $dpage == 'add_shippment'){
            $shipment::saveshipment($_POST);
        }

        if(isset($_GET) && $dpage == 'shipment'){
            if (isset($_GET) && $_GET['action'] == 'shipment_edit') {
                $shipment::updateshipdata($_POST);
            }
            if (isset($_GET) && $_GET['action'] == 'shipment_arrived') {
                $shipment::addarrival($_POST);
            }
        }




    }

    if (isset($_GET) && @$_GET['todo'] != "") {
        $todo = @$_GET['todo'];

        if (isset($_GET) && @$_GET['page'] == 'all_users') {
            if ($todo == 'disable') {
                $users::disable($_GET['id']);
            } else {
                $users::enable($_GET['id']);
            }

        }
    }

    if (isset($_GET) && @$_GET['action'] != "") {
        $isaction = @$_GET['action'];

        if ($isaction == "logout") {
            $users::logout();
        }
    }
?>
