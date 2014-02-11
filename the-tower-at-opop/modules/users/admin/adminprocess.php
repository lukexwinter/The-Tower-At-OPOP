<?php

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

class AdminProcess {

	function AdminProcess(){
		global $session;

		if (isset($_POST['login']))
			$this->proc_Login();

		else if (isset($_POST['addUsers']))
			$this->proc_AddUsers();

		else if (isset($_POST['editUsers']))
			$this->proc_EditUsers();

		else if (isset($_POST['editAdministrators']))
			$this->proc_EditAdministrators();

		else if (isset($_POST['editMyAccount']))
			$this->proc_EditMyAccount();

		else if (isset($_POST['listUsers']))
			$this->proc_ListUsers();

		else if (isset($_POST['listAdministrators']))
			$this->proc_ListAdministrators();

		else if (isset($_POST['getEmail']))
			$this->proc_GetEmail();

		else if (isset($_POST['changeStatus']))
			$this->proc_ChangeStatus();

		else if (isset($_POST['delete']))
			$this->proc_Delete();

		else if (isset($_POST['delbulk']))
			$this->proc_DeleteBulk();

		else if ($session->logged_in)
			$this->proc_Logout();

		else
			header("Location: ".MAINURL);

	}

	function proc_ListUsers(){
		global $database;

		$orderby 	= "";
		$hash		= "";
		$page		= $_POST['page']; // get the requested page
		$limit		= $_POST['rows']; // get how many rows we want to have into the grid
		$sidx		= $_POST['sidx']; // get index row - i.e. user click to sort
		$sord		= $_POST['sord']; // get the direction
		
		if(!$sidx)
			$sidx = 1;
		
		$sidx = explode(",", $sidx);
        
		for($i=0;$i<count($sidx);$i++){
			($i>0)?$hash = ", ": "";
			$orderby .= $hash.$sidx[$i]." ".$sord;
        }

		$sql = "SELECT
					id 
				FROM 
					".TBL_USERS." 
				WHERE
					status = 2
			";

		$result 		= $database->query($sql);
		$rowcount 		= mysql_numrows($result);
		
		$total_pages 	= ($rowcount > 0 ? ceil($rowcount/$limit) : 0);

		if($page > $total_pages)
			$page=$total_pages;

		$start = max(0, (($limit*$page) - $limit));

		$q = "SELECT 
					id, 
					firstname, 
					lastname, 
					status 
				FROM 
					".TBL_USERS." 
				WHERE
					status = 2
				ORDER BY 
					$orderby 
				LIMIT 
					$start, 
					$limit
			";
			
		$res = $database->query($q);
		
		$response->page 	= $page;
		$response->total 	= $total_pages;
		$response->records 	= $rowcount;

		$k=0;

		while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	
			$user_id 	= stripslashes($row['id']);
			$firstname 	= stripslashes($row['firstname']);
			$lastname 	= stripslashes($row['lastname']);
			$status 	= stripslashes($row['status']);

			$output 	= array();

			$output[] 	= "<a href=\"users-edit.php?id=".$user_id."\">".$lastname.", ".$firstname."</a>";

			if(!$status)
				$output[] = "<a href=\"#\" rel=\"".$user_id."\" class=\"activate\" title=\"Activate\">activate</a>";
			else
				$output[] = "<a href=\"#\" rel=\"".$user_id."\" class=\"deactivate\" title=\"Deactivate\">deactivate</a>";

			$output[] 	= "<a href=\"#\" rel=\"".$user_id."\" class=\"addHours\">Add Hours</a>&nbsp;<a href=\"users-edit.php?id=".$user_id."\" class=\"edit iframe\" title=\"Edit\">Edit</a>&nbsp;<a href=\"#\" class=\"delete\" rel=\"".$user_id."\" title=\"Delete\">Delete</a>";

			$response->rows[$k]['id']	= $user_id;
			$response->rows[$k]['cell']	= $output;

			$k++;

		}

