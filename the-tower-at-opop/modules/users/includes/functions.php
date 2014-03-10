<?php 

	function sqlEscape($sql) { 
	  
		$fix_str	= stripslashes($sql); 
		$fix_str	= str_replace("'","''",$fix_str); 
	
		return $fix_str; 
	
	}


	function getSlug($string){
		
		$string = trim($string);
		$string = strtolower($string);
		$string = trim(preg_replace("/[^A-Za-z0-9_]/", " ", $string));
		$string = preg_replace("/[ \t\n\r]/", " ", $string);
		$string = preg_replace('/\s+/', ' ', $string);	
		$string = str_replace(" ", '-', $string);
		$string = str_replace(",", '', $string);
		$string = preg_replace("/[ _]/", "-", $string);
		$string = preg_replace("/[ -]/", "-", $string);

		return $string;
	}

	function in_array_r($needle, $haystack, $strict = false) {

		foreach ($haystack as $item)
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict)))
				return true;
	
		return false;
	}

	function get_AccessKey() {
	
		$value = ACCESS_VALUE;
		
		if (isset($_GET[ACCESS_KEY]))
			$key = $_GET[ACCESS_KEY];
		else
			$key = "";
	
		if(isset($_COOKIE[ACCESS_COOKIE]))
			$cookie = $_COOKIE[ACCESS_COOKIE];
		else
			$cookie = "";
	
		if ($value == $key)
			setcookie(ACCESS_COOKIE, $key, time()+(60*60*12), "/");
	
		if ($cookie != $value && $key != $value)
			header("Location: ".ACCESS_REDIRECT);
		
	}
	
	
	function detect_ie(){
		if (isset($_SERVER['HTTP_USER_AGENT']) && 
		(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
			return true;
		else
			return false;
	}

	function randomPassword() {

		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

		$pass = array(); //remember to declare $pass as an array

		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

		for ($i = 0; $i < 12; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		
		return implode($pass);
	}
		
	function generateRandID(){
		return md5(generateRandStr(16));
	}
	
	function generateRandStr($length){
		$randstr = "";
		for($i=0; $i<$length; $i++){
			$randnum = mt_rand(0,61);
			if($randnum < 10){
				$randstr .= chr($randnum+48);
			}else if($randnum < 36){
				$randstr .= chr($randnum+55);
			}else{
				$randstr .= chr($randnum+61);
			}
		}
		return $randstr;
	}	
	
	function convert_smart_quotes($string) {
		$search = array(chr(145), chr(146),	chr(147), chr(148),	chr(151));
		$replace = array("'", "'", '"',	'"', '-');
		return str_replace($search, $replace, $string);
	}
	
	function formatContent($content) {
	
			$frontContent = substr($content,0,3);
			if($frontContent == "<p>"){
				$content = substr($content,3);
			}
			$backContent = substr($content,0,-4);
			if($backContent == "</p>"){
				$content = substr($content,-4);
			}
	
			$content = stripslashes($content);
			
		return $content;
	}
	
	function myTruncate($text, $length, $ending, $exact = true, $considerHtml = true) {
		if ($considerHtml) {
			// if the plain text is shorter than the maximum length, return the whole text
			if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
				return $text;
			}
			
			// splits all html-tags to scanable lines
			preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
	
			$total_length = strlen($ending);
			$open_tags = array();
			$truncate = '';
			
			foreach ($lines as $line_matchings) {
				// if there is any html-tag in this line, handle it and add it (uncounted) to the output
				if (!empty($line_matchings[1])) {
					// if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
					if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
						// do nothing
					// if tag is a closing tag (f.e. </b>)
					} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
						// delete tag from $open_tags list
						$pos = array_search($tag_matchings[1], $open_tags);
						if ($pos !== false) {
							unset($open_tags[$pos]);
						}
					// if tag is an opening tag (f.e. <b>)
					} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
						// add tag to the beginning of $open_tags list
						array_unshift($open_tags, strtolower($tag_matchings[1]));
					}
					// add html-tag to $truncate'd text
					$truncate .= $line_matchings[1];
				}
	
				// calculate the length of the plain text part of the line; handle entities as one character
				$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
				if ($total_length+$content_length > $length) {
					// the number of characters which are left
					$left = $length - $total_length;
					$entities_length = 0;
					// search for html entities
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
						// calculate the real length of all entities in the legal range
						foreach ($entities[0] as $entity) {
							if ($entity[1]+1-$entities_length <= $left) {
								$left--;
								$entities_length += strlen($entity[0]);
							} else {
								// no more characters left
								break;
							}
						}
					}
					$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
					// maximum lenght is reached, so get off the loop
					break;
				} else {
					$truncate .= $line_matchings[2];
					$total_length += $content_length;
				}
				
				// if the maximum length is reached, get off the loop
				if($total_length >= $length) {
					break;
				}
			}
		} else {
			if (strlen($text) <= $length) {
				return $text;
			} else {
				$truncate = substr($text, 0, $length - strlen($ending));
			}
		}
		
		// if the words shouldn't be cut in the middle...
		if (!$exact) {
			// ...search the last occurance of a space...
			$spacepos = strrpos($truncate, ' ');
			if (isset($spacepos)) {
				// ...and cut the text in this position
				$truncate = substr($truncate, 0, $spacepos);
			}
		}
		
		// add the defined ending to the text
		$truncate .= $ending;
		
		if($considerHtml) {
			// close all unclosed html-tags
			foreach ($open_tags as $tag) {
				$truncate .= '</' . $tag . '>';
			}
		}
		return $truncate;
	}
	
	
	
	function cropImage($src_image, $dest_image, $thumbSize_x = 64, $thumbSize_y = 64, $jpg_quality = 90, $orientation="width") {
		
		$image = getimagesize($src_image);
	 
		$width = $image[0];
		$height = $image[1];
	
		// Check for valid dimensions
		if($width <= 0 || $height <= 0) return false;
	 
		// Determine format from MIME-Type
		$image['format'] = strtolower(preg_replace('/^.*?\//', '', $image['mime']));
	 
		// Import image
		switch($image['format']) {
			case 'jpg':
			case 'jpeg':
				$image_data = imagecreatefromjpeg($src_image);
			break;
			case 'png':
				$image_data = imagecreatefrompng($src_image);
			break;
			case 'gif':
				$image_data = imagecreatefromgif($src_image);
			break;
			default:
				// Unsupported format
				return false;
			break;
		}
	 
		// Verify import
		if($image_data == false) return false;
	
		if($orientation == "width") {
			$cropPercent = .5; // This will zoom in to 50% zoom (crop)
			$cropWidth   = $width; 
			$cropHeight  = $height*$cropPercent; 
		} else {
			$cropPercent = .5; // This will zoom in to 50% zoom (crop)
			$cropWidth   = $width*$cropPercent; 
			$cropHeight  = $height*$cropPercent; 
		}
		 
		//getting the top left coordinate
		$x_offset = ($width-$cropWidth)/2;
		$y_offset = ($height-$cropHeight)/2;
	
	
		$canvas = imagecreatetruecolor($thumbSize_x, $thumbSize_y);
		
		if( imagecopyresampled(
			$canvas,
			$image_data,
			0,
			0,
			$x_offset,
			$y_offset,
			$thumbSize_x,
			$thumbSize_y,
			$width,
			$height
		)) {
	 
			// Create thumbnail
			switch( strtolower(preg_replace('/^.*\./', '', $dest_image)) ) {
				case 'jpg':
				case 'jpeg':
					return imagejpeg($canvas, $dest_image, $jpg_quality);
				break;
				case 'png':
					return imagepng($canvas, $dest_image);
				break;
				case 'gif':
					return imagegif($canvas, $dest_image);
				break;
				default:
					// Unsupported format
					return false;
				break;
			}
	 
		} else {
			return false;
		}
	 
	}
	
	function square_crop($src_image, $dest_image, $thumb_size = 64, $jpg_quality = 90) {
		
		$image = getimagesize($src_image);
	 
		// Check for valid dimensions
		if( $image[0] <= 0 || $image[1] <= 0 ) return false;
	 
		// Determine format from MIME-Type
		$image['format'] = strtolower(preg_replace('/^.*?\//', '', $image['mime']));
	 
		// Import image
		switch( $image['format'] ) {
			case 'jpg':
			case 'jpeg':
				$image_data = imagecreatefromjpeg($src_image);
			break;
			case 'png':
				$image_data = imagecreatefrompng($src_image);
			break;
			case 'gif':
				$image_data = imagecreatefromgif($src_image);
			break;
			default:
				// Unsupported format
				return false;
			break;
		}
	 
		// Verify import
		if( $image_data == false ) return false;
	 
		// Calculate measurements 
		if( $image[0] > $image[1] ) {
			// For landscape images
			$x_offset = ($image[0] - $image[1]) / 2;
			$y_offset = 0;
			$square_size = $image[0] - ($x_offset * 2);
		} else {
			// For portrait and square images
			$x_offset = 0;
			$y_offset = ($image[1] - $image[0]) / 2;
			$square_size = $image[1] - ($y_offset * 2);
		}
	 
		// Resize and crop
		$canvas = imagecreatetruecolor($thumb_size, $thumb_size);
	
		if( imagecopyresampled(
			$canvas,
			$image_data,
			0,
			0,
			$x_offset,
			$y_offset,
			$thumb_size,
			$thumb_size,
			$square_size,
			$square_size
		)) {
	 
			// Create thumbnail
			switch( strtolower(preg_replace('/^.*\./', '', $dest_image)) ) {
				case 'jpg':
				case 'jpeg':
					return imagejpeg($canvas, $dest_image, $jpg_quality);
				break;
				case 'png':
					return imagepng($canvas, $dest_image);
				break;
				case 'gif':
					return imagegif($canvas, $dest_image);
				break;
				default:
					// Unsupported format
					return false;
				break;
	
			}
	 
		} else {
			return false;
		}
	 
	}
	
	function generateSlug($phrase) {
	
		$result = strtolower($phrase);
		$result = preg_replace("/[^a-z0-9\s-]/", "", $result);
		$result = trim(preg_replace("/[\s-]+/", " ", $result));
		$result = preg_replace("/\s/", "-", $result);
	
		return $result;
	}
	
	function determineImageScale($sourceWidth, $sourceHeight, $targetWidth, $targetHeight) {
		$scalex =  $targetWidth / $sourceWidth;
		$scaley =  $targetHeight / $sourceHeight;
		return min($scalex, $scaley);
	}
	
	function returnCorrectFunction($ext){
		$function = "";
		switch($ext){
			case "png":
				$function = "imagecreatefrompng";
				break;
			case "jpeg":
				$function = "imagecreatefromjpeg";
				break;
			case "jpg":
				$function = "imagecreatefromjpeg";
				break;
			case "gif":
				$function = "imagecreatefromgif";
				break;
		}
		return $function;
	}
	
	function parseImage($ext,$img,$file = null){
		switch($ext){
			case "png":
				imagepng($img,($file != null ? $file : ''));
				break;
			case "jpeg":
				imagejpeg($img,($file ? $file : ''),90);
				break;
			case "jpg":
				imagejpeg($img,($file ? $file : ''),90);
				break;
			case "gif":
				imagegif($img,($file ? $file : ''));
				break;
		}
	}
	
	function setTransparency($imgSrc,$imgDest,$ext){
	
		if($ext == "png" || $ext == "gif"){
			$trnprt_indx = imagecolortransparent($imgSrc);
			// If we have a specific transparent color
			if ($trnprt_indx >= 0) {
				// Get the original image's transparent color's RGB values
				$trnprt_color    = imagecolorsforindex($imgSrc, $trnprt_indx);
				// Allocate the same color in the new image resource
				$trnprt_indx    = imagecolorallocate($imgDest, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
				// Completely fill the background of the new image with allocated color.
				imagefill($imgDest, 0, 0, $trnprt_indx);
				// Set the background color for new image to transparent
				imagecolortransparent($imgDest, $trnprt_indx);
			}
			// Always make a transparent background color for PNGs that don't have one allocated already
			elseif ($ext == "png") {
				// Turn off transparency blending (temporarily)
				imagealphablending($imgDest, true);
				// Create a new transparent color for image
				$color = imagecolorallocatealpha($imgDest, 0, 0, 0, 127);
				// Completely fill the background of the new image with allocated color.
				imagefill($imgDest, 0, 0, $color);
				// Restore transparency blending
				imagesavealpha($imgDest, true);
			}
	
		}
	}
	
	function paginate($start, $limit, $total, $filePath, $otherParams) {
	
		$allPages = ceil($total/$limit);
		$currentPage = floor($start/$limit) + 1;
		$pagination = "";
		
		if($total > $limit) {
		
			if ($currentPage!=1) {
				$pagination .= "<a href=\"".MAINURL.$filePath."?start=".(($currentPage-2)*$limit)."&".$otherParams."\">Previous</a>";
				if ($currentPage>=4) {
					$pagination .= "<a href=\"".MAINURL.$filePath."?start=0&".$otherParams."\">1</a><span class=\"empty\">...</span>";	
				}
			}
		
			for($k=1; $k<$allPages+1; $k++) {
				
				if($k==$currentPage) {
					$pagination .= "<span class=\"current\">".$k."</span>";
				} else if($k==$currentPage-1 || $k==$currentPage-2) {
					$pagination .= "<a href=\"".MAINURL.$filePath."?start=".(($k-1)*$limit)."&".$otherParams."\">".$k."</a>";
				} else if($k==$currentPage+1 || $k==$currentPage+2) {
					$pagination .= "<a href=\"".MAINURL.$filePath."?start=".(($k-1)*$limit)."&".$otherParams."\">".$k."</a>";
				}
			}
		
			if ($currentPage<$allPages) {
				if ($currentPage<=($allPages-4)) {
					$pagination .= "<span class=\"empty\">...</span><a href=\"".MAINURL.$filePath."?start=".($limit*($allPages-1))."&".$otherParams."\">".$allPages."</a>";	
				} else if ($currentPage<=($allPages-3)) {
					$pagination .= "<a href=\"".MAINURL.$filePath."?start=".($limit*($allPages-1))."&".$otherParams."\">".$allPages."</a>";	
				}
				$pagination .= "<a href=\"".MAINURL.$filePath."?start=".($currentPage*$limit)."&".$otherParams."\">Next</a>";
			}
	
		}
		return $pagination;
	}

	function mod_paginate($start, $limit, $total, $filePath, $otherParams) {
	
		$allPages = ceil($total/$limit);
		$currentPage = floor($start/$limit) + 1;
		if ($currentPage == 0) {
			$currentPage = 1;
		}
		$pagination = "";
		
		if($total > $limit) {
		
			if ($currentPage!=1) {
				
				if((($currentPage-2)*$limit) == 0 ) {
					$current = "";
				} else {
					$current = "/".(($currentPage-2)*$limit);
				}
				
				$pagination .= "<a href=\"".MAINURL.$filePath."/page/".($currentPage-1).$otherParams."\">Previous</a>";
				if ($currentPage>=4) {
					$pagination .= "<a href=\"".MAINURL.$filePath.$otherParams."\">1</a><span class=\"empty\">...</span>";	
				}
			}
		
			for($k=1; $k<$allPages+1; $k++) {
				
				if((($k-1)*$limit) == 0 ) {
					$current = "";
				} else {
					$current = "/".(($k-1)*$limit);
				}
				
				if($k==$currentPage) {
					$pagination .= "<span class=\"current\">".$k."</span>";
				} else if($k==$currentPage-1 || $k==$currentPage-2) {
					$pagination .= "<a href=\"".MAINURL.$filePath."/page/".$k.$otherParams."\">".$k."</a>";
				} else if($k==$currentPage+1 || $k==$currentPage+2) {
					$pagination .= "<a href=\"".MAINURL.$filePath."/page/".$k.$otherParams."\">".$k."</a>";
				}
			}
		
			if ($currentPage<$allPages) {
				if ($currentPage<=($allPages-4)) {
					$pagination .= "<span class=\"empty\">...</span><a href=\"".MAINURL.$filePath."/page/".$allPages.$otherParams."\">".$allPages."</a>";	
				} else if ($currentPage<=($allPages-3)) {
					$pagination .= "<a href=\"".MAINURL.$filePath."/page/".($limit-1).$otherParams."\">".$allPages."</a>";	
				}
				$pagination .= "<a href=\"".MAINURL.$filePath."/page/".($currentPage+1).$otherParams."\">Next</a>";
			}
	
		}
		return $pagination;
	}

	function media_paginate($start, $limit, $total, $filePath, $otherParams) {
	
		$allPages = ceil($total/$limit);
		$currentPage = floor($start/$limit) + 1;
		$pagination = "";
		
		if($total > $limit) {
		
			if ($currentPage!=1) {
				$pagination .= "<a href=\"#\" rel=\"".(($currentPage-2)*$limit)."\" class=\"mediaPagination\">Previous</a>";
				if ($currentPage>=4) {
					$pagination .= "<a href=\"#\" rel=\"".$otherParams."\" class=\"mediaPagination\">1</a><span class=\"empty\">...</span>";	
				}
			}
		
			for($k=1; $k<$allPages+1; $k++) {
				
				if($k==$currentPage) {
					$pagination .= "<span class=\"current\">".$k."</span>";
				} else if($k==$currentPage-1 || $k==$currentPage-2) {
					$pagination .= "<a href=\"#\" rel=\"".(($k-1)*$limit)."\" class=\"mediaPagination\">".$k."</a>";
				} else if($k==$currentPage+1 || $k==$currentPage+2) {
					$pagination .= "<a href=\"#\" rel=\"".(($k-1)*$limit)."\" class=\"mediaPagination\">".$k."</a>";
				}
			}
		
			if ($currentPage<$allPages) {
				if ($currentPage<=($allPages-4)) {
					$pagination .= "<span class=\"empty\">...</span><a href=\"#\" rel=\"".($limit*($allPages-1))."\" class=\"mediaPagination\">".$allPages."</a>";	
				} else if ($currentPage<=($allPages-3)) {
					$pagination .= "<a href=\"#\" rel=\"".($limit*($allPages-1))."\" class=\"mediaPagination\">".$allPages."</a>";	
				}
				$pagination .= "<a href=\"#\" rel=\"".($currentPage*$limit)."\" class=\"mediaPagination\">Next</a>";
			}
	
		}
		return $pagination;
	}

	function fixDateTime($datetime,$value, $offset){
		
		list($date,$time) = explode(" ",$datetime);
	
		  switch($value) {
			case 'date':
				$date = explode("-",$date);
				$date = $date[1]."-".$date[2]."-".$date[0];
				return $date;
				break;
			case 'time':
				return $time;
				break;
			case 'datetime':		
				if($time == NULL){$time = '00:00:00';}
				$date = explode("-",$date);
				$time = explode(":",$time);
				$gmtoffset = $time[0] + $offset;
				$datetime = date ("F j, Y \a\\t g:i A", mktime($gmtoffset,$time[1],$time[2],$date[1],$date[2],$date[0]));
				return $datetime;
				break;			
		  }
	}

	function datum($datum=true) {
		$sign = "-"; // Whichever direction from GMT to your timezone. + or -
		$h = "5"; // offset for time (hours)
		$dst = true; // true - use dst ; false - don't
		
		if ($dst==true) {
			$daylight_saving = date('I');
			if ($daylight_saving){
				if ($sign == "-"){ $h=$h-1;  }
				else { $h=$h+1; }
			}
		}
		$hm = $h * 60;
		$ms = $hm * 60;
		if ($sign == "-"){
			$timestamp = time()-($ms);
		} else { 
			$timestamp = time()+($ms);
		}
		$gmdate = gmdate("m-d-Y, g:i A", $timestamp);
		
		if($datum==true) {
			return $gmdate;
		} else {
			return $timestamp;
		}
	}
	
if (!function_exists('json_encode')) {
	
	function json_encode($a=false) {
		if (is_null($a)) return 'null';
		if ($a === false) return 'false';
		if ($a === true) return 'true';
		if (is_scalar($a)) {
			if (is_float($a)) {
	// Always use "." for floats.
				return floatval(str_replace(",", ".", strval($a)));
			}
	
			if (is_string($a)) {
				static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
				return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
			} else
				return $a;
			}
				
		$isList = true;
		for ($i = 0, reset($a); $i < count($a); $i++, next($a)) {
			if (key($a) !== $i) {
				$isList = false;
				break;
			}
		}
	
		$result = array();
		if ($isList) {
			foreach ($a as $v) $result[] = json_encode($v);
				return '[' . join(',', $result) . ']';
		} else {
				foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
				return '{' . join(',', $result) . '}';
		}
	}
		
}

	function strip_html_tags($text){
		$text = preg_replace(
			array(
			  // Remove invisible content
				'@<head[^>]*?>.*?</head>@siu',
				'@<style[^>]*?>.*?</style>@siu',
				'@<script[^>]*?.*?</script>@siu',
				'@<object[^>]*?.*?</object>@siu',
				'@<embed[^>]*?.*?</embed>@siu',
				'@<applet[^>]*?.*?</applet>@siu',
				'@<noframes[^>]*?.*?</noframes>@siu',
				'@<noscript[^>]*?.*?</noscript>@siu',
				'@<noembed[^>]*?.*?</noembed>@siu',
			  // Add line breaks before and after blocks
				'@</?((address)|(blockquote)|(center)|(del))@iu',
				'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
				'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
				'@</?((table)|(th)|(td)|(caption))@iu',
				'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
				'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
				'@</?((frameset)|(frame)|(iframe))@iu',
			),
			array(
				' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
				"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
				"\n\$0", "\n\$0",
			),
			$text );
		return strip_tags($text);
	}


?>