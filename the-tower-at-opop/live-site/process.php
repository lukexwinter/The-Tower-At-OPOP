  <?php

class Process {

	var $connection;
	//var $contactAddress = "trmchenry@gmail.com"; //TESTING
	var $contactAddress = "luke@bluestonecreative.com";
	var $FromAddress = "noreply@bluestonecreative.com";


	function Process() {

	$spamKey = "81SSJmlo4KsFBnUu"; // Matches #honeypot in script
	$honeypot = $_POST['honeypot'];
	$botTrap = $_POST['username']; // Innocuous sounding form field

		if ($honeypot == $spamKey) {

			if ($botTrap != NULL) {
				die('Value must equal null.');
			}
			else {
				if (isset($_POST['contact'])) {
					$this->proc_ContactForm();
				}
				else if (isset($_POST['tour'])) {
					$this->proc_TourForm();
				}
				else {
					header("Location: http://thetoweratopop.com/");
				}
			}
		}
		else {
			header("Location: http://thetoweratopop.com/");
		}
	}

	function proc_ContactForm() {

		// SEND EMAIL
		$from = "From: ".$_POST['firstname']." ".$_POST['lastname']." <".$_POST['email'].">";
	
		$subject = "New contact form submission from thetoweratopop.com";
	
		$body = "";
		$body .= "Name: ".addslashes($_POST['firstname'])." ".addslashes($_POST['lastname'])."\n";
		$body .= "Email Address: ".$_POST['email']."\n";
		if($_POST['phone']){
			$body .= "Telephone: ".$_POST['phone']."\n";
		}
		if($_POST['address1']){
			$body .= "Street Address: ".$_POST['address1']."\n";
		}
		if($_POST['address2']){
			$body .= "Unit/Apt/Suite: ".$_POST['address2']."\n";
		}
		if($_POST['city']){
			$body .= "City: ".$_POST['city']."\n";
		}
		if($_POST['state']){
			$body .= "State: ".$_POST['state']."\n";
		}
		if($_POST['zip']){
			$body .= "Zip: ".$_POST['zip']."\n";
		}
		if($_POST['moveInDate']){
			$body .= "Desired Move In: ".$_POST['moveInDate']."\n";
		}
		if($_POST['scheduletour']){
			$body .= "Would You Like to Schedule a Tour? ".$_POST['scheduletour']."\n";
		}
		if($_POST['tourdate']){
			$body .= "Requested Tour Date: ".$_POST['tourdate']."\n";
		}
		if($_POST['floorplan']){
			$body .= "I'm interested in: ".$_POST['floorplan']."\n";
		}
		if($_POST['comments']){
			$body .= "Comments: ".$_POST['comments']."\n";
		}
	
		$body .= "\n";
		$body .= "-----------------------------\n";
		$body .= "This message has been sent from thetoweratopop.com\n";
		$go = mail($this->contactAddress,$subject,$body,$from);

		// SEND AUTOREPLY
		$from = "From: \"The Tower at OPOP\" <".$this->FromAddress.">";
		$subject = "Thank you for your interest";
		$body = "";
		$body .= "Thank you for contacting The Tower at OPOP. Below is a summary of your submission:\n";
		$body .= "\n";
		$body .= "Name: ".addslashes($_POST['firstname'])." ".addslashes($_POST['lastname'])."\n";
		$body .= "Email Address: ".$_POST['email']."\n";
		if($_POST['phone']){
			$body .= "Telephone: ".$_POST['phone']."\n";
		}
		if($_POST['address1']){
			$body .= "Street Address: ".$_POST['address1']."\n";
		}
		if($_POST['address2']){
			$body .= "Unit/Apt/Suite: ".$_POST['address2']."\n";
		}
		if($_POST['city']){
			$body .= "City: ".$_POST['city']."\n";
		}
		if($_POST['state']){
			$body .= "State: ".$_POST['state']."\n";
		}
		if($_POST['zip']){
			$body .= "Zip: ".$_POST['zip']."\n";
		}
		if($_POST['moveInDate']){
			$body .= "Desired Move In: ".$_POST['moveInDate']."\n";
		}
		if($_POST['scheduletour']){
			$body .= "Would You Like to Schedule a Tour? ".$_POST['scheduletour']."\n";
		}
		if($_POST['tourdate']){
			$body .= "Requested Tour Date: ".$_POST['tourdate']."\n";
		}
		if($_POST['floorplan']){
			$body .= "I'm interested in: ".$_POST['floorplan']."\n";
		}
		if($_POST['comments']){
			$body .= "Comments: ".$_POST['comments']."\n";
		}
		$body .= "\n";
		$body .= "-----------------------------\n";
		$body .= "This message has been sent from thetoweratopop.com\n";
		$go = mail($_POST['email'],$subject,$body,$from);

		$json = array(
			'success' => true,
			'message' => "Thank you. Your message has been submitted."
		);

		echo $this->json_encode($json);		

	}
	
