<?php

$section="users";

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

$session->get_permissions("ADMIN", "MODULES", "USERS", false, true);

include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/header.inc.php");

$users = $database->info_users($session->user_id);

?>
<script type="text/javascript">

	$(function() {

		$('input[name=submit]').live('click', function() {
			if($(this).closest('form').valid())
				submit_EditMyAccount();
			return false;
		});

		$('form[name=editMyAccount]').keydown(function(e) {
			if(e.keyCode == "13" && $(this).is('input')) {
				if($(this).closest('form').valid())
					submit_EditMyAccount();
				return false;
			}
		});

		function submit_EditMyAccount() {

			var form = $("form[name=editMyAccount]").serialize();
			
//			alert(formdata)
//			return false;

			$.ajax({
				type: "POST",
				url: "<?php echo MAINURL."users/admin/adminprocess.php"; ?>",
				data: form,
				dataType: "json",	
				success: function(data) {

					if(data.success)
						document.location.href="<?php echo MAINURL."users/admin/users.php"; ?>";

					if (data.email) { 
						$("form[name=editMyAccount] input[name=email]").toggleClass('error');
						$("form[name=editMyAccount] input[name=email]").after("<div class\"clear\"></div><label for=\"email\" class=\"error\">"+ data.message +"</label>");	
					}

				}
			});
			return false;
		}

		$("form[name=editMyAccount]").validate({
			rules: {
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
						url: "<?php echo MAINURL."users/admin/adminprocess.php"; ?>",
						type: "post",
						data: {
							getEmail: function() {
								return true;
							},
							id: function() {
								return $("input[name=id]").val();
							}
						}					
					}
				},
				regpass: {
					minlength: 8,
					maxlength: 24
				},
				regpass2: {
					equalTo: "input[name=regpass]"
				}
			},
			messages: {
				email: {
					remote: "Email is already in use.",
					required: 'Please enter your email.'
				},
				regpass: { 
					required: 'Please enter a valid password.'
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element);
			}
		});	

	});

</script>

<div id="wrapper">
	<?php include($_SERVER['DOCUMENT_ROOT']."/template/admin/subnav.users.inc.php"); ?>
    <div class="container">
        <div id="content">
            <h1>My Account</h1>
            <form name="editMyAccount">
                <fieldset>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars(stripslashes($users['firstname'])); ?>" class="input_full" />
                    
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars(stripslashes($users['lastname'])); ?>" class="input_full" />
                    
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo htmlspecialchars(stripslashes($users['email'])); ?>" class="input_full" />
                    
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars(stripslashes($users['phone'])); ?>" class="input_full" />

                    <label for="password">Password</label>
                    <input type="password" name="regpass" class="input_full">
                    
                    <label for="password">Re-Enter Password</label>
                    <input type="password" name="regpass2" class="input_full">
                </fieldset>

                <input type="submit" name="submit" class="button" value="Save Changes" />
                <input type="hidden" name="id" value="<?php echo $session->user_id; ?>" />
                <input type="hidden" name="editMyAccount" value="1" />
            </form>
        </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/footer.inc.php"); ?>