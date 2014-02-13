<?php

define("MAINURL", "http://opoptower.localhost.com/missouri/st-louis/the-tower-at-opop/live-site/");

?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo MAINURL."css/normalize.min.css"; ?>">
        <link rel="stylesheet" href="<?php echo MAINURL."css/main.css"; ?>">

        <script src="<?php echo MAINURL."js/vendor/modernizr-2.6.2.min.js"; ?>"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <header class="collapsed">
			<nav>
				<a href=""><img id="tower-opop-logo" width="258" height="59" src="<?php echo MAINURL."img/tower-opop-logo.png"; ?>" alt="The Tower - OPOP" /></a>
				<ul>
					<li class="menu-button">
						<a href="">
							<span style="margin-top: 4px;"></span>
							<span></span>
							<span style="margin: 0;"></span>
						</a>
					</li>
					<li class="tower-logo"><a href=""><img width="163" height="38" src="<?php echo MAINURL."img/tower-opop-logo.png"; ?>" alt="The Tower" /></a></li>
					<li><a href="">Apartments</a></li>
					<li><a href="">Penthouses</a></li>
					<li><a href="">The Tower</a></li>
					<li><a href="">Photo Gallery</a></li>
					<li><a href="">Schedule a Tour</a></li>
					<li class="last"><a href="">Contact</a></li>
				</ul>
			</nav>
		</header>

		
		<section id="home" class="scrollsections">
			<article>
				<h2>Experience St. Louis From a Whole New Perspective</h2>
				<p>Breathtaking views high above Old Post Office Plaza</p>
			</article>
			<img id="scroll-indicator" width="43" height="23" src="<?php echo MAINURL."img/down-arrow.png"; ?>" alt="" />
		</section>

		<section id="apartments" class="scrollsections">
			<article>
				<h2>25 Floors,<br /> 126 luxury apartments</h2>
				<p>As a V.I.P member, be the first to stake claim on an incredible view.</p>
				<a href="" class="button">View Apartments</a>
			</article>
		</section>

		<section id="amenities" class="scrollsections">
			<article>
				<h2>State-of-the-art fitness center &amp; club room</h2>
				<p>Floors 24-25 let you look out, hang out, or work out. The sky is the limit.</p>
				<a href="" class="button">View Amenities</a>
			</article>
		</section>

		<section id="location" class="scrollsections">
			<article>
				<h2>Located in<br/> downtown St. Louis</h2>
				<p>Never skip a beat. Experience the heart of  nightlife & entertainment.</p>
				<a href="" class="button">View Location</a>
			</article>
		</section>

		<section id="perks" class="scrollsections">
			<article>
				<h2>Take the high life<br /> on the go.</h2>
				<p>Our residents are V.I.P. Take advantage of valet parking, and perks.</p>
				<a href="" class="button">Learn More</a>
			</article>
		</section>
		
		<footer id="footer" class="scrollsections">
			<div class="content top clearfix">
				<div class="col5">
					<img src="<?php echo MAINURL."img/opop-footer-logo.png"; ?>" width="88" height="28" alt="OPOP" />
					<p>
						The Tower at OPOP<br />
						901 Locust Street St. Louis, MO 63101<br /> 
						<br />
						314 621 5443<br />
						<a href="mailto:info@thetoweratopop.com">info@thetoweratopop.com</a>
					</p>
				</div>
				<div class="col3">
					<h6>Site Map</h6>
					<ul>
						<li><a href="">Apartments</a></li>
						<li><a href="">Penthouses</a></li>
						<li><a href="">The Tower</a></li>
						<li><a href="">Location</a></li>
						<li><a href="">V.I.P. Perks</a></li>
					</ul>
					<ul>
						<li><a href="">Amenities</a></li>
						<li><a href="">Photo Gallery</a></li>
						<li><a href="">Schedule a Tour</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>
				<div class="col2">
					<h6>Social</h6>
					<ul>
						<li><a href="">Twitter</a></li>
						<li><a href="">Facebook</a></li>
						<li><a href="">Pinterest</a></li>
						<li><a href="">Google +</a></li>
						<li><a href="">Instagram</a></li>
						<li><a href="">Youtube</a></li>
					</ul>
				</div>
				<div class="col2 last">
					<h6>Residents</h6>
					<ul>
						<li><a href="">napLife</a></li>
						<li><a href="">Sign Out</a></li>
					</ul>
				</div>
			</div>
			<div style="clear: both;"></div>
			<div class="bottom">
				<div class="content">
					<p id="breadcrumbs"><a href="http://apartments.naproperties.com/" title="North American Properties">North American Properties</a><span class="divider"> / </span><a href="http://apartments.naproperties.com/missouri" title="Missouri Apartments">Missouri Apartments</a><span class="divider"> / </span><a href="http://apartments.naproperties.com/missouri/st-louis" title="St. Louis Apartments">St. Louis Apartments</a><span class="divider"> / </span><a href="<?php echo MAINURL; ?>" title="The Tower at OPOP">The Tower at OPOP</a><?php echo $breadcrumb; ?></p>
					<p id="terms">Copyright &copy; 2013 North American Properties. All rights reserved. <a class="gray" href="<?php echo MAINURL."privacy-policy"; ?>">Privacy Policy</a>  |  <a class="gray" href="<?php echo MAINURL."terms-and-conditions"; ?>">Terms &amp; Conditions</a></p>
				</div>
			</div>
		</footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo MAINURL."js/vendor/jquery-1.10.1.min.js"; ?>"><\/script>')</script>

        <script src="<?php echo MAINURL."js/plugins.js"; ?>"></script>
        <script src="<?php echo MAINURL."js/main.js"; ?>"></script>
		<script src="<?php echo MAINURL."js/jquery.scrollSections.js"; ?>"></script>
		<script src="<?php echo MAINURL."js/jquery.flexverticalcenter.js"; ?>"></script>
		
		<script>
		$(document).ready(function() {
			setInterval(function(){
				indicateScroll();
			},8000);
			$('.scrollsections').scrollSections({
					scrollMax: 1,
					speed: 1000	
			});
		    $('.scrollsections article').flexVerticalCenter();
		});
		</script>
		
		<script>
		var scrollIndicator = $('#scroll-indicator');
		function indicateScroll() {
			scrollIndicator.addClass('indicate')
			setTimeout(function(){
				scrollIndicator.removeClass('indicate');			
			},200);
		}
		
		$(window).scroll(function(){
			if($(window).scrollTop()<20){
			     scrollIndicator.css({opacity: 1});
	
			} else {
			     scrollIndicator.css({opacity: 0});
				 $('header').addClass('collapsed');
			}
		
		});
		
		$(document).scroll(function(){

			var docScroll = $(document).scrollTop(), 
			sectionOffset = $("section").offset().top - 200;

			//when rich top of boxex than fire
			if(docScroll >= sectionOffset ) {
				$("article").fadeIn(500);
			} else {
				$("article").fadeOut(500);
			}
		});
		
		</script>
		

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
    </body>
</html>