		echo json_encode($response);

	}

	function proc_ListAdministrators(){
		global $database;

		$orderby 	= "";
		$hash		= "";
		$page		= $_POST['page']; // get the requested page
		$limit		= $_POST['rows']; // get how many rows we want to have into the grid
		$sidx		= $_POST['sidx']; // get index row - i.e. user click to sort
		$sord		= $_POST['sord']; // get the direction
		
		if(!$sidx)
			$sidx = 1;
		
		$sidx = explode(",", $sidx);
        
		for($i=0;$i<count($sidx);$i++){
			($i>0)?$hash = ", ": "";
			$orderby .= $hash.$sidx[$i]." ".$sord;
        }

		$sql = "SELECT 
					u.id 
				FROM 
					".TBL_USERS." AS u
				LEFT JOIN
					".TBL_PERMISSIONS_LIST." AS pl
				ON
					u.id = pl.user_id
				LEFT JOIN
					".TBL_PERMISSIONS." AS p  
				ON 
					pl.mod_id = p.id
				GROUP BY
					u.id
			";

		$result 		= $database->query($sql);
		$rowcount 		= mysql_numrows($result);
		
		$total_pages 	= ($rowcount > 0 ? ceil($rowcount/$limit) : 0);

		if($page > $total_pages)
			$page=$total_pages;

		$start = max(0, (($limit*$page) - $limit));

		$q = "SELECT 
					u.id AS id, 
					u.firstname AS firstname, 
					u.lastname AS lastname, 
					u.status AS status 
				FROM 
					".TBL_USERS." AS u
				LEFT JOIN
					".TBL_PERMISSIONS_LIST." AS pl
				ON
					u.id = pl.user_id
				LEFT JOIN
					".TBL_PERMISSIONS." AS p  
				ON 
					pl.mod_id = p.id
				GROUP BY
					u.id
				ORDER BY 
					$orderby 
				LIMIT 
					$start, 
					$limit";

		$res = $database->query($q);
		$cnt = mysql_numrows($res);
		
		$response->page 	= $page;
		$response->total 	= $total_pages;
		$response->records 	= $rowcount;

		$k=0;

		while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	
			$user_id 	= stripslashes($row['id']);
			$firstname 	= stripslashes($row['firstname']);
			$lastname 	= stripslashes($row['lastname']);
			$status 	= stripslashes($row['status']);

			$output 	= array();

			$output[] 	= "<a href=\"admin-edit.php?id=".$user_id."\">".$lastname.", ".$firstname."</a>";

			if($status == 1)
				$output[] = "<a href=\"#\" rel=\"".$user_id."\" class=\"deactivate\" title=\"Deactivate\">deactivate</a>";
			else
				$output[] = "<a href=\"#\" rel=\"".$user_id."\" class=\"activate\" title=\"Activate\">activate</a>";

			$output[] 	= "<a href=\"users-edit.php?id=".$user_id."\" class=\"edit\" title=\"Edit\">Edit</a>&nbsp;<a href=\"#\" class=\"delete\" rel=\"".$user_id."\" title=\"Delete\">Delete</a>";

			$response->rows[$k]['id']	= $user_id;
			$response->rows[$k]['cell']	= $output;

			$k++;

		}

		echo json_encode($response);

	}

	function proc_AddUsers() {
		global $database;

		$status 	= (isset($_POST['status']) ? 1 : 0);
		$password 	= md5(PASSWORD_SALT.$_POST['regpass']);

		$user_id 	= $database->add_users($_POST, $password, $status);
		
		if($user_id) {

			//$location_id = $database->add_users_locations($_POST['address1'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['zip'], "USA");
			//$database->add_users_list($user_id, $location_id, "HOME");

			if(isset($_POST['modules']))
				foreach($_POST['modules'] as $mod_id)
					$database->set_permissions($user_id, $mod_id, "MODULES");

			$_SESSION['success'] = "The user account has been succesfully created.";
	
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

   function proc_EditUsers(){
		global $database;

		$phone 		= (isset($_POST['phone']) ? $_POST['phone'] : "");
		$status 	= (isset($_POST['status']) ? 2 : 0);
		$password 	= md5(PASSWORD_SALT.$_POST['regpass']);
		
		if(!empty($_POST['regpass']))
			$database->update_users($_POST['id'], "password", $password);

		$database->update_users($_POST['id'], "firstname", $_POST['firstname']);
		$database->update_users($_POST['id'], "lastname", $_POST['lastname']);
		$database->update_users($_POST['id'], "email", $_POST['email']);
		$database->update_users($_POST['id'], "phone", $phone);
		$database->update_users($_POST['id'], "status", $status);

		$database->update_users($_POST['id'], "address1", $_POST['address1']);
		$database->update_users($_POST['id'], "address2", $_POST['address2']);
		$database->update_users($_POST['id'], "city", $_POST['city']);
		$database->update_users($_POST['id'], "state", $_POST['state']);
		$database->update_users($_POST['id'], "zip", $_POST['zip']);

		$database->delete_permissions($_POST['id'], "MODULES");

		if(isset($_POST['modules']))
			foreach($_POST['modules'] as $mod_id)
				$database->set_permissions($_POST['id'], $mod_id, "MODULES");

		$_SESSION['success'] = "The user account has been succesfully updated.";

		$json = array(
			'success' => true
		);

		echo json_encode($json);

	}
	
   function proc_EditAdministrators(){
		global $database;

		$phone 		= (isset($_POST['phone']) ? $_POST['phone'] : "");
		$status 	= (isset($_POST['status']) ? 1 : 0);
		$password 	= md5(PASSWORD_SALT.$_POST['regpass']);
		
		if(!empty($_POST['regpass']))
			$database->update_users($_POST['id'], "password", $password);

		$database->update_users($_POST['id'], "firstname", $_POST['firstname']);
		$database->update_users($_POST['id'], "lastname", $_POST['lastname']);
		$database->update_users($_POST['id'], "email", $_POST['email']);
		$database->update_users($_POST['id'], "phone", $phone);
		$database->update_users($_POST['id'], "status", $status);

		$database->update_users($_POST['id'], "address1", $_POST['address1']);
		$database->update_users($_POST['id'], "address2", $_POST['address2']);
		$database->update_users($_POST['id'], "city", $_POST['city']);
		$database->update_users($_POST['id'], "state", $_POST['state']);
		$database->update_users($_POST['id'], "zip", $_POST['zip']);

		$database->delete_permissions($_POST['id'], "MODULES");

		if(isset($_POST['modules']))
			foreach($_POST['modules'] as $mod_id)
				$database->set_permissions($_POST['id'], $mod_id, "MODULES");

		$_SESSION['success'] = "The user account has been succesfully updated.";

		$json = array(
			'success' => true
		);

		echo json_encode($json);

	}

	function proc_EditMyAccount(){
		global $database;

		$email = $database->check_users("email", $_POST['email'], $_POST['id']);
		
		if($email) {
			
			$json = array(
				'email' => true,
				'message' => "That email address is already in use."
			);
	
		} else {
	
			$phone 		= (isset($_POST['phone']) ? $_POST['phone'] : "");
			$status 	= (isset($_POST['status']) ? 1 : 0);
			$password 	= md5(PASSWORD_SALT.$_POST['regpass']);	
	
			if(!empty($_POST['regpass']))
				$database->update_users($_POST['id'], "password", $password);
			
			$database->update_users($_POST['id'], "firstname", $_POST['firstname']);
			$database->update_users($_POST['id'], "lastname", $_POST['lastname']);
			$database->update_users($_POST['id'], "email", $_POST['email']);
			$database->update_users($_POST['id'], "phone", $phone);
	
			$_SESSION['success'] = "Your account has been succesfully updated.";
	
			$json = array(
				'success' => true
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
	
	function proc_Login() {
		global $session, $database;

		$password 	= md5(PASSWORD_SALT.$_POST['pass']);

		$result 	= $database->check_password($_POST['email'], $password);

		if($database->is_active($_POST['email'])){

			$json = array(
				'email' => true,
				'message' => "The account has been deactivated."
			);
			
			echo json_encode($json);

		} else if($result == 1){

			$json = array(
				'email' => true,
				'message' => "That email was not found."
			);
			
			echo json_encode($json);

		} else if($result == 2){
			
			$json = array(
				'password' => true,
				'message' => "That password is invalid."
			);
			
			echo json_encode($json);			

		} else {
			
			$retval = $session->login($_POST['email'], $_POST['pass']);
	
			if ($retval) {
				
				$json = array(
					'success' => true,
					'message' => $retval
				);
				
			} else {
	
				$json = array(
					'password' => true,
					'message' => "Your password is incorrect."
				);
			}
			
			echo json_encode($json);
			
		}

	}

	function proc_Logout(){ 
		global $session;
			
		$session->logout();
		
		header("Location: ".MAINURL);

	}

	function proc_ChangeStatus(){
		global $database;
		
		$database->update_users($_POST['id'], "status", $_POST['status']);	

	}

	function proc_Delete() {

		$this->proc_DeleteContent($_POST['id'], $_POST['module']);

	}

	function proc_DeleteBulk() {
		
		$array = explode(',', $_POST['id']);

		foreach($array as $id)
			$this->proc_DeleteContent($id, $_POST['module']);

	}

	function proc_DeleteContent($id, $module) {
		global $database, $db_pages, $db_media, $db_galleries;
		
		if($module == "USERS") {
			
			$database->query("DELETE FROM ".TBL_USERS." WHERE id = '".$id."'");
	
			$database->query("DELETE FROM ".TBL_USERS_LIST." WHERE user_id = '".$id."'");
	
			$database->query("DELETE FROM ".TBL_USERS_LOCATIONS." WHERE mod_id='".$id."'");
			
		}

		return true;

	}

};

$adminprocess = new AdminProcess;

?>