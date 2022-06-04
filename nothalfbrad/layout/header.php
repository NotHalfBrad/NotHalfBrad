<?php 
include './nothalfbrad/layout/layoutfuncs.php';
include '../layout/layoutfuncs.php';
//include '/home3/notharad/public_html/layout/layoutfuncs.php'; 
session_start();

if(!isset($site_section))
	$site_section = "home";
//get site_page
?>

<html>
	<HEAD>
		<TITLE>
		BRAD WIGGINS - Pursuits Portal
		</TITLE>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" charset="utf-8">
		<link rel="stylesheet" type="text/css" href="https://www.nothalfbrad.com/layout/styles.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://afeld.github.io/emoji-css/emoji.css">
		<link rel="stylesheet" href="https://www.nothalfbrad.com/layout/flickity.css" media="screen">
		<link rel="icon" type="image/png" href="/layout/fav.png" />
		<script src="https://www.nothalfbrad.com/layout/flickity.pkgd.min.js"></script>
	</HEAD>
	<BODY class="color-bg">

	<!-- style="background: linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ), url('/layout/steel_bg.jpg');" -->

	<!-- mobile menu -->
				<div class="only-mobile titlebar-mobile topnav color-accent shadow" style="max-width:100%">
					<a href="javascript:void(0);" class="icon color-accent" onclick="toggleMenu()">
				    	<i class="fa fa-bars color-accent"></i>
				  	</a>

					<span class="font-page-title">Not Half Brad</span>
					<?php drawSiteIcon("gamedev"); ?>
				  	<!-- Navigation links (hidden by default) -->
				  	<div id="menuToggle" class="collapse">
				  		<table width=100% cellpadding=0 cellspacing=0 class="color-nav-bg">
				  			<tr><td><a href="/index.php" class="nav-pull-button color-nav-button">Home</a></td></tr>

					    	<tr><td><a href="/gamedev/" class="nav-pull-button color-nav-button">GameDev</a></td></tr>
					    	<?php if($site_section == "gamedev") echo'
					    	<tr><td><a href="/gamedev/past_titles.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Past Titles</a></td></tr>
					    	<tr><td><a href="/gamedev/portfolio/" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Porfolio</a></td></tr>
					    	<tr><td><a href="/gamedev/resume.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Resume</a></td></tr>';
					    	?>

					    	<tr><td><a href="/photography/" class="nav-pull-button color-nav-button">Photography</a></td></tr>
					    	<?php if($site_section == "photography") echo'
					    	<tr><td><a href="/photography/gallery.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Photo Gallery</a></td></tr>
					    	<tr><td><a href="/photography/showcase.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Fav Images</a></td></tr>';
					    	?>

					    	<tr><td><a href="/philosophy/" class="nav-pull-button color-nav-button">Philosophy</a></td></tr>
					    	<?php if($site_section == "philosophy") echo'
					    	<tr><td><a href="/philosophy/background.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Background</a></td></tr>
					    	<tr><td><a href="/philosophy/recommended.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Recommended</a></td></tr>';
					    	?>
					    </table>
				  	</div>
				</div>
				<br class="only-mobile">
				<br class="only-mobile">
	<!-- end menu -->








		<table width="100%" height="100%" cellpadding="0" cellspacing="0"><tr>


	<!-- Desktop menu -->
			<td height=100% valign="top" class="only-desktop bar-width2" style="margin: 0px;"><!-- bar-width2 -->
				<DIV class="nav-bar color-nav-bg bar-width shadow" style="vertical-align: bottom;"><!-- color-nav--><!-- bar-width -->
		        	<div class="nav-title color-accent">Not Half Brad</div><BR><BR>

		        	<a href="/index.php"><div class="nav-button color-nav-button"><i class="em em-male-technologist" style="filter: grayscale(100%);"></i> &nbsp;&nbsp;&nbsp;Home</div></a>

		        	<a href= "/gamedev/"><div class="nav-button color-nav-button"><i class="em em-space_invader" style="filter: grayscale(100%);"></i> &nbsp;&nbsp;GameDev</div></a>
		        	<?php if($site_section == "gamedev") echo'
		        	<a href= "/gamedev/past_titles.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Past Titles</div></a>
		        	<a href= "/gamedev/portfolio/"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Portfolio</div></a>
		        	<a href= "/gamedev/resume.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Resume</div></a>';
		        	?>

		        	<a href= "/photography/"><div class="nav-button color-nav-button"><i class="em em-camera" style="filter: grayscale(100%);"></i> &nbsp;&nbsp;Photography</div></a>
		        	<?php if($site_section == "photography") echo'
		        	<a href= "/photography/gallery.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Photo Gallery</div></a>
		        	<a href= "/photography/showcase.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Fav Images</div></a>';
		        	?>

		        	<a href= "/philosophy/"><div class="nav-button color-nav-button"><i class="em em-scroll" style="filter: grayscale(100%);"></i> &nbsp;&nbsp;Philosophy</div></a>
		        	<?php if($site_section == "philosophy") echo'
		        	<a href= "/philosophy/background.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Background</div></a>
		        	<a href= "/philosophy/recommended.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Recommended</div></a>';
		        	?>
		        	
		        </DIV>

		        <!-- side flourish line-->
		        <div class="nav-side color-accent"></div>
		        <div class="nav-bottom color-accent bar-width2"></div><!-- bar-width2 -->
			</td>

			<td valign="top" style="left:0px;">
	<!-- end menu -->


				<div id="mainBody" class="body-box">

					<?php ob_start();//start buffering ?>






<script>
function toggleMenu()
{
	var x = document.getElementById("menuToggle");

	if (x.style.display == "block") 
		  	x.style.display = "none";
		  else 
		    x.style.display = "block";
}
</script>

<!--
/*Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function toggleMenu() {
		  var x = document.getElementById("menuToggle");
		  document.getElementById("mainBody").innerHTML = "<br><Br>adasdasd";
		  if (x.style.display == "block") 
		  {
		  	x.style.display = "none";
		  	//document.getElementById("mainBody").style.backgroundColor = white;//not working yet
		  }
		  else 
		  {
		    x.style.display = "block";
		    //document.getElementById("mainBody").style.backgroundColor = "rgba(0,0,0,0.4)";
		  }
}

function toggleArea() {

    if (event.target && event.target.className == 'collapsible') {

    	var x = document.getElementById(id);
        var next = x.nextElementSibling;


        if (next.style.display == "none") {
            next.style.display = "block";

        } else {
            next.style.display = "none";
        }
    }
</script>
-->