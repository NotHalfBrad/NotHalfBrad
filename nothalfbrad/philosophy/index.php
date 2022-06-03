<?php
	$site_section = "philosophy";
	include '../layout/header.php';

	drawTitleCard("Philosophy");

$intro = 'I\'m planning on creating a philosophy blog here in the near future.<br> For the moment, you can at least look at my philosophy reading recomendations<br><br>
<ul>
<li><a href="background.php">My Philosophy background</a></li>
<li><a href="recommended.php">recomendations</a></li>
</ul>';
	drawDataCard($intro);

    include '../layout/footer.php';
?>
