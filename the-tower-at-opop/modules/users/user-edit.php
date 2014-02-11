<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/modules.inc.php");

$metaTagInfo = "<title>".TITLE."</title>\n";
$metaTagInfo .= "<meta http-equiv=\"title\" content=\"".TITLE."\"/>\n";
$metaTagInfo .= "<meta name=\"description\" content=\"".DESCRIPTION."\"/>\n";
$metaTagInfo .= "<meta name=\"keywords\" content=\"".KEYWORDS."\"/>\n";

$session->is_user();

include_once($_SERVER['DOCUMENT_ROOT']."/template/header.inc.php");

?>
<script type="text/javascript">

	var state = "<?php echo $session->user['state']; ?>";

	$(function() {
			   
		$("form[name=editAccount] select[name=state]").val(state);

		$("input[name=submit]").on("click", false, function(){

			if($("form[name=editAccount]").valid())
				submit_EditAccount();

			return false;
		});

		$('form[name=editAccount]').keyup(function(e) {
			if(e.keyCode == "13") {

				if($("form[name=editAccount]").valid())
					submit_EditAccount();

				return false;
			}
		});

		function submit_EditAccount() {

			$("body").mask("Loading...");

			var form = $("form[name=editAccount]").serialize();
			
//			alert(formdata)
//			return false;

			$.ajax({
				type: "POST",
				url: baseurl + '/my-account/process.php',
				data: form,
				dataType: "json",
				success: function(data) {

					if(data.success)
						$.growl({ title: "Success!", message: "The information was successfully saved." });

					if (data.error)
						$.growl.error({ message: "There was an error processing your request." });

				}
			});

			$("body").unmask();

			return false;

		}

		$("form[name=editAccount]").validate({
			rules: {
				regpass: {
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
							},
							id: function() {
								return $("form[name=editAccount] input[name=id]").val();
							}
						}					
					}
				},
				phone: {
					required: true,
					minlength: 2,
					maxlength: 20
				},
				address1: {
					required: true,
					minlength: 2
				},
				city: {
					required: true,
					minlength: 2
				},
				state: {
					required: true
				},
				zip: {
					required: true,
					minlength: 5
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

				if (element.attr("name") == "prof_id[]")
					error.insertAfter(".errorProfession");

				else
					error.insertAfter(element);

			}
		});
	
	});

