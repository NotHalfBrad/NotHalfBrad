<?php
require_once './layout/header.php';

	$intro = '	<div style="position:relative; color:white;">
					<img src="about.jpg" style="width:100%; height:65vh; object-fit:cover; object-position: 100% 50%;">
					<div style="position:absolute; top:0px; left:0px; height:100%; width:100%; background-image:linear-gradient(to right, rgba(50,50,50,0.9) 30%, rgba(0, 0, 0, 0) 70%);">
						<div style="max-width:600px; padding:8vh 4vw; text-align:left;">
							The Personal Pursuits of<br>
									<span class="font-datacard-title-extra">Brad Wiggins</span><br><br><br>

							The objective of this site, is to be my personal portal on the web. I eventually intend to expand the sections beyond those listed here, and have each operate almost as an independent site unto themselves. The only exception being pursuits that are their own seperate commercial ventures, such as "Bardic Imagery" and "Regicide Games", which will always remain seperate external sites (though spoiler, they are all just on the same host machine in the end!)...
						</div>
					</div>
  				</div>';
	drawDataCardSimple($intro);

$content = 'Game Developer by profession and passion.';
$title = 'Game Development';
$sectionName = 'gamedev';
$logo = getSectionIcon($sectionName);
$color = getSectionColor($sectionName);
$link = './gamedev/';
drawDataCardWLeadingButton($content, $title, $logo, $color, $link);

require_once './layout/footer.php';
?>