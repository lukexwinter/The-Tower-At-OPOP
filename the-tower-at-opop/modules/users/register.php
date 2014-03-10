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
$referrer 	= (isset($_GET['ref']) ? strip_tags(urlencode($_GET['ref'])) : false);

$redirect 	= get_RedirectUrl($_GET);

?>
<script type="text/javascript">

	$(function() {

		//////////////////////
		// USER REGISTRATION
		//////////////////////

		$("form[name=register] input[name=submit]").on("click", false, function(){

			if($(this).closest('form').valid())
				submit_Register();

			return false;

		});

		$('form[name=register]').keydown(function(e) {
			if(e.keyCode == "13" && $(this).is('input')) {
				if($(this).closest('form').valid())
					submit_Register();
				return false;
			}
		});

		function submit_Register() {

			$("body").mask("Loading...");

			var form = $("form[name=register]").serialize();
			
			$.ajax({
				type: "POST",
				url: baseurl + '/my-account/process.php',
				data: form,
				dataType: "json",
				success: function(data) {
					
					console.log(data);

					if(data.success)
						if (data.referrer.length > 0) {
							document.location.href=baseurl + '/' + decodeURIComponent(data.referrer) + '';
						} else {
							document.location.href=baseurl + '/my-account';
						}

					if(data.error)
						alert(data.message);

					$("body").unmask();

				}		
			});
			return false;
		}

		$.validator.addMethod("alphaNumeric", function (value, element) {
			return this.optional(element) || /^[0-9a-zA-Z]+$/.test(value);
		});

		$("form[name=register]").validate({
			errorElement: "p",
			rules: {
				regpass: {
					required: true,
					alphaNumeric: true,
					minlength: 8,
					maxlength: 24
				},
				regpass2: {
					equalTo: "input[name=regpass]"
				},			
				firstname: {
					required: true,
					minlength: 2
				},			
				lastname: {
					required: true,
					minlength: 2
				},
				email: {
					required: true,
					email: true,
	  				remote: {
						url: baseurl + '/my-account/process.php',
						type: "post",
						data: {
							getEmail: function() {
								return true;
							}
						},
						async: false
					}
				}
			},
			messages: {
				regpass: { 
					required: 'Please enter a password.',
					alphaNumeric: "Password must contain only letters, numbers."
				},
				email: {
					remote: "Email is already in use.",
					required: 'Please enter your email.'
				}
			},
			errorPlacement: function(error, element) {

				error.insertAfter(element);

			}
		});

	});

</script>
<div id="content">
	<div class="container">    

    	<?php if ($invite) { ?>
        <div id="signInContainer">
        To accept your invitation, you must first create an account. Existing users, <a href="<?php echo MAINURL."login".$redirect; ?>">login</a>.
        </div>
        <br />
    	<?php } ?>

        <div id="signInContainer">

            <form name="register" action="#" method="POST">
    
            <h2>Register</h2>
    
            <input type="text" name="firstname" placeholder="First Name" class="input_full">
    
            <input type="text" name="lastname" placeholder="Last Name" class="input_full">
    
            <input type="text" name="email" placeholder="Email" class="input_full">

            <div class="hints"><b>Password</b> must be 8 to 24 characters and can only contain alphanumeric characters.</div>

            <input type="password" name="regpass" placeholder="Password" class="input_full">
    
            <input type="password" name="regpass2" placeholder="Repeat Password" class="input_full">
  
            <input type="submit" name="submit" class="button blue" value="Register" />
            <p>Already a member? <a href="<?php echo MAINURL."login".$redirect; ?>">Login here.</a></p>

            <input type="hidden" name="referrer" value="<?php echo strip_tags($referrer); ?>">
            <input type="hidden" name="norefer" value="1">
            <input type="hidden" name="register" value="1">
    
            </form>
            
		</div>

    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/footer-home.inc.php"); ?>  