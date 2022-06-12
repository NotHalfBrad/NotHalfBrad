<?php
	include '../../layout/layoutfuncs.php';
	include '../../photography/photofuncs.php';
	include '../../layout/header.php';

	$data = readJson('./portfolio.json');


		drawTitleCard("Portfolio",
			'<a href="#Introduction">Introduction</a> 
			 <a href="#Skillset">Skillset</a> 
			 <a href="#Awards">Awards</a> 
			 <a href="#Accomplishments">Accomplishments</a> 
			 <a href="#Testimonials">Testimonials</a> 
			 <a href="#ProjectList">Project List</a>');

		//intro
		$intro = '<!--<span class="font-datacard-title datacard-content">Introduction</span><br>-->
				<table cellpadding=0 cellspacing=0><tr><td>
					<img src="DSC00002-narrow.jpg" style="width:28vw; margin:0px; padding:0px;">
				</td><td>
					<div class="datacard-content font-body" style="width:40vw; max-width:600px; margin:0px 70px 0px 70px;">
					<span class="font-datacard-title">'.$data['intro']['title'].'</span><br>
						'.$data['intro']['text'].'
					</div>
				</td></tr></table>';

		drawDataCardSimple($intro, "", "Introduction");

$skillset = '<span class="font-datacard-title">Skillset<br></span><div style="text-align:center; width:85%;">';
foreach($data['skillset'] as $skill)
{
	$skillset.=formatPhlurb($skill['title'],$skill['image'],$skill['text']);
}
$skillset.='</div>';
		drawDataCard($skillset, "", "", "Skillset");

$Awards = '<span class="font-datacard-title">Awards<br></span>
<div style="text-align:center;">
	<div style="display:inline-block; margin:20px; vertical-align:top;">
		<img src="trophy.png" style="width:200px; height:130px; margin: 0px 0px 16px 0px;"><br>
		<b>Snoopy the Flying Ace</b><hr>
		Best Casual Game 2007<br>
		Wireless Gaming World
	</div>
	<div style="display:inline-block; margin:20px; vertical-align:top;">
		<img src="trophy.png" style="width:200px; height:130px; margin: 0px 0px 16px 0px;"><br>
		<b>Ratchet & Clank: Going Mobile</b><hr>
		Wireless Platformer of the Year 2005<br>
		Editor\'s Choice - IGN
	</div>
	<div style="display:inline-block; margin:20px; vertical-align:top;">
		<img src="trophy.png" style="width:200px; height:130px; margin: 0px 0px 16px 0px;"><br>
		<b>Ratchet & Clank: Going Mobile</b><hr>
		Wireless Platformer of the Year 2005<br>
		Player\'s Choice - IGN
	</div>
	<div style="display:inline-block; margin:20px; vertical-align:top;">
		<img src="trophy.png" style="width:200px; height:130px; margin: 0px 0px 16px 0px;"><br>
		<b>Ratchet & Clank: Going Mobile</b><hr>
		Best Action Game 2005<br>
		Mobies Awards - CNET
	</div>
</div>';
		drawDataCard($Awards,"","awards_trans.png", "Awards");

$Accomplishments = '<span class="font-datacard-title">Accomplishments<br></span>
<div style="text-align:center; width:90%">

	<div style="width:100%; vertical-align:top; display:block; margin: 10px;">
		<div><b>Farm2 Highest Revenue Day</b></div>
		<div style="text-align:center; ">
			<img src="dragon carrot.png" style="width:100%; max-height:80vh; display: block; margin-left: auto; margin-right: auto;"> 
			<div class="font-body">'.$text.'</div>
		</div>
	</div>

	<!--<div style="width:100%; vertical-align:top; display:block; margin: 10px;">
		<div><b>Ratchet & Clank</b></div>
		<div>
			<img src="x" style="width:100%;"> 
			<div class="font-body">'.$text.'</div>
		</div>
	</div>

	<div style="width:100%; vertical-align:top; display:block; margin: 10px;">
		<div><b>Farm2 Monetize Fences</b></div>
		<div>
			<img src="mud wallow.png" style="width:100%;"> 
			<div class="font-body">'.$text.'</div>
		</div>
	</div>

	<div style="width:100%; vertical-align:top; display:block; margin: 10px;">
		<div><b>iPhone launch titles</b></div>
		<div>
			<img src="iphone2007.png" style="width:100%;"> 
			<div class="font-body">'.$text.'</div>
		</div>
	</div>

	<div style="width:100%; vertical-align:top; display:block; margin: 10px;">
		<div><b>Namco Game Prototype</b></div>
		<div>
			<img src="x" style="width:100%;"> 
			<div class="font-body">'.$text.'</div>
		</div>
	</div>

	<div style="width:100%; vertical-align:top; display:block; margin: 10px;">
		<div><b>Snoopy the Flying Ace</b></div>
		<div>
			<img src="x" style="width:100%;"> 
			<div class="font-body">'.$text.'</div>
		</div>
	</div>-->

</div>';
drawDataCard($Accomplishments, "","","Accomplishments");

$testimonials = '<span class="font-datacard-title">Testimonials<br></span>'.
	formatQuote("Brad has a great ability to think \"outside the box\" and come up with unique design solutions where others would stick with the tried and tired. He is passionate, patient and enthusiastic about his work as a designer, and not afraid to commit to long hours to get a job done. <b>His humor and personality bring morale up in any work environrnent</b> and he is constantly looking for new ways to bring his team members together.","Seth Rosenfeld","Executive Producer at Handheld Games").
	formatQuote("Working with Brad was a joy from day 1. The moment he stepped foot in our offices, he was constantly trying to find new ways to improve the game we were working on. Brad is very professional when it comes to his job, and the tireless hours he kept while designing the best possible game were a testament to his dedication. <b>He did all of this while still keeping morale high with his sense of humor and artistic wit.</b>","David McCormick", "Senior Producer at Zynga").
	formatQuote("Brad is my favorite designer I have ever worked with because he makes my life easier. He doesn't seem to have an ego. If there are decisions that come from above which he doesn't necessarily agree with, <b>he can always design a solution that satisfies the client, our own boss, and still manages to use art that was on the chopping block.</b>","Peter Thurwachter","Art Director at Handheld Games");
drawDataCard($testimonials,"","level_trans.png","Testimonials");


$projectList='<span class="font-datacard-title">Project List<br></span><div style="text-align:center;">'.
formatGridImage("./projects/einstein.jpg","Intelligent Einstein (Toy)").
formatGridImage("./projects/stein.jpg","Stein-O-Matic").

formatGridImage("./projects/q.jpg","Star Ops<br>(unreleased)").
formatGridImage("./projects/sf.jpg","Star Force<br>(unreleased)").
formatGridImage("./projects/q.jpg","Blister<br>(unreleased)").

formatGridImage("./projects/ymw.jpg","YouMeWar").
formatGridImage("./projects/ymv.jpg","YouMeVerse").
formatGridImage("./projects/q.jpg","Time Team<br>(unreleased)").

formatGridImage("./projects/fv2.jpg","Farmville 2").

formatGridImage("./projects/q.jpg","Unreleased<br>self-help game").
formatGridImage("./projects/tilt-world-logo.jpg","Tilt World").

formatGridImage("./projects/seeds.jpg","Unreleased<br>Charitable Game").

formatGridImage("./projects/nh.jpg","NightHaven").

formatGridImage("./projects/pg.jpg","Perfect Getaway").

formatGridImage("./projects/st.jpg","Facebook game<br>prototype").
formatGridImage("./projects/iso.jpg","Flash game<br>prototype").
formatGridImage("./projects/ss.jpg","Game-Maker<br>prototype").

formatGridImage("./projects/q.jpg","Unreleased AAA mobile port").
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
formatGridImage("./projects/q.jpg","Love Thy Neighbor").
formatGridImage("./projects/ck.jpg","Conquered Kingdoms").'</div>';
		drawDataCard($projectList,"","","ProjectList");

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
			<div class="font-body"><br>'.$text.'</div>
		</div>
	</div>';

	return $result;
}

function formatGridImage($image, $title)
{
	$result='<!-- GridImage -->
	<div style="width:150px; display:inline-block; margin:6px; vertical-align:top;">
		<div style="width:150px; height:150px; background-color:#111111;"><img src="'.$image.'" style="object-fit: cover;
 opacity:1; filter: grayscale(0%); width:150px; height:150px;"></div>
		<div>'.$title.'</div>
	</div>';

	return $result;
}
?>
