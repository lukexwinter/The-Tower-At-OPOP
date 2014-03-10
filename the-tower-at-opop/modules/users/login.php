<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/modules.inc.php");

$metaTagInfo = "<title>".TITLE."</title>\n";
$metaTagInfo .= "<meta http-equiv=\"title\" content=\"".TITLE."\"/>\n";
$metaTagInfo .= "<meta name=\"description\" content=\"".DESCRIPTION."\"/>\n";
$metaTagInfo .= "<meta name=\"keywords\" content=\"".KEYWORDS."\"/>\n";

if($session->logged_in)
	header("Location: ".MAINURL."my-account");

include_once($_SERVER['DOCUMENT_ROOT']."/template/header-secondary.inc.php");

$invite 	= (isset($_GET['invite']) ? true : false);

$redirect 	= get_RedirectUrl($_GET);

?>
<script type="text/javascript">

	$(function() {

		//////////////////
		// USER LOGIN
		//////////////////

		$("form[name=login] input[name=submit]").on("click", false, function(){

			if($(this).closest('form').valid())
				submit_UserLogin();

			return false;

		});

		$('form[name=login]').keydown(function(e) {
			if(e.keyCode == "13" && $(this).is('input')) {
				if($(this).closest('form').valid())
					submit_UserLogin();
				return false;
			}
		});

		function submit_UserLogin() {

			$("body").mask("Loading...");

			var form = $("form[name=login]").serialize();
			
			$.ajax({
				type: "POST",
				url: baseurl + '/my-account/process.php',
				data: form,
				dataType: "json",
				traditional: true,
				success: function(data) {

					if(data.success)
						if (data.referrer.length > 0) {
							document.location.href=baseurl + '/' + decodeURIComponent(data.referrer) + '&is_ref=true';
						} else {
							document.location.href=baseurl + '/my-account';
						}

					if (data.email){

						$('form[name=login] input[name=email]').addClass('error');

						$(".errorEmail").html("<p class=\"error\">" + data.message + "</p>");

						$("body").unmask();

					}

					if (data.password) { 

						$('form[name=login] input[name=pass]').addClass('error');

						$(".errorPass").html("<p class=\"error\">" + data.message + "</p>");

						$("body").unmask();

					}

				}
			});

			return false;

		}
				
		$("form[name=login]").validate({
			errorElement: "p",
			rules: {
				email: {
					email: true,
					required: true
				},
				pass: {
					required: true
				}				
			},
			messages: {
				email: {
					email: 'Please enter a valid email address.',
					required: 'Please enter an email address.'
				}, 
				pass: {
					required: 'Please enter a password.'
				}
			},
			errorPlacement: function(error, element) {

				if(element.attr("name") == "pass")
					$(".errorPass").html(error);

				else
					error.insertAfter(element);

			}
		});

	});

</script>
<div id="content">
    <div class="container">

    	<?php if ($invite) { ?>
        <div id="signInContainer">
        To accept your invitation, you must first log in to your account. New users, <a href="<?php echo MAINURL."register".$redirect; ?>">create an account</a>.
        </div>
        <br />
    	<?php } ?>

        <div id="signInContainer">
            <h1>User Sign In</h1>
            <form name="login" action="#" method="POST">
                <div class="formMessage"></div>
                
                <input type="text" name="email" placeholder="Email" class="input_full">
                <span class="errorEmail"></span>

                <input type="password" name="pass" placeholder="Password" class="input_full"><br />
                <span class="errorPass"></span>

                <input type="submit" name="submit" class="button blue" value="Sign In" /><br />

                <p><a href="<?php echo MAINURL."forgot-password"; ?>">Forgot Your Password?</a> | Not a member yet? <a href="<?php echo MAINURL."register".$redirect; ?>">Register Here!</a></p>
                <input type="hidden" name="referrer" value="<?php echo $redirect; ?>">
                <input type="hidden" name="login" value="1">
            </form>
        </div>

    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/footer-home.inc.php"); ?>        