<?php

class ml_users {

	function send_GroupsInvites($group_id, $to_email, $token){
		global $database;
		
		$groups = $database->info_groups($group_id);

		$headers = "MIME-Version: 1.0"."\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1"."\n"; 
		$headers .= "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">"."\n";

		$subject = "You have been invited to join a group!.";

		$body = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
					<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
						<title>".SITENAME."</title>
					</head>

					<body alink=\"#E51937\" vlink=\"#E51937\" link=\"#E51937\" text=\"#000000\" style=\"margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; \">
					
					<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border: 2px solid #000000; \">
						<tr>
							<td>
				";

		$body .= "<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td>
								<img src=\"".MAINURL."images/emailHeader.jpg?".time()."\" width=\"650\" height=\"80\" alt=\"".SITENAME."\" />
							</td>
						</tr>
						<tr>
							<td style=\"padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:13px;\">
								<h2>".$groups['title']."</h2>
								<p>You've been invited to join a group!</p>
								<a href=\"".MAINURL."join-group/".$groups['id']."/".$groups['urlname']."?token=".$token."&email=".$to_email."\">Join Group Now!</a>
							</td>
						</tr>
					</table>
				";

		$body .= "</td>
						</tr>
					</table>
				</body>
				</html>
			";

		return mail($to_email, $subject, $body, $headers);

	}

	function send_Password($firstname, $lastname, $to_email, $pass){

		$headers = "MIME-Version: 1.0"."\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1"."\n"; 
		$headers .= "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">"."\n";

		$subject = "Your new password has been generated.";

		$body = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
					<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
						<title>".SITENAME."</title>
					</head>

					<body alink=\"#E51937\" vlink=\"#E51937\" link=\"#E51937\" text=\"#000000\" style=\"margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; \">
					
					<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border: 2px solid #000000; \">
						<tr>
							<td>
				";

		$body .= "<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td>
								<img src=\"".MAINURL."images/emailHeader.jpg?".time()."\" width=\"650\" height=\"80\" alt=\"".SITENAME."\" />
							</td>
						</tr>
						<tr>
							<td style=\"padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:13px;\">
								<p>We've generated a new password for you at your request.</p>
								<p>To login using your new password, <a href=\"".MAINURL."login\">click here</a>.</p>
								<p>New Password: ".$pass."</p>
								<p>Thanks,<br />
								".SITENAME."
								</p>
							</td>
						</tr>
					</table>
				";

		$body .= "</td>
						</tr>
					</table>
				</body>
				</html>
			";

		return mail($to_email, $subject, $body, $headers);

	}

/*
	function send_UserWelcome($email, $pass, $firstname, $lastname){
		$from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
		$subject = "Welcome!";
		$body = "Welcome ".stripslashes($firstname)." ".stripslashes($lastname)."!\n Thank you for registering at ".SITENAME.".\n\n";
		$body .= "Your Email: ".stripslashes($email)."\n";
		$body .= "Your Password: ".$pass."\n\n";
		$body .= "If you ever lose or forget your password, a new password will be generated for you and sent to this ";
		$body .= "email address, if you would like to change your email address you can do so by going to the ";
		$body .= "My Account page after logging in.\n\n";
		$body .= "- ".SITENAME."";

		return mail($email,$subject,$body,$from);
	}

	function send_AdminWelcome($firstname, $lastname, $company, $email){
		$from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
		$subject = "A new user has registered.";
		$body = "A new user has registered.\n\n";
		$body .= "First Name: ".stripslashes($firstname)."\n";
		$body .= "Last Name: ".stripslashes($lastname)."\n";
		if($company){
			$body .= "Company: ".stripslashes($company)."\n";
		}			 
		$body .= "Email: ".$email."\n\n";
		$body .= "".SITENAME."";

		return mail(EMAIL_ADMIN,$subject,$body,$from);
	}

	function send_Password($user, $email, $pass){
		$from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
		$subject = "Your new password has been generated.";
		$body = $user.",\n\n";
		$body .= "We've generated a new password for you at your request. ";
		$body .= "To login using your new password, click here: ".MAINURL."login.php \n\n";
		$body .= "Username: ".$user."\n";
		$body .= "New Password: ".$pass."\n\n";
		$body .= "Thanks,\n";
		$body .= SITENAME;

		return mail($email,$subject,$body,$from);
	}

	function send_UserNotice($email, $user, $pass, $firstname, $lastname){
		$from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
		$subject = "Welcome!";
		$body = $user.",\n\n";
		$body .= "Welcome ".stripslashes($firstname)." ".stripslashes($lastname)."!\n";
		$body .= "You've just registered at ".SITENAME." with the following information:\n\n";
		$body .= "Username: ".$user."\n";
		$body .= "Password: ".$pass."\n";
		$body .= "\n";
		$body .= "Access your account at:".MAINURL."\n";
		$body .= "\n";
		$body .= "If you ever lose or forget your password, a new password will be generated for you and sent to this ";
		$body .= "email address, if you would like to change your email address you can do so by going to the ";
		$body .= "My Account page after logging in.\n\n";
		$body .= SITENAME;

		return mail($email,$subject,$body,$from);
	}

	function send_UserActivation($email, $firstname, $lastname){

		$from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
		$subject = "Your account has been activated!";
		$body = "Welcome ".stripslashes($firstname)." ".stripslashes($lastname)."!\n\n";
		$body .= "Your account at ".SITENAME." has been approved and activated. Login at ".MAINURL." now!\n\n";
		$body .= "If you ever lose or forget your password, a new password will be generated for you and sent to this ";
		$body .= "email address, if you would like to change your email address you can do so by going to the ";
		$body .= "My Account page after logging in.\n\n";
		$body .= SITENAME;

		return mail($email,$subject,$body,$from);
	}
*/

};

$ml_users = new ml_users;

?>