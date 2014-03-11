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
						window.location.href = '<?php echo MAINURL."success"; ?>';
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
		<h1>Contact</h1>
		
	  <div id="formError">
	    <p></p>
	  </div>
	  <div id="formSuccess">
	    <p></p>
	  </div>
	  <div id="formContainer">
	    <form id="contactForm" name="contactForm" method="post" action="process.php">
	      <div class="formline">
	        <input type="text" id="firstname" name="firstname" class="textbox" placeholder="First Name*" />
	      </div>
	      <div class="formline">
	        <input type="text" id="lastname" name="lastname" class="textbox" placeholder="Last Name*" />
	      </div>
	      
	      <div class="formline">
	        <input type="text" name="email" class="textbox" placeholder="Email Address*">
			<?php echo '<input type="text" name="honeypot" style="display: none;" id="honeypot" value="' . str_shuffle('8ewHUHxOVJE9nJAG') . '" />'; ?>
			<input type="text" name="username" style="display: none;">
	      </div>
	      <div class="formline">
	        <input type="text" name="phone" class="textbox" placeholder="Phone Number">
	        <input type="hidden" name="contact" value="1" />
	      </div>
	      <div class="formline2">
	        <textarea name="comments" class="messagebox" placeholder="Comments" /></textarea>
	      </div>
	      <div class="formline2 submitline"> 
		<br /><br />
			<a href="#" title="Submit" id="contactSubmit" class="button">Submit</a>
	      </div>
	      
	    </form>
	  </div>
	</div>
	
</section>



<script type="text/javascript">

	var honeypot = document.getElementById('honeypot');
	honeypot.setAttribute('value' , '81SSJmlo4KsFBnUu'); // Matches $spamKey in process

</script>

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>

<!-- Google Code for Contact Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1058029868;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "kgVqCOCFzgIQrILB-AM";
var google_conversion_value = 1;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1058029868/?value=1&amp;label=kgVqCOCFzgIQrILB-AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>