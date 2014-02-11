<?php

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

$session->is_admin("admin/login", "admin");

include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/header.inc.php");

?>
<script type="text/javascript">

	$(function() {

		$('input[name=submit]').live('click', function() {
			if($(this).closest('form').valid())
				submit_Login();
			return false;
		});

		$('form[name=login]').keydown(function(e) {
			if(e.keyCode == "13" && $(this).is('input')) {
				if($(this).closest('form').valid())
					submit_Login();
				return false;
			}
		});

		function submit_Login() {
			
			var form = $("form[name=login]").serialize();
			
			$.ajax({
				type: "POST",
				url: "<?php echo MAINURL."users/admin/adminprocess.php"; ?>",
				data: form,
				dataType: "json",
				success: function(data) {
					
					if (data.success)
						document.location.href="<?php echo MAINURL."admin"; ?>";

					if (data.email){
						$('.formMessage').html(data.message);
						$('form[name=login] input[name=email]').addClass('error');
					}

					if (data.password) { 
						$('.formMessage').addClass('.redtext');
						$('form[name=login] input[name=pass]').addClass('error');
						$('.formMessage').html(data.message);
					}

				}		
			});
			return false;
		}
				
		$("form[name=login]").validate({
			rules: {
				email: {
					email: true,
					required: true
				},
				pass: {
					required: true,
					minlength: 8,
					maxlength: 24
				}				
			},
			messages: {
				email: {
					required: 'Please enter a valid email.',
					minlength: 'Password must be at least 8 characters.',
					maxlength: 'Password can not be more than 24 characters.'
				}, 
				pass: {
					required: 'Please enter a password.',
					minlength: 'Password must be at least 8 characters.',
					maxlength: 'Password can not be more than 24 characters.'					
				}
			} 
		});
		
	});

</script>

<div id="wrapper">
    <div class="containerLogin">
        <div id="content">
            <h1>Administration Login</h1>
            <form name="login" action="#" method="POST">

                <div class="formMessage redtext"></div>

                <label for="email">Email</label>
                <input type="text" name="email" class="input_full">
                
                <label for="password">Password</label>
                <input type="password" name="pass" class="input_full">
                
                <input type="submit" name="submit" class="button" value="Enter Administration Area" />
                
                <input type="hidden" name="login" value="1">
                <input type="hidden" name="norefer" value="1" />
                <input type="hidden" name="redirect" value="1" />
            </form>
        </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/footer.inc.php"); ?>
