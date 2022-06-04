<?php
	$site_section = "photography";
	require_once 'create_thumbnail.php';
    require_once 'photofuncs.php';
    require_once 'viewer_header.php';
	include '../layout/header.php';
?>

<?php

$SCData = readJsonShowcaseData();

/*if($album->isEnabled != "true" && !isAdminUser()) $error = "This album does not exist! Sometimes this happens because of stupid renumbering errors (working on that!)... Try finding it through the gallery instead!";
if($album->isEnabled == "true" || isAdminUser())*/
{
	//get all showcases.
	$showcaseNames = getShowcaseSectionNames($SCData);
	$selectOptions =  "";
	foreach($showcaseNames as $name)
	{
		$selectOptions .= '<option value="'.$name.'">'.$name."\n";
	}
	//check against showcase, if in one, change fields to move
	$existingShowcase = isinWhichShowcase($album_id, $image_name, $SCData);
	$admin = "<br>Album: <b>".$album_name."</b><br>\nImage: <b>".$image_name."</b><br>\n";
	if($existingShowcase == "")
	{
		$admin .= "Not in any showcase yet. <br><br>";
		$existingButton = "add to";
		$newButton = "create and add";
	}
	else
	{
		$admin .= "found in existing showcase: <b>".$existingShowcase."</b> <br><br>";
		$existingButton = "MOVE to";
		$newButton = "create and MOVE";
	}

	//if number is 0, don't show existing field
	if(count($showcaseNames>0))
	{
	    $admin .= '<!-- add image to existing showcase -->
	    <form action="'.getImageURL($album_name,$curImg).'" method="post">
	    	Add to existing showcase<br>
	    	<select>'.$selectOptions.'</select>
	    	<input type="submit" value="'.$existingButton.'">
	    </form>';
	}

	$admin .= '<!-- add image to new showcase -->
    <form action="'.getImageURL($album_name,$curImg).'" method="post">
    	Create new showcase, and add image<br>
    	<input type="text"> 
    	<input type="submit" value="'.$newButton.'">
    </form>
    ';

	$viewer_height = "80vh";


	$visitorCount = countVisitor($album_name, $_SERVER['REMOTE_ADDR']);


	echo '<div class="datacard-frame color-body" style="width:100%; position:relative;">
		<table width="100%" style="padding:10px; box-sizing: border-box;"><tr>
			<td align="left"><a href="./album.php?album='.readifyURL($album_name).'"> &larr; Back to album</a></td>
			<td align="center">'.$album_name.'</td>
			<td align="right"><a href="'.$image_loc.'" style="align:right; text-align:right; content-align:right;">full size</a></td>
		</tr></table>
		
		<center><div style="position:relative; background-color:rgba(18,18,18,1);">
			<div class="color-accent" style="width:100%; height:3px;"></div>
			<div style="height:'.$viewer_height.';">
				<div style="height:100%; display:inline-block; vertical-align:middle;"></div><img src="'.$reduced_loc.'" style="max-width:100%; display:inline-block; vertical-align:middle; max-height:'.$viewer_height.';"><div style="height:100%; display:inline-block; vertical-align:middle;"></div><br>
			</div>';

			if($prevImg != null)
				echo '<a href='.getImageURL($album_name, $prevImg).' style="position:absolute; left:0; top:0; display:inline-block; height:100%; width:42%; vertical-align: middle; text-decoration: none; font-size:10vh; line-height:'.$viewer_height.'; text-align:left;">&#8249;</a>';

			if($nextImg != null)
				echo '<a href='.getImageURL($album_name, $nextImg).' style="position:absolute; right:0; top:0; display:inline-block; height:100%; width:42%; vertical-align: middle; text-decoration: none; font-size:10vh; line-height:'.$viewer_height.'; text-align:right;">&#8250;</a>';

			echo '
			<div style="align:center; position:absolute; bottom:0; display:box; width:100%;">
			<table align=center cellspacing=8 style="position: relative; align:center; padding:10px;"><tr>';

				$index = getImageID($images, $image_name);
				for($counter=-4; $counter<=4; $counter++)
				{
					$num = $index + $counter;
					$size = 64 - abs($counter*5);

					echo '<td valign=bottom width='.$size.'>';
					if($num >= 0 && $num < count($images) && $counter != 0)
					{
						$curImg = $images[$num];
						echo '<a href='.getImageURL($album_name, $curImg).' style="width:100px; text-decoration: none; font-size:10vh; display:inline-block; align:center; border-style: solid; border-width:1px; border-color:gray; height:'.$size.'px; width:'.$size.'px; background-image:url(\''.getThumbnail($album_name, $curImg).'\'); background-size: cover; background-position:center center; opacity: 0.7;"></a>';
					}
					echo '</td>';
				}
			echo '
			</tr></table>
			</div>

			<div style="background-color:black; width:100%; height:3px;"></div>
		</div></center>

		<div class="datacard-content">
			<div class="image-title">'.$image_name.'</div>
			<div>Image desciption would go here</div>
			<div><pre>';
			$exif_aperture = $exif['COMPUTED']['ApertureFNumber'];
			$exif_shutter = $exif['ExposureTime'];
			$exif_iso = $exif['ISOSpeedRatings'];
			$exif_zoom = $exif['FocalLength'];
			$exif_zoom35 = $exif['FocalLengthIn35mmFilm'];
			$exif_camera = $exif['Make'].' '.$exif['Model'];
			$exif_lens = $exif['UndefinedTag:0xA434'];
			$exif_flash;
			$exif_date = $exif['DateTimeOriginal'];


			echo 'Date: '.$exif_date.'<BR>';
			echo '<br>';
			echo 'Camera: '.$exif_camera.'<BR>';
			echo 'Lens: '.$exif_lens.'<BR>';
			echo '<br>';
			echo 'Focal Length (35mm equiv): '.$exif_zoom35.'mm<BR>';
			echo 'F number: '.$exif_aperture.'<BR>';
			echo 'Shutter Speed: '.$exif_shutter.'<BR>';
			echo 'ISO: '.$exif_iso.'<BR>';
			
			//echo '<br>';
			//print_r($exif);
		echo'</pre></div>
		</div>
	</div>';
}

?>

<?php
    include '../layout/footer.php';
?>