	function proc_TourForm() {

		// SEND EMAIL
		$from = "From: ".$_POST['firstname']." ".$_POST['lastname']." <".$_POST['email'].">";
		
		$subject = "New schedule a tour form submission from thetoweratopop.com";
		
		$body = "";
		$body .= "Name: ".addslashes($_POST['firstname'])." ".addslashes($_POST['lastname'])."\n";
		$body .= "Email Address: ".$_POST['email']."\n";
		if($_POST['phone']){
			$body .= "Telephone: ".$_POST['phone']."\n";
		}
		if($_POST['address1']){
			$body .= "Street Address: ".$_POST['address1']."\n";
		}
		if($_POST['address2']){
			$body .= "Unit/Apt/Suite: ".$_POST['address2']."\n";
		}
		if($_POST['city']){
			$body .= "City: ".$_POST['city']."\n";
		}
		if($_POST['state']){
			$body .= "State: ".$_POST['state']."\n";
		}
		if($_POST['zip']){
			$body .= "Zip: ".$_POST['zip']."\n";
		}
		if($_POST['moveInDate']){
			$body .= "Desired Move In: ".$_POST['moveInDate']."\n";
		}
		if($_POST['scheduletour']){
			$body .= "Would You Like to Schedule a Tour? ".$_POST['scheduletour']."\n";
		}
		if($_POST['tourdate']){
			$body .= "Requested Tour Date: ".$_POST['tourdate']."\n";
		}
		if($_POST['floorplan']){
			$body .= "I'm interested in: ".$_POST['floorplan']."\n";
		}
		if($_POST['comments']){
			$body .= "Comments: ".$_POST['comments']."\n";
		}
		
		$body .= "\n";
		$body .= "-----------------------------\n";
		$body .= "This message has been sent from thetoweratopop.com\n";
		$go = mail($this->contactAddress,$subject,$body,$from);

		// SEND AUTOREPLY
		$from = "From: \"The Tower at OPOP\" <".$this->FromAddress.">";
		$subject = "Thank you for your interest";
		$body = "";
		$body .= "Thank you for contacting The Tower at OPOP. Below is a summary of your submission:\n";
		$body .= "\n";
		$body .= "Name: ".addslashes($_POST['firstname'])." ".addslashes($_POST['lastname'])."\n";
		$body .= "Email Address: ".$_POST['email']."\n";
if($_POST['phone']){
			$body .= "Telephone: ".$_POST['phone']."\n";
		}
		if($_POST['address1']){
			$body .= "Street Address: ".$_POST['address1']."\n";
		}
		if($_POST['address2']){
			$body .= "Unit/Apt/Suite: ".$_POST['address2']."\n";
		}
		if($_POST['city']){
			$body .= "City: ".$_POST['city']."\n";
		}
		if($_POST['state']){
			$body .= "State: ".$_POST['state']."\n";
		}
		if($_POST['zip']){
			$body .= "Zip: ".$_POST['zip']."\n";
		}
		if($_POST['moveInDate']){
			$body .= "Desired Move In: ".$_POST['moveInDate']."\n";
		}
		if($_POST['scheduletour']){
			$body .= "Would You Like to Schedule a Tour? ".$_POST['scheduletour']."\n";
		}
		if($_POST['tourdate']){
			$body .= "Requested Tour Date: ".$_POST['tourdate']."\n";
		}
		if($_POST['floorplan']){
			$body .= "I'm interested in: ".$_POST['floorplan']."\n";
		}
		if($_POST['comments']){
			$body .= "Comments: ".$_POST['comments']."\n";
		}
		$body .= "\n";
		$body .= "-----------------------------\n";
		$body .= "This message has been sent from thetoweratopop.com\n";
		$go = mail($_POST['email'],$subject,$body,$from);

		$json = array(
			'success' => true,
			'message' => "Thank you. Your message has been submitted."
		);

		echo $this->json_encode($json);		

	}

	function json_encode($a=false) {
		if (is_null($a)) return 'null';
		if ($a === false) return 'false';
		if ($a === true) return 'true';
		if (is_scalar($a)) {
			if (is_float($a)) {
	// Always use "." for floats.
				return floatval(str_replace(",", ".", strval($a)));
			}
	
			if (is_string($a)) {
				static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
				return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
			} else
				return $a;
			}
				
		$isList = true;
		for ($i = 0, reset($a); $i < count($a); $i++, next($a)) {
			if (key($a) !== $i) {
				$isList = false;
				break;
			}
		}
	
		$result = array();
		if ($isList) {
			foreach ($a as $v) $result[] = $this->json_encode($v);
				return '[' . join(',', $result) . ']';
		} else {
				foreach ($a as $k => $v) $result[] = $this->json_encode($k).':'.$this->json_encode($v);
				return '{' . join(',', $result) . '}';
		}
	}
	
};

$process = new Process;
?>
