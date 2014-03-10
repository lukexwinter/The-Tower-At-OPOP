<?php

include_once($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/modules/users/includes/session.php");

class Process {
	
	function Process() {
		global $session;

		if (isset($_POST['login']))
			$this->proc_Login();

		else if (isset($_POST['register']))
			$this->proc_Register();

		else if (isset($_POST['logout']))
			$this->proc_Logout();

		else if (isset($_POST['update']))
			$this->proc_UpdateSession();

		else if (isset($_POST['getEmail']))
			$this->proc_GetEmail();
		
		else if (isset($_POST['forgotpass']))
			$this->proc_ForgotPass();

		else if (isset($_POST['editAccount']))
			$this->proc_EditAccount();

	}

	function proc_UpdateSession() {

		$_SESSION['timeout'] = time();

		$json = array(
			'success' => true,
			'timeout' => $_SESSION['timeout']
		);
		
		echo json_encode($json);

	}

	function proc_Logout() {
		global $session;

		$session->logout();

		$json = array(
			'success' => true
		);
		
		echo json_encode($json);

	}

	function proc_Login() {
		global $session, $database;

		$referrer 	= (!empty($_POST['referrer']) ? $_POST['referrer']."?is_ref=true" : "");

		$password 	= md5(PASSWORD_SALT.$_POST['pass']);
		
		$result 	= $database->check_password($_POST['email'], $password);

		$isActive 	= $database->is_active($_POST['email']);

		if($isActive == 1){

			// account doesn't exist
			$json = array(
				'email' => true,
				'message' => "The account does not exist."
			);

		} else if($isActive == 2){

			$json = array(
				'email' => true,
				'message' => "The account has been deactivated."
			);

		} else if($result == 1){

			// email not found
			$json = array(
				'email' => true,
				'message' => "That email was not found."
			);

		} else if($result == 2){
			
			// incorrect password
			$json = array(
				'password' => true,
				'message' => "That password is invalid."
			);

		} else {
			
			$retval = $session->login($_POST['email'], $password);
	
			if ($retval) {
				
				$json = array(
					'success' 	=> true,
					'referrer' 	=> $referrer,
					'message' 	=> $retval
				);
				
			} else {
	
				$json = array(
					'password' => true,
					'message' => "Your password is incorrect."
				);
			}
			
		}

		echo json_encode($json);

	}

	function proc_Register() {
		global $session, $database;

//		$referrer 	= (!empty($_POST['referrer']) ? $_POST['referrer']."?is_ref=true" : "");

		$password 	= md5(PASSWORD_SALT.$_POST['regpass']);

		$user_id 	= $database->add_users($_POST, $password, 1);

		if($user_id) {

//			$session->login($_POST['email'], $_POST['regpass']);

//			$json = array(
//				'success' => true,
//				'referrer' => $referrer,
//				'message' => "You have successfully registered."
//			);

			$json = array(
				'success' => true,
				'message' => "Thank you for your interest."
			);
			
		} else {

			$json = array(
				'error' => true,
				'message' => "There was an error processing your request."
			);

		}
		
		echo json_encode($json);

	}

	function proc_EditAccount(){
		global $database;

		$email = $database->check_users("email", $_POST['email'], $_POST['id']);
		
		if($email) {
			
			$json = array(
				'email' => true,
				'message' => "That email address is already in use."
			);
	
		} else {

			$password 	= md5(PASSWORD_SALT.$_POST['regpass']);

			if(!empty($_POST['regpass']))
				$database->update_users($_POST['id'], "password", $password);
			
			$database->update_users($_POST['id'], "firstname", $_POST['firstname']);
			$database->update_users($_POST['id'], "lastname", $_POST['lastname']);
			$database->update_users($_POST['id'], "email", $_POST['email']);
			$database->update_users($_POST['id'], "phone", $_POST['phone']);
			$database->update_users($_POST['id'], "address1", $_POST['address1']);
			$database->update_users($_POST['id'], "address2", $_POST['address2']);
			$database->update_users($_POST['id'], "city", $_POST['city']);
			$database->update_users($_POST['id'], "state", $_POST['state']);
			$database->update_users($_POST['id'], "zip", $_POST['zip']);

			$_SESSION['email'] = $_POST['email'];

		}

		$json = array(
			'success' => true
		);

		echo json_encode($json);

	}
	
	function proc_ForgotPass() {
		global $database, $ml_users;
		
		$user = $database->info_email($_POST['email']);
		
		if(is_array($user)) {
			
			$password = randomPassword();

			$database->update_users($user['id'], "password", md5(PASSWORD_SALT.$password));

			$ml_users->send_Password($user['firstname'], $user['lastname'], $user['email'], $password);
			
			$json = array(
				'success' => true
			);
			
		} else {

			$json = array(
				'error' => true
			);

		}

		echo json_encode($json);

	}

	function proc_GetEmail() {
		global $database;

		unset($_POST['getEmail']);

		$id 	= (isset($_POST['id']) ? $_POST['id'] : 0);

		$req 	= $database->check_users("email", $_POST['email'], $id);

		$value 	= ($req ? "false" : "true");

		echo $value;

	}

};

$process = new Process;

?>