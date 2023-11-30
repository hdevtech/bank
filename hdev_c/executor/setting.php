<?php 
//exit($data);
	if (isset($data) && !empty($data)) {}else{exit('validation failed');}
	$store = explode(';', $data);
	$HDEV =array();
	if (is_array($store) && count($store)>0) {
		foreach ($store as $stt) {
			$store2 = explode(':', $stt);
			if (is_array($store2) && count($store2) == 2) {
				$HDEV[$store2[0]]=$store2[1];
			}
		}
		
	}else{exit('validation failed');}
	
	if (is_array($HDEV) && count($HDEV) > 0 && isset($HDEV['ref'])) {
	}else{
		exit("validation Failed!");
	}
	$rasms_stc = new hdev_auth_service('',trim($HDEV['ref']));
	if ($rasms_stc->access()) {
		/// access granted 
	}else{
	  $disp = $rasms_stc->error('alert');
	  $HDEV['ref'] = "";

	  $from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');
	  hdev_note::message($disp);
	  hdev_note::redirect($from);
	  exit();
	}
	$csrf = new CSRF_Protect();
  	$csrf->verifyRequest($HDEV['app']);
	switch ($HDEV['ref']) {
		case 'agent_delete':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("main_auths");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `a_status` = :status WHERE `a_id` = :id;",[[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Agent Account With <u>Reg No: '.$id.'</u> Yasibwe neza',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Agent Account With <u>Reg No: '.$id.'</u> Yasibwe neza');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "Ntabwo byagenze neza, mwongere mugerageze mukanya";
      			}
			}
		break;	
		case 'agent_recover':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("main_auths");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `a_status` = :status WHERE `a_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Agent Account With <u>Reg No: '.$id.'</u> Yagaruwe',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Agent Account With <u>Reg No: '.$id.'</u> Yagaruwe');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "Ntabwo byagenze neza, mwongere mugerageze mukanya";
      			}
			}
		break;	
			
		case 'client_delete':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("client");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Client account with <u>Reg No: '.$id.'</u> Deleted Well',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Client account with <u>Reg No: '.$id.'</u> Deleted Well');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;	
		case 'client_recover':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("client");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Client account with <u>Reg No: '.$id.'</u> was recovered',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Client account with <u>Reg No: '.$id.'</u> was recovered');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;				
		case 'client_approve':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("client");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$client = hdev_data::client($id,['data'])['c_tell'];
      					hdev_note::live_sms($client,"Your registration application at : ".constant('APP_NAME').' was approved, Now you can login at '.hdev_url::menu('login').' with email and password you created when registering!');
      					hdev_note::success('Client application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$client = hdev_data::client($id,['data'])['c_tell'];
      					hdev_note::live_sms($client,"Your registration application at : ".constant('APP_NAME').' was approved, Now you can login at '.hdev_url::menu('login').' with email and password you created when registering!');
      					hdev_note::success('Client application with <u>Reg No: '.$id.'</u> was approved');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'client_reject':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("client");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'3']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$client = hdev_data::client($id,['data'])['c_tell'];
      					hdev_note::live_sms($client,"Your registeration application at : ".constant('APP_NAME').' Was rejected!');
      					hdev_note::success('Client application with <u>Reg No: '.$id.'</u> was rejected!',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Client application with <u>Reg No: '.$id.'</u> was rejected!');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;	
		case 'cashier_delete':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("cashier");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Cashier account with <u>Reg No: '.$id.'</u> Deleted Well',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Cashier account with <u>Reg No: '.$id.'</u> Deleted Well');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;	
		case 'cashier_recover':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("cashier");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Cashier account with <u>Reg No: '.$id.'</u> was recovered',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Cashier account with <u>Reg No: '.$id.'</u> was recovered');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;				
		case 'cashier_approve':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("cashier");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$cashier = hdev_data::cashier($id,['data'])['c_tell'];
      					hdev_note::live_sms($cashier,"Your registration application at : ".constant('APP_NAME').' was approved, Now you can login at '.hdev_url::menu('login').' with email and password you created when registering!');
      					hdev_note::success('Cashier application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$cashier = hdev_data::cashier($id,['data'])['c_tell'];
      					hdev_note::live_sms($cashier,"Your registration application at : ".constant('APP_NAME').' was approved, Now you can login at '.hdev_url::menu('login').' with email and password you created when registering!');
      					hdev_note::success('Cashier application with <u>Reg No: '.$id.'</u> was approved');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'cashier_reject':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("cashier");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `c_status` = :status WHERE `c_id` = :id;",[[":id",$id],[":status",'3']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$cashier = hdev_data::cashier($id,['data'])['c_tell'];
      					hdev_note::live_sms($cashier,"Your registeration application at : ".constant('APP_NAME').' Was rejected!');
      					hdev_note::success('Cashier application with <u>Reg No: '.$id.'</u> was rejected!',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Cashier application with <u>Reg No: '.$id.'</u> was rejected!');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;	
		case 'loan_officer_delete':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("loan_officer");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `lo_status` = :status WHERE `lo_id` = :id;",[[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Loan Officer account with <u>Reg No: '.$id.'</u> Deleted Well',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Loan Officer account with <u>Reg No: '.$id.'</u> Deleted Well');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;	
		case 'loan_officer_recover':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("loan_officer");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `lo_status` = :status WHERE `lo_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Loan Officer account with <u>Reg No: '.$id.'</u> was recovered',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Loan Officer account with <u>Reg No: '.$id.'</u> was recovered');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;				
		case 'loan_officer_approve':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("loan_officer");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `lo_status` = :status WHERE `lo_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$loan_officer = hdev_data::loan_officer($id,['data'])['lo_tell'];
      					hdev_note::live_sms($loan_officer,"Your registration application at : ".constant('APP_NAME').' was approved, Now you can login at '.hdev_url::menu('login').' with email and password you created when registering!');
      					hdev_note::success('Loan Officer application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$loan_officer = hdev_data::loan_officer($id,['data'])['lo_tell'];
      					hdev_note::live_sms($loan_officer,"Your registration application at : ".constant('APP_NAME').' was approved, Now you can login at '.hdev_url::menu('login').' with email and password you created when registering!');
      					hdev_note::success('Loan Officer application with <u>Reg No: '.$id.'</u> was approved');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'loan_officer_reject':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("loan_officer");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `lo_status` = :status WHERE `lo_id` = :id;",[[":id",$id],[":status",'3']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$loan_officer = hdev_data::loan_officer($id,['data'])['lo_tell'];
      					hdev_note::live_sms($loan_officer,"Your registeration application at : ".constant('APP_NAME').' Was rejected!');
      					hdev_note::success('Loan Officer application with <u>Reg No: '.$id.'</u> was rejected!',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Loan Officer application with <u>Reg No: '.$id.'</u> was rejected!');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;	
		case 'withdraw_approve':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("withdraw");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');
      			$uid = hdev_log::uid();
      			$ck = $rt->insert("UPDATE `$tab` SET `r_c_id` = :uid, `r_approve_status` = :status, `r_date` = current_timestamp(), `gen_status` = :status WHERE `w_id` = :id;",[[":uid",$uid],[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$withdraw = hdev_data::withdraw($id,["data"]);
      					//var_dump($withdraw);
      					$tell = hdev_data::client($withdraw['c_id'],['data'])['c_tell'];

      					hdev_note::live_sms($tell,"your withdraw application has been approved with id ".$id." you can visit our branch at ".$withdraw['w_rec_date']);
      					hdev_note::success('Withdraw application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$withdraw = hdev_data::withdraw($id,['data']);
      					$tell = hdev_data::client($withdraw['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your withdraw application has been approved with id ".$id." you can visit our branch at ".$withdraw['w_rec_date']);
      					hdev_note::success('Withdraw application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'withdraw_reject':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("withdraw");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');
      			$uid = hdev_log::uid();
      			$ck = $rt->insert("UPDATE `$tab` SET `r_c_id` = :uid, `r_approve_status` = :status, `r_date` = current_timestamp(), `gen_status` = :status WHERE `w_id` = :id;",[[":uid",$uid],[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$withdraw = hdev_data::withdraw($id,['data']);
      					$tell = hdev_data::client($withdraw['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your withdraw application has been rejected with id ".$id.".");
      					hdev_note::success('Withdraw application with <u>Reg No: '.$id.'</u> was rejected',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$withdraw = hdev_data::withdraw($id,['data']);
      					$tell = hdev_data::client($withdraw['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your withdraw application has been rejected with id ".$id.".");
      					hdev_note::success('Withdraw application with <u>Reg No: '.$id.'</u> was rejected',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'loan_approve':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("loan");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');
      			$uid = hdev_log::uid();
      			$ck = $rt->insert("UPDATE `$tab` SET `lo_id` = :uid, `lo_approve_status` = :status, `lo_approve_date` = current_timestamp(), `gen_status` = :status  WHERE `l_id` = :id;",[[":uid",$uid],[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$loan = hdev_data::loan($id,['data']);
      					$tell = hdev_data::client($loan['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your loan application has been approved with id ".$id.". you can visit our branch for more");
      					hdev_note::success('Loan application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$loan = hdev_data::loan($id,['data']);
      					$tell = hdev_data::client($loan['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your loan application has been approved with id ".$id.". you can visit our branch for more");
      					hdev_note::success('Loan application with <u>Reg No: '.$id.'</u> was approved',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'loan_reject':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("loan");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');
      			$uid = hdev_log::uid();
      			$ck = $rt->insert("UPDATE `$tab` SET `lo_id` = :uid, `lo_approve_status` = :status, `lo_approve_date` = current_timestamp(), `gen_status` = :status  WHERE `l_id` = :id;",[[":uid",$uid],[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					$loan = hdev_data::loan($id,['data']);
      					$tell = hdev_data::client($loan['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your loan application has been rejected with id ".$id.".");
      					hdev_note::success('Loan application with <u>Reg No: '.$id.'</u> was rejected',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					$loan = hdev_data::loan($id,['data']);
      					$tell = hdev_data::client($loan['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your loan application has been rejected with id ".$id.".");
      					hdev_note::success('Loan application with <u>Reg No: '.$id.'</u> was rejected',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;		
		case 'service_delete':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("service");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `s_status` = :status WHERE `s_id` = :id;",[[":id",$id],[":status",'0']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {

      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> was deleted well',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Certificate with  <u>Reg No: '.$id.'</u>was deleted well');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "Something went Wrong please try again later";
      			}
			}
		break;	
		case 'service_recover':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$rt = new hdev_db();
      			$tab = $rt->table("service");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `s_status` = :status WHERE `s_id` = :id;",[[":id",$id],[":status",'1']]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> was recovered well!',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> was recovered well!');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "Something went Wrong please try again later";
      			}
			}
		break;				
		case 'transaction_approve':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$admin = hdev_log::uid();
				$rt = new hdev_db();
      			$tab = $rt->table("transaction");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `t_status` = :status,`a_id`=:admin WHERE `t_id` = :id;",[[":id",$id],[":status",'1'],[':admin',$admin]]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				$client = hdev_data::client(hdev_data::application($id,['data'])['c_id'],['data']);
      				$tell = $client['c_tell'];
      				$cert = hdev_data::service_data(hdev_data::application($id,['data'])['s_id'],['data'])['s_name'];
      					hdev_note::live_sms($tell,"Hello, ".$client['c_name'].", Certificate : ".$cert. " with Reg_no: ".$id." you have applied for, was approved log into your account to get the certificate.");
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> approved well.',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> approved well.');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'transaction_reject':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$id = trim($HDEV['id']);
				$src = trim($HDEV['src']);
				$admin = hdev_log::uid();
				$rt = new hdev_db();
      			$tab = $rt->table("transaction");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("UPDATE `$tab` SET `t_status` = :status,`a_id`=:admin WHERE `t_id` = :id;",[[":id",$id],[":status",'3'],[':admin',$admin]]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
	      			$client = hdev_data::client(hdev_data::application($id,['data'])['c_id'],['data']);
      				$tell = $client['c_tell'];
      				$cert = hdev_data::service_data(hdev_data::application($id,['data'])['s_id'],['data'])['s_name'];
      					hdev_note::live_sms($tell,"Hello, ".$client['c_name']." Certificate : ".$cert." with Reg_no: ".$id." you have applied for, was rejected please visit your leaders for more info!");
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> was approved.',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Certificate with <u>Reg No: '.$id.'</u> was approved.');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;
		case 'transaction_reg':
			if (isset($HDEV['id']) && !empty($HDEV['id']) && isset($HDEV['src']) && !empty($HDEV['src'])) {
				$s_id = trim($HDEV['id']);

				$src = trim($HDEV['src']);
				$c_id = hdev_log::uid();
				$rt = new hdev_db();
      			$tab = $rt->table("transaction");
      			$from = (!is_null(trim($HDEV['from'])) && !empty(trim($HDEV['from']))) ? urldecode(trim($HDEV['from'])) : hdev_url::menu('');

      			$ck = $rt->insert("INSERT INTO `transactions` (`t_id`, `s_id`, `c_id`, `t_status`, `a_id`, `t_reg_date`) VALUES (NULL, :s_id, :c_id, '2', NULL, current_timestamp())",[[":s_id",$s_id],[':c_id',$c_id]]);
	      		if ($ck == "ok") {
      				$csrf->up_tk();
      				$id = $rt->last_id();

	      			$client = hdev_data::client(hdev_data::application($id,['data'])['c_id'],['data']);
      				$tell = $client['c_tell'];

      				$cert = hdev_data::service_data(hdev_data::application($id,['data'])['s_id'],['data'])['s_name'];
      					hdev_note::live_sms($tell,"Hello, ".$client['c_name']." Certificate : ".$cert." with Reg_no: ".$id." you are applying for, have been sent, please wait for the approval!");
      					foreach (hdev_data::get_admin() as $admins) 
                                    {
      						$admin_tel = $admins['a_tell'];
      						hdev_note::live_sms($admin_tel,'Hello! Certificate application with Reg No: '.$id.' was sent to you and is waiting for approval. Kindly log into the system at : '.hdev_url::menu('login').' and take the decision. Thanks!');
      						unset($admin_tel);
      					}
      				//$admin_tel = hdev_data::get_admin();
      				if (isset($HDEV['mod_close']) && !empty($HDEV['mod_close'])) {
      					hdev_note::success('Certificate application with <u>Reg No: '.$id.'</u> was sent and is waiting for approval.',$HDEV['mod_close']);
      					//hdev_note::redirect($from);
      				}else{
      					hdev_note::success('Certificate application with <u>Reg No: '.$id.'</u> was sent and is waiting for approval.');
      					//hdev_note::redirect($from);
      				}
      			}else{
      				echo "something went wrong try again later";
      			}
			}
		break;		 
		default:
			hdev_note::message('we cannot handle what you requested try again later');
			hdev_note::redirect(hdev_url::menu(''));
		break;
	}

 ?>