</script>
<div id="content">
	<div id="secondary" class="container">
        <?php

			///////////////////////////
			// USER PROFILE IMAGE
			///////////////////////////

            echo "<div class=\"summary\">
					".get_ProfilePhoto(23, $session->user_id, "USERPROFILE115X115", "imgUserProfile115x115")."
					<ul class=\"summaryText\">
						<li><h1>".$session->acctname."</h1></li>
						<li>".$session->email."</li>
					</ul>
				</div>
			";

        ?>

        <div class="formMessage" style="display:none;">Your account has been successfully updated.</div>        

        <h3>Edit Your Account</h3>

        <form name="editAccount" action="#" method="POST">

			<div class="left">

            <label for="firstname">First Name</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars(stripslashes($session->user['firstname'])); ?>" class="input_xlarge" /><br />
            
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars(stripslashes($session->user['lastname'])); ?>" class="input_xlarge" /><br />
            
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars(stripslashes($session->user['email'])); ?>" class="input_xlarge" /><br />
    
            <p><b>Password</b> must be 8 to 24 characters and can only contain alphanumeric characters.</p>
            <label for="password">Password</label>
            <input type="password" name="regpass" class="input_xlarge"><br />

            <label for="password">Re-Enter Password</label>
            <input type="password" name="regpass2" class="input_xlarge"><br />

            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars(stripslashes($session->user['phone'])); ?>" class="input_xlarge"><br />

            </div>
            
			<div class="right">

            <h4>Billing Information</h4>

            <label for="address1">Address</label>
            <input type="text" name="address1" value="<?php echo htmlspecialchars(stripslashes($session->user['address1'])); ?>" class="input_xlarge"><br />

            <label for="address2">Address 2 / Unit #</label>
            <input type="text" name="address2" value="<?php echo htmlspecialchars(stripslashes($session->user['address2'])); ?>" class="input_xlarge"><br />

            <label for="city">City</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars(stripslashes($session->user['city'])); ?>" class="input_xlarge"><br />

            <label for="state">State</label>
            <select name="state" class="input_xlarge">
                <option value="" selected="selected">Select a State</option>
                <option value="">------------</option>
                <option value="AL">Alabama (AL)</option>
                <option value="AK">Alaska (AK)</option>
                <option value="AZ">Arizona (AZ)</option>
                <option value="AR">Arkansas (AR)</option>             
                <option value="CA">California (CA)</option>
                <option value="CO">Colorado (CO)</option>
                <option value="CT">Connecticut (CT)</option>
                <option value="DE">Delaware (DE)</option>
                <option value="DC">District of Columbia (DC)</option>    
                <option value="FL">Florida (FL)</option>
                <option value="GA">Georgia (GA)</option>
                <option value="GU">Guam (GU)</option>
                <option value="HI">Hawaii (HI)</option>
                <option value="ID">Idaho (ID)</option>
                <option value="IL">Illinois (IL)</option>
                <option value="IN">Indiana (IN)</option>
                <option value="IA">Iowa (IA)</option>
                <option value="KS">Kansas (KS)</option>
                <option value="KY">Kentucky (KY)</option>
                <option value="LA">Louisiana (LA)</option>
                <option value="ME">Maine (ME)</option>
                <option value="MD">Maryland (MD)</option>
                <option value="MA">Massachusetts (MA)</option>
                <option value="MI">Michigan (MI)</option>
                <option value="MN">Minnesota (MN)</option>
                <option value="MS">Mississippi (MS)</option>
                <option value="MO">Missouri (MO)</option>
                <option value="MT">Montana (MT)</option>
                <option value="NE">Nebraska (NE)</option>
                <option value="NV">Nevada (NV)</option>
                <option value="NH">New Hampshire (NH)</option>
                <option value="NJ">New Jersey (NJ)</option>
                <option value="NM">New Mexico (NM)</option>
                <option value="NY">New York (NY)</option>
                <option value="NC">North Carolina (NC)</option>
                <option value="ND">North Dakota (ND)</option>
                <option value="OH">Ohio (OH)</option>
                <option value="OK">Oklahoma (OK)</option>
                <option value="OR">Oregon (OR)</option>
                <option value="PA">Pennsylvania (PA)</option>
                <option value="PR">Puerto Rico (PR)</option>
                <option value="RI">Rhode Island (RI)</option>
                <option value="SC">South Carolina (SC)</option>
                <option value="SD">South Dakota (SD)</option>
                <option value="TN">Tennessee (TN)</option>
                <option value="TX">Texas (TX)</option>
                <option value="UT">Utah (UT)</option>
                <option value="VT">Vermont (VT)</option>
                <option value="VA">Virginia (VA)</option>
                <option value="VI">Virgin Islands (VI)</option>
                <option value="WA">Washington (WA)</option>
                <option value="WV">West Virginia (WV)</option>
                <option value="WI">Wisconsin (WI)</option>
                <option value="WY">Wyoming (WY)</option>
            </select><br />

            <label for="zip">Zip</label>
            <input type="text" name="zip" value="<?php echo htmlspecialchars(stripslashes($session->user['zip'])); ?>" class="input_xlarge"><br />

            <label for="button">&nbsp;</label>
            <input type="submit" name="submit" class="button" value="Save Changes" />
            <input type="hidden" name="id" value="<?php echo $session->user_id; ?>" />
            <input type="hidden" name="editAccount" value="1" />
            
            </div>
        </form>

    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/footer.inc.php"); ?>
    