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
			$title = "Luxury apartments in downtown St. Louis, Missouri - The Tower at OPOP";
			$description = "The Tower at OPOP offers luxury one bedroom, one bedroom plus, and studio apartments in St Louis, MO";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Location";
		} else if (($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans") || ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans?view=classico") || ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans?view=paradiso") || ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans?view=rossi") || ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans?view=morelli")) {
			$title = "Floor Plans and Pricing - Amalfi Stonebriar Apartments - North American Properties";
			$description = "Check out all of Amalfi Stonebriar Apartments's Floor Plans and Pricing Information!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Floor Plans";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/amenities") {
			$title = "Amenities - Amalfi Stonebriar Apartments - North American Properties";
			$description = "Amalfi Stonebriar Apartments offers the best amenities in Frisco, Texas area.";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Amenities";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/photo-gallery") {
			$title = "Photo Gallery - Amalfi Stonebriar Apartments - North American Properties";
			$description = "Browse through and look at Amalfi Stonebriar Apartments's Photo Gallery";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Photo Gallery";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/contact") {
			$title = "Contact Us - Amalfi Stonebriar Apartments - North American Properties";
			$description = "Contact Amalfi Stonebriar Apartments Today! ";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Contact";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/schedule-tour") {
			$title = "Schedule Tour - Amalfi Stonebriar Apartments - North American Properties";
			$description = "Schedule a Tour at Amalfi Stonebriar Apartments Today!";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Schedule a Tour";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/video-gallery") {
			$title = "Video Gallery - Amalfi Stonebriar Apartments - North American Properties";
			$description = "Browse through and look at Amalfi Stonebriar Apartments's Video Gallery";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Video Gallery";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/apply") {
			$title = "Apply Now";
			$description = "Apply Now to live at exquisite Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span>Apply Now";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/classico-one") {
			$title = "Classico One - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Classico One floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Classico One";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/classico-two") {
			$title = "Classico Two - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Classico Two floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Classico Two";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/classico-three") {
			$title = "Classico Four - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Classico Three floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Classico Three";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/Classico Four") {
			$title = "Classico Four - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Classico Four plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Classico Four";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/paradiso-one") {
			$title = "Paradiso One - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Paradiso One floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Paradiso One";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/rossi-one") {
			$title = "Rossi One - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Rossi One floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Rossi One";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/rossi-two") {
			$title = "Rossi Two - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Rossi Two floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Rossi Two";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/rossi-three") {
			$title = "Rossi Three - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Rossi Three floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Rossi Three";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/morelli-one") {
			$title = "Morelli One - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Morelli One floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Morelli One";
		} else if ($page == "/texas/frisco/amalfi-stonebriar-apartments/floor-plans/morelli-two") {
			$title = "Morelli Two - Floor Plans | Amalfi Stonebriar Apartments";
			$description = "Make the Morelli Two floor plan your new home at Amalfi Stonebriar Apartments";
			$keywords = "";
			$breadcrumb = "<span class=\"divider\"> / </span><a href=\"".MAINURL."floor-plans\" title=\"Floor Plans\">Floor Plans</a><span class=\"divider\"> / </span>Morelli Two";
		} else {
			$title = "Luxury Apartments in Frisco, TX – Amalfi Stonebriar";
			$description = "Amalfi Stonebriar Apartments offers exquisite one and two bedroom apartments in Frisco, TX";
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
					<li><a href="">Penthouses</a></li>
					<li><a href="<?php echo MAINURL."apartments"; ?>">Apartments</a></li>
					<li><a href="">The Tower</a></li>
					<li><a href="">Photo Gallery</a></li>
					<li><a href="">Schedule a Tour</a></li>
					<li class="last"><a href="">Contact</a></li>
				</ul>
			</nav>
		</header>