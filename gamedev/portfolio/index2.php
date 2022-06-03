<?php
	$site_section = "gamedev";
	$extraHeaders='
		<meta property="og:url" content="http://nothalfbrad.com/portfolio">
		<meta property="og:title" content="Brad Wiggins Design Portfolio">
		<meta property="og:image" content="http://www.nothalfbrad.com/gamedev/portfolio/DSC00002-narrow.jpg">
		<meta property="og:image:width" content="800">
		<meta property="og:image:height" content="813">
		<meta property="og:description" content="by Not Half Brad">';

	include '../../layout/layoutfuncs.php';
	include '../../photography/photofuncs.php';
	include '../../layout/header.php';

	$data = readJson('./portfolio.json');


//intro
$intro = '<!--<span class="font-datacard-title datacard-content">Introduction</span><br>-->
		<table cellpadding=0 cellspacing=0><tr><td>
			<img src="DSC00002-narrow.jpg" style="width:36vw; margin:0px; padding:0px;">
		</td><td>
			<div class="datacard-content font-body" style="width:40vw; max-width:600px; margin:0px 70px 0px 70px;">
			<span class="font-datacard-title">'.$data['intro']['title'].'</span><br>
				'.$data['intro']['text'].'<p><br><div style=" width:100%; text-align:center;">'.
				button('Linkedin', "https://www.linkedin.com/in/bradleywiggins/", "color-button-affirm", true).
				'&nbsp;&nbsp;&nbsp;&nbsp;'.
				button("Resume", "../resume.php", "color-button-affirm", true).'
			</div></div>
		</td></tr></table>';

drawDataCardSimple($intro, "", "alpine.png", "Introduction");



$accomplishments = '<div class="datacard-content-top-only"><div class="font-datacard-title datacard-title">Major Accomplishments</div> </div>
<div class="carousel" style="text-align:center; width:100%" data-flickity=\'{ "adaptiveHeight": false, "wrapAround": false }\'>';
foreach ($data['accomplishments'] as $accomplishment) 
{
	$accomplishments .='
	<div class="carousel-cell" style="width:100%; vertical-align:text-top; display:block; padding: 10px 10px;">
		<div style="display:inline-block; vertical-align:top; padding:20px;">
				<div><b>'.$accomplishment['title'].'</b></div><br>
				<div class="font-body" style="height:100%; text-align:left; display:inline-block; max-width: 600px;">'.$accomplishment['text'].'</div>
		</div>
		<div style="text-align:center; display:inline-block; ">
			<img src="'.$accomplishment['image'].'" style="width:40vw; display: block; margin-left: auto; margin-right: auto;"> <br>
		</div>
	</div>';
}
$accomplishments .= "</div>";
drawDataCardSimple($accomplishments, "","carrotbg.png","Accomplishments");



$skillset = '<span class="font-datacard-title">Skillset<br></span>
<div style="text-align:center;">
<div style="display:inline-block; width:90%">';
foreach($data['skillset'] as $skill)
{
	$skillset.=formatPhlurb($skill['title'],$skill['image'],$skill['text']);
}
$skillset.='</div></div>';
		drawDataCard($skillset, "", "snoopybg2.png", "Skillset");



$awards = '<span class="font-datacard-title">Awards<br></span>
	<div style="text-align:center; vertical-align:middle; height:100%;">';
foreach ($data['awards'] as $award) 
{
	$awards.='<div style="display:inline-block; margin:20px; vertical-align:top;">
		<img src="trophy.png" style="width:200px; height:130px; margin: 0px 0px 16px 0px;"><br>
		<b>'.$award['title'].'</b><hr>'.
		$award['award'].'<br>'.
		$award['from'].'<br><br><b>'.
		$award['role'].'</b>
	</div>';
}
$awards.='</div>';
		drawDataCard($awards,"","awards_trans.png", "Awards");



$testimonials = '<div class="datacard-content-top-only" style="font-size:6%;">
<div class="font-datacard-title datacard-title">Testimonials</div> </div>
<div class="carousel datacard-content-bottom-only" data-flickity=\'{ "groupCells": true, "adaptiveHeight": false, "wrapAround": false }\'>';
foreach($data['testimonials'] as $testimony)
{
	$testimonials .= '<div class="carousel-cell">'.formatQuote($testimony['quote'],$testimony['author'],$testimony['role']).'</div>';
}
$testimonials .= '</div>';
drawDataCardSimple($testimonials,"","level_trans.png","Testimonials");



$projectList='<div class="datacard-content-top-only"><div class="font-datacard-title datacard-title">Full Project List</div> </div>
<div style="padding: 0.3em; display: grid; grid-template-columns: repeat(8, 1fr); grid-auto-rows: 1fr; grid-gap: 0.3em 0.3em; text-align:center;">';
foreach($data['projects'] as $project)
{
	$projectList .= formatGridImage('./projects/'.$project['image'], $project['title']);
}
$projectList .='</div>';
drawDataCardSimple($projectList,"","webBG.png","ProjectList");



$employment = '<span class="font-datacard-title">Employment History</span><p>
	<div style="height:100%;">';
foreach ($data['employment'] as $job) 
{
	$employment.= '
	<table style="width:100%;">
	<tr><td style="background-color:white; height:10em; width:10em;">
			<img src="./companies/'.$job['logo'].'" style="max-height:10em; max-width:10em; display:inline-block;">
	</td><td style="width:100%; vertical-align:top; padding: 0em 1em;">
	<span style="font-weight: bold;">'.
	$job['company'].
	'</span><hr>'.
	$job['role'].
	'</td></tr>
	</table>
	<p><br>';
}
$employment.='</div>';
		drawDataCard($employment,"","awards_trans.png", "Employment");



?>
	<div align="center">
	</div>

<?php
    include '../../layout/footer.php';







function formatPhlurb($title, $image, $text)
{
	$result ='<!-- Phlurb -->
	<div style="width:320px; vertical-align:top; display:inline-block; margin: 10px;">
		<div style="font-size:16px;"><b>'.$title.'</b></div>
		<div><br>
			<img src="'.$image.'" style="width:100%;">
			<div class="font-body" style="text-align:left;"><br>'.$text.'</div>
		</div>
	</div>';

	return $result;
}

function formatGridImage($image, $title, $position="", $company="", $year="")
{
	$result='<!-- GridImage -->
	<div class="" style="background-image:url('.$image.');
	vertical-align:top; 
	background-size: cover; 
	background-repeat:no-repeat; 
	background-position:center;">
		<div class="mouseover-visible color-body-accent" style="vertical-align: middle; font-weight:bold; padding-bottom:100%; height:100%;">
		 <!--'.$title.'-->
		 </div>
	</div>';
	//position
	//year
	//company
	return $result;
}


?>
