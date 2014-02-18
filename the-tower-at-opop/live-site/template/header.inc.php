<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/includes/constants.php"); ?>
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
		
		<link href='http://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo MAINURL."css/normalize.min.css"; ?>">
        <link rel="stylesheet" href="<?php echo MAINURL."css/main.css"; ?>">

        <script src="<?php echo MAINURL."js/vendor/modernizr-2.6.2.min.js"; ?>"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo MAINURL."js/vendor/jquery-1.10.1.min.js"; ?>"><\/script>')</script>

		<script src="<?php echo MAINURL."js/plugins.js"; ?>"></script>
		<script src="<?php echo MAINURL."js/main.js"; ?>"></script>
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
				<a href=""><img id="tower-opop-logo" width="258" height="59" src="<?php echo MAINURL."img/tower-opop-logo.png"; ?>" alt="The Tower - OPOP" /></a>
				<ul>
					<li class="menu-button">
						<a href="">
							<span style="margin-top: 4px;"></span>
							<span class="middle"></span>
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