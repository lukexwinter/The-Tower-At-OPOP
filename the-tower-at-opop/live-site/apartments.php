<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
<link rel="stylesheet" href="<?php echo MAINURL."live-site/css/rwd-table.css"; ?>" />
<link rel="stylesheet" href="<?php echo MAINURL."live-site/css/flexslider.css"; ?>" />
<script src="<?php echo MAINURL."live-site/js/vendor/respond.js"; ?>"></script>
<script src="<?php echo MAINURL."live-site/js/vendor/jquery-ui.widget.min.js"; ?>"></script>
<script src="<?php echo MAINURL."live-site/js/rwd-table.js"; ?>"></script>
<script src="<?php echo MAINURL."live-site/js/jquery.flexslider-min.js"; ?>"></script>

		<section class="units">
			<nav class="fp-nav">
				<div class="content clearfix">
					<a id="fp-01" href="#01">
						<span class="unit">01</span>
						<span class="indicator"></span>
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-right"></span>
					</a>
					<a id="fp-02" href="#02">
						<span class="unit">02</span>
						<span class="indicator"></span>
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a id="fp-03" href="#03">
						<span class="unit">03</span>
						<span class="indicator"></span>
						<p class="type">Studio</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a id="fp-04" href="#04">
						<span class="unit">04</span>
						<span class="indicator"></span>
						<p class="type">One Bedroom <em>Plus</em></p>
						<p class="price">Starting at $1,595</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a id="fp-05" href="#05">
						<span class="unit">05</span>
						<span class="indicator"></span>
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a id="fp-06" href="#06">
						<span class="unit">06</span>
						<span class="indicator"></span>
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,495</p>
						<span class="sep-left"></span>
					</a>
				</div>
				<div class="toggle-nav clearfix">
					<div>
						<a id="fp-button" class="active" href="#">Floor Plan</a><a id="avail-button" href="#">Availability</a>
					</div>
				</div>
			</nav>
			
			<div class="fp-content show-floorplan clearfix">
				<div class="fp-loading" style="display: none;">
					Loading content...
				</div>
				<div class="fp-default">
				</div>
			</div>
		</section>
		
		<section class="fp-amenities clearfix">
			<div class="content">
				<h2>Amenities &amp; Finishes</h2>
				<div id="amenities-images">
					<div class="flexslider">
					  <ul class="slides">
					    <li>
					      <img src="<?php echo MAINURL."live-site/img/fp-amenities-flooring.jpg"; ?>" />
					    </li>
					    <li>
					      <img src="<?php echo MAINURL."live-site/img/fp-amenities-flooring.jpg"; ?>" />
					    </li>
					    <li>
					      <img src="<?php echo MAINURL."live-site/img/fp-amenities-flooring.jpg"; ?>" />
					    </li>
					    <li>
					      <img src="<?php echo MAINURL."live-site/img/fp-amenities-flooring.jpg"; ?>" />
					    </li>
					  </ul>
					</div>
				</div>
				<div class="area-amenities clearfix">
					<div class="col3">
						<ul class="amenities-list">
							<li class="title">Bathroom</li>
							<li>100% recycleable, non-porous, Porcelanosa Krion® 24” white washbasin.</li>
							<li>Mid-America Tile “Clay Series” Grey</li>
							<li>GTI Quarz Surface</li>
							<li>Azrock Vinyl Enhanced Tile</li>
						</ul>
						<ul class="amenities-list">
							<li class="title">Bedroom</li>
							<li>100% recycleable, non-porous, Porcelanosa Krion® 24” white washbasin.</li>
							<li>Mid-America Tile “Clay Series” Grey</li>
							<li>GTI Quarz Surface</li>
							<li>Azrock Vinyl Enhanced Tile</li>
						</ul>
						<ul class="amenities-list">
							<li class="title">Living Area</li>
							<li>100% recycleable, non-porous, Porcelanosa Krion® 24” white washbasin.</li>
							<li>Mid-America Tile “Clay Series” Grey</li>
							<li>GTI Quarz Surface</li>
							<li>Azrock Vinyl Enhanced Tile</li>
						</ul>
					</div>
					<div class="col3">
						<ul class="amenities-list">
							<li class="title">Fitness Center</li>
							<li>100% recycleable, non-porous, Porcelanosa Krion® 24” white washbasin.</li>
							<li>Mid-America Tile “Clay Series” Grey</li>
							<li>GTI Quarz Surface</li>
							<li>Azrock Vinyl Enhanced Tile</li>
						</ul>
						<ul class="amenities-list">
							<li class="title">Clubroom</li>
							<li>100% recycleable, non-porous, Porcelanosa Krion® 24” white washbasin.</li>
							<li>Mid-America Tile “Clay Series” Grey</li>
							<li>GTI Quarz Surface</li>
							<li>Azrock Vinyl Enhanced Tile</li>
						</ul>
						<ul class="amenities-list">
							<li class="title">Lobby</li>
							<li>100% recycleable, non-porous, Porcelanosa Krion® 24” white washbasin.</li>
							<li>Mid-America Tile “Clay Series” Grey</li>
							<li>GTI Quarz Surface</li>
							<li>Azrock Vinyl Enhanced Tile</li>
						</ul>
					</div>
				</div>
			</div>		
		</section>
		
		
		

        
		<script src="<?php echo MAINURL."live-site/js/jquery.bbq.js"; ?>"></script>
		<script>
		$(function(){
  
		  // Keep a mapping of url-to-container for caching purposes.
		  var cache = {
		    // If url is '' (no fragment), display this div's content.
		    '': $('.fp-default')
		  };
  
		  // Bind an event to window.onhashchange that, when the history state changes,
		  // gets the url from the hash and displays either our cached content or fetches
		  // new content to be displayed.
		  $(window).bind( 'hashchange', function(e) {
			 var pathname = window.location.pathname.replace('apartments', '');
			 var pathname = pathname+'/live-site/'
    
		    // Get the hash (fragment) as a string, with any leading # removed. Note that
		    // in jQuery 1.4, you should use e.fragment instead of $.param.fragment().
		    var unit = $.param.fragment();
			var url = unit + '.php';
			
	    	// Remove .bbq-current class from any previously "current" link(s).
	    	$( 'a.fp-current' ).removeClass( 'fp-current' );
	    	
	    	// Add .bbq-current class to "current" nav link(s), only if url isn't empty.
	    	url && $( 'a[href="#' + unit + '"]' ).addClass( 'fp-current' );   	
		    	
			// Hide any visible ajax content.
	    	$( '.fp-content' ).children( ':visible' ).hide().removeClass('current');

		    if ( cache[ url ] ) {
		      // Since the element is already in the cache, it doesn't need to be
		      // created, so instead of creating it again, let's just show it!
			  cache[ url ].fadeIn();
			  $(this).find('.fp-image img').hide();
			  $(this).find('.fp-image img').fadeIn();
			  setTimeout(function () {
		      	cache[ url ].addClass('current');
			}, 700);
			
  
		    } else {
		      // Show "loading" content while AJAX content loads.
		      $( '.fp-loading' ).show();
  
		      // Create container for this url's content and store a reference to it in
		      // the cache.
			  $('.fp-item').removeClass('current');
		      cache[ url ] = $( '<div class="fp-item clearfix"/>' )
    
		        // Append the content container to the parent container.
		        .appendTo( '.fp-content' )
    
		        // Load external content via AJAX. Note that in order to keep this
		        // example streamlined, only the content in .infobox is shown. You'll
		        // want to change this based on your needs.
		        .load( pathname + url, function(){
		          // Content loaded, hide "loading" content.
		          $( '.fp-loading' ).hide();
				  $(this).addClass('current');
				  				  
		        });
		    }
			
		  })
  
		  // Since the event is only triggered when the hash changes, we need to trigger
		  // the event now, to handle the hash the page may have loaded with.
		  $(window).trigger( 'hashchange' );
  
		});
		</script>
		
		<script>
			//Always start with the 01 Floor Plan if no floor plan is set
			$('#fp-01').click( function (e) {
			  window.location.href = this.href;
			});
			$( document ).ready(function() {
				if(window.location.href == "http://opoptower.localhost.com/missouri/st-louis/the-tower-at-opop/apartments"){
						//$('#fp-01').trigger( 'click' );
						window.location.hash = "01";
				}
			});
					
					
			//Toggle Nav Buttons
			$('body').on( "click", '#avail-button, .fp-info a.button' ,function(e){
				e.preventDefault();
				$("html, body").delay(100).animate({ scrollTop: $('.fp-content').offset().top - 100 },1000,"easeInOutQuart");
				$('.fp-content').removeClass('show-floorplan').addClass('show-availability');
				$('.toggle-nav a').removeClass('active');
				$('.toggle-nav a:last-child').addClass('active');
				
				// Stop the animation if the user scrolls. Defaults on .stop() should be fine
				$("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(e){
				    if ( e.which > 0 || e.type === "mousedown" || e.type === "mousewheel"){
				         $("html, body").stop().unbind('scroll mousedown DOMMouseScroll mousewheel keyup'); // This identifies the scroll as a user action, stops the animation, then unbinds the event straight after (optional)
				    }
				});  
			});
			$('#fp-button').click(function(e){
				e.preventDefault();
				$("html, body").delay(100).animate({ scrollTop: $('.fp-content').offset().top - 100 },1000,"easeInOutQuart");
				$('.fp-content').removeClass('show-availability').addClass('show-floorplan');
				$('.toggle-nav a').removeClass('active');
				$('.toggle-nav a:first-child').addClass('active');
				
				// Stop the animation if the user scrolls. Defaults on .stop() should be fine
				$("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(e){
				    if ( e.which > 0 || e.type === "mousedown" || e.type === "mousewheel"){
				         $("html, body").stop().unbind('scroll mousedown DOMMouseScroll mousewheel keyup'); // This identifies the scroll as a user action, stops the animation, then unbinds the event straight after (optional)
				    }
				});  
			});
			
			//FP Nav Buttons
			$('.fp-nav a').click(function(){
				$("html, body").delay(100).animate({ scrollTop: $('.fp-content').offset().top - 100 },1000,"easeInOutQuart");


				// Stop the animation if the user scrolls. Defaults on .stop() should be fine
				$("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(e){
				    if ( e.which > 0 || e.type === "mousedown" || e.type === "mousewheel"){
				         $("html, body").stop().unbind('scroll mousedown DOMMouseScroll mousewheel keyup'); // This identifies the scroll as a user action, stops the animation, then unbinds the event straight after (optional)
				    }
				});  
			});
			
			
			//Call RWD Table for Ajax Loaded Elements
			$( document ).ajaxComplete(function() {	
				
				  $(".available-apartments").table({
				     idprefix: "co-",
				     persist: "persist"
				  });
				
			});
			
			
			
			
			//Condense FP Nav on scroll
			$(document).scroll(function(){

				var docScroll = $(document).scrollTop(), 
				navOffset = $(".fp-content").offset().top - 150;

				
				if(docScroll >= navOffset ) {
					$(".fp-nav").addClass('condensed');
				} else {
					$(".fp-nav").removeClass('condensed');
				}
			});
			
			
			//Call FlexSlider
			$(window).load(function() {
			  $('.flexslider').flexslider({
			    animation: "slide"
			  });
			});
		</script>
		
		
		
		

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>