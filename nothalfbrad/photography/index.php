<?php
	$site_section = "photography";
	include '../layout/header.php';

	$intro = '	<div style="position:relative; color:white;">
					<img src="main.jpg" style="width:100%; height:60vh; object-fit:cover; object-position: 100% 50%;">
					<div style="position:absolute; top:0px; left:0px; height:100%; width:100%; background-image:linear-gradient(to right, rgba(50,50,50,0.5) 30%, rgba(0, 0, 0, 0) 70%);">
						<div style="max-width:600px; padding:10vh 4vw; text-align:left;">
							the Pursuit of<br>
									<span class="font-datacard-title-extra">Photography</span><br><br><br>

								<a href="./gallery.php">Here</a> is my gallery of personal photo albums.<br><br>

								<a href="./showcase.php">Here</a> are my select favorite photographs I\'ve created.<br><br>

								<a href="https://www.bardicimagery.com">Bardic Imagery</a> is my professional photography page. Please consider hiring me for any photography work you may need.
						</div>
					</div>
  				</div>';
	drawDataCardSimple($intro);

$galleries = '<div class="font-datacard-title">Recent Uploads</div>
Recently updated albums list, should go here';
drawDataCard($galleries);

$gear = '<div class="font-datacard-title">My Gear</div>
<div style="inline-block">
Camera Bodies
<ul>
<li>Sony a7III</li>
<li>Sony a7c</li>
<li>Ricoh GRIII</li>
<li>GoPro Hero 3+</li>
<li>Zenza Bronica SQ-B</li>
<li>Киев 60</li>
<li>Praktica VLC3</li>
<li>Wirgin Edixa Mat Reflex Mod D-L</li>
</ul>
</div>';
drawDataCard($gear);
	
$instagram = '<div class=font-datacard-title>Instagram</div>
<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="https://cdn.lightwidget.com/widgets/b3525183edf05cad89599dedd71aa59d.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>';
drawDataCard($instagram);

    include '../../layout/footer.php';
?>
