<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
<link rel="stylesheet" href="<?php echo MAINURL."live-site/css/flexslider.css"; ?>" />
<script src="<?php echo MAINURL."live-site/js/jquery.flexslider.js"; ?>"></script>
<section class="general gallery">
	<div class="content">
		<h1>Photo Gallery</h1>
		<div class="flexslider">
		  <ul class="slides">
  		    <li>
  		      <img src="<?php echo MAINURL."live-site/img/pg-4.jpg"; ?>" />
  		    </li>
			<li>
		      <img src="<?php echo MAINURL."live-site/img/pg-5.jpg"; ?>" />
		    </li>
		    <li>
		      <img src="<?php echo MAINURL."live-site/img/pg-14.jpg"; ?>" />
		    </li>
			<li>
		      <img src="<?php echo MAINURL."live-site/img/pg-17.jpg"; ?>" />
		    </li>
		    <li>
		      <img src="<?php echo MAINURL."live-site/img/pg-1.jpg"; ?>" />
		    </li>
		    <li>
		      <img src="<?php echo MAINURL."live-site/img/pg-2.jpg"; ?>" />
		    </li>
			<li>
		      <img src="<?php echo MAINURL."live-site/img/pg-6.jpg"; ?>" />
		    </li>
		    <li>
		      <img src="<?php echo MAINURL."live-site/img/pg-9.jpg"; ?>" />
		    </li>
		    <li>
		      <img src="<?php echo MAINURL."live-site/img/pg-10.jpg"; ?>" />
		    </li>
		    <li>
		      <img src="<?php echo MAINURL."live-site/img/pg-15.jpg"; ?>" />
		    </li>
			<li>
		      <img src="<?php echo MAINURL."live-site/img/pg-19.jpg"; ?>" />
		    </li>
		  </ul>
		</div>
	</div>
</section>

<script>
	//Call FlexSlider
	$(window).load(function() {
	  $('.flexslider').flexslider({
	    animation: "slide",
		touch: true
	  });
	});
</script>

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>