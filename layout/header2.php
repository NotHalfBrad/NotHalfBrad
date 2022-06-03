<html>
	<HEAD>
		<TITLE>
		BRAD WIGGINS - Pursuits Portal
		</TITLE>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" charset="utf-8">
		<link rel="stylesheet" type="text/css" href="https://www.nothalfbrad.com/layout/styles.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<?php 
			echo $extraHeaders;
		?>
	</HEAD>
	<BODY class="color-bg">

	<!-- mobile menu -->
				<div class="only-mobile titlebar-mobile topnav color-heading" style="max-width:100%">
					<a href="javascript:void(0);" class="icon color-heading" onclick="toggleMenu()">
				    	<i class="fa fa-bars color-heading"></i>
				  	</a>

					<span class="font-page-title">Not Half Brad</span>
				  	<!-- Navigation links (hidden by default) -->
				  	<div id="menuToggle" class="collapse">
				  		<table width=100% cellpadding=0 cellspacing=0 class="color-nav-bg">
				  			<tr><td><a href="/index.php" class="nav-pull-button color-nav-button">About</a></td></tr>

					    	<tr><td><a href="/gamedev/" class="nav-pull-button color-nav-button">GameDev</a></td></tr>
					    	<tr><td><a href="/gamedev/portfolio/portfolio.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Porfolio</a></td></tr>
					    	<tr><td><a href="/gamedev/resume.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Resume</a></td></tr>

					    	<tr><td><a href="/photography/" class="nav-pull-button color-nav-button">Photography</a></td></tr>
					    	<tr><td><a href="/photography/gallery.php" class="nav-pull-button color-nav-button-sub" style="margin-left:22px;">Gallery</a></td></tr>
					    </table>
				  	</div>
				</div>
				<br class="only-mobile">
				<br class="only-mobile">
	<!-- end menu -->








		<table width="100%" height="100%" cellpadding="0" cellspacing="0"><tr>


	<!-- Desktop menu -->
			<td height=100% valign="top" class="bar-width2 only-desktop">
				<DIV class="nav-bar bar-width color-nav shadow">
		        	<div class="nav-title color-heading">Not Half Brad</div><BR><BR>

		        	<a href="/index.php"><div class="nav-button color-nav-button">About</div></a>

		        	<a href= "/gamedev/"><div class="nav-button color-nav-button">GameDev</div></a>
		        	<a href= "/gamedev/portfolio/portfolio.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Portfolio</div></a>
		        	<a href= "/gamedev/resume.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Resume</div></a>

		        	<a href= "/photography/"><div class="nav-button color-nav-button">Photography</div></a>
		        	<a href= "/photography/gallery.php"><div class="nav-button color-nav-button-sub" style="margin-left:22px;">Photo Gallery</div></a>

		        	<br>
		        	<script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Support Me on Ko-fi', '#46b798', 'R6R2T75B');kofiwidget2.draw();</script> 
		        </DIV>

		        <!-- side flourish line-->
		        <div class="nav-side color-heading"></div>
		        <div class="nav-bottom color-heading bar-width2"></div>
			</td>

			<td valign="top">
	<!-- end menu -->


				<div id="mainBody" class="body-box">








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