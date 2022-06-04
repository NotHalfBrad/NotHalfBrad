<?php

    $album_name = dereadifyURL($_GET['album']);
	$album_name_loc = getAlbumFolder($album_name);
	$album_id = getAlbumIdentifier($album_name);
	$image_name = $_GET['image'];
	$image_loc = getImageLocation($album_name,$image_name);
	$reduced_loc = getReducedImage($album_name, $image_name);
	$images = getAlbumImages($album_name);
	$prevImg = getPreviousImage($images, $image_name);
	$nextImg = getNextImage($images, $image_name);
	$exif = exif_read_data($image_loc);

	$extraHeaders='
		<meta property="og:url" content="'.getPhotoLink($album_name, $image_name).'">
		<meta property="og:title" content="'.$album_name.'">
		<meta property="og:image" content="'.getPreviewLink($album_name, $image_name).'">
		<meta property="og:image:width" content="'._cover_x.'">
		<meta property="og:image:height" content="'._cover_y.'">
		<meta property="og:description" content="by Not Half Brad">

		<!--<meta name="twitter:title" content="European Travel Destinations ">
		<meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
		<meta name="twitter:image" content=" http://euro-travel-example.com/thumbnail.jpg">
		<meta name="twitter:card" content="summary_large_image">-->';
?>