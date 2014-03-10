<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>

<link rel="stylesheet" type="text/css" href="<?php echo MAINURL.""; ?>/live-site/css/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo MAINURL.""; ?>/live-site/js/vendor/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo MAINURL.""; ?>/live-site/js/vendor/jquery.textCaptcha.js"></script>
<script type="text/javascript" src="<?php echo MAINURL.""; ?>/live-site/js/vendor/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo MAINURL.""; ?>/live-site/js/vendor/jquery.placeholder.js"></script>
<script type="text/javascript">
	$(function() {

		$('#contactForm').textCaptcha( {
			type: 'math',
			method: 'add'
		} );
	
		// validation
		$.validator.addMethod("captchaCheck",
			function() {
				return $('#contactForm').textCaptchaCheck();
			},
			"Captcha value does not match");

		$("#moveInDate").datepicker( { dateFormat: 'mm-dd-yy' } );
		$("#tourdate").datepicker( { dateFormat: 'mm-dd-yy' } );
		
		$("#formSuccess").hide();
		$("#formError").hide();
		
		$('a#contactSubmit').click(function(){
			var isValid = $("#contactForm").valid();
			if(isValid) {
				contactFormSubmit();
			}
			return false;
		});

		$('form[name=contactForm]').keyup(function(e) {
			if(e.keyCode == "13") {		
				var trigger = false;
				$('textarea').each(function(){
					if ($(this).is(":focus")) {
						trigger = true;
						return false;
					}
			    });
			    if (trigger == false) {
					var isValid = $("form[name=contactForm]").valid();
					if(isValid) {
						formSubmit();
					}
					return false;
				}
			}
		});

	
		function contactFormSubmit() {

			var contactFormdata = $("#contactForm").serialize();
			
			$.ajax({
				type: "POST",
				url: "live-site/process.php",
				data: contactFormdata,
//				dataType: "json",
				error: function(data) {
					$("#formSuccess").html("There was an error. Please try again.");
				},
				success: function(data) {

					var data = jQuery.parseJSON(data);
					
					if(data.success) {
//						$("#formSuccess p").html(data.message);	
//						$("#formSuccess").show();	
						window.location.href = 'live-site/success.php';
					} 
					if(data.error) {
						$("#formError p").html(data.message);
						$("#formError").show();						
					}
					$('#contactForm')[0].reset();
				}		
			});
			return false;
		}
				
		$("#contactForm").validate({
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
					email: true
				},
				captcha_user: {
				required: true,
				captchaCheck: true
				}
			},
			messages: {
				firstname: 'Enter your First Name',
				lastname: 'Enter your Last Name',
				email: 'Enter a valid Email Address'
			}
		});	

	});
				
				
	
