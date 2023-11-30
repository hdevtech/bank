<?php 
	$rasms_service = array( 
	/* ALL REQUEST ACCESS */ 
	'login' => array(
		'name'=>"Access to login",
		'error'=>"Access denied to you to login"
		),
	'user_edit' => array(
		'name'=>"Access to Edit User",
		'error'=>"Access denied to you to Edit User"
		),	
	'self_change_user_pwd' => array(
		'name'=>"Access to Change user password",
		'error'=>"Access denied to you to Change user password"
		),	
	
	'client_reg' => array(
		'name'=>"Access to Register Landlord",
		'error'=>"Access denied to you to Register Landlord"
		),

	'client_approve' => array(
		'name'=>"Access to approve Landlord",
		'error'=>"Access denied to you to approve Landlord"
		),			
	'client_reject' => array(
		'name'=>"Access to reject Landlord",
		'error'=>"Access denied to you to reject Landlord"
		),
	'client_edit' => array(
		'name'=>"Access to edit Landlord",
		'error'=>"Access denied to you to edit Landlord"
		),			
	'client_delete' => array(
		'name'=>"Access to delete Landlord",
		'error'=>"Access denied to you to delete Landlord"
		),	
	'client_recover' => array(
		'name'=>"Access to recover Landlord",
		'error'=>"Access denied to you to recover Landlord"
		),
	'cashier_reg' => array(
		'name'=>"Access to Register Landlord",
		'error'=>"Access denied to you to Register Landlord"
		),

	'cashier_approve' => array(
		'name'=>"Access to approve Landlord",
		'error'=>"Access denied to you to approve Landlord"
		),			
	'cashier_reject' => array(
		'name'=>"Access to reject Landlord",
		'error'=>"Access denied to you to reject Landlord"
		),
	'cashier_edit' => array(
		'name'=>"Access to edit Landlord",
		'error'=>"Access denied to you to edit Landlord"
		),			
	'cashier_delete' => array(
		'name'=>"Access to delete Landlord",
		'error'=>"Access denied to you to delete Landlord"
		),	
	'cashier_recover' => array(
		'name'=>"Access to recover Landlord",
		'error'=>"Access denied to you to recover Landlord"
		),
	'loan_officer_reg' => array(
		'name'=>"Access to Register Landlord",
		'error'=>"Access denied to you to Register Landlord"
		),

	'loan_officer_approve' => array(
		'name'=>"Access to approve Landlord",
		'error'=>"Access denied to you to approve Landlord"
		),			
	'loan_officer_reject' => array(
		'name'=>"Access to reject Landlord",
		'error'=>"Access denied to you to reject Landlord"
		),
	'loan_officer_edit' => array(
		'name'=>"Access to edit Landlord",
		'error'=>"Access denied to you to edit Landlord"
		),			
	'loan_officer_delete' => array(
		'name'=>"Access to delete Landlord",
		'error'=>"Access denied to you to delete Landlord"
		),	
	'loan_officer_recover' => array(
		'name'=>"Access to recover Landlord",
		'error'=>"Access denied to you to recover Landlord"
		),	
	'withdraw_approve' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'withdraw_reject' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'withdraw_reg' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'loan_approve' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'loan_reject' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'loan_reg' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),
	'statement_approve' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'statement_reject' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),	
	'statement_reg' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),					
	'slide' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),
	'send_reset_code' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),
	'enter_code' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),
	'reset_password' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),		
	'location_select' => array(
		'name'=>"Access to recover Post",
		'error'=>"Access denied to you to recover Post"
		),									
	);

	//$all_services = array_keys($rasms_service);
	//$tg = "";
	//foreach ($all_services as $key) {
	//	if ($key == "stud_delete") {
	//		$tg = 9;
	//	}
	//	if ($tg == 9) {
	//		echo "'".$key."' /*".$rasms_service[$key]['name']."*/,\n";
	//	}
		
	//}
	//$pts = implode(",", $all_services);

	//echo $pts."<br><br><br><br><br><br><br>";
	//print_r($all_services);

	$rasms_service_users = array(
		'guest'=>array(
			'location_select',
			'client_reg',
			'login' /*Access to login*/,
			'houses_rent',
			'location_select'/** access to select locations in ajax*/,
			'houses_rent',
			'req_house_prices'/*request rent houses price*/,
			"send_reset_code",
			"enter_code",
			"reset_password"
		),
		'admin'=> array( //// was admin
			'location_select',
			'login' /*Access to login*/,
			'user_edit' /*Access to edit user*/,
			'self_change_user_pwd'/** access to change password*/,
			'slide',
			"client_reg",
			"client_approve",
			"client_reject",
			"client_edit",
			"client_delete",
			"cashier_reg",
			"cashier_approve",
			"cashier_reject",
			"cashier_edit",
			"cashier_delete",
			"cashier_recover",
			"loan_officer_reg",
			"loan_officer_approve",
			"loan_officer_reject",
			"loan_officer_edit",
			"loan_officer_delete",
			"loan_officer_recover",	
			"transaction_recover",
			"transaction_approve",
			"transaction_reject",
			"client_recover",			
			"service_reg",
			"service_approve",
			"service_reject",
			"service_edit",
			"service_delete",
			"service_recover",			
			"post_approve",
			"post_reject",
			"post_delete",
			"post_recover",
		),

		'loan_officer'=> array( //// was admin
			'location_select',
			'login' /*Access to login*/,
			'user_edit' /*Access to edit user*/,
			'self_change_user_pwd'/** access to change password*/,
			'slide',
			'withdraw_approve',
			'withdraw_reject',
			"client_recover",			
			"service_reg",
			"service_approve",
			"service_reject",
			"service_edit",
			"service_delete",
			"service_recover",			
			"post_approve",
			"post_reject",
			"post_delete",
			"post_recover",
			'loan_approve',
			'loan_reject',
		),				

		'cashier'=> array( //// was admin
			'location_select',
			'login' /*Access to login*/,
			'user_edit' /*Access to edit user*/,
			'self_change_user_pwd'/** access to change password*/,
			'slide',
			'withdraw_approve',
			'withdraw_reject',
			"client_recover",			
			"service_reg",
			"service_approve",
			"service_reject",
			"service_edit",
			"service_delete",
			"service_recover",			
			"post_approve",
			"post_reject",
			"post_delete",
			"post_recover",
			'loan_approve',
			'loan_reject',
			'statement_approve',
			'statement_reject'
		),		
		'client'=> array( //// was admin
			"transaction_reg",
			'login' /*Access to login*/,
			'user_edit' /*Access to edit user*/,
			'self_change_user_pwd'/** access to change password*/,
			'withdraw_reg',
			'loan_reg',
			"statement_reg"
		),		
	);
 ?>