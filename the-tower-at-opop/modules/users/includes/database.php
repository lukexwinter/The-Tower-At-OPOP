<?php

include_once(dirname(__FILE__)."/constants.php");
include_once(dirname(__FILE__)."/functions.php");

class MySQLDB{
	var $connection;			//The MySQL database connection

	///////////////////
	// ADD FUNCTIONS
	///////////////////

	function add_users($post, $password, $status){

		$q = "INSERT 
				INTO 
					".TBL_USERS." 
				(
					email, 
					firstname,
					lastname,
					password,
					date,
					status
				) 
				VALUES
				(
					'".sqlEscape($post['email'])."', 
					'".sqlEscape($post['firstname'])."',
					'".sqlEscape($post['lastname'])."', 
					'".sqlEscape($password)."',
					'".sqlEscape(time())."',
					'".sqlEscape($status)."'
				)
			";

		return odbc_exec($this->connection, $q);

	}

	function add_users_locations($address1, $address2, $city, $state, $zip, $country){
		
		$q = "INSERT 
				INTO 
					".TBL_USERS_LOCATIONS." 
				(
				 	address1, 
					address2, 
					city, 
					state,
					zip,
					country
				) 
				VALUES
				(
				 	'".mysql_real_escape_string($address1)."', 
					'".mysql_real_escape_string($address2)."', 
					'".mysql_real_escape_string($city)."', 
					'".mysql_real_escape_string($state)."', 
					'".mysql_real_escape_string($zip)."', 
					'".mysql_real_escape_string($country)."'
				)
			";
		
		mysql_query($q, $this->connection);

		return mysql_insert_id();		
	}

	function add_options($type, $module, $action, $name, $description){

		$q = "INSERT 
				INTO 
					".TBL_PERMISSIONS." 
					(
					 type, 
					 module, 
					 action, 
					 name, 
					 description
				)
				VALUES 
				(
				 	'".mysql_real_escape_string($type)."', 
					'".mysql_real_escape_string($module)."', 
					'".mysql_real_escape_string($action)."', 
					'".mysql_real_escape_string($name)."', 
					'".mysql_real_escape_string($description)."'
				)
			";

		mysql_query($q, $this->connection);

		return mysql_insert_id();
	}
	 

	function add_meta($module, $mod_id, $title, $keywords, $description){
		
		$update = $this->check_MetaData($module, $mod_id);
		
		if($update) {

			$q = "UPDATE 
						".TBL_META." 
					SET 
						module = '".mysql_real_escape_string($module)."', 
						title = '".mysql_real_escape_string($title)."', 
						keywords = '".mysql_real_escape_string($keywords)."', 
						description = '".mysql_real_escape_string($description)."' 
					WHERE 
						mod_id = '".$mod_id."'
				";

			return mysql_query($q, $this->connection);	

		} else if ($title || $keywords || $description) {
			
			$q = "INSERT 
					INTO 
						".TBL_META." 
					(
					 	mod_id, 
						module, 
						title, 
						keywords, 
						description
					) 
					VALUES 
					(
						'".mysql_real_escape_string($mod_id)."', 
						'".mysql_real_escape_string($module)."', 
						'".mysql_real_escape_string($title)."', 
						'".mysql_real_escape_string($keywords)."', 
						'".mysql_real_escape_string($description)."'
					)
				";

			return mysql_query($q, $this->connection);
			
		}
	}
	
	function add_activity($activity, $module){
		global $session;
		
		if(TRACK_ACTIVITY) {

			
			$q = "INSERT 
					INTO 
						".TBL_ACTIVITY." 
					(
					 	user_id, 
						ip, 
						module, 
						activity, 
						date
					) 
					VALUES 
					(
						'".$session->user_id."', 
						'".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."', 
						'".mysql_real_escape_string($module)."', 
						'".mysql_real_escape_string($activity)."', 
						'".time()."'
					)
				";
	
			return mysql_query($q, $this->connection);

		}
	}

	function add_users_list($mod_id, $type_id, $type){

		$q = "INSERT 
				INTO 
					".TBL_USERS_LIST." 
				(
				 	mod_id,
					type_id,
					type
				) 
				VALUES 
				(
				 	'".mysql_real_escape_string($mod_id)."',
				 	'".mysql_real_escape_string($type_id)."',
				 	'".mysql_real_escape_string($type)."'					
				)
			";
	
		mysql_query($q, $this->connection);

		return mysql_insert_id();

	}

