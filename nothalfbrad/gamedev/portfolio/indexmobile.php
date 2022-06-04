<?php
	$site_section = "gamedev";

	$extraHeaders='
		<meta property="og:url" content="http://nothalfbrad.com/portfolio">
		<meta property="og:title" content="Brad Wiggins Design Portfolio">
		<meta property="og:image" content="http://www.nothalfbrad.com/gamedev/portfolio/DSC00002-narrow.jpg">
		<meta property="og:image:width" content="800">
		<meta property="og:image:height" content="813">
		<meta property="og:description" content="by Not Half Brad">
		<link rel="stylesheet" type="text/css" href="https://www.nothalfbrad.com/layout/style1.css">';

	include '../../layout/layoutfuncs.php';
	include '../../photography/photofuncs.php';
	include '../../layout/header.php';

	$data = readJson('./portfolio.json');

//intro - desktop
$intro = '<div class="content-panel font-body" style="max-width:600px;"><br>
			<span style="line-height:0.1;">An introduction to</span><br>
			<span class="font-datacard-title">'.$data['intro']['title'].'</span><br>
				'.$data['intro']['text'].'<p><br><div style=" width:100%; text-align:center;">'.
				button('Linkedin', "https://www.linkedin.com/in/bradleywiggins/", "color-button-affirm", true, "10em", "4em").
				'&nbsp;&nbsp;&nbsp;&nbsp;'.
				button("Resume", "../resume.php", "color-button-affirm", true, "10em", "4em").'
			</div></div>';

//intro - mobile
/*$intro = '<!--<span class="font-datacard-title datacard-content">Introduction</span><br>-->
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
		</td></tr></table>';*/		

drawDataCardSimple($intro, "", "alpine.png", "Introduction");


$accomplishments = '<div class="content-panel"><div class="font-content-panel-title datacard-title">Major Accomplishments</div> </div>
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



$testimonials = '<div class="datacard-content-top-only"><div class="font-datacard-title datacard-title">Testimonials</div> </div>
<div class="carousel datacard-content-bottom-only" data-flickity=\'{ "groupCells": true, "adaptiveHeight": false, "wrapAround": false }\'>';
foreach($data['testimonials'] as $testimony)
{
	$testimonials .= '<div class="carousel-cell">'.formatQuote($testimony['quote'],$testimony['author'],$testimony['role']).'</div>';
}
$testimonials .= '</div>';
drawDataCardSimple($testimonials,"","level_trans.png","Testimonials");


$projectList='<div class="datacard-content-top-only"><div class="font-datacard-title datacard-title">Full Project List</div> </div>
<div style="text-align:center;">
<div style="display:inline-block;">';

foreach ($data['projects'] as $project) 
{
	//"./projects/einstein.jpg"
	$projectList.= formatGridImage("./projects/".$project['image'],$project['title'],"",$project['company'],$project['Year']);
}

/*
formatGridImage("./projects/einstein.jpg","Intelligent Einstein (Toy)").
formatGridImage("./projects/stein.jpg","Stein-O-Matic").

formatGridImage("./projects/so.jpg","Star Ops<br>(unreleased)").
formatGridImage("./projects/sf.jpg","Star Force<br>(unreleased)").
formatGridImage("./projects/blis.jpg","Blister<br>(unreleased)").

formatGridImage("./projects/ymw.jpg","YouMeWar").
formatGridImage("./projects/ymv.jpg","YouMeVerse").
formatGridImage("./projects/q.jpg","Time Team<br>(unreleased)").

formatGridImage("./projects/fv2.jpg","Farmville 2").

formatGridImage("./projects/q.jpg","Rich Dad Poor Dad (unreleased)").

formatGridImage("./projects/seeds.jpg","Seeds (unreleased)").

formatGridImage("./projects/nh.jpg","NightHaven").

formatGridImage("./projects/pg.jpg","Perfect Getaway").

formatGridImage("./projects/st.jpg","Facebook game<br>prototype").
formatGridImage("./projects/iso.jpg","Flash game<br>prototype").
formatGridImage("./projects/ss.jpg","Game-Maker<br>prototype").

formatGridImage("alpine.jpg","Alpine Racer").
formatGridImage("./projects/rr.png","Ridge Racer Zeebo").
formatGridImage("./projects/sub.jpg","Submerged").
formatGridImage("./projects/pp.jpg","Pole Position<br>(iPhone)").
formatGridImage("./projects/pmag.jpg","Pac-Man Arcade Golf").
formatGridImage("./projects/gp.jpg","Pac-Man Ghost Prototype").
formatGridImage("./projects/mspac.jpg","Ms Pac-Man<br>(iPhone & Android)").
formatGridImage("./projects/pac.jpg","Pac-Man<br>(iPhone & Android").
formatGridImage("./projects/snoopy.jpg","Snoopy the Flying Ace").

formatGridImage("./projects/petshop.jpg","Littlest Pet Shop").
formatGridImage("./projects/zorro.jpg","The legend of Zorro").
formatGridImage("./projects/shrek.jpg","Shrek / Over the Hedge 5-in-1").
formatGridImage("./projects/pixar.jpg","Pixar Classics 5-in-1").
formatGridImage("./projects/ratchet.jpg","Ratchet & Clank: Going Mobile").
formatGridImage("./projects/sm2.jpg","Spider-man 2: The Hero Returns").
formatGridImage("./projects/gb.jpg","Ghost Busters").
formatGridImage("./projects/nick.jpg","Nicktoons 5-in-1").
formatGridImage("./projects/daffy.jpg","Spaced Out Duck").
formatGridImage("./projects/bugs.jpg","Bugs Bunny Carrot Quest").
formatGridImage("./projects/tweety.jpg","Hyde and Go Tweet").

formatGridImage("./projects/q.jpg","Trick Shot Golf").
formatGridImage("./projects/ffs.jpg","Fist of Fury Special").
formatGridImage("./projects/b&t.jpg","Black & Tan").
formatGridImage("./projects/ltn.jpg","Love Thy Neighbor").
formatGridImage("./projects/ck.jpg","Conquered Kingdoms").'</div></div>';*/

echo '</div></div>';
		drawDataCardSimple($projectList,"","webBG.png","ProjectList");

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
	<div class="grid-image grid-image-dimensions" style="background-image:url('.$image.');">
		<div class="mouseover-visible color-body-accent" style="width:300px; height:300px; vertical-align: middle; font-weight:bold;"><br> '.
				$title.'<br>'.
				$company.'<br>'.
				$year.
			' </div>
	</div>';
	//position
	//year
	//company
	return $result;
}


?>
