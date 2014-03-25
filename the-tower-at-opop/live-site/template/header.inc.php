<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/includes/constants.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<?php
		$page = $_SERVER['REQUEST_URI'];
		if ($page == "/missouri/st-louis/the-tower-at-opop/apartments") {
			$title = "St Louis Apartments - The Tower at OPOP";
			$description = "Gorgeous studio, one bedroom and one bedrooom PLUS! apartments in the heart of STL.  Schedule a tour today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Apartments";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/penthouses") {
			$title = "Penthouses in St Louis, MO - The Tower at OPOP";
			$description = "Check out all of The Tower at OPOP's unbelievable penthouse apartments.  Schedule a tour today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Penthouses";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/the-tower") {
			$title = "The Tower at OPOP in St Louis, MO";
			$description = "Learn about The Tower at OPOP's luxury apartments, penthouse lofts, amenities, location, and V.I.P. Perks";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>The Tower";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/photo-gallery") {
			$title = "Photo Gallery - The Tower at OPOP in St Louis, MO";
			$description = "Browse through and look at The Tower at OPOP's Photo Gallery";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Photo Gallery";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/location") {
			$title = "Location of The Tower at OPOP in St Louis, MO";
			$description = "The Tower at OPOP offers prime location in downtown Saint Louis.  Come check us out today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Location";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/amenities") {
			$title = "Amenities - The Tower at OPOP in St Louis MO";
			$description = "The best amenities in St Louis are at The Tower at OPOP. Schedule a Tour Today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Amenities";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/vip-perks") {
			$title = "V.I.P. Perks - The Tower at OPOP in St Louis MO";
			$description = "Be a VIP at The Tower of OPOP";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>V.I.P. Perks";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/contact") {
			$title = "Contact Us - The Tower at OPOP in St Louis, MO - North American Properties";
			$description = "Contact The Tower at OPOP Today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Contact";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/schedule-tour") {
			$title = "Schedule Tour - The Tower at OPOP in St Louis, MO - North American Properties";
			$description = "Schedule a Tour at The Tower at OPOP Today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Schedule a Tour";
		} else if ($page == "/missouri/st-louis/the-tower-at-opop/apply") {
			$title = "Apply Now";
			$description = "Apply Now to live at The Tower at OPOP";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Apply Now";
		} else {
			$title = "Luxury St Louis Apartments and Lofts - The Tower at OPOP";
			$description = "Downtown St Louis' premier luxury apartment community offers fantastic studio, apartments and penthouse lofts.";
			$keywords = "";
			$breadcrumb = "";
		}
		?>
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>" />
		<meta name="keywords" content="<?php echo $keywords; ?>" />
		<meta name="robots" content="follow, index" />
		
		<link href='http://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo MAINURL."live-site/css/normalize.min.css"; ?>">
        <link rel="stylesheet" href="<?php echo MAINURL."live-site/css/main.css"; ?>">
		<link rel="stylesheet" href="<?php echo MAINURL."live-site/css/animate.css"; ?>">

        <script src="<?php echo MAINURL."live-site/js/vendor/modernizr-2.6.2.min.js"; ?>"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo MAINURL."live-site/js/vendor/jquery-1.10.1.min.js"; ?>"><\/script>')</script>

		<script src="<?php echo MAINURL."live-site/js/plugins.js"; ?>"></script>
		<script src="<?php echo MAINURL."live-site/js/main.js"; ?>"></script>
		<script>
			$(document).ready(function() {
				//mobile menu button toggle
				$('.menu-button').click(function(e) {
					e.preventDefault();
				  $('header').toggleClass('open');
				});
			});
		</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <header class="collapsed">
			<nav>
				<a href=""><img id="tower-opop-logo" width="258" height="59" src="<?php echo MAINURL."live-site/img/tower-opop-logo.png"; ?>" alt="The Tower - OPOP" /></a>
				<ul>
					<li class="menu-button">
						<a href="">
							<span style="margin-top: 4px;"></span>
							<span class="middle"></span>
							<span style="margin: 0;"></span>
						</a>
					</li>
					<li class="tower-logo"><a href="<?php echo MAINURL."vip"; ?>"><img width="163" height="38" src="<?php echo MAINURL."live-site/img/tower-opop-logo.png"; ?>" alt="The Tower" /></a></li>
					<li><a href="<?php echo MAINURL."penthouses"; ?>">Penthouses</a></li>
					<li><a href="<?php echo MAINURL."apartments"; ?>">Apartments</a></li>
					<li><a href="<?php echo MAINURL."the-tower"; ?>">The Tower</a></li>
					<li><a href="<?php echo MAINURL."photo-gallery"; ?>">Photo Gallery</a></li>
					<li><a href="<?php echo MAINURL."schedule-tour"; ?>">Schedule a Tour</a></li>
					<li class="last"><a href="<?php echo MAINURL."contact"; ?>">Contact</a></li>
				</ul>
			</nav>
		</header>