<?php

ini_set("display_errors","2");
ERROR_REPORTING(E_ALL);

include_once(dirname(__FILE__)."/database.php");
include_once(dirname(__FILE__)."/mailer.php");

class Session {
	var $user = array();
	var $user_id;
	var $artist = array();
	var $artist_id;
	var $time;
	var $logged_in;
	var $referrer;
	var $acctname;	
	var $email;	

	function Session() {
		$this->time = time();
		$this->startSession();
	}

	function startSession(){
		global $database;

		//$cookie_auth	= generateRandStr(10)."_".COOKIE_DOMAIN;
		//$auth_key 		= md5($cookie_auth);

		//ini_set('session.cookie_domain', COOKIE_DOMAIN);
		//ini_set('session.value', $auth_key);
		//ini_set('session.cookie_lifetime', time()+COOKIE_EXPIRE);

		//setcookie(COOKIE_SESSION, $auth_key, time()+COOKIE_EXPIRE, COOKIE_PATH, NULL, false, false);
		
		// set default session length

		//session_set_cookie_params(14400);

		ini_set('session.name', COOKIE_SESSION);
		ini_set('session.cookie_lifetime', 0);
		ini_set('session.gc_maxlifetime', 14400);

		@session_start();

		$this->logged_in = $this->checkLogin();

	}

	function login($email, $pass){
		global $database;

		$email = stripslashes($email);
		
		$this->user  			= $database->get_user($email);
		
		$_SESSION['user_id'] 	= $this->user['id'];
		$_SESSION['email'] 		= $email;
		$_SESSION['timeout'] 	= time();
		$_SESSION['artist_id']	= 0;
		$_SESSION['artist']		= NULL;

		return true;

	}

	function checkLogin(){
		global $database, $db_books;

		if(isset($_COOKIE[COOKIE_USER]) && isset($_COOKIE[COOKIE_USERID])){
			$this->email 	= $_SESSION['email'] 	= $_COOKIE[COOKIE_USER];
			$this->user_id	= $_SESSION['user_id']	= $_COOKIE[COOKIE_USERID];
		}

		if(isset($_SESSION['timeout'])){
			
			if ((time() - $_SESSION['timeout']) > 14400) {
				$this->logout();
				return false;
			}

/*			
			if($database->confirmUserID($_SESSION['email'], $_SESSION['user_id']) != 0){
				//unset($_SESSION['email']);
				//unset($_SESSION['user_id']);
				session_unset();
				return false;
			}

*/

			// regenerates the session id (duh)
			session_regenerate_id(true);

			$_SESSION['timeout'] = time();

			$this->user  		= $database->get_user($_SESSION['email']);
			$this->user_id	 	= $this->user['id'];
			$this->is_admin		= $database->is_admin($this->user_id);
			$this->email	 	= $this->user['email'];
			$this->acctname		= stripslashes($this->user['firstname'])." ".stripslashes($this->user['lastname']);

			$this->artist  		= $_SESSION['artist'];
			$this->artist_id	= $_SESSION['artist_id'];

			$this->logged_in 	= true;

			return true;

		} else {
		
			return false;

		}
	}

	function logout(){
		global $database;

		if(isset($_COOKIE[COOKIE_USER]) && isset($_COOKIE[COOKIE_USERID])){
			setcookie(COOKIE_USER, "", time()-COOKIE_EXPIRE, COOKIE_PATH);
			setcookie(COOKIE_USERID, "", time()-COOKIE_EXPIRE, COOKIE_PATH);
		}

		session_unset();

		session_destroy();

		$this->logged_in = false;
		$this->is_admin = false;

		header("Location: ".MAINURL);

	}

	function is_user($redirect_url = "", $ref_url = false, $is_ref = false){

		$proc_url = MAINURL;
		$proc_url .= $redirect_url;
		$proc_url .= ($ref_url ? "?ref=".$ref_url : false);

		if($this->checkLogin()) {

			if ($is_ref)
				return true;

			else if($ref_url)
				header("Location: ".$proc_url);

			else if ($redirect_url)
				header("Location: ".$proc_url);
			
		} else {

			header("Location: ".$proc_url);

		}		

	}

	function is_user_old($ref_path = "", $ref_url = false){

		if($this->checkLogin() && $ref_path)
			header("Location: ".MAINURL.$ref_path);

		else if($this->checkLogin())
			return true;

		else if($ref_url)
			header("Location: ".MAINURL.$ref_path."?ref=".$ref_url);

		else
			header("Location: ".MAINURL.$ref_path);

	}

	function is_admin($inc_url, $ref_url = false){

		if($inc_url == "admin/login" && !$this->logged_in)
			return true;

		else if($inc_url == "admin/login" && $this->is_admin)
			header("Location: ".MAINURL.$ref_url);

		else if($inc_url == "admin/login")
			header("Location: ".MAINURL);

		else if($inc_url == "index" && $this->is_admin)
			return true;

		else if($inc_url == "index" && !$this->is_admin)
			header("Location: ".MAINURL.$ref_url);

	}

	function get_permissions($o_type, $p_type, $module, $action=false, $redirect=false, $referrer=false){
		global $database;
		
		if($this->logged_in && $database->db_permissions($o_type, $p_type, $module, $action))
			return true;

		else
			if($redirect)
				if(is_string($referrer))
					header("Location: ".MAINURL.$redirect."?ref=".$referrer);
				else
					header("Location: ".MAINURL);
			else
				return false;

	}

	function set_arist_id($artist){

		$this->artist 			= $artist;
		$_SESSION['artist'] 	= $artist;

		$this->artist_id 		= (int) $artist['id'];
		$_SESSION['artist_id'] 	= (int) $artist['id'];

		return $this->artist_id;

	}

};

$session = new Session;

?>