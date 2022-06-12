<html>
	<!-- Section block -->
	<!-- Group block (row) -->
	<!-- Link button -->
	<!-- Rather than having 2 separate pages... how about the index handles displaying links... either displaying a default one, or displaying none until the variable is non-null. This would mean I wouldn't need to have a separate menu page with a back button... I could just keep jumping around to different categories with half as many button presses! -->


	<!--
		Link to main service page
		Current user
			link to user page
			button to edit user page

			+ at top of list, to add new element, choose category and all

			- at top of group to modify group (pop-up modify including move to different category delete (with pop-up confirm))

			+ at bottom of category to add new group (pop-up modify)
			- at top of category to remove category (pop-up confirm)

			+ at bottom of page to add new category (categories need a color and an emoji)


			NEXT STEP: find code to generate QR codes on my own
			- then track them in a database

			mention to Ciscog
	-->

	<style>
		.link-block {
			display:inline-block;
			background-color:rgb(200, 200, 200);
			width: 24%;
		}

		.Container-Section {
			background-color:grey;
			padding: 5 5 5 5;
			margin: 5 5 5 5;
		}

		.Container-Group {
			background-color:rgb(200, 200, 200);
			padding: 5 5 5 5;
			margin: 5 5 5 5;
			align:  center;
		}

		.Container-QR {
			text-align: center; 
			background-color: white; 
			padding: 10vw 10vw 10vw 10vw;
			margin: 5 5 5 5;
		}

		.Heading-Section{

		}

		.Heading-Group{

		}

		.Body-Section{

		}

		.Body-Group{
			
		}

	</style>

<?php
	$content = $_GET['cont'];
	if(empty($content))
		$content = "qrcode_ig_bardic.png";
?>

	<body style="background-color: black;">

		<!-- no need for a micro gallery anywhere, I can just direct someone to a particular full gallery on IG or other website -->

		<!-- I'll just use decorative QR image for each.-->


		<div class="Container-Section">
			<div class="Container-QR"><img src=<?php echo $content; ?> width="100%"><?php echo $_GET['cont']; ?></div>
		</div>





		<div class="Container-Section"><b>Gamedev</b><br>

			<div class="Container-Group">Title<br>
				<span>NHB.com gamedev</span>
				<span>NHB.com portfolio</span>
			</div>

		</div>
		<div class="Container-Section"><b>Photography</b><br>

			<div width="100%" height="100px" class="Container-Group">Instagram<br>
				<span class="link-block"><a href="index.php?cont=qrcode_ig_nhb.png"><img src="ig/nhb.jpg" width="100%"></a><br>Not Half Brad</span>
				<span class="link-block"><a href="index.php?cont=qrcode_ig_bardlane.png"><img src="ig/street.jpg" width="100%"></a><br>Bard Lane (Street)</span>
				<span class="link-block"><a href="index.php?cont=qrcode_ig_bardic.png"><img src="ig/bardic.jpg" width="100%"></a><br>Bardic Imagery</span>
				<span class="link-block"><a href="index.php?cont=qrcode_ig_bodies.png"><img src="ig/bodies.jpg" width="100%"></a><br>Bardic Bodies</span>
			</div>

			<div class="Container-Group">Title<br>
				<span>DeviantArt</span>
				<span>ModelMayhem</span>
			</div>
			
			<div class="Container-Group">Title<br>
				<span>Bardic.com</span>
				<span>Bardic Dump</span>
			</div>

		</div>
		<div class="Container-Section"><b>General</b><br>

			<div class="Container-Group">Title<br>
				<span>NHB.com</span>
				<span>NHB contact/about</span>
			</div>

			<div class="Container-Group">Social<br>
				<span>twitter</span>
				<span>SuicideGirls</span>
				<span>WhatsApp</span>
				<span>Line</span>
			</div>

			<div class="Container-Group">Payment<br>
				<span class="link-block" style="width:49%;">Venmo</span>
				<span class="link-block" style="width:49%;">Kofi</span>
			</div>

			<div class="Container-Group">LinkDeck<br>
				<span class="link-block">LinkDeck maine page</span>
				<span class="link-block">Early access signup</span>
			</div>

		</div>
		<div class="Container-Section"><b>Extra</b><br>

			<div class="Container-Group">Cape Whoopies<br>
				<span>Cape Whoopies.com</span>
				<span>Cape whoopies contact</span>
				<span>Cape whoopies facebook</span>
				<span>Cape whoopies IG</span>
			</div>

		</div>
	</body>
</html>