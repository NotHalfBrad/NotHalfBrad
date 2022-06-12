<?php
$site_section = "home";
include './layout/header.php';

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
?>

<!--<div class="datacard-frame color-body shadow" style="width:100%;">
	<div class="datacard-head color-accent">Page Title</div>
</div><br><br>-->


<?php //the names of these can change, as I get a feel for them.
//these arent the names of pages, which shouldn't change...
//but they only become pages, when I feel they are a solid enough concept to deserve one.

function drawHomePageButton($sectionName, $title, $content)
{
	$s = new Section($sectionName);

	$link = './' . $sectionName . '/';
	$logo = $s->getIconTag();
	$color = $s->icon_color;
	drawDataCardWLeadingButton($content, $title, $logo, $color, $link);
}

$sectionName = 'gamedev';
$title = 'Game Development';
$content = 'Game Developer by profession and passion.';
drawHomePageButton($sectionName, $title, $content);

$sectionName = 'photography';
$title = 'Photography';
$content = 'Photography text here';
drawHomePageButton($sectionName, $title, $content);

/*
$sectionName = 'philosophy';
$title = 'Philosophy';
$content = 'Philosophy text here';
drawHomePageButton($sectionName, $title, $content);
*/

/*
$sectionName = 'music';
$title = 'Music';
$content = 'Music text here';
drawHomePageButton($sectionName, $title, $content);
*/

/*
$sectionName = 'poet';
$title = 'Poetry';
$content = 'Poetry text here';
drawHomePageButton($sectionName, $title, $content);
*/

/*
$sectionName = 'travel';
$title = 'Travel';
$content = 'Travel text here';
drawHomePageButton($sectionName, $title, $content);
*/

/*
$sectionName = 'fitness';
$title = 'Fitness';
$content = 'Fitness text here';
drawHomePageButton($sectionName, $title, $content);
*/

/*
$sectionName = 'philanthropy';
$title = 'Philanthropy';
$content = 'Philanthropy text here';
drawHomePageButton($sectionName, $title, $content);
*/

$sectionName = 'about';
$title = 'About Brad';
$content = 'Bio, Contact information, and other links';
drawHomePageButton($sectionName, $title, $content);

/*
$social = '<div class="font-datacard-title"><i class="em em-speaking_head_in_silhouette"></i> Social</div>
email: brad.wiggins@gmail.com<br>
Twitter: @NotHalfBrad<br>
Instagram: @not_half_brad @bradnwhite @bardicimagery @very_brad_artwork';
//drawDataCard($social);

/*
<div class="datacard-frame color-body shadow font-body instagram-feed">
	<div class="datacard-head color-heading">Instagram Test</div>
	<div class="datacard-content">
		<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="https://cdn.lightwidget.com/widgets/b3525183edf05cad89599dedd71aa59d.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
	</div>
</div>

<div class="datacard-frame color-body shadow font-body twitter-feed">
	<div class="datacard-head color-heading">Twitter Test</div>
	<div class="datacard-content">
		<a class="twitter-timeline" href="https://twitter.com/NotHalfBrad?ref_src=twsrc%5Etfw">Tweets by NotHalfBrad</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</div>
*/

    include './layout/footer.php';
?>