	function add_groups($user_id, $title, $urlname, $description, $status){

		$q = "INSERT 
				INTO 
					".TBL_GROUPS." 
				(
				 	user_id,
				 	title,
					urlname,
					description,
					date,
					status
				) 
				VALUES 
				(
				 	'".mysql_real_escape_string($user_id)."',
				 	'".mysql_real_escape_string($title)."',
				 	'".mysql_real_escape_string($urlname)."',
				 	'".mysql_real_escape_string($description)."',
				 	'".time()."',
				 	'".mysql_real_escape_string($status)."'
				)
			";
	
		mysql_query($q, $this->connection);

		return mysql_insert_id();

	}

	function add_groups_users($user_id, $group_id, $isAdmin){

		$q = "INSERT 
				INTO 
					".TBL_GROUPS_USERS." 
				(
				 	user_id,
					group_id,
					isAdmin
				) 
				VALUES 
				(
				 	'".mysql_real_escape_string($user_id)."',
				 	'".mysql_real_escape_string($group_id)."',
				 	'".mysql_real_escape_string($isAdmin)."'					
				)
			";
	
		mysql_query($q, $this->connection);

		return mysql_insert_id();

	}

	function add_groups_invites($user_id, $group_id, $email, $token, $status){

		$q = "INSERT 
				INTO 
					".TBL_GROUPS_INVITES." 
				(
				 	user_id,
					group_id,
					email,
					token,
					date,
					status
				) 
				VALUES 
				(
				 	'".mysql_real_escape_string($user_id)."',
				 	'".mysql_real_escape_string($group_id)."',
				 	'".mysql_real_escape_string($email)."',
				 	'".mysql_real_escape_string($token)."',
				 	'".time()."',					
				 	'".mysql_real_escape_string($status)."'					
				)
			";

		mysql_query($q, $this->connection);

		return mysql_insert_id();

	}

	///////////////////
	// UPDATE FUNCTIONS
	///////////////////

	function update_users($id, $field, $value){

		$q = "UPDATE 
					".TBL_USERS." 
				SET 
					".$field." = '".mysql_real_escape_string($value)."' 
				WHERE 
					id = '".mysql_real_escape_string($id)."'
			";

		return mysql_query($q, $this->connection);

	}

	function update_locations($id, $field, $value){

		$q = "UPDATE 
					".TBL_USERS_LOCATIONS." 
				SET 
					".$field." = '".mysql_real_escape_string($value)."' 
				WHERE 
					id = '".mysql_real_escape_string($id)."'
			";

		return mysql_query($q, $this->connection);

	}

	function update_permission($id, $field, $value){

		$q = "UPDATE 
					".TBL_PERMISSIONS." 
				SET 
					".$field." = '".mysql_real_escape_string($value)."' 
				WHERE 
					id = '".$id."'
			";

		return mysql_query($q, $this->connection);

	}

	function update_groups($id, $field, $value){

		$q = "UPDATE 
					".TBL_GROUPS." 
				SET 
					".$field." = '".mysql_real_escape_string($value)."' 
				WHERE 
					id = '".$id."'
			";

		return mysql_query($q, $this->connection);

	}

	function update_groups_invites($id, $field, $value){

		$q = "UPDATE 
					".TBL_GROUPS_INVITES." 
				SET 
					".$field." = '".mysql_real_escape_string($value)."' 
				WHERE 
					id = '".$id."'
			";

		return mysql_query($q, $this->connection);

	}

	function update_groups_users($id, $field, $value){

		$q = "UPDATE 
					".TBL_GROUPS_USERS." 
				SET 
					".$field." = '".mysql_real_escape_string($value)."' 
				WHERE 
					id = '".$id."'
			";

		return mysql_query($q, $this->connection);

	}


	///////////////////
	// INFO FUNCTIONS
	///////////////////
	
