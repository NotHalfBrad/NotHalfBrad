hi
<?php
	if(file_exists('./layout/header.php') && include './layout/header.php')
		echo "header loading success!";
	else
		echo "header loading failed!";

	$intro = '	<div style="position:relative; color:white;">
					<img src="about.jpg" style="width:100%; height:95vh; object-fit:cover; object-position: 100% 50%;">
					<div style="position:absolute; top:0px; left:0px; height:100%; width:100%; background-image:linear-gradient(to right, rgba(50,50,50,0.9) 30%, rgba(0, 0, 0, 0) 70%);">
						<div style="max-width:600px; padding:10vh 4vw; text-align:left;">
							The Personal Pursuits of<br>
									<span class="font-datacard-title-extra">Brad Wiggins</span><br><br><br>

							The objective of this site, is to be my personal portal on the web. I eventually intend to expand the sections beyond those listed here, and have each operate almost as an independent site unto themselves. The only exception being pursuits that are their own seperate commercial ventures, such as "Bardic Imagery" and "Regicide Games", which will always remain seperate external sites (though spoiler, they are all just on the same host machine in the end!)...<br><br><br>
						
							Here\'s a link to the gamedev section: <a href="/gamedev/">GameDev</a> <br><br>
								<!--Here\'s a link to the philosophy section: <a href="/philosophy/">Philosophy</a> <br><br>-->
								Here\'s a link to the photography section: <a href="/photography/">Photography</a> <br><br>
								<p>
								Here\'s a link to Bardic Imagery: <a href="http://www.bardicimagery.com">Bardic Imagery</a> <br><br>
								Here\'s a link to Regicide Games: <a href="http://www.regicidegames.com">Regicide</a> <br><br>
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

$about;

$gamedev = '<div class="font-datacard-title"><i class="em em-space_invader"></i> Game Development</div>
I am a game designer by profession, but I am comfortable programming, and making art assets as well.<br><br>
<a href="./gamedev/">here</a> is my Game Development page.';
drawDataCard($gamedev);

$photography = '<div class="font-datacard-title"><i class="em em-camera"></i> Photography</div>
I\'m very interested in photography<br><br>
<a href="./photography/">here</a> is my photography page.<br>
<a href=".bardicimagery.com">here</a> is my professional photography site.';
drawDataCard($photography);

$philosophy = '<div class="font-datacard-title"><i class="em em-scroll"></i> Philosophy</div>
I\'m deeply moved by the efforts of ancient philosophers, to understand the nature of the universe. I hope to learn more about philosophy, and further the cause of wisdom in whatever way I may be able.<br><br>
<a href="./philosophy/">here</a> is my philosophy page.<br>';
drawDataCard($philosophy);

$philanthropy;

$music = '<div class="font-datacard-title"><i class="em em-musical_score"></i> Performance</div>
I play harmonica, and am eager to join in for karaoke.';//performance?
drawDataCard($music);

$art;//visual art? illustration? Other arts?

$poetry;

$travel = '<div class="font-datacard-title"><i class="em em-airplane"></i> Travel</div>
I\'m an avid traveller, and love an excuse to visit somewhere unorthodox. ';
//drawDataCard($travel);

$fitness;

$social = '<div class="font-datacard-title"><i class="em em-speaking_head_in_silhouette"></i> Social</div>
email: brad.wiggins@gmail.com<br>
Twitter: @NotHalfBrad<br>
Instagram: @not_half_brad @bradnwhite @bardicimagery @very_brad_artwork';
drawDataCard($social);

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
