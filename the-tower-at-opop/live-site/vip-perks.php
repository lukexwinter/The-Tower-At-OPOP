<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
		<section class="perks general">
			<nav class="nav2">
				<div class="content clearfix">
					<a class="first" href="<?php echo MAINURL."location"; ?>">Location</a>
					<a href="<?php echo MAINURL."amenities"; ?>">Amenities</a>
					<a href="<?php echo MAINURL."vip-perks"; ?>">V.I.P. Perks</a>
				</div>
			</nav>
				
			<div class="vip-perks clearfix">
				<h1>V.I.P. Perks</h1>
				<p>Becoming a Tower resident is more than waking up to beautiful city views, having access to great amenities and being part of a convenient downtown location. Being a resident of the tower also comes with V.I.P perks. Take a look at the added benefits of life at The Tower:</p>
				<p>&mdash;</p>
				<div>
					<ul class="amenities-list">
						<li>Exclusive OPOP neighborhood perks and discounts with your OPOP V.I.P. Card</li>
						<li>Exclusive concierge services from Magnolia Hotel including hotel room discounts, maid services, dry cleaning, lounge bar, and room service</li>
					</ul>
				</div>
			</div>
			
			<div class="overlay" style="position: absolute; width: 100%; height: 100%; background: #000; opacity: .2; top: -55px; left: 0; z-index: 1;"></div>
			
		</section>	
			
			<script src="<?php echo MAINURL."live-site/js/jquery.flexverticalcenter.js"; ?>"></script>
			<script>
			
			//Site Frame Function
			function setAmenitiesHeight() {
				var amenitiesCanvas = $('.perks');
				var windowHeight = $(window).height();
				var headerHeight = $('#header.collapsed').outerHeight(true) + $('.nav2').outerHeight(true);
				var amenitiesHeight = windowHeight - headerHeight;
	
				
				amenitiesCanvas.css('height', amenitiesHeight);
				//$('.vip-perks').flexVerticalCenter("padding-top");
			}

			$(window).load(function(){
				setAmenitiesHeight();
			})

			$(window).resize(function(){
				setAmenitiesHeight();
			})
			
			
			</script>
			




<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>