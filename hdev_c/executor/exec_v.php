<?php  
	if ($_GET) {
		if (isset($_GET['ref'])) {
			switch ($_GET['ref'] && isset($_GET['hash']) ) {
				case 'slide':
					if (isset($_GET['id']) && isset($_GET['hash']) && md5($_GET['id']) == $_GET['hash']) {
						$data = new hdev_db;
						$table = $data->table("slider");
						$id = $_GET['id'];
						if (!hdev_data::service('slide')) {
							exit('Access denied to you!');
						}
						$sql = $data->insert("DELETE FROM $table WHERE p_id=:p_id",[[':p_id',$id]]);
						if ($sql == "ok") {
							hdev_note::message($_GET['ref'].' deleted');
							hdev_note::redirect(hdev_url::menu('modify/slide'));
						}else {
							hdev_note::message('something went wrong');
							hdev_note::redirect(hdev_url::menu('modify/slide'));
						}
					}else{

							hdev_note::message('try again later');
							hdev_note::redirect(hdev_url::menu('modify/slide'));
					}
				break;
				
				default:
					echo "error occured please try again";
					hdev_note::message('error occured please try again later');
					hdev_note::redirect(hdev_url::menu('modify/slide'));
					break;
			}
			exit();
		}
	}
	if ($_POST) {
		if (!empty($_POST['ref'])) { 
			$rasms_stc = new hdev_auth_service('',trim($_POST['ref']));
			if ($rasms_stc->access()) {
				/// access granted 
			}else{
			  $rasms_stc->error('danger');
			}

  		switch ($_POST['ref']) {
  			case 'login':
  				
				if (!empty($_POST['usn']) && !empty($_POST['psw'])) {
					hdev_v::login($_POST["usn"],$_POST['psw']);
				}else{
					hdev_note::message(hdev_lang::on("validation","log_fair"));
	        		//hdev_note::redirect(hdev_url::get_url_host()."/h/login");
				}
 
			break;

			case 'send_reset_code':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['tell'])) {
					$tel = $_POST['tell'];
					if (hdev_data::phone_valid($tel)) {
      					exit(hdev_data::phone_valid($tel));
      				}
					$user = hdev_data::get_admin($tel,['tel']);
					$send_code = 0;
					if (is_array($user) && count($user) > 0) {
						$code = rand();
						$mask1 = time();
						$sent = md5($code.$mask1);
						$sent_og = strtoupper(substr($sent, 0, 6));
						//$sent_og = 12345;

						$code2 = $csrf->getToken();
						$mask2 = $sent_og.'-'.$code2.'-'.$tel;
						$mask = md5($mask2);
						$stmg = "Your Reset Code Is: ".$sent_og;
						hdev_note::live_sms($tel,$stmg);
						$send_code = 1;

					}elseif (is_array(hdev_data::client($tel,['tel'])) && count(hdev_data::client($tel,['tel'])) > 0) {
						$user = hdev_data::client($tel,['tel']);
						$send_code = 0;
						if (is_array($user) && count($user) > 0) {
							$code = rand();
							$mask1 = time();
							$sent = md5($code.$mask1);
							$sent_og = strtoupper(substr($sent, 0, 6));
							//$sent_og = 1234;

							$code2 = $csrf->getToken();
							$mask2 = $sent_og.'-'.$code2.'-'.$tel;
							$mask = md5($mask2);
							$stmg = "Your Reset Code Is: ".$sent_og;
							//hdev_note::live_sms($tel,$stmg);
							$send_code = 1;

						}

					}elseif (is_array(hdev_data::cashier($tel,['tel'])) && count(hdev_data::cashier($tel,['tel'])) > 0) {
						$user = hdev_data::cashier($tel,['tel']);
						$send_code = 0;
						if (is_array($user) && count($user) > 0) {
							$code = rand();
							$mask1 = time();
							$sent = md5($code.$mask1);
							$sent_og = strtoupper(substr($sent, 0, 6));
							//$sent_og = 1234;

							$code2 = $csrf->getToken();
							$mask2 = $sent_og.'-'.$code2.'-'.$tel;
							$mask = md5($mask2);
							$stmg = "Your Reset Code Is: ".$sent_og;
							//hdev_note::live_sms($tel,$stmg);
							$send_code = 1;

						}

					}elseif (is_array(hdev_data::loan_officer($tel,['tel'])) && count(hdev_data::loan_officer($tel,['tel'])) > 0) {
						$user = hdev_data::loan_officer($tel,['tel']);
						$send_code = 0;
						if (is_array($user) && count($user) > 0) {
							$code = rand();
							$mask1 = time();
							$sent = md5($code.$mask1);
							$sent_og = strtoupper(substr($sent, 0, 6));
							//$sent_og = 1234;

							$code2 = $csrf->getToken();
							$mask2 = $sent_og.'-'.$code2.'-'.$tel;
							$mask = md5($mask2);
							$stmg = "Your Reset Code Is: ".$sent_og;
							//hdev_note::live_sms($tel,$stmg);
							$send_code = 1;

						}

					}

					if ($send_code == 1) {
						$return['act'] = "success";
						$return['message'] = "Code Sent to: ".$tel;
						$return['mask'] = $mask;
						$return['tel'] = $tel;
					}else{
						$return['act'] = "error";
						$return['message'] = "Something went Wrong Try again later";
					}
      				echo json_encode($return);
				}else{
					$return['act'] = "error";
					$return['message'] = "Telephone number can't be empty";
					echo json_encode($return);
				}
			break;	
			case 'enter_code':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['mask']) && !empty($_POST['tel']) && !empty($_POST['code'])) {
					$mask = $_POST['mask'];
					$code = $_POST['code'];
					$tel = $_POST['tel'];

					$sent_og = strtoupper(trim($code));
					$code2 = $csrf->getToken();
					$mask2 = $sent_og.'-'.$code2.'-'.$tel;
					$mask_code = md5($mask2);


					if ($mask_code == $mask) {
						$user = hdev_data::get_admin($tel,['tel']);
						$profiles = "";
						foreach ($user as $users) {
							$profiles .= '<option value="'.$users['a_id']."-".'admin'.'">'.$users['a_email'].'</option>';
						}
						$user = array();
						$user = hdev_data::client($tel,['tel']);
						foreach ($user as $users) {
							$profiles .= '<option value="'.$users['c_id']."-".'client'.'">'.$users['c_email'].'</option>';
						}
						$user = array();
						$user = hdev_data::cashier($tel,['tel']);
						foreach ($user as $users) {
							$profiles .= '<option value="'.$users['c_id']."-".'cashier'.'">'.$users['c_email'].'</option>';
						}
						$user = array();
						$user = hdev_data::loan_officer($tel,['tel']);
						foreach ($user as $users) {
							$profiles .= '<option value="'.$users['lo_id']."-".'loan_officer'.'">'.$users['lo_email'].'</option>';
						}						
						if ($profiles != "") {
							$return['act'] = "success";
							$return['message'] = "Entered Code Validated !";
							$return['profiles'] = $profiles;
							$return['mask2'] = $mask.'-'.$code;
							$return['tel'] = $tel;
						}else{
							$return['act'] = "error";
							$return['message'] = "Something went Wrong Try again later";
						}
					}else{
						$return['act'] = "error";
						$return['message'] = "Code Entered is invalid or expired.";
					}
      				echo json_encode($return);
				}else{
					$return['act'] = "error";
					$return['message'] = "All Fields are required";
					echo json_encode($return);
				}
			break;	
			case 'reset_password':
					//var_dump($_POST);
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['mask']) && !empty($_POST['tel']) && !empty($_POST['user']) && !empty($_POST['pass_1']) && !empty($_POST['pass_2'])) {
					$mask = $_POST['mask'];
					$tel = $_POST['tel'];
					$user_mix = $_POST['user'];
					$pass_1 = $_POST['pass_1'];
					$pass_2 = $_POST['pass_2'];

					$user_array = explode('-',$user_mix);
					if (isset($user_array[0]) && isset($user_array[1])) {
						$user = $user_array[0];
						$role = $user_array[1];
					}else{
						$return['act'] = "error";
						$return['message'] = "something went wrong try again later";
						echo json_encode($return);
						exit();
					}

					$mask_part = explode('-', $mask);
					if (isset($mask_part[0]) && isset($mask_part[1])) {
						$code = $mask_part[1];
						$mask = $mask_part[0];
					}else{
						$code = 0;
						$mask = 1;
					}

					$sent_og = strtoupper(trim($code));
					$code2 = $csrf->getToken();
					$mask2 = $sent_og.'-'.$code2.'-'.$tel;
					$mask_code = md5($mask2);


					if ($mask_code == $mask) {
						if ($pass_1 == $pass_2) {
							$rt = new hdev_db();
							$password = hdev_data::password_enc($pass_1);
							switch ($role) {
								case 'admin':
									$tab = $rt->table('main_auths');
		      						$ck = $rt->insert("UPDATE $tab SET `a_password` = :pwd WHERE `a_id` = :id",[[':pwd',$password],[':id',$user]]);
								break;
								case 'client':
									$tab = $rt->table('client');
		      						$ck = $rt->insert("UPDATE $tab SET `c_password` = :pwd WHERE `c_id` = :id",[[':pwd',$password],[':id',$user]]);
								break;	
								case 'cashier':
									$tab = $rt->table('cashier');
		      						$ck = $rt->insert("UPDATE $tab SET `c_password` = :pwd WHERE `c_id` = :id",[[':pwd',$password],[':id',$user]]);
								break;
								case 'loan_officer':
									$tab = $rt->table('loan_officer');
		      						$ck = $rt->insert("UPDATE $tab SET `lo_password` = :pwd WHERE `lo_id` = :id",[[':pwd',$password],[':id',$user]]);
								break;																			
								default:
									exit("access denied you can't change your password");
									break;
							}
							
						}else{
							$ck = "no";
							$pw = 1;
						}
      					if ($ck == "ok") {
							$return['act'] = "success";
							//$return['user'] = $user;
							$return['message'] = "Password For: [".$tel."] changed succesfull, You can now log in with the new password.";
							//$csrf->up_tk();
						}else{
							$return['act'] = "error";
							$return['message'] = (isset($pw)) ? "two passwords doesn't match" : 'Something went Wrong Try again later' ;;
						}
					}else{
						$return['act'] = "error";
						$return['message'] = "Code Entered is invalid or expired.";
					}
      				echo json_encode($return);
				}else{
					//var_dump($_POST);
					$return['act'] = "error";
					$return['message'] = "All Fields are required";
					echo json_encode($return);
				}
			break;
	
  			case 'location_select':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest($_POST['cover']);
				if (isset($_POST['type']) && !empty($_POST['type'])) {
      				switch ($_POST['type']) {
      					case 'district':
      						$province = (isset($_POST['prov'])) ? $_POST['prov'] : "" ;
      						echo hdev_data::locations("district",$province);
      					break;
      					case 'sector':
      						$province = (isset($_POST['prov'])) ? $_POST['prov'] : "" ;
      						$district = (isset($_POST['dist'])) ? $_POST['dist'] : "" ;
      						echo hdev_data::locations("sector",$province,$district);
      					break;
						case 'cell':
      						$province = (isset($_POST['prov'])) ? $_POST['prov'] : "" ;
      						$district = (isset($_POST['dist'])) ? $_POST['dist'] : "" ;
							$sector = (isset($_POST['sect'])) ? $_POST['sect'] : "" ;
      						echo hdev_data::locations("cell",$province,$district,$sector);
      					break;
      					case 'village':
      						$province = (isset($_POST['prov'])) ? $_POST['prov'] : "" ;
      						$district = (isset($_POST['dist'])) ? $_POST['dist'] : "" ;
							$sector = (isset($_POST['sect'])) ? $_POST['sect'] : "" ;  
      						$cell = (isset($_POST['cell'])) ? $_POST['cell'] : "" ;
      						echo hdev_data::locations("village",$province,$district,$sector,$cell);
      					break;
      					default:
      						echo "<option>Try again!</option>";
      					break;
      				}
      				
				}else{
					echo "all fields are required";
				}
			break;
			case 'slide':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (isset($_POST['p_title']) && !empty($_POST['p_title']) && isset($_POST['p_desc']) && !empty($_POST['p_desc']) && $_FILES && is_array($_FILES)) {
					$p_title = $_POST['p_title'];
					$p_desc = $_POST['p_desc'];
					$p_type = $_POST['ref'];
					$rt = new hdev_db();
      				$tab = $rt->table("slider"); 

					$up_files_array = $_FILES['p_pic'];
      				$countfiles = 1;
					$files_array = array();
						if (file_exists($up_files_array["tmp_name"])) {
							$file_type = $up_files_array["type"]; //returns the mimetype
							$allowed = array("image/jpeg", "image/gif", "image/png");
							if(!in_array($file_type, $allowed)) {
							}else{
								$ckup="";
								// Check file size
								if ($up_files_array["size"] > 50000000) {
								    $ckup = 1;
								}

								$fileData = pathinfo(basename($up_files_array["name"]));
								$fileName = "slide"."_upload_".uniqid() ."_t_".time() .'.' . $fileData['extension'];
								$regd = getcwd().DIRECTORY_SEPARATOR.'dist'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR;
								$target_path = $regd.$fileName;
								while(file_exists($target_path))
								{
								    $fileName = "slide"."_upload_".uniqid() ."_t_".time() .'.' . $fileData['extension'];
								    $regd = getcwd().DIRECTORY_SEPARATOR.'dist'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR;
									$target_path = $regd.$fileName;
								}
		 						if ($ckup == "") {
									if (move_uploaded_file($up_files_array["tmp_name"], $target_path))
									{
										array_push($files_array, $fileName);
									}
								}
							}
						}
					$reft = "";
					$reft = $files_array[0];

					if (strlen($reft) > 0) {
							$p_pic = $reft;

		      				$ck = $rt->insert("INSERT INTO `$tab` (`p_id`, `p_title`, `p_pic`, `p_desc`, `p_type`, `p_date`) VALUES (NULL, :p_title, :p_pic, :p_desc, :p_type, current_timestamp())",[[':p_title',$p_title],[':p_pic',$p_pic],[':p_desc',$p_desc],[':p_type',$p_type]]);
		      				if ($ck == "ok") {
      							$csrf->up_tk();
		      					hdev_note::message("New ".$p_type." registered");
		      					hdev_note::redirect(hdev_url::menu('modify/slide'));
		      					//echo "new service registered";
		      				}else{
		      					echo "error occured try again";
		      				}
	      				}else{
	      					echo "something went wrong try again later";
	      				}
					}else{
						echo "fill all fields";
					}
  			break;
			case 'client_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['c_name']) && !empty($_POST['c_nid']) && !empty($_POST['c_dob']) && !empty($_POST['c_email']) && !empty($_POST['c_tell']) && !empty($_POST['c_acc']) && !empty($_POST['loc_id']) && !empty($_POST['c_password'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$c_name = $_POST['c_name'];
					$c_nid = $_POST['c_nid'];
					$c_dob = $_POST['c_dob'];
					$c_email = $_POST['c_email'];
					$c_tell = $_POST['c_tell'];
					$loc_id = $_POST['loc_id'];
					$c_acc = $_POST['c_acc'];

					$c_password = hdev_data::password_enc($_POST['c_password']);
      				$tel = "";
      				if (isset($_POST['c_tell']) && !empty($_POST['c_tell'])) {
      					$tel = $_POST['c_tell'];
      					if (hdev_data::phone_valid($tel)) {
      						exit(hdev_data::phone_valid($tel));
      					}
      				}
      				if (isset($_POST['c_nid']) && !empty($_POST['c_nid'])) {
      					$c_nid = $_POST['c_nid'];
      					if (hdev_data::id_valid($c_nid)) {
      						exit(hdev_data::id_valid($c_nid));
      					}
      				}      				
					$rt = new hdev_db();
      				$tab = $rt->table("client"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`c_id`, `c_acc`, `c_name`, `c_nid`, `c_dob`, `c_tell`, `c_email`, `loc_id`, `c_password`, `c_reg_date`, `c_status`) VALUES (NULL,:c_acc, :c_name, :c_nid, :c_dob, :c_tell, :c_email, :loc_id, :c_password, current_timestamp(), :status)",[[':c_acc',$c_acc],[':c_name',$c_name],[':c_nid',$c_nid],[':c_dob',$c_dob],[':c_email',$c_email],[':c_tell',$c_tell],[':loc_id',$loc_id],[':c_password',$c_password],[':status',$status]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						if ($status == "2") {
      							hdev_note::live_sms($tel,'Your registration was successfull wait for the admins approval to start using the system!');
      							hdev_note::success("Your registration was successfull wait for the admins approval to start using the system!",$_POST['mod_close']);
      						}else{
      							hdev_note::live_sms($tel,'You are now registered at :'.constant('APP_NAME').' with username:'.$c_email.' and password:'.$c_password.' You can now login at: '.hdev_url::menu('login'));
      							hdev_note::success("Client registered well",$_POST['mod_close']);
      						}
      					}else{
      						if ($status == "2") {
      							hdev_note::live_sms($tel,'Your registration was successfull wait for the admins approval to start using the system!');
      							hdev_note::success("Your registration was successfull wait for the admins approval to start using the system!");
      						}else{
      							hdev_note::live_sms($tel,'You are now registered at :'.constant('APP_NAME').' with username:'.$c_email.' and password:'.$c_password.' You can now login at: '.hdev_url::menu('login'));
      							hdev_note::success("Client registered well");
      						}
      					}
      				}else{
      					echo "Something went Wrong please try again later";
      				}
				}else{
					echo "All Fields are required";
				}
			break;		
			case 'client_edit':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['c_id']) && !empty($_POST['c_name']) && !empty($_POST['c_nid']) && !empty($_POST['c_dob']) && !empty($_POST['c_email'])&& !empty($_POST['c_acc']) && !empty($_POST['c_tell']) && !empty($_POST['loc_id'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$c_name = $_POST['c_name'];
					$c_nid = $_POST['c_nid'];
					$c_dob = $_POST['c_dob'];
					$c_email = $_POST['c_email'];
					$c_tell = $_POST['c_tell'];
					$loc_id = $_POST['loc_id'];
					$c_acc = $_POST['c_acc'];

      				if (isset($_POST['c_nid']) && !empty($_POST['c_nid'])) {
      					$c_nid = $_POST['c_nid'];
      					if (hdev_data::id_valid($c_nid)) {
      						exit(hdev_data::id_valid($c_nid));
      					}
      				} 
					$c_id = $_POST['c_id'];
      				$tel = "";
      				if (isset($_POST['c_tell']) && !empty($_POST['c_tell'])) {
      					$tel = $_POST['c_tell'];
      					if (hdev_data::phone_valid($tel)) {
      						exit(hdev_data::phone_valid($tel));
      					}
      				}
					$rt = new hdev_db();
      				$tab = $rt->table("client"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("UPDATE `$tab` SET `c_acc`= :c_acc, `c_name` = :c_name, `c_nid` = :c_nid, `c_dob` = :c_dob, `c_tell` = :c_tell, `c_email` = :c_email, `loc_id` = :loc_id WHERE `c_id` = :c_id",[[":c_acc",$c_acc],[':c_name',$c_name],[':c_nid',$c_nid],[':c_dob',$c_dob],[':c_email',$c_email],[':c_tell',$c_tell],[':loc_id',$loc_id],[':c_id',$c_id]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						if ($status == "2") {
      							hdev_note::success("Client info modified well",$_POST['mod_close']);
      						}else{
      							hdev_note::success("Client info modified well",$_POST['mod_close']);
      						}
      					}else{
      						if ($status == "2") {
      							hdev_note::success("Client info modified well");
      						}else{
      							hdev_note::success("Client info modified well");
      						}
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;	
			case 'statement_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['s_start_date']) && !empty($_POST['s_end_date'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$s_start_date = $_POST['s_start_date'];
					$s_end_date = $_POST['s_end_date'];
					if ($s_start_date > $s_end_date) {
						exit('the start date is greater than end date!');
					}	
					$rt = new hdev_db();
      				$tab = $rt->table("statement"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`s_id`, `c_id`, `s_start_date`, `s_end_date`, `r_c_id`, `r_approve_status`, `r_date`, `gen_status`, `reg_date`) VALUES (NULL, :client, :s_start_date, :s_end_date, NULL, NULL, NULL, NULL, current_timestamp())",[[':client',$user],[':s_start_date',$s_start_date],[':s_end_date',$s_end_date]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						hdev_note::success("Statement request submitted well",$_POST['mod_close']);
      					}else{
      						
      						hdev_note::success("Statement request submitted well");
      					}
      				}else{
      					echo "Something went Wrong please try again later";
      				}
				}else{
					echo "All Fields are required";
				}
			break;
			case 'statement_approve':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['s_id']) && $_FILES && !empty($_FILES['s_att'])) {

					$s_id = $_POST['s_id'];

					$file1 = hdev_form::upload("s_att");
					if (isset($file1['message']) && $file1['message'] == "ok") {
						$s_att = $file1['name'];
					}else{
						exit("file upload went wrong try again later");
					}


					$rt = new hdev_db();
      				$tab = $rt->table("statement"); 
      				$c_id = hdev_log::uid();

      				$ck = $rt->insert("UPDATE `$tab` SET `s_att` = :s_att, `r_c_id` = :c_id, `r_approve_status` = '1', `r_date` = current_timestamp(), `gen_status` = '1' WHERE `s_id` = :s_id",[[':s_id',$s_id],[':s_att',$s_att],[':c_id',$c_id]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					$statement = hdev_data::statement($s_id,['data']);
      					$tell = hdev_data::client($statement['c_id'],['data'])['c_tell'];
      					hdev_note::live_sms($tell,"your statement application has been approved with id ".$s_id." you can login into your account and find the attached statement file");
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						hdev_note::success("Statement request approved well",$_POST['mod_close']);
      					}else{
      						
      						hdev_note::success("Statement request approved well");
      					}
      				}else{
      					echo "Something went Wrong please try again later";
      				}
				}else{
					echo "All Fields are required";
				}
			break;			
			case 'cashier_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['c_name']) && !empty($_POST['c_nid']) && !empty($_POST['c_dob']) && !empty($_POST['c_email']) && !empty($_POST['c_tell']) && !empty($_POST['c_acc']) && !empty($_POST['loc_id']) && !empty($_POST['c_password'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$c_name = $_POST['c_name'];
					$c_nid = $_POST['c_nid'];
					$c_dob = $_POST['c_dob'];
					$c_email = $_POST['c_email'];
					$c_tell = $_POST['c_tell'];
					$loc_id = $_POST['loc_id'];
					$c_acc = $_POST['c_acc'];

					$c_password = hdev_data::password_enc($_POST['c_password']);
      				$tel = "";
      				if (isset($_POST['c_tell']) && !empty($_POST['c_tell'])) {
      					$tel = $_POST['c_tell'];
      					if (hdev_data::phone_valid($tel)) {
      						exit(hdev_data::phone_valid($tel));
      					}
      				}
      				if (isset($_POST['c_nid']) && !empty($_POST['c_nid'])) {
      					$c_nid = $_POST['c_nid'];
      					if (hdev_data::id_valid($c_nid)) {
      						exit(hdev_data::id_valid($c_nid));
      					}
      				}      				
					$rt = new hdev_db();
      				$tab = $rt->table("cashier"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`c_id`, `c_acc`, `c_name`, `c_nid`, `c_dob`, `c_tell`, `c_email`, `loc_id`, `c_password`, `c_reg_date`, `c_status`) VALUES (NULL,:c_acc, :c_name, :c_nid, :c_dob, :c_tell, :c_email, :loc_id, :c_password, current_timestamp(), :status)",[[':c_acc',$c_acc],[':c_name',$c_name],[':c_nid',$c_nid],[':c_dob',$c_dob],[':c_email',$c_email],[':c_tell',$c_tell],[':loc_id',$loc_id],[':c_password',$c_password],[':status',$status]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						if ($status == "2") {
      							hdev_note::live_sms($tel,'Your registration was successfull wait for the admins approval to start using the system!');
      							hdev_note::success("Your registration was successfull wait for the admins approval to start using the system!",$_POST['mod_close']);
      						}else{
      							hdev_note::live_sms($tel,'You are now registered at :'.constant('APP_NAME').' with username:'.$c_email.' and password:'.$c_password.' You can now login at: '.hdev_url::menu('login'));
      							hdev_note::success("Cashier registered well",$_POST['mod_close']);
      						}
      					}else{
      						if ($status == "2") {
      							hdev_note::live_sms($tel,'Your registration was successfull wait for the admins approval to start using the system!');
      							hdev_note::success("Your registration was successfull wait for the admins approval to start using the system!");
      						}else{
      							hdev_note::live_sms($tel,'You are now registered at :'.constant('APP_NAME').' with username:'.$c_email.' and password:'.$c_password.' You can now login at: '.hdev_url::menu('login'));
      							hdev_note::success("Cashier registered well");
      						}
      					}
      				}else{
      					echo "Something went Wrong please try again later";
      				}
				}else{
					echo "All Fields are required";
				}
			break;		
			case 'cashier_edit':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['c_id']) && !empty($_POST['c_name']) && !empty($_POST['c_nid']) && !empty($_POST['c_dob']) && !empty($_POST['c_email'])&& !empty($_POST['c_acc']) && !empty($_POST['c_tell']) && !empty($_POST['loc_id'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$c_name = $_POST['c_name'];
					$c_nid = $_POST['c_nid'];
					$c_dob = $_POST['c_dob'];
					$c_email = $_POST['c_email'];
					$c_tell = $_POST['c_tell'];
					$loc_id = $_POST['loc_id'];
					$c_acc = $_POST['c_acc'];

      				if (isset($_POST['c_nid']) && !empty($_POST['c_nid'])) {
      					$c_nid = $_POST['c_nid'];
      					if (hdev_data::id_valid($c_nid)) {
      						exit(hdev_data::id_valid($c_nid));
      					}
      				} 
					$c_id = $_POST['c_id'];
      				$tel = "";
      				if (isset($_POST['c_tell']) && !empty($_POST['c_tell'])) {
      					$tel = $_POST['c_tell'];
      					if (hdev_data::phone_valid($tel)) {
      						exit(hdev_data::phone_valid($tel));
      					}
      				}
					$rt = new hdev_db();
      				$tab = $rt->table("cashier"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("UPDATE `$tab` SET `c_acc`= :c_acc, `c_name` = :c_name, `c_nid` = :c_nid, `c_dob` = :c_dob, `c_tell` = :c_tell, `c_email` = :c_email, `loc_id` = :loc_id WHERE `c_id` = :c_id",[[":c_acc",$c_acc],[':c_name',$c_name],[':c_nid',$c_nid],[':c_dob',$c_dob],[':c_email',$c_email],[':c_tell',$c_tell],[':loc_id',$loc_id],[':c_id',$c_id]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						if ($status == "2") {
      							hdev_note::success("Cashier info modified well",$_POST['mod_close']);
      						}else{
      							hdev_note::success("Cashier info modified well",$_POST['mod_close']);
      						}
      					}else{
      						if ($status == "2") {
      							hdev_note::success("Cashier info modified well");
      						}else{
      							hdev_note::success("Cashier info modified well");
      						}
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;	
			case 'loan_officer_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['lo_name']) && !empty($_POST['lo_nid']) && !empty($_POST['lo_dob']) && !empty($_POST['lo_email']) && !empty($_POST['lo_tell']) && !empty($_POST['lo_acc']) && !empty($_POST['loc_id']) && !empty($_POST['lo_password'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$lo_name = $_POST['lo_name'];
					$lo_nid = $_POST['lo_nid'];
					$lo_dob = $_POST['lo_dob'];
					$lo_email = $_POST['lo_email'];
					$lo_tell = $_POST['lo_tell'];
					$loc_id = $_POST['loc_id'];
					$lo_acc = $_POST['lo_acc'];

					$lo_password = hdev_data::password_enc($_POST['lo_password']);
      				$tel = "";
      				if (isset($_POST['lo_tell']) && !empty($_POST['lo_tell'])) {
      					$tel = $_POST['lo_tell'];
      					if (hdev_data::phone_valid($tel)) {
      						exit(hdev_data::phone_valid($tel));
      					}
      				}
      				if (isset($_POST['lo_nid']) && !empty($_POST['lo_nid'])) {
      					$lo_nid = $_POST['lo_nid'];
      					if (hdev_data::id_valid($lo_nid)) {
      						exit(hdev_data::id_valid($lo_nid));
      					}
      				}      				
					$rt = new hdev_db();
      				$tab = $rt->table("loan_officer"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`lo_id`, `lo_acc`, `lo_name`, `lo_nid`, `lo_dob`, `lo_tell`, `lo_email`, `loc_id`, `lo_password`, `lo_reg_date`, `lo_status`) VALUES (NULL,:lo_acc, :lo_name, :lo_nid, :lo_dob, :lo_tell, :lo_email, :loc_id, :lo_password, current_timestamp(), :status)",[[':lo_acc',$lo_acc],[':lo_name',$lo_name],[':lo_nid',$lo_nid],[':lo_dob',$lo_dob],[':lo_email',$lo_email],[':lo_tell',$lo_tell],[':loc_id',$loc_id],[':lo_password',$lo_password],[':status',$status]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						if ($status == "2") {
      							hdev_note::live_sms($tel,'Your registration was successfull wait for the admins approval to start using the system!');
      							hdev_note::success("Your registration was successfull wait for the admins approval to start using the system!",$_POST['mod_close']);
      						}else{
      							hdev_note::live_sms($tel,'You are now registered at :'.constant('APP_NAME').' with username:'.$lo_email.' and password:'.$lo_password.' You can now login at: '.hdev_url::menu('login'));
      							hdev_note::success("Loan Officer registered well",$_POST['mod_close']);
      						}
      					}else{
      						if ($status == "2") {
      							hdev_note::live_sms($tel,'Your registration was successfull wait for the admins approval to start using the system!');
      							hdev_note::success("Your registration was successfull wait for the admins approval to start using the system!");
      						}else{
      							hdev_note::live_sms($tel,'You are now registered at :'.constant('APP_NAME').' with username:'.$lo_email.' and password:'.$lo_password.' You can now login at: '.hdev_url::menu('login'));
      							hdev_note::success("Loan Officer registered well");
      						}
      					}
      				}else{
      					echo "Something went Wrong please try again later";
      				}
				}else{
					echo "All Fields are required";
				}
			break;		
			case 'loan_officer_edit':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['lo_id']) && !empty($_POST['lo_name']) && !empty($_POST['lo_nid']) && !empty($_POST['lo_dob']) && !empty($_POST['lo_email'])&& !empty($_POST['lo_acc']) && !empty($_POST['lo_tell']) && !empty($_POST['lo_id'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$lo_name = $_POST['lo_name'];
					$lo_nid = $_POST['lo_nid'];
					$lo_dob = $_POST['lo_dob'];
					$lo_email = $_POST['lo_email'];
					$lo_tell = $_POST['lo_tell'];
					$lo_id = $_POST['lo_id'];
					$lo_acc = $_POST['lo_acc'];

      				if (isset($_POST['lo_nid']) && !empty($_POST['lo_nid'])) {
      					$lo_nid = $_POST['lo_nid'];
      					if (hdev_data::id_valid($lo_nid)) {
      						exit(hdev_data::id_valid($lo_nid));
      					}
      				} 
					$loc_id = $_POST['loc_id'];
      				$tel = "";
      				if (isset($_POST['lo_tell']) && !empty($_POST['lo_tell'])) {
      					$tel = $_POST['lo_tell'];
      					if (hdev_data::phone_valid($tel)) {
      						exit(hdev_data::phone_valid($tel));
      					}
      				}
					$rt = new hdev_db();
      				$tab = $rt->table("loan_officer"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("UPDATE `$tab` SET `lo_acc`= :lo_acc, `lo_name` = :lo_name, `lo_nid` = :lo_nid, `lo_dob` = :lo_dob, `lo_tell` = :lo_tell, `lo_email` = :lo_email, `loc_id` = :loc_id WHERE `lo_id` = :lo_id",[[":lo_acc",$lo_acc],[':lo_name',$lo_name],[':lo_nid',$lo_nid],[':lo_dob',$lo_dob],[':lo_email',$lo_email],[':lo_tell',$lo_tell],[':loc_id',$loc_id],[':lo_id',$lo_id]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						if ($status == "2") {
      							hdev_note::success("Loan Officer info modified well",$_POST['mod_close']);
      						}else{
      							hdev_note::success("Loan Officer info modified well",$_POST['mod_close']);
      						}
      					}else{
      						if ($status == "2") {
      							hdev_note::success("Loan Officer info modified well");
      						}else{
      							hdev_note::success("Loan Officer info modified well");
      						}
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;		
			case 'withdraw_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['w_amount']) && !empty($_POST['w_ref']) && !empty($_POST['w_rec_date'])) {
					$status = "" ;
					$w_amount = $_POST['w_amount'];
					$w_ref = $_POST['w_ref'];
					$w_rec_date = $_POST['w_rec_date'];

					$rt = new hdev_db();
      				$tab = $rt->table("withdraw"); 
      				$c_id = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`w_id`, `c_id`, `w_amount`, `w_ref`, `w_rec_date`, `r_c_id`, `r_approve_status`, `r_date`, `gen_status`, `reg_date`) VALUES (NULL, :c_id, :w_amount, :w_ref, :w_rec_date, NULL, NULL, NULL, NULL, current_timestamp())",[[':c_id',$c_id],[':w_amount',$w_amount],[':w_ref',$w_ref],[':w_rec_date',$w_rec_date]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      							hdev_note::success("withdraw Request Submitted Waiting for approval",$_POST['mod_close']);
      					}else{
      							hdev_note::success("withdraw Request Submitted Waiting for approval");
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;
			case 'loan_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
    			//var_dump($_POST);
				if (!empty($_POST['l_amount']) && !empty($_POST['l_ref']) && $_FILES && isset($_FILES['l_att'])) {

					$status = "" ;
					$l_amount = $_POST['l_amount'];
					$l_ref = $_POST['l_ref'];
					//check if client account was registered before 3 months today
					$client = hdev_data::client(hdev_log::uid(),['data']);
					$reg_date = $client['c_reg_date'];
					$reg_date = strtotime($reg_date);
					$reg_date = strtotime("+3 month",$reg_date);
					$today = strtotime(date("Y-m-d"));
					if ($reg_date > $today) {
						exit("Client account must be registered before 3 months before loan application");
					}
					//upload file
					$file1 = hdev_form::upload("l_att");
					if (isset($file1['message']) && $file1['message'] == "ok") {
						$l_att = $file1['name'];
					}else{
						exit("file upload went wrong try again later");
					}
					$rt = new hdev_db();
      				$tab = $rt->table("loan"); 
      				$c_id = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`l_id`, `c_id`, `l_desc`, `l_amount`, `l_att`, `lo_id`, `lo_approve_status`, `lo_approve_date`, `l_reg_date`, `gen_status`) VALUES (NULL, :c_id, :l_ref, :l_amount, :l_att, NULL, NULL, NULL, current_timestamp(), NULL)",[[':c_id',$c_id],[':l_amount',$l_amount],[':l_ref',$l_ref],[':l_att',$l_att]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      							hdev_note::success("loan Request Submitted Waiting for approval",$_POST['mod_close']);
      					}else{
      							hdev_note::success("loan Request Submitted Waiting for approval");
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;							
			case 'service_reg':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['s_name']) && !empty($_POST['s_desc']) && !empty($_POST['s_content'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$s_name = $_POST['s_name'];
					$s_desc = $_POST['s_desc'];
					$s_content = $_POST['s_content'];

					$rt = new hdev_db();
      				$tab = $rt->table("service"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("INSERT INTO `$tab` (`s_id`, `s_name`, `s_desc`, `s_content`, `s_reg_date`, `s_status`) VALUES (NULL, :s_name, :s_desc, :s_content, current_timestamp(), '1')",[[':s_name',$s_name],[':s_desc',$s_desc],[':s_content',$s_content]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      							hdev_note::success("Certificate registered well",$_POST['mod_close']);
      					}else{
      							hdev_note::success("Certificate registered well");
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;	
			case 'service_edit':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest();
				if (!empty($_POST['s_id']) && !empty($_POST['s_name']) && !empty($_POST['s_desc']) && !empty($_POST['s_content'])) {
					$status = (hdev_log::fid() == "guest") ? "2" : "1" ;
					$s_id = $_POST['s_id'];
					$s_name = $_POST['s_name'];
					$s_desc = $_POST['s_desc'];
					$s_content = $_POST['s_content'];

					$rt = new hdev_db();
      				$tab = $rt->table("service"); 
      				$user = hdev_log::uid();

      				$ck = $rt->insert("UPDATE `$tab` SET `s_name` = :s_name, `s_desc` = :s_desc, `s_content` = :s_content WHERE `s_id` = :s_id",[[':s_id',$s_id],[':s_name',$s_name],[':s_desc',$s_desc],[':s_content',$s_content]]);
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      							hdev_note::success("Certificate modified well",$_POST['mod_close']);
      					}else{
      							hdev_note::success("Certificate modified well");
      					}
      				}else{
      					echo "Something went Wrong Try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;			
			case 'user_edit':
				$csrf = new CSRF_Protect();
    			$csrf->verifyRequest(); 
				if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel'])) {
					$name = $_POST['name'];

					$email = $_POST['email'];
					$tel = $_POST['tel'];
      				if (hdev_data::phone_valid($tel)) {
      					exit(hdev_data::phone_valid($tel));
      				}
					$id = hdev_log::uid();
					$rt = new hdev_db();
		      		$tab = $rt->auth_tbl();

					switch (hdev_log::fid()) {
						case 'admin':
							$ck = $rt->insert("UPDATE `$tab` SET `a_name` = :name, `a_tel` = :tel, `a_email` = :email WHERE `a_id` = :id",[[":id",$id],[':name',$name],[":email",$email],[":tel",$tel]]);
						break;
						case 'loan_officer':
							$ck = $rt->insert("UPDATE `$tab` SET `lo_name` = :name, `lo_tell` = :tel, `lo_email` = :email WHERE `lo_id` = :id",[[":id",$id],[':name',$name],[":email",$email],[":tel",$tel]]);
						break;
						case 'cashier':
							$ck = $rt->insert("UPDATE `$tab` SET `c_name` = :name, `c_tell` = :tel, `c_email` = :email WHERE `c_id` = :id",[[":id",$id],[':name',$name],[":email",$email],[":tel",$tel]]);
						break;
						case 'client':
							$ck = $rt->insert("UPDATE `$tab` SET `c_name` = :name, `c_tell` = :tel, `c_email` = :email WHERE `c_id` = :id",[[":id",$id],[':name',$name],[":email",$email],[":tel",$tel]]);
						break;						
						default:
							exit("access denied you can't edit your user info");
							break;
					}

      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						hdev_note::success("User info Updated",$_POST['mod_close']);
      					}else{
      						hdev_note::success("User info Updated");
      					}
      				}else{
      					echo "something went wrong try again later";
      				}
				}else{
					echo "all fields are required";
				}
			break;			
			case 'self_change_user_pwd':
				$csrf = new CSRF_Protect(); 
    			$csrf->verifyRequest();
				if (!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
					$id = hdev_log::uid();
					$new_password = $_POST['new_password'];
					$confirm_password = $_POST['confirm_password'];
					$old_password = $_POST['old_password'];

					if ($new_password != $confirm_password) {
						exit("New and Confirm Passwords do not match!");
					}

					$password = hdev_data::password_enc($new_password);
					$old_password_hash = hdev_data::password_enc($old_password);
					$id = hdev_log::uid();
					$rt = new hdev_db();
		      		$tab = $rt->auth_tbl();

					switch (hdev_log::fid()) {
						case 'admin':
							$old_password_db = hdev_data::get_admin(hdev_log::uid(),['data'])["a_password"];
							$user = hdev_data::get_admin(hdev_log::uid(),['data'])["a_name"];
							if ($old_password_hash != $old_password_db) {
								exit("Provided current password is incorrect.");
							}
      						$ck = $rt->insert("UPDATE $tab SET `a_password` = :pwd WHERE `a_id` = :id",[[':pwd',$password],[':id',$id]]);
						break;	
						case 'loan_officer':
							$old_password_db = hdev_data::loan_officer(hdev_log::uid(),['data'])["lo_password"];
							$user = hdev_data::loan_officer(hdev_log::uid(),['data'])["lo_name"];
							if ($old_password_hash != $old_password_db) {
								exit("Provided current password is incorrect.");
							}
      						$ck = $rt->insert("UPDATE $tab SET `lo_password` = :pwd WHERE `lo_id` = :id",[[':pwd',$password],[':id',$id]]);
						break;	
						case 'cashier':
							$old_password_db = hdev_data::cashier(hdev_log::uid(),['data'])["c_password"];
							$user = hdev_data::cashier(hdev_log::uid(),['data'])["c_name"];
							if ($old_password_hash != $old_password_db) {
								exit("Provided current password is incorrect.");
							}
      						$ck = $rt->insert("UPDATE $tab SET `c_password` = :pwd WHERE `c_id` = :id",[[':pwd',$password],[':id',$id]]);
						break;
						case 'client':
							$old_password_db = hdev_data::client(hdev_log::uid(),['data'])["c_password"];
							$user = hdev_data::client(hdev_log::uid(),['data'])["c_name"];
							if ($old_password_hash != $old_password_db) {
								exit("Provided current password is incorrect.");
							}
      						$ck = $rt->insert("UPDATE $tab SET `c_password` = :pwd WHERE `c_id` = :id",[[':pwd',$password],[':id',$id]]);
						break;																					
						default:
							exit("access denied you can't change your password");
							break;
					}
      				if ($ck == "ok") {
      					$csrf->up_tk();
      					if (isset($_POST['mod_close']) && !empty($_POST['mod_close'])) {
      						hdev_note::success("Password for User: \" <u>".$user."</u> \" changed",$_POST['mod_close']);
      					}else{
      						hdev_note::success("Password for User: \" <u>".$user."</u> \" changed");
      					}
      				}else{
      					echo "something went wrong try again later";
      				}

				}else{
					echo "all fields are required";
				}
			break;
			default:
				echo "404! Sorry we can't see what you are looking for please refesh this page and try again.";
			break;
		}
		}
		//var_dump($_POST);
	}

 ?>