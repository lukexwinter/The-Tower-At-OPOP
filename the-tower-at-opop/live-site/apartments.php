<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
		<section class="units">
			<nav class="fp-nav">
				<div class="content clearfix">
					<a id="fp-01" href="#01">
						<span>01</span>
						<img src="<?php echo MAINURL."img/01-indicator.png"; ?>" alt="01" />
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-right"></span>
					</a>
					<a href="#02">
						<span>02</span>
						<img src="<?php echo MAINURL."img/02-indicator.png"; ?>" alt="02" />
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a href="#03">
						<span>03</span>
						<img src="<?php echo MAINURL."img/03-indicator.png"; ?>" alt="03" />
						<p class="type">Studio</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a href="#04">
						<span>04</span>
						<img src="<?php echo MAINURL."img/04-indicator.png"; ?>" alt="04" />
						<p class="type">One Bedroom <em>Plus</em></p>
						<p class="price">Starting at $1,595</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a href="#05">
						<span>05</span>
						<img src="<?php echo MAINURL."img/05-indicator.png"; ?>" alt="05" />
						<p class="type">One Bedroom</p>
						<p class="price">Starting at $1,295</p>
						<span class="sep-left"></span>
						<span class="sep-right"></span>
					</a>
					<a href="#06">
						<span>06</span>
						<img src="<?php echo MAINURL."img/06-indicator.png"; ?>" alt="06" />
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
				<div class="fp-default">
					<div style="width: 100%; background: red; height: 500px;">
						<p>test 01</p>
					</div>
				</div>
			</div>
		</section>
		
		<section class="fp-amenities">
		</section>
		
		

        
		<script src="<?php echo MAINURL."js/jquery.bbq.js"; ?>"></script>
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
		    var url = $.param.fragment();
			var url = url + '.php'
    
		    // Remove .bbq-current class from any previously "current" link(s).
		    $( 'a.fp-current' ).removeClass( 'fp-current' );
    
		    // Hide any visible ajax content.
		    $( '.fp-content' ).children( ':visible' ).hide();
    
		    // Add .bbq-current class to "current" nav link(s), only if url isn't empty.
		    url && $( 'a[href="#' + url + '"]' ).addClass( 'fp-current' );
    
		    if ( cache[ url ] ) {
		      // Since the element is already in the cache, it doesn't need to be
		      // created, so instead of creating it again, let's just show it!
		      cache[ url ].show();
      
		    } else {
		      // Show "loading" content while AJAX content loads.
		      $( '.fp-loading' ).show();
      
		      // Create container for this url's content and store a reference to it in
		      // the cache.
		      cache[ url ] = $( '<div class="fp-item"/>' )
        
		        // Append the content container to the parent container.
		        .appendTo( '.fp-content' )
        
		        // Load external content via AJAX. Note that in order to keep this
		        // example streamlined, only the content in .infobox is shown. You'll
		        // want to change this based on your needs.
		        .load( pathname + url, function(){
		          // Content loaded, hide "loading" content.
		          $( '.fp-loading' ).hide();
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
			  $(this).addClass('active');
			});
			$( document ).ready(function() {
				if(window.location.href == "http://opoptower.localhost.com/missouri/st-louis/the-tower-at-opop/apartments"){
						$('#fp-01').trigger( 'click' );
				}
			});
		
			//Active States for FP Nav
			$('.fp-nav .content a').click(function(){
				$('.fp-nav .content a').removeClass('active');
				$(this).addClass('active');
			})
			
			//Active States for Toggle Nav
			$('.toggle-nav a').click(function(e){
				e.preventDefault();
				$('.toggle-nav a').removeClass('active');
				$(this).addClass('active');
			})
			
			$('#avail-button').click(function(e){
				e.preventDefault();
				$('.fp-content').removeClass('show-floorplan').addClass('show-availability');
			});
			$('#fp-button').click(function(e){
				e.preventDefault();
				$('.fp-content').removeClass('show-availability').addClass('show-floorplan');
			});
		</script>

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>