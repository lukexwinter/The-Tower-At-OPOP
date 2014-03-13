<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
		<section id="home" class="scrollsections">
			<article>
				<h2>Experience St. Louis From a Whole New Perspective</h2>
				<p>Breathtaking views high above Old Post Office Plaza</p>
			</article>
			<img id="scroll-indicator" width="43" height="23" src="<?php echo MAINURL."live-site/img/down-arrow.png"; ?>" alt="" />
		</section>

		<section id="apartments" class="scrollsections">
			<article>
				<h2>25 Floors,<br /> 126 luxury apartments</h2>
				<p>As a V.I.P member, be the first to stake claim on an incredible view.</p>
				<a href="<?php echo MAINURL."apartments"; ?>" class="button">View Apartments</a>
			</article>
		</section>

		<section id="amenities" class="scrollsections">
			<article>
				<h2>Penthouse level fitness center &amp; club room</h2>
				<p>Floors 24-25 let you look out, hang out, or work out. The sky is the limit.</p>
				<a href="<?php echo MAINURL."the-tower"; ?>" class="button">View Amenities</a>
			</article>
		</section>

		<section id="location" class="scrollsections">
			<article>
				<h2>Washington Ave</h2>
				<p>A downtown backyard doesn’t get much better than this.</p>
				<a href="<?php echo MAINURL."location"; ?>" class="button">View Location</a>
			</article>
		</section>

		<section id="perks" class="scrollsections">
			<article>
				<h2>Take the high life<br /> on the go.</h2>
				<p>Our residents are V.I.P. Take advantage of room service,<br /> valet parking and more with your OPOP V.I.P Card.</p>
				<a href="<?php echo MAINURL."vip-perks"; ?>" class="button">Learn More</a>
			</article>
		</section>
		
		

        
		<script src="<?php echo MAINURL."live-site/js/jquery.scrollSections.js"; ?>"></script>
		<script src="<?php echo MAINURL."live-site/js/jquery.flexverticalcenter.js"; ?>"></script>
		
		<script>
		$(document).ready(function() {
			//Scroll Indicator Click
			$('#home img').click(function(){
				$( "#scrollsections-menuitem-1" ).trigger( "click" );
				
			})
			
			
			//initiate scroll indication animation
			setInterval(function(){
				indicateScroll();
			},8000);
			if (Modernizr.touch) {
				//don't use scrollsections if a touch device
			} else {
				$('.scrollsections').scrollSections({
						scrollMax: 1,
						speed: 1000,
						touch: true	
				});
			}
			
			//initiate verticle center plugin for home scenes
		    $('.scrollsections article').flexVerticalCenter();
		});
		</script>
		
		<script>
		//define scroll indication function
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
		
		//fade scroll indicator on scroll
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
<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>