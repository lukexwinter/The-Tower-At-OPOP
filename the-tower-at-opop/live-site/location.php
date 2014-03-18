<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/header.inc.php"); ?>
		<section class="location general">
			<nav class="nav2">
				<div class="content clearfix">
					<a class="first" href="<?php echo MAINURL."location"; ?>">Location</a>
					<a href="<?php echo MAINURL."amenities"; ?>">Amenities</a>
					<a href="<?php echo MAINURL."vip-perks"; ?>">V.I.P. Perks</a>
				</div>
			</nav>
			
			<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
			<script>
				function initialize() {
		
					var map_canvas = document.getElementById('map_canvas');
					var map_options = {
					  center: new google.maps.LatLng(38.628559,-90.1953516),
					  zoom: 16,
					  disableDefaultUI:true,
					  scrollwheel:false,
					  zoomControl: true,
					  mapTypeId: google.maps.MapTypeId.SATELLITE,
					  zoomControlOptions: {
					  	style: google.maps.ZoomControlStyle.LARGE,
					    position: google.maps.ControlPosition.RIGHT_CENTER
					  }
					}
					var map = new google.maps.Map(map_canvas, map_options)
					
					/****************************/
					/*****Restaurants / Bars****/
		  		    /**************************/
					
					  
  					/*Over/Under Sports Bar*/
  			  		var overunderImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-1.png', null, null, null, new google.maps.Size(68,66));
  			  		var overunderPos = new google.maps.LatLng(38.631376,-90.1931721);

  			  		var overunderMarker = new google.maps.Marker({position: overunderPos, map: map, icon: overunderImage, content: 'The Over/Under Sports Bar' });
  			  		var overunderContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">The Over/Under Sports Bar</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>911 Washington Ave | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 621 8881</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var overunderWindow = new google.maps.InfoWindow({
  			  		      content: overunderContent
  			  		  });
  			  		  google.maps.event.addListener(overunderMarker, 'click', function() {
  			  		      overunderWindow.open(map,overunderMarker);
  			  		  });
				  
			  		/*Takaya New Asian*/
			  		var takayaImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-2.png', null, null, null, new google.maps.Size(68,66));
			  		var takayaPos = new google.maps.LatLng(38.63018,-90.1900075);

			  		var takayaMarker = new google.maps.Marker({position: takayaPos, map: map, icon: takayaImage, content: 'Takaya New Asian' });
			  		var takayaContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Takaya New Asian</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>634 Washington Ave | St. Louis, MO | 63102</p>'+
			  			  '<p class="phone">(314) 241 5721</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var takayaWindow = new google.maps.InfoWindow({
			  		      content: takayaContent
			  		  });
			  		  google.maps.event.addListener(takayaMarker, 'click', function() {
			  		      takayaWindow.open(map,takayaMarker);
			  		  });
					  
  			  		/*Snarf's Sub Shop*/
  			  		var snarfsImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-3.png', null, null, null, new google.maps.Size(68,66));
  			  		var snarfsPos = new google.maps.LatLng(38.6302999,-90.1899065);

  			  		var snarfsMarker = new google.maps.Marker({position: snarfsPos, map: map, icon: snarfsImage, content: 'Snarf\'s Sub Shop' });
  			  		var snarfsContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Snarf\'s Sub Shop</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>614 Washington Ave | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 241 0100</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var snarfsWindow = new google.maps.InfoWindow({
  			  		      content: snarfsContent
  			  		  });
  			  		  google.maps.event.addListener(snarfsMarker, 'click', function() {
  			  		      snarfsWindow.open(map,snarfsMarker);
  			  		  });
					  
					  
			  		/*Pi Pizzaria*/
			  		var piImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-4.png', null, null, null, new google.maps.Size(68,66));
			  		var piPos = new google.maps.LatLng(38.6302100,-90.1899100);

			  		var piMarker = new google.maps.Marker({position: piPos, map: map, icon: piImage, content: 'Pi Pizzaria' });
			  		var piContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Pi Pizzaria</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>610 Washington Ave | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 588 7600</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var piWindow = new google.maps.InfoWindow({
			  		      content: piContent
			  		  });
			  		  google.maps.event.addListener(piMarker, 'click', function() {
			  		      piWindow.open(map,piMarker);
			  		  });
					  
  			  		/*Robust Wine Bar*/
  			  		var robustImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-5.png', null, null, null, new google.maps.Size(68,66));
  			  		var robustPos = new google.maps.LatLng(38.630299,-90.1897178);

  			  		var robustMarker = new google.maps.Marker({position: robustPos, map: map, icon: robustImage, content: 'Robust Wine Bar' });
  			  		var robustContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Robust Wine Bar</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>635 Washington Ave | St. Louis, MO | 63102</p>'+
  			  			  '<p class="phone">(314) 287 6300</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var robustWindow = new google.maps.InfoWindow({
  			  		      content: robustContent
  			  		  });
  			  		  google.maps.event.addListener(robustMarker, 'click', function() {
  			  		      robustWindow.open(map,robustMarker);
  			  		  });
					  
			  		/*Bridge Tap House & Wine Bar*/
			  		var bridgetapImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-6.png', null, null, null, new google.maps.Size(68,66));
			  		var bridgetapPos = new google.maps.LatLng(38.630299,-90.1897178);

			  		var bridgetapMarker = new google.maps.Marker({position: bridgetapPos, map: map, icon: bridgetapImage, content: 'Bridge Tap House & Wine Bar' });
			  		var bridgetapContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Bridge Tap House & Wine Bar</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>1004 Locust St | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 241 8141</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var bridgetapWindow = new google.maps.InfoWindow({
			  		      content: bridgetapContent
			  		  });
			  		  google.maps.event.addListener(bridgetapMarker, 'click', function() {
			  		      bridgetapWindow.open(map,bridgetapMarker);
			  		  });
					  
  			  		/*Baileys' Range*/
  			  		var baileysImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-7.png', null, null, null, new google.maps.Size(68,66));
  			  		var baileysPos = new google.maps.LatLng(38.6290628,-90.1945029);

  			  		var baileysMarker = new google.maps.Marker({position: baileysPos, map: map, icon: baileysImage, content: 'Baileys\' Range' });
  			  		var baileysContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Baileys\' Range</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>920 Olive St | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 241 8121</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var baileysWindow = new google.maps.InfoWindow({
  			  		      content: baileysContent
  			  		  });
  			  		  google.maps.event.addListener(baileysMarker, 'click', function() {
  			  		      baileysWindow.open(map,baileysMarker);
  			  		  });
					  
			  		/*Wasabi*/
			  		var wasabiImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-8.png', null, null, null, new google.maps.Size(68,66));
			  		var wasabiPos = new google.maps.LatLng(38.6318827,-90.1980575);

			  		var wasabiMarker = new google.maps.Marker({position: wasabiPos, map: map, icon: wasabiImage, content: 'Wasabi' });
			  		var wasabiContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Wasabi</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>1228 Washington Ave | St. Louis, MO | 63103</p>'+
			  			  '<p class="phone">(314) 421 3500</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var wasabiWindow = new google.maps.InfoWindow({
			  		      content: wasabiContent
			  		  });
			  		  google.maps.event.addListener(wasabiMarker, 'click', function() {
			  		      wasabiWindow.open(map,wasabiMarker);
			  		  });
					  
  			  		/*Mizu*/
  			  		var mizuImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-9.png', null, null, null, new google.maps.Size(68,66));
  			  		var mizuPos = new google.maps.LatLng(38.6313539,-90.1945082);

  			  		var mizuMarker = new google.maps.Marker({position: mizuPos, map: map, icon: mizuImage, content: 'Mizu' });
  			  		var mizuContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Mizu</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>1013 Washington Ave | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 621 2646</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var mizuWindow = new google.maps.InfoWindow({
  			  		      content: mizuContent
  			  		  });
  			  		  google.maps.event.addListener(mizuMarker, 'click', function() {
  			  		      mizuWindow.open(map,mizuMarker);
  			  		  });
					  
			  		/*Mango*/
			  		var mangoImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-10.png', null, null, null, new google.maps.Size(68,66));
			  		var mangoPos = new google.maps.LatLng(38.6319681,-90.1949427);

			  		var mangoMarker = new google.maps.Marker({position: mangoPos, map: map, icon: mangoImage, content: 'Mango' });
			  		var mangoContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Mango</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>1101 Lucas Ave | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 621 9993</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var mangoWindow = new google.maps.InfoWindow({
			  		      content: mangoContent
			  		  });
			  		  google.maps.event.addListener(mangoMarker, 'click', function() {
			  		      mangoWindow.open(map,mangoMarker);
			  		  });
					  
  			  		/*The Dubliner*/
  			  		var dublinerImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-11.png', null, null, null, new google.maps.Size(68,66));
  			  		var dublinerPos = new google.maps.LatLng(38.6313977,-90.1947389);

  			  		var dublinerMarker = new google.maps.Marker({position: dublinerPos, map: map, icon: dublinerImage, content: 'The Dubliner' });
  			  		var dublinerContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">The Dubliner</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>1025 Washington Ave | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 421 4300</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var dublinerWindow = new google.maps.InfoWindow({
  			  		      content: dublinerContent
  			  		  });
  			  		  google.maps.event.addListener(dublinerMarker, 'click', function() {
  			  		      dublinerWindow.open(map,dublinerMarker);
  			  		  });
					  
			  		/*Rosalita's Cantina*/
			  		var rosalitasImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-12.png', null, null, null, new google.maps.Size(68,66));
			  		var rosalitasPos = new google.maps.LatLng(38.6321007,-90.1975827);

			  		var rosalitasMarker = new google.maps.Marker({position: rosalitasPos, map: map, icon: rosalitasImage, content: 'Rosalita\'s Cantina' });
			  		var rosalitasContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Rosalita\'s Cantina</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>1235 Washington Ave | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 621 2700</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var rosalitasWindow = new google.maps.InfoWindow({
			  		      content: rosalitasContent
			  		  });
			  		  google.maps.event.addListener(rosalitasMarker, 'click', function() {
			  		      rosalitasWindow.open(map,rosalitasMarker);
			  		  });
					  
  			  		/*Lucas Park Grille*/
  			  		var lucasparkImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-13.png', null, null, null, new google.maps.Size(68,66));
  			  		var lucasparkPos = new google.maps.LatLng(38.6319959,-90.1980872);

  			  		var lucasparkMarker = new google.maps.Marker({position: lucasparkPos, map: map, icon: lucasparkImage, content: 'Lucas Park Grille' });
  			  		var lucasparkContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Lucas Park Grille</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>1234 Washington Ave | St. Louis, MO | 63103</p>'+
  			  			  '<p class="phone">(314) 241 7770</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var lucasparkWindow = new google.maps.InfoWindow({
  			  		      content: lucasparkContent
  			  		  });
  			  		  google.maps.event.addListener(lucasparkMarker, 'click', function() {
  			  		      lucasparkWindow.open(map,lucasparkMarker);
  			  		  });
					  
			  		/*Charles P. Stanley Cigar Company & Lounge*/
			  		var charlespcigarImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-14.png', null, null, null, new google.maps.Size(68,66));
			  		var charlespcigarPos = new google.maps.LatLng(38.6310921,-90.1943116);

			  		var charlespcigarMarker = new google.maps.Marker({position: charlespcigarPos, map: map, icon: charlespcigarImage, content: 'Charles P. Stanley Cigar Company & Lounge' });
			  		var charlespcigarContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Charles P. Stanley Cigar Company & Lounge</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>1000 Washington Ave | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 436 3500</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var charlespcigarWindow = new google.maps.InfoWindow({
			  		      content: charlespcigarContent
			  		  });
			  		  google.maps.event.addListener(charlespcigarMarker, 'click', function() {
			  		      charlespcigarWindow.open(map,charlespcigarMarker);
			  		  });
			  
  			  		/*St. Louis Convention Center*/
  			  		var conventioncenterImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-15.png', null, null, null, new google.maps.Size(68,66));
  			  		var conventioncenterPos = new google.maps.LatLng(38.6326366,-90.1915546);

  			  		var conventioncenterMarker = new google.maps.Marker({position: conventioncenterPos, map: map, icon: conventioncenterImage, content: 'St. Louis Convention Center' });
  			  		var conventioncenterContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">St. Louis Convention Center</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>701 Convention Plaza #300 | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 421 1023</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var conventioncenterWindow = new google.maps.InfoWindow({
  			  		      content: conventioncenterContent
  			  		  });
  			  		  google.maps.event.addListener(conventioncenterMarker, 'click', function() {
  			  		      conventioncenterWindow.open(map,conventioncenterMarker);
  			  		  });
					  
			  		/*The National Blues Museum*/
			  		var nationalbluesImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-16.png', null, null, null, new google.maps.Size(68,66));
			  		var nationalbluesPos = new google.maps.LatLng(38.6302559,-90.1894834);

			  		var nationalbluesMarker = new google.maps.Marker({position: nationalbluesPos, map: map, icon: nationalbluesImage, content: 'The National Blues Museum' });
			  		var nationalbluesContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">The National Blues Museum</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>615 Washington Ave | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 231 0400</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var nationalbluesWindow = new google.maps.InfoWindow({
			  		      content: nationalbluesContent
			  		  });
			  		  google.maps.event.addListener(nationalbluesMarker, 'click', function() {
			  		      nationalbluesWindow.open(map,nationalbluesMarker);
			  		  });
					  
  			  		/*The MX Theatre*/
  			  		var mxtheatreImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-17.png', null, null, null, new google.maps.Size(68,66));
  			  		var mxtheatrePos = new google.maps.LatLng(38.6301433,-90.1897881);

  			  		var mxtheatreMarker = new google.maps.Marker({position: mxtheatrePos, map: map, icon: mxtheatreImage, content: 'The MX Theatre' });
  			  		var mxtheatreContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">The MX Theatre</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>618 Washington Ave | St. Louis, MO | 63101</p>'+
  			  			  '<p class="phone">(314) 222 2994</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var mxtheatreWindow = new google.maps.InfoWindow({
  			  		      content: mxtheatreContent
  			  		  });
  			  		  google.maps.event.addListener(mxtheatreMarker, 'click', function() {
  			  		      mxtheatreWindow.open(map,mxtheatreMarker);
  			  		  });
					  
			  		/*Edward Jones dome*/
			  		var edwardjonesImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-18.png', null, null, null, new google.maps.Size(68,66));
			  		var edwardjonesPos = new google.maps.LatLng(38.6328042,-90.1884177);

			  		var edwardjonesMarker = new google.maps.Marker({position: edwardjonesPos, map: map, icon: edwardjonesImage, content: 'Edward Jones dome' });
			  		var edwardjonesContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Edward Jones dome</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>901 N Broadway| St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 342 5201</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var edwardjonesWindow = new google.maps.InfoWindow({
			  		      content: edwardjonesContent
			  		  });
			  		  google.maps.event.addListener(edwardjonesMarker, 'click', function() {
			  		      edwardjonesWindow.open(map,edwardjonesMarker);
			  		  });
					  
  			  		/*Laclede's Landing*/
  			  		var lacledesImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-19.png', null, null, null, new google.maps.Size(68,66));
  			  		var lacledesPos = new google.maps.LatLng(38.6307178,-90.1857293);

  			  		var lacledesMarker = new google.maps.Marker({position: lacledesPos, map: map, icon: lacledesImage, content: 'Laclede\'s Landing' });
  			  		var lacledesContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Laclede\'s Landing</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>720 N 2nd St | St. Louis, MO | 63102</p>'+
  			  			  '<p class="phone">(314) 241 1155</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var lacledesWindow = new google.maps.InfoWindow({
  			  		      content: lacledesContent
  			  		  });
  			  		  google.maps.event.addListener(lacledesMarker, 'click', function() {
  			  		      lacledesWindow.open(map,lacledesMarker);
  			  		  });
					  
			  		/*Gateway Arch*/
			  		var archImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-20.png', null, null, null, new google.maps.Size(68,66));
			  		var archPos = new google.maps.LatLng(38.6248217,-90.1848606);

			  		var archMarker = new google.maps.Marker({position: archPos, map: map, icon: archImage, content: 'Gateway Arch' });
			  		var archContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Gateway Arch</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>100 Washington Ave | St. Louis, MO | 63102</p>'+
			  			  '<p class="phone">(877) 982 1410</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var archWindow = new google.maps.InfoWindow({
			  		      content: archContent
			  		  });
			  		  google.maps.event.addListener(archMarker, 'click', function() {
			  		      archWindow.open(map,archMarker);
			  		  });
					  
  			  		/*Lumière Place Casino*/
  			  		var lumiereImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-21.png', null, null, null, new google.maps.Size(68,66));
  			  		var lumierePos = new google.maps.LatLng(38.6322057,-90.1844726);

  			  		var lumiereMarker = new google.maps.Marker({position: lumierePos, map: map, icon: lumiereImage, content: 'Lumière Place Casino' });
  			  		var lumiereContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Lumière Place Casino</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>999 N 2nd St | St. Louis, MO | 63102</p>'+
  			  			  '<p class="phone">(314) 881 7777</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var lumiereWindow = new google.maps.InfoWindow({
  			  		      content: lumiereContent
  			  		  });
  			  		  google.maps.event.addListener(lumiereMarker, 'click', function() {
  			  		      lumiereWindow.open(map,lumiereMarker);
  			  		  });
					  
			  		/*Orpheum Theatre*/
			  		var orpheumImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-22.png', null, null, null, new google.maps.Size(68,66));
			  		var orpheumPos = new google.maps.LatLng(38.6300701,-90.1929825);

			  		var orpheumMarker = new google.maps.Marker({position: orpheumPos, map: map, icon: orpheumImage, content: 'Orpheum Theatre' });
			  		var orpheumContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Orpheum Theatre</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>416 N 9th St | St. Louis, MO | 63101</p>'+
			  			  '<p class="phone">(314) 588 9828</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var orpheumWindow = new google.maps.InfoWindow({
			  		      content: orpheumContent
			  		  });
			  		  google.maps.event.addListener(orpheumMarker, 'click', function() {
			  		      orpheumWindow.open(map,orpheumMarker);
			  		  });
					  
  			  		/*Scottrade Center*/
  			  		var scottradeImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-23.png', null, null, null, new google.maps.Size(68,66));
  			  		var scottradePos = new google.maps.LatLng(38.6262362,-90.2021987);

  			  		var scottradeMarker = new google.maps.Marker({position: scottradePos, map: map, icon: scottradeImage, content: 'Scottrade Center' });
  			  		var scottradeContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">Scottrade Center</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>1401 Clark Ave | St. Louis, MO | 63103</p>'+
  			  			  '<p class="phone">(314) 622 5400</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var scottradeWindow = new google.maps.InfoWindow({
  			  		      content: scottradeContent
  			  		  });
  			  		  google.maps.event.addListener(scottradeMarker, 'click', function() {
  			  		      scottradeWindow.open(map,scottradeMarker);
  			  		  });
					  
			  		/*Busch Stadium*/
			  		var buschImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-24.png', null, null, null, new google.maps.Size(68,66));
			  		var buschPos = new google.maps.LatLng(38.6223296,-90.1924645);

			  		var buschMarker = new google.maps.Marker({position: buschPos, map: map, icon: buschImage, content: 'Busch Stadium' });
			  		var buschContent = '<div id="content">'+
			  		      '<div id="siteNotice">'+
			  		      '</div>'+
			  		      '<h1 id="firstHeading" class="firstHeading">Busch Stadium</h1>'+
			  		      '<div id="bodyContent">'+
			  		      '<p>700 Clark Ave | St. Louis, MO | 63102</p>'+
			  			  '<p class="phone">(314) 345 9600</p>'+
			  		      '</div>'+
			  		      '</div>';

			  		  var buschWindow = new google.maps.InfoWindow({
			  		      content: buschContent
			  		  });
			  		  google.maps.event.addListener(buschMarker, 'click', function() {
			  		      buschWindow.open(map,buschMarker);
			  		  });
					  
  			  		/*City Museum*/
  			  		var citymuseumImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-24.png', null, null, null, new google.maps.Size(68,66));
  			  		var citymuseumPos = new google.maps.LatLng(38.6336859,-90.2007213);

  			  		var citymuseumMarker = new google.maps.Marker({position: citymuseumPos, map: map, icon: citymuseumImage, content: 'City Museum' });
  			  		var citymuseumContent = '<div id="content">'+
  			  		      '<div id="siteNotice">'+
  			  		      '</div>'+
  			  		      '<h1 id="firstHeading" class="firstHeading">City Museum</h1>'+
  			  		      '<div id="bodyContent">'+
  			  		      '<p>750 N 16th St | St. Louis, MO | 63103</p>'+
  			  			  '<p class="phone">(314) 231 2489</p>'+
  			  		      '</div>'+
  			  		      '</div>';

  			  		  var citymuseumWindow = new google.maps.InfoWindow({
  			  		      content: citymuseumContent
  			  		  });
  			  		  google.maps.event.addListener(citymuseumMarker, 'click', function() {
  			  		      citymuseumWindow.open(map,citymuseumMarker);
  			  		  });
					  
    			  		/*Flamingo Bowl*/
    			  		var flamingoImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-25.png', null, null, null, new google.maps.Size(68,66));
    			  		var flamingoPos = new google.maps.LatLng(38.6316023,-90.1955769);

    			  		var flamingoMarker = new google.maps.Marker({position: flamingoPos, map: map, icon: flamingoImage, content: 'Flamingo Bowl' });
    			  		var flamingoContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">Flamingo Bowl</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '<p>1117 Washington Ave | St. Louis, MO | 63101</p>'+
    			  			  '<p class="phone">(314) 436 6666</p>'+
    			  		      '</div>'+
    			  		      '</div>';

    			  		  var flamingoWindow = new google.maps.InfoWindow({
    			  		      content: flamingoContent
    			  		  });
    			  		  google.maps.event.addListener(flamingoMarker, 'click', function() {
    			  		      flamingoWindow.open(map,flamingoMarker);
    			  		  });
						  
      			  		/*Starbucks*/
      			  		var starbucksImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-26.png', null, null, null, new google.maps.Size(68,66));
      			  		var starbucksPos = new google.maps.LatLng(38.630727, -90.191778);

      			  		var starbucksMarker = new google.maps.Marker({position: starbucksPos, map: map, icon: starbucksImage, content: 'Starbucks' });
      			  		var starbucksContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">Starbucks</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>800 Washington Ave | St. Louis, MO | 63101</p>'+
      			  			  '<p class="phone">(800) 235 2883</p>'+
      			  		      '</div>'+
      			  		      '</div>';

      			  		  var starbucksWindow = new google.maps.InfoWindow({
      			  		      content: starbucksContent
      			  		  });
      			  		  google.maps.event.addListener(starbucksMarker, 'click', function() {
      			  		      starbucksWindow.open(map,starbucksMarker);
      			  		  });
						  
    			  		/*U.S. Bank*/
    			  		var usbankImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-27.png', null, null, null, new google.maps.Size(68,66));
    			  		var usbankPos = new google.maps.LatLng(38.629403, -90.191772);

    			  		var usbankMarker = new google.maps.Marker({position: usbankPos, map: map, icon: usbankImage, content: 'U.S. Bank' });
    			  		var usbankContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">U.S. Bank</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '<p>721 Locust St | St. Louis, MO | 63101</p>'+
    			  			  '<p class="phone">(314) 418 2803</p>'+
    			  		      '</div>'+
    			  		      '</div>';

    			  		  var usbankWindow = new google.maps.InfoWindow({
    			  		      content: usbankContent
    			  		  });
    			  		  google.maps.event.addListener(usbankMarker, 'click', function() {
    			  		      usbankWindow.open(map,usbankMarker);
    			  		  });
						  
      			  		/*Culinaria*/
      			  		var culinariaImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-28.png', null, null, null, new google.maps.Size(68,66));
      			  		var culinariaPos = new google.maps.LatLng(38.6292894,-90.1929856);

      			  		var culinariaMarker = new google.maps.Marker({position: culinariaPos, map: map, icon: culinariaImage, content: 'Culinaria - A Schnucks Market' });
      			  		var culinariaContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">Culinaria - A Schnucks Market</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>315 N 9th St | St. Louis, MO | 63101</p>'+
      			  			  '<p class="phone">(314) 436 7694</p>'+
      			  		      '</div>'+
      			  		      '</div>';

      			  		  var culinariaWindow = new google.maps.InfoWindow({
      			  		      content: culinariaContent
      			  		  });
      			  		  google.maps.event.addListener(culinariaMarker, 'click', function() {
      			  		      culinariaWindow.open(map,culinariaMarker);
      			  		  });
						  
    			  		/*Fifth Third Bank*/
    			  		var fifththirdImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-29.png', null, null, null, new google.maps.Size(68,66));
    			  		var fifththirdPos = new google.maps.LatLng(38.6291271,-90.1944381);

    			  		var fifththirdMarker = new google.maps.Marker({position: fifththirdPos, map: map, icon: fifththirdImage, content: 'Fifth Third Bank' });
    			  		var fifththirdContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">Fifth Third Bank</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '<p>921 Olive St | St. Louis, MO | 63101</p>'+
    			  			  '<p class="phone">(314) 802 1422</p>'+
    			  		      '</div>'+
    			  		      '</div>';

    			  		  var fifththirdWindow = new google.maps.InfoWindow({
    			  		      content: fifththirdContent
    			  		  });
    			  		  google.maps.event.addListener(fifththirdMarker, 'click', function() {
    			  		      fifththirdWindow.open(map,fifththirdMarker);
    			  		  });
					  
      			  		/*Post Office*/
      			  		var postofficeImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-30.png', null, null, null, new google.maps.Size(68,66));
      			  		var postofficePos = new google.maps.LatLng(38.629531, -90.197311);

      			  		var postofficeMarker = new google.maps.Marker({position: postofficePos, map: map, icon: postofficeImage, content: 'Post Office' });
      			  		var postofficeContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">Post Office</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>1140 Olive St | St. Louis, MO | 63101</p>'+
      			  			  '<p class="phone">(800) 275 8777</p>'+
      			  		      '</div>'+
      			  		      '</div>';

      			  		  var postofficeWindow = new google.maps.InfoWindow({
      			  		      content: postofficeContent
      			  		  });
      			  		  google.maps.event.addListener(postofficeMarker, 'click', function() {
      			  		      postofficeWindow.open(map,postofficeMarker);
      			  		  });
					  
    			  		/*Band Box Cleaners*/
    			  		var bandboxImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-31.png', null, null, null, new google.maps.Size(68,66));
    			  		var bandboxPos = new google.maps.LatLng(38.6302008,-90.1959644);

    			  		var bandboxMarker = new google.maps.Marker({position: bandboxPos, map: map, icon: bandboxImage, content: 'Band Box Cleaners' });
    			  		var bandboxContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">Band Box Cleaners</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '<p>1110 Locust St | St. Louis, MO | 63101</p>'+
    			  			  '<p class="phone">(314) 421 3122</p>'+
    			  		      '</div>'+
    			  		      '</div>';

    			  		  var bandboxWindow = new google.maps.InfoWindow({
    			  		      content: bandboxContent
    			  		  });
    			  		  google.maps.event.addListener(bandboxMarker, 'click', function() {
    			  		      bandboxWindow.open(map,bandboxMarker);
    			  		  });
						  
      			  		/*8th and Pine Metrolink Station*/
      			  		var pinemetroImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-32.png', null, null, null, new google.maps.Size(68,66));
      			  		var pinemetroPos = new google.maps.LatLng(38.6302008,-90.1959644);

      			  		var pinemetroMarker = new google.maps.Marker({position: pinemetroPos, map: map, icon: pinemetroImage, content: '8th and Pine Metrolink Station' });
      			  		var pinemetroContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">8th and Pine Metrolink Station</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>8th and Pink | St. Louis, MO | 63101</p>'+
      			  		      '</div>'+
      			  		      '</div>';

      			  		  var pinemetroWindow = new google.maps.InfoWindow({
      			  		      content: pinemetroContent
      			  		  });
      			  		  google.maps.event.addListener(pinemetroMarker, 'click', function() {
      			  		      pinemetroWindow.open(map,pinemetroMarker);
      			  		  });
						  
    			  		/*Convention Center Metrolink Station*/
    			  		var conventionmetroImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-33.png', null, null, null, new google.maps.Size(68,66));
    			  		var conventionmetroPos = new google.maps.LatLng(38.630345, -90.189376);

    			  		var conventionmetroMarker = new google.maps.Marker({position: conventionmetroPos, map: map, icon: conventionmetroImage, content: 'Convention Center Metrolink Station' });
    			  		var conventionmetroContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">Convention Center Metrolink Station</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '</div>'+
    			  		      '</div>';

    			  		  var conventionmetroWindow = new google.maps.InfoWindow({
    			  		      content: conventionmetroContent
    			  		  });
    			  		  google.maps.event.addListener(conventionmetroMarker, 'click', function() {
    			  		      conventionmetroWindow.open(map,conventionmetroMarker);
    			  		  });
						  
      			  		/*Ceci Unique Gallery*/
      			  		var ceciImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-34.png', null, null, null, new google.maps.Size(68,66));
      			  		var ceciPos = new google.maps.LatLng(38.631172,-90.1928801);

      			  		var ceciMarker = new google.maps.Marker({position: ceciPos, map: map, icon: ceciImage, content: 'CeCi Unique Gallery' });
      			  		var ceciContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">CeCi Unique Gallery</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>901 Washington Ave | St. Louis, MO | 63101</p>'+
							  '<p class="phone">(314) 421 3122</p>'+
							  '</div>'+
      			  		      '</div>';

      			  		  var ceciWindow = new google.maps.InfoWindow({
      			  		      content: ceciContent
      			  		  });
      			  		  google.maps.event.addListener(ceciMarker, 'click', function() {
      			  		      ceciWindow.open(map,ceciMarker);
      			  		  });
						  
    			  		/*Collective at MX*/
    			  		var collectivemxImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-35.png', null, null, null, new google.maps.Size(68,66));
    			  		var collectivemxPos = new google.maps.LatLng(38.6302764,-90.1897993);

    			  		var collectivemxMarker = new google.maps.Marker({position: collectivemxPos, map: map, icon: collectivemxImage, content: 'Collective at MX' });
    			  		var collectivemxContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">Collective at MX</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '<p>626 Washington Ave | St. Louis, MO | 63101</p>'+
						  '<p class="phone">(314) 241 5420</p>'+
						  '</div>'+
    			  		      '</div>';

    			  		  var collectivemxWindow = new google.maps.InfoWindow({
    			  		      content: collectivemxContent
    			  		  });
    			  		  google.maps.event.addListener(collectivemxMarker, 'click', function() {
    			  		      collectivemxWindow.open(map,collectivemxMarker);
    			  		  });
						  
      			  		/*MacroSun International*/
      			  		var macrosunImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-36.png', null, null, null, new google.maps.Size(68,66));
      			  		var macrosunPos = new google.maps.LatLng(38.632134,-90.1987393);

      			  		var macrosunMarker = new google.maps.Marker({position: macrosunPos, map: map, icon: macrosunImage, content: 'MacroSun International' });
      			  		var macrosunContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">MacroSun International</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>1310 Washington Ave | St. Louis, MO | 63103</p>'+
  						  '<p class="phone">(314) 421 6400</p>'+
  						  '</div>'+
      			  		  '</div>';

      			  		  var macrosunWindow = new google.maps.InfoWindow({
      			  		      content: macrosunContent
      			  		  });
      			  		  google.maps.event.addListener(macrosunMarker, 'click', function() {
      			  		      macrosunWindow.open(map,macrosunMarker);
      			  		  });
						  
    			  		/*Old Post Office*/
    			  		var oldpostofficeImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-37.png', null, null, null, new google.maps.Size(68,66));
    			  		var oldpostofficePos = new google.maps.LatLng(38.6289109,-90.192876);

    			  		var oldpostofficeMarker = new google.maps.Marker({position: oldpostofficePos, map: map, icon: oldpostofficeImage, content: 'Old Post Office' });
    			  		var oldpostofficeContent = '<div id="content">'+
    			  		      '<div id="siteNotice">'+
    			  		      '</div>'+
    			  		      '<h1 id="firstHeading" class="firstHeading">Old Post Office</h1>'+
    			  		      '<div id="bodyContent">'+
    			  		      '<p>815 Olive St | St. Louis, MO | 63101</p>'+
						  '</div>'+
    			  		  '</div>';

    			  		  var oldpostofficeWindow = new google.maps.InfoWindow({
    			  		      content: oldpostofficeContent
    			  		  });
    			  		  google.maps.event.addListener(oldpostofficeMarker, 'click', function() {
    			  		      oldpostofficeWindow.open(map,oldpostofficeMarker);
    			  		  });
						  
      			  		/*Old Courthouse*/
      			  		var oldcourthouseImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-38.png', null, null, null, new google.maps.Size(68,66));
      			  		var oldcourthousePos = new google.maps.LatLng(38.6255912,-90.188968);

      			  		var oldcourthouseMarker = new google.maps.Marker({position: oldcourthousePos, map: map, icon: oldcourthouseImage, content: 'Old Courthouse' });
      			  		var oldcourthouseContent = '<div id="content">'+
      			  		      '<div id="siteNotice">'+
      			  		      '</div>'+
      			  		      '<h1 id="firstHeading" class="firstHeading">Old Courthouse</h1>'+
      			  		      '<div id="bodyContent">'+
      			  		      '<p>11 N 4th St | St. Louis, MO | 63102</p>'+
  						  '</div>'+
      			  		  '</div>';

      			  		  var oldcourthouseWindow = new google.maps.InfoWindow({
      			  		      content: oldcourthouseContent
      			  		  });
      			  		  google.maps.event.addListener(oldcourthouseMarker, 'click', function() {
      			  		      oldcourthouseWindow.open(map,oldcourthouseMarker);
      			  		  });
			  
			  
				  		/*Tower at OPOP*/
				  		var towerImage = new google.maps.MarkerImage ('<?php echo MAINURL.""; ?>live-site/img/marker-tower.png', null, null, null, new google.maps.Size(209,75));
				  		var towerPos = new google.maps.LatLng(38.629867, -90.192209);
	
				  		var towerMarker = new google.maps.Marker({position: towerPos, map: map, icon: towerImage, content: 'The Tower at OPOP', animation: google.maps.Animation.DROP, zIndex: 500});
				  		var towerContent = '<div id="content">'+
				  		      '<div id="siteNotice">'+
				  		      '</div>'+
				  		      '<h1 id="firstHeading" class="firstHeading">The Tower at OPOP</h1>'+
				  		      '<div id="bodyContent">'+
				  		      '<p>411 North 8th St | St. Louis, MO | 63101</p>'+
				  			  '<p class="phone">(314) 621 5443</p>'+
				  		      '</div>'+
				  		      '</div>';
				  		  var towerWindow = new google.maps.InfoWindow({
				  		      content: towerContent
				  		  });
				  		  google.maps.event.addListener(towerMarker, 'click', function() {
				  		      towerWindow.open(map,towerMarker);
				  		  });
						  
			  
						  /*Show Different Map Center for Mobile*/
					    if($(window).width() <= 480) {
					      map.setCenter(new google.maps.LatLng(38.629867, -90.192209));
					    } else {
					      map.setCenter(new google.maps.LatLng(38.629867, -90.192209));
					    }
				  
		
		  
				}
				google.maps.event.addDomListener(window, 'load', initialize);
	
	
	
			</script>
			
			<script>
			//Site Frame Function
			function setMapHeight() {
				var mapCanvas = $('#map_canvas');
				var windowHeight = $(window).height();
				var headerHeight = $('#header.collapsed').outerHeight(true) + $('.nav2').outerHeight(true);
				var mapHeight = windowHeight - headerHeight;
	
				
				mapCanvas.css('height', mapHeight);
			}

			$(window).load(function(){
				setMapHeight();
			})

			$(window).resize(function(){
				setMapHeight();
			})
			</script>

	

			<div style="width: 100%; height: 600px;" id="map_canvas"></div>


			</section>	

<?php include($_SERVER['DOCUMENT_ROOT']."/the-tower-at-opop/live-site/template/footer.inc.php"); ?>