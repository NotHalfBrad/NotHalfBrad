<?php
	$id = $_GET['id'];
	if($id=="")
		$album_name = dereadifyURL($_GET['album']);
	else
		$album_name = getAlbumFromID($id);
    //check for non-existent album
    if($album_name == "")
		$error = 'Invalid Album ID:'.$id.'<br><a href=./gallery.php class="gallery-link"> &larr; Back to gallery</a>';
	else
	{
	    $images = getAlbumImages($album_name);
	    $banner = getAlbumBanner($album_name, $images);

		$extraHeaders='
		<meta property="og:url" content="'.getAlbumLink($album_name).'">
		<meta property="og:title" content="'.$album_name.'">
		<meta property="og:image" content="'.getPreviewLink($album_name).'">
		<meta property="og:image:width" content="'._cover_x.'">
		<meta property="og:image:height" content="'._cover_y.'">
		<meta property="og:description" content="by Not Half Brad">

		<!--<meta name="twitter:title" content="European Travel Destinations ">
		<meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
		<meta name="twitter:image" content=" http://euro-travel-example.com/thumbnail.jpg">
		<meta name="twitter:card" content="summary_large_image">-->';
	}
?>