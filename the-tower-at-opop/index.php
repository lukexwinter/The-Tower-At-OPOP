<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Downtown St. Louis Luxury Apartments and Penthouses | The Tower at OPOP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

        <link rel="stylesheet" href="http://apartmentsdev.naproperties.com/the-tower-at-opop/css/normalize.min.css">
        <link rel="stylesheet" href="http://apartmentsdev.naproperties.com/the-tower-at-opop/css/main.css">


        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script src="http://apartmentsdev.naproperties.com/the-tower-at-opop/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script type="text/javascript" src="http://apartmentsdev.naproperties.com/the-tower-at-opop/js/plugins.js"></script>
        <script type="text/javascript" src="http://apartmentsdev.naproperties.com/the-tower-at-opop/js/main.js"></script>
		<script type="text/javascript" src="http://apartmentsdev.naproperties.com/the-tower-at-opop/js/vendor/jquery.placeholder.js"></script>
		<script type="text/javascript" src="http://apartmentsdev.naproperties.com/the-tower-at-opop/js/vendor/jquery.validate.min.js"></script>

		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-33938504-1']);
		  _gaq.push(['_setDomainName', 'naproperties.com']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		
		<script type="text/javascript">
		
		var baseurl = "http://apartmentsdev.naproperties.com/the-tower-at-opop";

		//Show the First step on page load
		$(document).ready(function(){
			//$('#sign-up .step1, #sign-up .step2, #sign-up .step3, #duplicate-entry, #sign-up #success').hide();
			//$('#sign-up .step1').show();

			//Show Sign Up Process
			$('#sign-up-button').on('click', function(){
				$('#sign-up .step1').hide();
				$('#sign-up .step2').fadeIn(100);
				return false;
			});
	
			// Show Password Fields
			$('#sign-up .next').on('click', function(){
				if($('form[name=sign-up-form]').valid()) {
					$('form[name=password-form] input[name=firstname]').val($('form[name=sign-up-form] input[name=firstname]').val());
					$('form[name=password-form] input[name=lastname]').val($('form[name=sign-up-form] input[name=lastname]').val());
					$('form[name=password-form] input[name=email]').val($('form[name=sign-up-form] input[name=email]').val());
					$('#sign-up .step2').hide();
					$('#sign-up .step3').fadeIn(100);
				}
				return false;
			});
	
			// Submit Form Data
			$('#sign-up .submit').on('click', function(){
				if($('form[name=password-form]').valid()) {

					var form = $("form[name=password-form]").serialize();
					
					$.ajax({
						type: "POST",
						url: baseurl + '/modules/users/process.php',
						data: form,
						dataType: "json",
						success: function(data) {
		
							if(data.success) {
								$('#sign-up .step3').hide();
								$('#sign-up #success').fadeIn(100);
							}
		
							if(data.error)
								alert(data.message);
		
						}		
					});

				}
				return false;
			});
			
			//Show Sign In
			$('#show-sign-in').click(function(){
				$('section').hide();
				$('#sign-in').fadeIn(100);
			});
			
			//Show Forgot Password
			$('#show-forgot-password').click(function(){
				$('section').hide();
				$('#forgot-password').fadeIn(100);
			});

			//Initiate Placeholder Plugin for Old Browsers
			$('input, textarea').placeholder();
			
			$("form[name=sign-up-form]").validate({
			    onfocusout: false,
			    onkeyup: false,
				rules: {
					firstname: {
						required: true
					},
					lastname: {
						required: true
					},
					email: {
						required: true,
						email: true,
						remote: {
							url: baseurl + '/modules/users/process.php',
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
					email: {
						email: 'Please enter a valid email address.',
						remote: 'Email address already registered.'
					}
				},
				errorPlacement: function(error, element) {
	
					if (error.text() == 'Email address already registered.') {
						$('#sign-up .step2').hide();
						$('#duplicate-entry').fadeIn(100);
					}
							
				}
			});
	
	function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);

    // or, if you wanted to avoid alerts...

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre)
}
	
			$.validator.addMethod("passRegex", function(value, element) {
				return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
			}, "Password must contain only letters, numbers, or dashes.");

			$("form[name=password-form]").validate({
				rules: {
					regpass: {
						required: true,
						passRegex: true,
						minlength: 8,
						maxlength: 24
					},
					regpass2: {
						required: true,
						equalTo: "input[name=regpass]"
					}
				},
				messages: {
					email: {
						email: 'Please enter a valid email address.'
					}
				},
				errorPlacement: function(error, element) {
	
					//$('form[name=login] .formMessage').html(error);
	
				}
			});

		});
		
		</script>	
		
		
        <script type="text/javascript" src="http://apartmentsdev.naproperties.com/missouri/st-louis/the-tower-at-opop/js/vendor/modernizr-2.6.2.min.js"></script>
		<script>
		if (Modernizr.touch) {
			$(document).ready(function() {
				$( "input" ).focus(function() {
				  $('footer').css({display:'none'}); 
				});
				$('input').on('blur', function(){
				    $('footer').css({display:'block'});
				});
			});
		}
		</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
			<div class="tower-bg">
			<header>
				<a href="http://apartmentsdev.naproperties.com/the-tower-at-opop/"><img src="http://apartmentsdev.naproperties.com/the-tower-at-opop/img/tower-logo.png" width="258" height="59" /></a>
				<img class="coming" style="position: absolute; top: 0; left: 50%; margin: 155px 0 0 -377px; z-index: -1; max-width: 100%;" src="http://apartmentsdev.naproperties.com/the-tower-at-opop/img/coming2014.png" alt="" />
			</header>
			
			<section id="sign-up">
					<h1>Join the V.I.P. List</h1>
					<!--Step One-->
					<div class="step1">
						<p>Join The Tower at OPOP VIP list and be one of the first to receive information on construction progress, apartment finishes and exclusive reservation opportunities.</p>
						<a id="sign-up-button" href="#" class="button">Join Now</a>
					</div>
					<!--Step Two-->
					<div class="step2">
						<form action="post" action="" name="sign-up-form" id="sign-up-form">
							<fieldset>
								<input type="text" name="firstname" placeholder="First Name" />
								<input type="text" name="lastname" placeholder="Last Name" />
								<input type="text" name="email" placeholder="Email" />
								<a href="#" class="button next">Next</a>
							</fieldset>
						</form>
					</div>
					<!--Step Three-->
					<div class="step3">
						<form action="post" action="" name="password-form" id="password-form">
							<fieldset>
								<input type="password" name="regpass" placeholder="Set Password" />
								<input type="password" name="regpass2" placeholder="Confirm Password" />
								<small>*Passwords must be at least 8 characters</small>
								<input type="hidden" name="firstname" value="" />
								<input type="hidden" name="lastname" value="" />
								<input type="hidden" name="email" value="" />
								<input type="hidden" name="register" value="1" />
								<input type="button" class="button submit" value="Submit" />
							</fieldset>
						</form>
					</div>
					<!--span style="font-size: 12px;">Already a Member?</span> <a id="show-sign-in" class="link" href="#sign-in">Sign-In</a-->
					<div id="success">
						<p>Welcome, VIP member! Be on the lookout for exciting Tower information and details on how you can be first in line to reserve your apartment. A member of our leasing team will be in touch soon to schedule a private tour.</p>
						<br />
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
						<a class="addthis_button_facebook"></a>
						<a class="addthis_button_twitter"></a>
						<a class="addthis_button_pinterest_share"></a>
						<a class="addthis_button_email"></a>
						<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-519e28b06cc010fe"></script>
						<!-- AddThis Button END -->
					</div>
					<div id="duplicate-entry">
						<!--<h2>Already Registered</h2>-->
						<p>An account with that email address has already been registered. <!--Please sign in below.--></p>
						<!--<a id="show-sign-in" href="#" class="button">Sign In</a>-->
					</div>
			</section>
			
			<section id="sign-in" style="display:none;">
				<form action="post" action="" name="sign-in-form" id="sign-in-form">
					<h1>Sign In</h1>
					<fieldset>
						<input type="text" placeholder="Email" />
						<input type="text" placeholder="Password" />
						<input type="button" class="button" value="Sign In" />
					</fieldset>
					<a id="show-forgot-password" class="link" href="#sign-in">Forgot Password</a>
				</form>
			</section>
			
			<section id="forgot-password" style="display:none;">
				<form action="post" action="" name="forgot-password-form" id="forgot-password-form">
					<h1>Retrieve Password</h1>
					<fieldset>
						<input type="text" placeholder="Email" />
						<input type="button" class="button" value="Submit" />
					</fieldset>
				</form>
			</section>
			</div>
			
			<footer>
				<span>314-621-5443 &nbsp;|&nbsp;  <a href="mailto:info@thetoweratopop.com">info@thetoweratopop.com</a></span>
				<div class="breadcrumbs" style="font-size: 8px; text-transform: uppercase;"><a href="http://apartments.naproperties.com/" title="North American Properties">North American Properties</a> / <a href="http://apartments.naproperties.com/missouri" title="Missouri Apartments">Missouri Apartments</a> / <a href="http://apartments.naproperties.com/missouri/st-louis" title="St. Louis Apartments">St. Louis Apartments</a><!-- / <a href="#" title="OPOP">OPOP</a>--> / <a href="http://apartments.naproperties.com/missouri/st-louis/the-tower-at-opop/" title="The Tower at OPOP">The Tower at OPOP</a></div>
			</footer>
    </body>
</html>
