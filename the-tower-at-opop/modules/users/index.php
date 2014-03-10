<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/modules.inc.php");

$metaTagInfo = "<title>".TITLE."</title>\n";
$metaTagInfo .= "<meta http-equiv=\"title\" content=\"".TITLE."\"/>\n";
$metaTagInfo .= "<meta name=\"description\" content=\"".DESCRIPTION."\"/>\n";
$metaTagInfo .= "<meta name=\"keywords\" content=\"".KEYWORDS."\"/>\n";

$session->is_user();

// create addition user array information upon login

include_once($_SERVER['DOCUMENT_ROOT']."/template/header.inc.php");

//$users = $database->info_users($session->user_id);

?>
<div id="content">
	<div id="secondary" class="container">
    
    	<div class="left">
        	<?php include_once($_SERVER['DOCUMENT_ROOT']."/modules/users/user-nav.inc.php"); ?>
		</div>
        <div class="right">
        	<?php

				echo "<ul id=\"breadCrumbs\">
						<li><a href=\"".MAINURL."\" title=\"Home\">Home</a><span> > </span></li>
						<li><a href=\"".MAINURL."my-account\" title=\"My Account\">My Account</a></li>
						<li class=\"clear\"></li>
					  </ul>
					";
					
			?>        
            <h2>Welcome, <?php echo $session->acctname; ?></h2>
        </div>
        <div class="clear"></div>

    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/footer.inc.php"); ?>