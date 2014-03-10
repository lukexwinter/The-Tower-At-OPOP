<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/modules.inc.php");

$metaTagInfo = "<title>".TITLE."</title>\n";
$metaTagInfo .= "<meta http-equiv=\"title\" content=\"".TITLE."\"/>\n";
$metaTagInfo .= "<meta name=\"description\" content=\"".DESCRIPTION."\"/>\n";
$metaTagInfo .= "<meta name=\"keywords\" content=\"".KEYWORDS."\"/>\n";

include_once($_SERVER['DOCUMENT_ROOT']."/template/header-secondary.inc.php");

?>
<script type="text/javascript">

	$(function() {

		//////////////////
		// FORGOT PASSWORD
		//////////////////

		$("input[name=submit]").on("click", false, function(){

			if($(this).closest('form').valid())
				submit_ForgotPassword();

			return false;

		});

		$('form[name=forgotPassword]').keydown(function(e) {
			if(e.keyCode == "13" && $(this).is('input')) {
				if($(this).closest('form').valid())
					submit_ForgotPassword();
				return false;
			}
		});

		function submit_ForgotPassword() {

			$("body").mask("Loading...");

			var form = $("form[name=forgotPassword]").serialize();
			
			$.ajax({
				type: "POST",
				url: baseurl + '/my-account/process.php',
				data: form,
				dataType: "json",
				success: function(data) {

					if(data.success) {

						$("body").unmask();

						$("form[name=forgotPassword]").hide();
						$(".formMessage").show();
						$(".formMessage").html("Your new password has been generated and sent to the email associated with your account.");
					}

					if (data.error) { 

						$('input[name=email]').addClass('error');

						$(".errorEmail").html("<p class=\"error\">The email address was not found.<\/p>");

						$("body").unmask();

					}

				}		
			});
			return false;
		}
				
		$("form[name=forgotPassword]").validate({
			errorElement: "p",
			rules: {
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				email: {
					required: 'Please enter your email address.'
				}
			},
			errorPlacement: function(error, element) {

				if(element.attr("name") == "email")
					$(".errorEmail").html(error);

			} 
		});

	});

</script>
<div id="content">
    <div class="container">

        <div id="signInContainer">

            <h2>Password Retrieval</h2>
            <div class="formMessage" style="display:none;"></div>
            <form name="forgotPassword" action="#" method="POST">
    
                <input type="text" name="email" placeholder="Email" class="input_full"><br />
                <span class="errorEmail"></span>

                <input type="submit" name="submit" class="button blue" value="Reset" /><br />

                <p>Not a member? <a href="<?php echo MAINURL."register"; ?>">Register here.</a></p>

                <input type="hidden" name="forgotpass" value="1">
            </form>

        </div>
    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/footer-secondary.inc.php"); ?>