	function info_users($id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_USERS." 
				WHERE 
					id = '".mysql_real_escape_string($id)."'
				LIMIT
					1
			";

		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	function info_email($email){

		$q = "SELECT 
					* 
				FROM 
					".TBL_USERS." 
				WHERE 
					email = '".mysql_real_escape_string($email)."'
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}
	
	function info_Permissions($id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_PERMISSIONS." 
				WHERE 
					id = '".$id."'
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	function info_locations($id, $type){

		$q = "SELECT 
					l.id,
					l.address1,
					l.address2,
					l.city,
					l.state,
					l.zip,
					l.country
				FROM 
					".TBL_USERS_LIST." AS ul,
					".TBL_USERS_LOCATIONS." AS l
				WHERE 
					l.id = ul.mod_id
				AND				
					ul.mod_id = '".$id."'
				AND
					ul.type = '".$type."'
			";

		$res = $this->query($q);
		$cnt = mysql_numrows($res);

		if(!$res || $cnt < 1)
			return NULL;

		$array = array();

		for($k=0; $k<$cnt; $k++){ 

			$array[$k]['id'] 		= stripslashes(mysql_result($res,$k,"l.id"));
			$array[$k]['address1'] 	= stripslashes(mysql_result($res,$k,"l.address1"));
			$array[$k]['address2'] 	= stripslashes(mysql_result($res,$k,"l.address2"));
			$array[$k]['city'] 		= stripslashes(mysql_result($res,$k,"l.city"));
			$array[$k]['state'] 	= stripslashes(mysql_result($res,$k,"l.state"));
			$array[$k]['zip'] 		= stripslashes(mysql_result($res,$k,"l.zip"));
			$array[$k]['country'] 	= stripslashes(mysql_result($res,$k,"l.country"));

		}

		return $array;

	}

	function info_MetaData($module, $id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_META." 
				WHERE 
					mod_id = '".$id."' 
				AND 
					module = '".$module."' 
				LIMIT 
					1
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	function info_groups($id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_GROUPS." 
				WHERE 
					id = '".$id."'
			";

		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}
	
	function info_groups_users($group_id, $user_id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_GROUPS_USERS." 
				WHERE 
					group_id = ".$group_id."
				AND
					user_id = ".$user_id."
			";

		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	///////////////////
	// GET FUNCTIONS
	///////////////////

	function get_user($email){

		$q = "SELECT 
					* 
				FROM 
					".TBL_USERS." 
				WHERE 
					email = '".mysql_real_escape_string($email)."'
			";

		$result = $this->query($q);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	function get_email($email){

		$q = "SELECT 
					* 
				FROM 
					".TBL_USERS." 
				WHERE 
					email = '".mysql_real_escape_string($email)."'
			";
	
		$result = $this->query($q);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	function get_approval_users(){
		global $database, $session;
		
		$q = "SELECT 
				DISTINCT 
					u.id,
					u.email,
					u.firstname,
					u.lastname
				FROM 
					".TBL_USERS." as u,
					".TBL_PERMISSIONS_LIST." AS pl,
					".TBL_PERMISSIONS." AS o
				WHERE
					u.id = pl.user_id
				AND
					pl.user_id = '".$session->user_id."'
				AND
					pl.type = 'MODULES'
				AND
					pl.mod_id = o.id
			";		
		
		$res = $database->query($q);
		$cnt = mysql_numrows($res);

		if(!$res || $cnt < 1)
			return NULL;
		
		$array = array();

		for($k=0; $k<$cnt; $k++){ 

			$id = stripslashes(mysql_result($res,$k,"id"));

			$array[$k]['id'] 		= stripslashes(mysql_result($res,$k,"id"));
			$array[$k]['email']		= stripslashes(mysql_result($res,$k,"email"));
			$array[$k]['firstname'] = stripslashes(mysql_result($res,$k,"firstname"));
			$array[$k]['lastname'] 	= stripslashes(mysql_result($res,$k,"lastname"));

			$depArray = $database->get_permissions_list($id, "DEPARTMENTS");
			
			foreach($depArray as $dep_id) 
				$array[$k]['departments'][$dep_id] = $dep_id;

		}

		return $array;

	}

	function get_permissions($user_id, $mod_id, $type){

		$q = "SELECT 
					* 
				FROM 
					".TBL_PERMISSIONS_LIST." 
				WHERE 
					mod_id = '".$mod_id."' 
				AND 
					user_id = '".$user_id."' 
				AND 
					type = '".$type."'
			";
	
		$res = $this->query($q);
		$cnt = mysql_numrows($res);

		if(!$res || (mysql_numrows($res) < 1))
			return NULL;

		$array = array();
		
		for($k=0; $k<$cnt; $k++)
			$array[] = mysql_result($res,$k,"mod_id");

		return $array;

	}

	function get_permissions_list($user_id, $type){

		$q = "SELECT 
					mod_id 
				FROM 
					".TBL_PERMISSIONS_LIST." 
				WHERE 
					user_id = '".$user_id."' 
				AND 
					type = '".$type."'
				ORDER BY
					mod_id
				ASC
				";

		$res = $this->query($q);
		$cnt = mysql_numrows($res);

		if(!$res || (mysql_numrows($res) < 1))
			return NULL;

		$array = array();
		
		for($k=0; $k<$cnt; $k++){
			$id = mysql_result($res,$k,"mod_id");
			$array[$id] = $id;
		}

		return $array;

	}

	
	function get_UsersInfo($user_id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_USERS." 
				WHERE 
					id = '".$user_id."'
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		return mysql_fetch_array($result);

	}

	function get_groups($id){

		$q = "SELECT 
					id 
				FROM 
					".TBL_USERS_GROUPS." 
				WHERE 
					name LIKE '%".$id."%'
			";
	
		$result = mysql_query($q, $this->connection);

		$mod_array = mysql_fetch_array($result);

		return stripslashes($mod_array['id']);

	}	

	function get_MetaData($module, $id){
		
		if($id) {
			
			$q = "SELECT 
						* 
					FROM 
						".TBL_META." 
					WHERE 
						mod_id = '".$id."' 
					AND 
						module = '".$module."' 
					LIMIT 
						1
				";
	
			$result = mysql_query($q, $this->connection);
			$array = mysql_fetch_array($result);
	
			if($array['title'])
				$metaTagInfo = "<title>".$array['title']."</title>\n";
			else
				$metaTagInfo = "<title>".TITLE."</title>\n";

			if($array['title'])
				$metaTagInfo .= "<meta http-equiv=\"title\" content=\"".stripslashes($array['title'])."\" />\n";
			else
				$metaTagInfo .= "<meta http-equiv=\"title\" content=\"".TITLE."\" />\n";

			if($array['description'])
				$metaTagInfo .= "<meta name=\"description\" content=\"".stripslashes($array['description'])."\" />\n";
			else
				$metaTagInfo .= "<meta name=\"description\" content=\"".DESCRIPTION."\" />\n";

			if($array['keywords'])
				$metaTagInfo .= "<meta name=\"keywords\" content=\"".stripslashes($array['keywords'])."\" />\n";	
			else
				$metaTagInfo .= "<meta name=\"keywords\" content=\"".KEYWORDS."\" />\n";	

		} else {

			$metaTagInfo = "<title>".TITLE."</title>\n
							<meta http-equiv=\"title\" content=\"".TITLE."\" />\n
							<meta name=\"description\" content=\"".DESCRIPTION."\" />\n
							<meta name=\"keywords\" content=\"".KEYWORDS."\" />\n
						";

		}
		return $metaTagInfo;
	}

	function get_groups_users($group_id){
		global $database, $session;

		$q = "SELECT 
					u.id AS id,
					u.firstname AS firstname,
					u.lastname AS lastname,
					u.email AS email,
					gu.id AS list_id,
					gu.isAdmin AS isAdmin,
					(
						SELECT 
							COUNT(*)
						FROM
							".TBL_ASSIGN_HOURS." AS ae
						WHERE
							ae.group_id = gu.group_id
					) AS hours
				FROM 
					".TBL_USERS." AS u
				LEFT JOIN
					".TBL_GROUPS_USERS." AS gu
				ON
					u.id = gu.user_id
				WHERE
					gu.group_id = ".$group_id." 
				ORDER BY 
					u.firstname,
					u.lastname
				ASC
			";

		$res = $database->query($q);

		if(!$res || (mysql_numrows($res) < 1))
			return NULL;

		while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
			
			$k = stripslashes($row['list_id']);

			$array[$k]['id'] 		= stripslashes($row['id']);
			$array[$k]['list_id'] 	= stripslashes($row['list_id']);
			$array[$k]['firstname'] = stripslashes($row['firstname']);
			$array[$k]['lastname']	= stripslashes($row['lastname']);
			$array[$k]['email']		= stripslashes($row['email']);
			$array[$k]['isAdmin']	= stripslashes($row['isAdmin']);
			$array[$k]['hours']		= stripslashes($row['hours']);

		}

		return $array;
	
	}

	function get_groups_admins($group_id){
		global $database, $session;

		$q = "SELECT 
					u.id AS id,
					u.firstname AS firstname,
					u.lastname AS lastname,
					u.email AS email,
					gu.id AS list_id,
					gu.isAdmin AS isAdmin
				FROM 
					".TBL_USERS." AS u
				LEFT JOIN
					".TBL_GROUPS_USERS." AS gu
				ON
					u.id = gu.user_id
				WHERE
					gu.group_id = ".$group_id." 
				AND
					gu.isAdmin = 1
				ORDER BY 
					u.firstname,
					u.lastname
				ASC
			";

		$res = $database->query($q);

		if(!$res || (mysql_numrows($res) < 1))
			return NULL;

		while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
			
			$k = stripslashes($row['list_id']);

			$array[$k]['id'] 		= stripslashes($row['id']);
			$array[$k]['list_id'] 	= stripslashes($row['list_id']);
			$array[$k]['firstname'] = stripslashes($row['firstname']);
			$array[$k]['lastname']	= stripslashes($row['lastname']);
			$array[$k]['email']		= stripslashes($row['email']);
			$array[$k]['isAdmin']	= stripslashes($row['isAdmin']);

		}

		return $array;
	
	}


	///////////////////
	// DELETE FUNCTIONS
	///////////////////
	
	function delete_permissions($user_id, $type){
		
		$q = "DELETE 
				FROM 
					".TBL_PERMISSIONS_LIST." 
				WHERE 
					user_id = '".$user_id."' 
				AND 
					type = '".mysql_real_escape_string($type)."'
			";

		return mysql_query($q, $this->connection);

	}

	function delete_users_invites($group_id, $email){
		global $database;
		
		$q = "DELETE 
				FROM 
					".TBL_GROUPS_INVITES." 
				WHERE 
					group_id = '".$group_id."' 
				AND 
					email = '".mysql_real_escape_string($email)."'
			";

		return mysql_query($q, $database->connection);

	}

	
	function delete_users_list($user_id, $type){
		
		$q = "DELETE 
				FROM 
					".TBL_USERS_LIST." 
				WHERE 
					mod_id = '".$user_id."' 
				AND 
					type = '".mysql_real_escape_string($type)."'
			";

		return mysql_query($q, $this->connection);

	}

	///////////////////
	// OTHER FUNCTIONS
	///////////////////

	function set_permissions($user_id, $mod_id, $type){

		$q = "SELECT 
					id 
				FROM 
					".TBL_PERMISSIONS_LIST." 
				WHERE 
					user_id = '".mysql_real_escape_string($user_id)."' 
				AND 
					mod_id = '".mysql_real_escape_string($mod_id)."'
				AND 
					type = '".mysql_real_escape_string($type)."'
			";
	
		$result = mysql_query($q, $this->connection);

		if(mysql_numrows($result) == 0) {

			$q = "INSERT 
					INTO 
						".TBL_PERMISSIONS_LIST." 
					(
					 	user_id, 
						mod_id, 
						type
					) 
					VALUES 
					(
					 	'".mysql_real_escape_string($user_id)."', 
						'".mysql_real_escape_string($mod_id)."', 
						'".mysql_real_escape_string($type)."'
					)
				";
			
			return mysql_query($q, $this->connection);

		} else {
			return false;
		}

	}

	function confirmUserID($email, $user_id){

		$q = "SELECT 
					id 
				FROM 
					".TBL_USERS." 
				WHERE 
					email = '".mysql_real_escape_string($email)."'
			";

		$result = $this->query($q);

		if(!$result || (mysql_numrows($result) < 1))
			return false;

		$dbarray = mysql_fetch_array($result);

		if($user_id == $dbarray['id'])
			return 0;
		else
			return 2;

	}

	function is_active($email){

		$q = "SELECT 
					status 
				FROM 
					".TBL_USERS." 
				WHERE 
					email = '".mysql_real_escape_string($email)."' 
			";

		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return 1;

		$array = mysql_fetch_array($result);
		
		if($array['status'] > 0)
			return false;

		return 2;

	}

	function count_GroupMembers($id){

		$q = "SELECT 
					COUNT(*) AS total
				FROM 
					".TBL_GROUPS_USERS." 
				WHERE 
					group_id = '".mysql_real_escape_string($id)."' 
			";

		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return NULL;

		$array = mysql_fetch_array($result);

		return $array['total'];

	}

	///////////////////////
	//	CHECK FUNCTIONS
	///////////////////////

	function check_users($field, $value, $id=false){
		global $database;
		
		$q = "SELECT 
					".$field." 
				FROM 
					".TBL_USERS." 
				WHERE 
					".$field."  = '".sqlEscape($value)."' 
			";

		if($id)
			$q .= " AND 
						id != '".$id."' ";
		
		//echo $q;

		$result = $this->query($q);

		return (odbc_num_rows($result) > 0);
	}

	function check_password($email, $password){

		$q = "SELECT 	
					password 
				FROM 
					".TBL_USERS." 
				WHERE 
					email = '".mysql_real_escape_string($email)."'
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return 1;

		$dbarray = mysql_fetch_array($result);

		$dbarray['password'] = stripslashes($dbarray['password']);

		$password = stripslashes($password);

		if($password == $dbarray['password'])
			return 0;
		else
			return 2;

	}

	function is_admin($user_id){
		global $database, $session;
		
		$q = "SELECT 
					p.mod_id 
				FROM 
					".TBL_PERMISSIONS_LIST." AS p,
					".TBL_PERMISSIONS." AS o 
				WHERE 
					p.user_id='".$user_id."' 
				AND 
					p.mod_id=o.id 
				AND 
					o.type = 'ADMIN' 
				LIMIT 
					1
			"; 

		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return false;
		else
			return true;
		
	}

	function is_group_user($group_id, $user_id){

		$q = "SELECT 
					u.id AS id,
					u.firstname AS firstname,
					u.lastname AS lastname,
					u.email AS email,
					gu.id AS list_id,
					gu.isAdmin AS isAdmin,
					(
						SELECT 
							SUM(ah.hs_hours + ah.lw_hours)
						FROM
							".TBL_ASSIGN_HOURS." AS ah
						WHERE
							ah.user_id = u.id
					) AS hours
				FROM 
					".TBL_GROUPS_USERS." AS gu
				INNER JOIN
					".TBL_USERS." AS u
				ON
					gu.user_id = u.id 
				WHERE 
					gu.group_id = '".mysql_real_escape_string($group_id)."' 
				AND
					u.id = '".mysql_real_escape_string($user_id)."' 
				LIMIT
					1
			";

		$res = mysql_query($q, $this->connection);

		if(!$res || (mysql_numrows($res) < 1))
			return true;

		while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
			
			$array['id'] 		= stripslashes($row['id']);
			$array['list_id'] 	= stripslashes($row['list_id']);
			$array['firstname'] = stripslashes($row['firstname']);
			$array['lastname']	= stripslashes($row['lastname']);
			$array['email']		= stripslashes($row['email']);
			$array['isAdmin']	= stripslashes($row['isAdmin']);
			$array['hours']		= stripslashes($row['hours']);

		}

		return $array;

	}

	function db_permissions($o_type, $p_type, $module, $action=false){
		global $database, $session;
		
		$q = "SELECT 
					p.mod_id 
				FROM 
					".TBL_PERMISSIONS_LIST." AS p, 
					".TBL_PERMISSIONS." AS o 
				WHERE 
					p.user_id='".$session->user_id."' 
				AND 
					p.type='".$p_type."' 
				AND 
					p.mod_id=o.id 
				AND 
					o.type='".$o_type."' 
				AND 
					o.module='".$module."'
			";
	
		if($action)
			$q .= "AND 
					o.action='".$action."' 
				";

		$q .= "LIMIT 
					1
			";
		
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return false;
		else 
			return true;

	}

	function is_group_admin($group_id){
		global $session;

		$q = "SELECT 
					u.id AS id
				FROM 
					".TBL_USERS." AS u
				LEFT JOIN
					".TBL_GROUPS_USERS." AS gu
				ON
					gu.user_id = u.id 
				AND
					gu.id = '".$group_id."'
				WHERE 
					u.id = '".mysql_real_escape_string($session->user_id)."' 
			";
		
		$res = mysql_query($q, $this->connection);

		if(!$res || (mysql_numrows($res) < 1))
			return false;

		return true;

	}

	function check_MetaData($module, $id){

		$q = "SELECT 
					* 
				FROM 
					".TBL_META." 
				WHERE 
					mod_id = '".$id."' 
				AND 
					module = '".$module."' 
				LIMIT 
					1
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return false;
		else
			return true;

	}

	function check_GroupInvites($group_id, $token, $email){
		
		$q = "SELECT 
					id
				FROM 
					".TBL_GROUPS_INVITES." 
				WHERE 
					group_id = '".mysql_real_escape_string($group_id)."' 
				AND
					token = '".mysql_real_escape_string($token)."'
				AND
					email = '".mysql_real_escape_string($email)."'
				AND
					status = 0
			";
	
		$result = mysql_query($q, $this->connection);

		if(!$result || (mysql_numrows($result) < 1))
			return false;

		$array = mysql_fetch_array($result);

		return $array['id'];

	}

	function MySQLDB() {

		$this->connection = odbc_connect("Driver={SQL Server};Server=".DB_SERVER.";Database=".DB_NAME.";", DB_USER, DB_PASS);

	}

	function query($query){
		return odbc_exec($this->connection, $query);
	}

};

$database = new MySQLDB;

?>