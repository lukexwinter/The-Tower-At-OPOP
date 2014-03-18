<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
		<section class="amenities general">
			<nav class="nav2">
				<div class="content clearfix">
					<a class="first" href="<?php echo MAINURL."location"; ?>">Location</a>
					<a href="<?php echo MAINURL."amenities"; ?>">Amenities</a>
					<a href="<?php echo MAINURL."vip-perks"; ?>">V.I.P. Perks</a>
				</div>
			</nav>
				
			<div class="tower-amenities clearfix">
				<h1>Tower Amenities</h1>
				<div class="col4">
					<ul class="amenities-list">
						<li class="title">Breathtaking Views</li>
						<li>Luxury Penthouses and Apartments with breathtaking views high above Old Post Office Plaza</li>
						<li>Amazing penthouse level clubroom</li>
						<li>State-of-the-art fitness center with Fitness on Request classes</li>
						<li>Rooftop terrace with incredible views of downtown St. Louis and The Arch</li>
					</ul>
				</div>
				<div class="col4">
					<ul class="amenities-list">
						<li class="title">Walkability</li>
						<li>Walk to downtown shopping district and restaurants, bars, shops on Washington Avenue</li>
						<li>Culinaria, a Schnuck's Market, conveniently located across Plaza</li>
						<li>Within a short walk to the stadiums, The Arch and Laclede's Landing</li>
					</ul>
					<ul class="amenities-list">
						<li class="title">Parking</li>
						<li>Valet parking available</li>
						<li>Garage parking</li>
					</ul>
				</div>
				<div class="col4 last">
					<ul class="amenities-list">
						<li class="title">Resident Conveniences</li>
						<li>Controlled access with visitor call box</li>
						<li>Pet friendly</li>
						<li>Package signing and reception</li>
						<li>Business lounge with print shop</li>
						<li>Convenient online rent payment and account management</li>
						<li>Community recycling program</li>
						<li>Professional onsite management</li>
						<li>24-hour maintenance</li>
					</ul>
				</div>
			</div>
			
			<div class="overlay" style="position: absolute; width: 100%; height: 100%; background: #000; opacity: .4; top: -55px; left: 0; z-index: 1;"></div>
			
			
			
			<script src="<?php echo MAINURL."live-site/js/jquery.flexverticalcenter.js"; ?>"></script>
			<script>
			
			//Site Frame Function
			function setAmenitiesHeight() {
				var amenitiesCanvas = $('.amenities');
				var windowHeight = $(window).height();
				var headerHeight = $('#header.collapsed').outerHeight(true) + $('.nav2').outerHeight(true);
				var amenitiesHeight = windowHeight - headerHeight;
	
				
				amenitiesCanvas.css('height', amenitiesHeight);
				$('.tower-amenities').flexVerticalCenter("padding-top");
			}

			$(window).load(function(){
				setAmenitiesHeight();
			})

			$(window).resize(function(){
				setAmenitiesHeight();
			})
			
			
			</script>
			


</section>	

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>