</script>
<section class="general contact">
	<div class="content">
		<h1 class="header">Schedule a Tour</h1>
		
	      <div id="formError">
	        <p></p>
	      </div>
	      <div id="formSuccess">
	        <p></p>
	      </div>
	      <div id="formContainer">
	        <form id="contactForm" name="contactForm" method="post" action="process.php">
	          <div class="formline">
	            <input type="text" placeholder="First Name*" id="firstname" name="firstname" class="textbox" />
	          </div>
	          <div class="formline">
	            <input type="text" placeholder="Last Name*" id="lastname" name="lastname" class="textbox" />
	          </div>
	          <div class="clear"></div>
	          <div class="formline">
	            <input type="text" placeholder="Email Address*" name="email" class="textbox">
				<?php echo '<input type="text" name="honeypot" style="display: none;" id="honeypot" value="' . str_shuffle('8ewHUHxOVJE9nJAG') . '" />'; ?>
				<input type="text" name="username" style="display: none;">
	          </div>
	          <!--<div class="formline">
	            <label for="phone">Telephone</label>
	            <input type="text" name="phone" class="textbox">
	          </div>
	          <div class="clear"></div>
	          <div class="formline">
	            <label for="address1">Street Address</label>
	            <input type="text" name="address1" class="textbox">
	          </div>
	          <div class="formline">
	            <label for="address2">Unit/Apt/Suite</label>
	            <input type="text" name="address2" class="textbox">
	          </div>
	          <div class="clear"></div>
	          <div class="formline">
	            <label for="city">City</label>
	            <input type="text" name="city" class="textbox">
	          </div>
	          <div class="formline">
	            <label for="state">State</label>
	            <select name="state" id="state" class="dropdown">
	              <option value="">Select State...</option>
	              <option value="AK">AK</option>
	              <option value="AL">AL</option>
	              <option value="AR">AR</option>
	              <option value="AZ">AZ</option>
	              <option value="CA">CA</option>
	              <option value="CO">CO</option>
	              <option value="CT">CT</option>
	              <option value="DC">DC</option>
	              <option value="DE">DE</option>
	              <option value="FL">FL</option>
	              <option value="GA">GA</option>
	              <option value="HI">HI</option>
	              <option value="IA">IA</option>
	              <option value="ID">ID</option>
	              <option value="IL">IL</option>
	              <option value="IN">IN</option>
	              <option value="KS">KS</option>
	              <option value="KY">KY</option>
	              <option value="LA">LA</option>
	              <option value="MA">MA</option>
	              <option value="MD">MD</option>
	              <option value="ME">ME</option>
	              <option value="MI">MI</option>
	              <option value="MN">MN</option>
	              <option value="MO">MO</option>
	              <option value="MS">MS</option>
	              <option value="MT">MT</option>
	              <option value="NC">NC</option>
	              <option value="ND">ND</option>
	              <option value="NE">NE</option>
	              <option value="NH">NH</option>
	              <option value="NJ">NJ</option>
	              <option value="NM">NM</option>
	              <option value="NV">NV</option>
	              <option value="NY">NY</option>
	              <option value="OH">OH</option>
	              <option value="OK">OK</option>
	              <option value="OR">OR</option>
	              <option value="PA">PA</option>
	              <option value="RI">RI</option>
	              <option value="SC">SC</option>
	              <option value="SD">SD</option>
	              <option value="TN">TN</option>
	              <option value="TX">TX</option>
	              <option value="UT">UT</option>
	              <option value="VA">VA</option>
	              <option value="VT">VT</option>
	              <option value="WA">WA</option>
	              <option value="WI">WI</option>
	              <option value="WV">WV</option>
	              <option value="WY">WY</option>
	            </select>
	          </div>
	          <div class="clear"></div>
	          <div class="formline">
	            <label for="zip">Zip</label>
	            <input type="text" name="zip" class="textbox">
	          </div>
	          <div class="formline">
	            <label for="moveInDate">Desired Move In (mm-dd-yy)</label>
	            <input name="moveInDate" id="moveInDate" type="text" class="textbox" />
	          </div>
	          <div class="clear"></div>
	          <div class="formline2">
	            <label for="scheduletour">Would You Like to Schedule a Tour?</label>
	            <select  name="scheduletour" id="scheduletour" class="dropdown2">
	              <option value="Yes" selected="selected">Yes</option>
	              <option value="No">No</option>
	            </select>
	          </div>-->
	          <div class="formline">
	            <input type="text" placeholder="Desired Tour Date*" name="tourdate" id="tourdate" class="textbox">
	          </div>
	          <!--<div class="formline">
	            <label for="floorplan">I'm interested in:</label>
	            <select  name="floorplan" id="floorplan" class="dropdown">
	              <option value="" selected="selected"> Choose a Floor Plan</option>
	              <option value="The Lady Bird" <?php echo ($_GET['floorplan'] == 'The Lady Bird' ? 'selected="selected"' : ''); ?>>The Lady Bird</option>
	              <option value="The Buchanan" <?php echo ($_GET['floorplan'] == 'The Buchanan' ? 'selected="selected"' : ''); ?>>The Buchanan</option>
	              <option value="The Walter" <?php echo ($_GET['floorplan'] == 'The Walter' ? 'selected="selected"' : ''); ?>>The Walter</option>
	              <option value="The Travis" <?php echo ($_GET['floorplan'] == 'The Travis' ? 'selected="selected"' : ''); ?>>The Travis</option>
	              <option value="The Georgetown" <?php echo ($_GET['floorplan'] == 'The Georgetown' ? 'selected="selected"' : ''); ?>>The Georgetown</option>
	              <option value="The Somerville" <?php echo ($_GET['floorplan'] == 'The Somerville' ? 'selected="selected"' : ''); ?>>The Somerville</option>
	            </select>
	          </div>-->
	          <div class="clear"></div>
	          <div class="formline2">
	            <textarea name="comments" placeholder="Comments" class="messagebox" /></textarea>
	          </div>
	          <div class="formline2 submitline">
          	<br /><br />
	            <a href="#" title="Submit" id="contactSubmit" class="button">Submit</a>
	            <!--<span style="padding: 10px; font-size: 12px; display: block; color: #a9a9a9;"><em>*Indicates required fields.</em>-->
	            <input type="hidden" name="tour" value="1" />
	          </div>
	          <div class="clear"></div>
	        </form>
	      </div>
	    
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		//Initiate Placeholder Plugin for Old Browsers
		$('input, textarea').placeholder();
	});

	var honeypot = document.getElementById('honeypot');
	honeypot.setAttribute('value' , '81SSJmlo4KsFBnUu'); // Matches $spamKey in process

</script>

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>
