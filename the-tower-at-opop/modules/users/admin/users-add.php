<?php

$section = "users";

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

$session->get_permissions("ADMIN", "MODULES", "USERS", false, true);

include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/header.inc.php");

?>
<link rel="stylesheet" type="text/css" href="<?php echo MAINURL."template/admin/ui.jqgrid.css"; ?>" />
<script type="text/javascript" src="<?php echo MAINURL."js/jqgrid/jquery.jqGrid.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo MAINURL."js/jqgrid/i18n/grid.locale-en.js"; ?>"></script>
<script type="text/javascript">

	$(function() {

		$('input[name=submit]').live('click', function() {
			if($(this).closest('form').valid())
				submit_AddUsers();
			return false;
		});

		$('form[name=addUsers]').keydown(function(e) {
			if(e.keyCode == "13" && $(this).is('input')) {
				if($(this).closest('form').valid())
					submit_AddUsers();
				return false;
			}
		});

		function submit_AddUsers() {

			var form = $("form[name=addUsers]").serialize();
			
//			alert(formdata);
//			return false;

			$.ajax({
				type: "POST",
				url: "<?php echo MAINURL."users/admin/adminprocess.php"; ?>",
				data: form,
				dataType: "json",
				success: function(data) {

					if(data.success)
						document.location.href="<?php echo MAINURL."users/admin/users.php"; ?>";

					if(data.error)
						alert(data.message);

				}		
			});
			return false;
		}

		$("form[name=addUsers]").validate({
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
							}
						}					
					}
				},
				regpass: {
					required: true,
					minlength: 8,
					maxlength: 24
				},
				regpass2: {
					equalTo: "input[name=regpass]"
				}			
			},
			messages: {
				"modules[]": 'Please select at least 1 permission.',
				email: {
					remote: "Email is already in use.",
					required: 'Please enter your email.'
				},
				regpass: { 
					required: 'Please enter a valid password.'
				}
			},
			errorPlacement: function(error, element) {

				if(element.attr("name") == "modules[]")
					error.insertAfter(".modulesError");
	
				else
					error.insertAfter(element);

			}
		});

		$('input[name=checkAllModules]').live('click', function() {	
			$(".modules").find(':checkbox').attr('checked', this.checked);
		});
		
	});

</script>

<div id="wrapper">
	<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/subnav.".$section.".inc.php"); ?>
    <div class="container">
        <div id="content">
            <h1>Add User</h1>
            <form name="addUsers">

                <fieldset>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="input_full">
                    
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="input_full">
                    
                    <label for="email">Email</label>
                    <input type="text" name="email" class="input_full">

                    <label for="password">Password</label>
                    <input type="password" name="regpass" class="input_full">
                    
                    <label for="password">Re-Enter Password</label>
                    <input type="password" name="regpass2" class="input_full">

                    <label>Phone (Primary)</label>
                    <input type="text" name="phone" class="input_full">
                </fieldset>
                
                <fieldset>
                    <label for="address1">Address</label>
                    <input type="text" name="address1" class="input_full">
        
                    <label for="address2">Address 2 / Unit #</label>
                    <input type="text" name="address2" class="input_full">
        
                    <label for="city">City</label>
                    <input type="text" name="city" class="input_full">
        
                    <label for="state">State</label>
                    <select name="state" class="input_full">
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
                    </select>
        
                    <label for="zip">Zip</label>
                    <input type="text" name="zip" class="input_full">
                </fieldset>

                <fieldset>
                    <label for="status">Active?</label>
                    <input type="checkbox" name="status" value="1" checked/>
                </fieldset>

                <fieldset>
                    <label for="modules">Select Administrator Permissions</label>
                    <div class="modulesError"></div>
                    <div class="modules">
                        <input type="checkbox" name="checkAllModules" />&nbsp;<strong>Check-All Permissions</strong><br /><br />
                        <?php

                            $sql = "SELECT 
                                        id,
										module,
                                        name,
										description 
                                    FROM 
                                        ".TBL_PERMISSIONS." 
                                    ORDER BY 
										module,
                                        name
                                    ASC";

                            $result = $database->query($sql);
                            $rowcount = mysql_numrows($result);

							$display 	= "";
							$set 		= array();
							
							while($records = mysql_fetch_array($result, MYSQL_ASSOC))
								$set[$records['module']][] = $records;

							foreach ($set as $module => $records) {

								$display .= "<label for=\"spacer\">".ucfirst($module)."</label>\n";

								foreach ($records as $row)
									$display .= "<input type=\"checkbox\" name=\"modules[]\" value=\"".$row['id']."\" />&nbsp;
												<strong>".$row['name']."</strong> - <em>".$row['description']."</em>
												<br />\n";

								$display .= "<br />";

							}
							
							echo $display;

                        ?>
                    </div>
                </fieldset>

                <input type="submit" name="submit" class="button" value="Add User" />
                <input type="hidden" name="addUsers" value="1">
            </form>
        </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/footer.inc.php"); ?>
